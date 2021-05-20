<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\UserManagement\User;
use Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_management.user_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validation->fails()) {
            $message = [
                'errors' => $validation->errors()->toArray(),
                'message' => collect($validation->errors()->all())->implode(' '),
            ];
            return response()->json($message, 422);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        $message = [
            'message' => 'Success create user!'
        ];
        return response()->json($message, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);
        $message = [
            'message' => 'Success',
            'data' => $user
        ];
        return response()->json($message, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('user_management.user_edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        
        if ($request->has('password') && $request->input('password') != "") {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();

        $message = [
            'message' => 'Success update user !'
        ];
        return response()->json($message, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete();
        $message = [
            'message' => 'Success remove user!'
        ];
        return response()->json($message, 200);
    }

    /** 
     *  
     * @Date: 2019-10-15 15:53:09 
     * @Desc:  Return datatable
     */    
    public function anyData()
    {
        $data = User::with('roles')->latest()->get();
        if (!empty(config('template.superUserID'))) {
            $superuserId = config('template.superUserID');
            $data = User::with('roles')->whereNotIn('id', [$superuserId])->latest()->get();
        }
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = 
                    '<a href="javascript:void(0)" onclick="updateUser(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Edit User" class="edit btn waves-effect waves-light btn-info">
                        <i class="fa fa-pencil"></i>
                    </a> ';
                    
                    $btn .= 
                    '<a href="javascript:void(0)" onclick="removeUser(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Delete User" class="delete btn waves-effect waves-light btn-danger">
                        <i class="fa fa-trash"></i>
                    </a> ';

                    if (\count($row->roles) == 0) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="assignRoleToUser(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Assign Role" class="assign btn waves-effect waves-light btn-success">
                            <i class="fa fa-tags"></i>
                        </a>';       
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    public function giveRoleToUser(Request $request)
    {
        $role_id = $request->input('role_id');
        $user_id = (int) $request->input('user_id');
        $user = User::find($user_id);
        $user->assignRole($role_id[0]);

        $message = [
            'message' => 'Success give role to user!'
        ];
        return response()->json($message, 200);
    }

    public function list(Request $request)
    {
        $term = trim($request->query('q'));

        if (empty($term)) {
            return \Response::json([]);
        }

        if($request->has('q')){
            $data = 
                User::select('id','name')
                    ->where('name','LIKE','%'.$term.'%')
                    ->whereHas('roles', function($q) { $q->where('name', 'customer');})
                    ->get()
            ;
        }

        $formatted_tags = [];

        foreach ($data as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return response()->json($formatted_tags);
    }
}
