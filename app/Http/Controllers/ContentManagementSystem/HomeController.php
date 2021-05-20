<?php

namespace App\Http\Controllers\ContentManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Home;
use Datatables;

class HomeController extends Controller
{
    private $module;

    public function __construct() {
        $this->module = [
            'create' => "ADD_HOME",
            'update' => "UPDATE_HOME",
            'delete' => "DELETE_HOME",
            'sub_home' => "SUB_HOME",
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content_management_system.home_list', ['module' => $this->module]);
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
        // 1. Validate 
        $validation = Validator::make($request->all(), [
            'module_code' => ['required', 'string', 'max:35'],
            'module_name' => ['string', 'max:255'],
            'title' => ['required', 'string'],
            'max_child' => ['required', 'number'],
            'image' => ['mimes:jpeg,jpg,png,svg'],
        ]);

        if ($validation->fails()) {
            $message = [
                'errors' => $validation->errors()->toArray(),
                'message' => collect($validation->errors()->all())->implode(' '),
            ];
            return response()->json($message, 422);
        }

        // 2. Save the image and get the link
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $file_name   = time() . '.' . $image->getClientOriginalExtension();
            $image_url = asset('storage/home/'.$file_name);

            // Put the file to storage
            // Use file_get_content to get the image/file from object $image
            Storage::disk('public')->put('home/'.$file_name, file_get_contents($image));
        }

        $home = [
            'module_code' => $request->input('module_code'),
            'module_name' => $request->input('module_name'),
            'title' => $request->input('title'),
            'max_child' => $request->input('max_child'),
            'img_url' => $image_url,
            'description' => $request->input('description')
        ];

        // 3. Store to Database
        $home = Home::create($home);


        $message = [
            'message' => 'Success create home!'
        ];
        return response()->json($message, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($module_code)
    {
        $home = Home::where('module_code', $module_code)->first();
        $message = [
            'message' => 'Success',
            'data' => $home
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
        return;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $module_code)
    {
        // The updated flow :
        // 1. When empty use the data from DB
        // 2. So this flow haven't validation flow

        // 1. Get data from DB use ID parameter
        Home::where('module_code', $module_code)->update(
            [
                'module_code' => $request->input('module_code'),
                'module_name' => $request->input('module_name'),
                'max_child' => $request->input('max_child'),
            ]
        );

        $message = [
            'message' => 'Success update home!'
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
        $product = Home::findOrFail($id); 
        $product->delete();
        $message = [
            'message' => 'Success remove home!'
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
        $data = Home::orderBy('id', 'desc')->groupBy('module_code')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "";
                    if (auth()->user()->can($this->module['sub_home'])) {
                        $btn .= 
                        '<a href="'.route('list.subhome', $row->module_code).'" data-toggle="tooltip" data-placement="top" title="List Sub Module '.$row->module_name.'" class="edit btn waves-effect waves-light btn-info">
                            <i class="fa fa-tasks"></i>
                        </a> ';
                    }

                    if (auth()->user()->can($this->module['update'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="updateHome(\''.$row->module_code.'\')" data-toggle="tooltip" data-placement="top" title="Edit Module" class="edit btn waves-effect waves-light btn-success">
                            <i class="fa fa-pencil"></i>
                        </a> ';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
