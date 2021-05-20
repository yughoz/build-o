<?php

namespace App\Http\Controllers\ContentManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\ServiceMenu;
use Datatables;

class ServiceMenuController extends Controller
{
    private $module;
    
    public function __construct() {
        $this->module = [
            'create' => "ADD_SERVICE_MENU",
            'update' => "UPDATE_SERVICE_MENU",
            'delete' => "DELETE_SERVICE_MENU",
            'product' => "PRODUCT",
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content_management_system.service_menu_list', ['module' => $this->module]);
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
            'title' => ['required', 'string', 'max:35'],
            'image' => ['required', 'mimes:jpeg,jpg,png,svg'],
            'visible' => ['required', 'in:true,false'],
            'is_service' => ['required', 'in:true,false'],
            'url' => ['required', 'string', 'url']
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
            $image_url = asset('storage/service_menu/'.$file_name);

            // Put the file to storage
            // Use file_get_content to get the image/file from object $image
            Storage::disk('public')->put('service_menu/'.$file_name, file_get_contents($image));
        }

        // 3. Store to Database
        ServiceMenu::create([
            'title' => $request->input('title'),
            'image_path' => $image_url,
            'visible' => $request->input('visible') == "true" ? true : false,
            'is_service' => $request->input('is_service') == "true" ? true : false,
            'url' => $request->input('url')
        ]);


        $message = [
            'message' => 'Success create service menu!'
        ];
        return response()->json($message, 200);
    }

    public function list(Request $request)
    {
        $term = trim($request->query('q'));
        $service_menu = ServiceMenu::select('id','title');
        
        if ($request->has('q') && !empty($term)) {
            $service_menu = $data->where('title','LIKE','%'.$term.'%');
        }

        $data = $service_menu->get();

        $formatted_tags = [];
        foreach ($data as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->title];
        }

        return response()->json($formatted_tags);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = ServiceMenu::find($id);
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
        // The updated flow :
        // 1. When empty use the data from DB
        // 2. So this flow haven't validation flow

        // 1. Get data from DB use ID parameter
        $service_menu = ServiceMenu::find($id);

        // 2. Update the field value using $request->input
        if ($request->has('title')) {
            $service_menu->title = $request->input('title');
        }

        if ($request->has('url')) {
            $service_menu->url = $request->input('url');
        }

        if ($request->has('visible')) {
            $service_menu->visible = $request->input('visible') == "true" ? true : false;
        }

        if ($request->has('is_service')) {
            $service_menu->is_service = $request->input('is_service') == "true" ? true : false;
        }
        
        // 3. Update the image and get the link
        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $file_name   = time() . '.' . $image->getClientOriginalExtension();
            $image_url = asset('storage/service_menu/'.$file_name);

            // Put the file to storage
            // Use file_get_content to get the image/file from object $image
            Storage::disk('public')->put('service_menu/'.$file_name, file_get_contents($image));

            // Update URL using new image updated
            $service_menu->image_path = $image_url;
        }
        $service_menu->save();

        $message = [
            'message' => 'Success update service menu!'
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
        $service_menu = ServiceMenu::findOrFail($id); 
        $service_menu->delete();
        $message = [
            'message' => 'Success remove service menu!'
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
        $data = ServiceMenu::latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "";
                    if (auth()->user()->can($this->module['update'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="updateServiceMenu(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Edit Service Menu" class="edit btn waves-effect waves-light btn-info">
                            <i class="fa fa-pencil"></i>
                        </a> ';
                    }
                    
                    if (auth()->user()->can($this->module['delete'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="removeServiceMenu(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Delete Service Menu" class="delete btn waves-effect waves-light btn-danger">
                            <i class="fa fa-trash"></i>
                        </a> ';
                    }

                    if (auth()->user()->can($this->module['product'])) {
                        $btn .= 
                        '<a href="'.route('list.product', $row->id).'" data-toggle="tooltip" data-placement="top" title="Add Product to '.$row->title.'" class="btn waves-effect waves-light btn-primary">
                            <i class="fa fa-plus"></i>
                        </a> ';
                    }
                    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
