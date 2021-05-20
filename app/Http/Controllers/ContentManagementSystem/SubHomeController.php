<?php

namespace App\Http\Controllers\ContentManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Home;
use Datatables;

class SubHomeController extends Controller
{
    private $module;

    public function __construct() {
        $this->module = [
            'create' => "ADD_SUB_HOME",
            'update' => "UPDATE_SUB_HOME",
            'delete' => "DELETE_SUB_HOME",
            'detail' => "DETAIL_SUB_HOME",
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($module_code)
    {
        $homes = Home::where('module_code', $module_code)->orderBy('title', 'asc')->first();
        $data = [
            'homes' => $homes,
            'module' => $this->module
        ];
        return view('content_management_system.sub_home_list', $data);
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
            'desc' => $request->input('desc')
        ];

        // 3. Store to Database
        $home = Home::create($home);


        $message = [
            'message' => 'Success create sub home!'
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
        $home = Home::find($id);
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
    public function update(Request $request, $id)
    {
        // The updated flow :
        // 1. When empty use the data from DB
        // 2. So this flow haven't validation flow


        // 1. Get data from DB use ID parameter
        $home = Home::find($id);

        // 2. Update the field value using $request->input
        if ($request->has('title')) {
            $home->title = $request->input('title');
        }

        if ($request->has('img_url')) {
            $home->img_url = $request->input('img_url');
        }
        
        if ($request->has('desc')) {
            $home->desc = $request->input('desc');
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
        
        $home->save();

        $message = [
            'message' => 'Success update sub home!'
        ];
        return response()->json($message, 200);
    }

    /**
     * Show detail home
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $home = Home::findOrFail($id); 
        return view('content_management_system.sub_home_detail', ['home' => $home]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $home = Home::findOrFail($id); 
        $home->delete();
        $message = [
            'message' => 'Success remove sub home!'
        ];
        return response()->json($message, 200);
    }

    /** 
     *  
     * @Date: 2019-10-15 15:53:09 
     * @Desc:  Return datatable
     */    
    public function anyData($module_code)
    {
        $data = Home::where('module_code', $module_code)->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "";
                    if (auth()->user()->can($this->module['update'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="updateSubHome(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Edit" class="edit btn waves-effect waves-light btn-warning">
                            <i class="fa fa-pencil"></i>
                        </a> ';
                    }

                    if (auth()->user()->can($this->module['detail'])) {
                        $btn .= 
                        '<a href="'.route('detail.subhome', $row->id).'" data-toggle="tooltip" data-placement="top" title="Detail Home" class="edit btn waves-effect waves-light btn-info">
                            <i class="fa fa-info-circle"></i>
                        </a> ';
                    }

                    if (auth()->user()->can($this->module['delete'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="removeSubHome(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Delete" class="edit btn waves-effect waves-light btn-danger">
                            <i class="fa fa-trash"></i>
                        </a> ';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
