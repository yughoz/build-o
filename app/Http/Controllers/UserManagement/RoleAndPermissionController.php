<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Datatables;

class RoleAndPermissionController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_management.role_list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $term = trim($request->query('q'));

        if (empty($term)) {
            return \Response::json([]);
        }

        if($request->has('q')){
            $data = 
                Role::select("id","name")
                ->where('name','LIKE',"%$term%")
                ->get()
            ;
        }

        $formatted_tags = [];

        foreach ($data as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createRole = [
            'name' => $request->input('role_name')
        ];
        $role = Role::create($createRole);
        if (!$role) {
            $message = [
                'message' => 'Failed save role !'
            ];
            return response()->json($message, 422);
        }
        $message = [
            'message' => 'Success save role'
        ];
        return response()->json($message, 200);
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
        $role = Role::find($id);
        $role->name = $request->input('role_name');
        $role->save();

        $message = [
            'message' => 'Success update role !'
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
        $role = Role::findOrFail($id); 
        $role->delete();
        $message = [
            'message' => 'Success remove role !'
        ];
        return response()->json($message, 200);
    }
    
    /** 
     *  
     * @Date: 2019-10-15 15:53:09 
     * @Desc:  Return role data to datatable
     */    
    public function anyData()
    {
        $data = Role::all();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = 
                    '<a href="javascript:void(0)" onclick="updateRole(\''.$row->id.'\',\''.$row->name.'\')" data-toggle="tooltip" data-placement="top" title="Update Role" class="edit btn waves-effect waves-light btn-info">
                        <i class="fa fa-pencil"></i>
                    </a> ';
                    $btn .= 
                    '<a href="javascript:void(0)" onclick="removeRole(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Delete Role" class="delete btn waves-effect waves-light btn-danger">
                        <i class="fa fa-trash"></i>
                    </a> ';
                    $btn .= 
                    '<a href="javascript:void(0)" onclick="givePermissionToRole(\''.$row->id.'\',\''.$row->name.'\')" data-toggle="tooltip" data-placement="top" title="Manage Permission" class="assign btn waves-effect waves-light btn-success">
                        <i class="fa fa-sitemap"></i>
                    </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /** 
     *  
     * @Date: 2019-10-18 14:48:09 
     * @Desc: give permission to role
     */    
    public function givePermissionToRole(Request $request)
    {
        $role_id = (int) $request->input('role_id');
        $role = Role::findById($role_id);
        $role->givePermissionTo($request->input('permission'));

        $message = [
            'message' => 'Success give permission to role !'
        ];
        return response()->json($message, 200);
    }

    /** 
     *   
     * @Date: 2019-10-19 14:45:30 
     * @Desc:  
     */    
    public function getPermission(Request $request)
    {
        $term = trim($request->query('q'));

        if (empty($term)) {
            return \Response::json([]);
        }

        if($request->has('q')){
            $data = Permission::select("id","name")
            		->where('name','LIKE',"%$term%")
            		->get();
        }

        $formatted_tags = [];

        foreach ($data as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }

    /** 
     *   
     * @Date: 2019-10-19 14:49:23 
     * @Desc:  
     */    
    public function getPermissionByRole($id)
    {
        $role = Role::findById($id);
        $permission = $role->permissions()->get();
        return Datatables::of($permission)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = 
                    '<a href="#" data-permission="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Revoke Permission" class="revokePermission delete btn waves-effect waves-light btn-danger">
                        <i class="fa fa-trash"></i>
                    </a> ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /** 
     *   
     * @Date: 2019-10-19 20:00:58 
     * @Desc:  
     */    
    public function revokePermissionFromRole(Request $request, $id)
    {
        $role = Role::findById($id);
        $role->revokePermissionTo($request->input('permission_id'));
        $message = [
            'message' => 'Success remove permission from role !'
        ];
        return response()->json($message, 200);
    }
        
}
