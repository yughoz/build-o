<?php

namespace App\Http\Controllers\ContentManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Category;
use Datatables;

class CategoryController extends Controller
{
    private $module;

    public function __construct() {
        $this->module = [
            'create' => "ADD_CATEGORY",
            'update' => "UPDATE_CATEGORY",
            'delete' => "DELETE_CATEGORY",
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content_management_system.category_list', ['module' => $this->module]);
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
            'service_menu_id' => ['required', 'integer'],
            'name' => ['string', 'max:255'],
        ]);

        if ($validation->fails()) {
            $message = [
                'errors' => $validation->errors()->toArray(),
                'message' => collect($validation->errors()->all())->implode(' '),
            ];
            return response()->json($message, 422);
        }

        $category = [
            'name' => $request->input('name'),
            'service_menu_id' => $request->input('service_menu_id'),
        ];

        // 2. Store to Database
        $category = Category::create($category);


        $message = [
            'message' => 'Success create category!'
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
        $category = Category::with('serviceMenu')->where('id', $id)->first();
        $message = [
            'message' => 'Success',
            'data' => $category
        ];
        return response()->json($message, 200);
    }

    public function list(Request $request)
    {
        $term = trim($request->query('q'));
        $service_menu_id = trim($request->query('service_menu_id'));
        $category = Category::select('id','name')->where('service_menu_id', $service_menu_id);

        if(!empty($term)){
            $category->where('name','LIKE','%'.$term.'%');
        }

        $data = $category->get();
        $formatted_tags = [];

        foreach ($data as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return response()->json($formatted_tags);
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
        Category::where('id', $id)->update(
            [
                'name' => $request->input('name'),
                'service_menu_id' => $request->input('service_menu_id'),
            ]
        );

        $message = [
            'message' => 'Success update category!'
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
        $product = Category::findOrFail($id); 
        $product->delete();
        $message = [
            'message' => 'Success remove category!'
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
        $data = Category::with('serviceMenu')->orderBy('id', 'desc')->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "";

                    if (auth()->user()->can($this->module['update'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="updateCategory(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Edit Category" class="edit btn waves-effect waves-light btn-success">
                            <i class="fa fa-pencil"></i>
                        </a> ';
                    }

                    if (auth()->user()->can($this->module['delete'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="removeCategory(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Delete Category" class="delete btn waves-effect waves-light btn-danger">
                            <i class="fa fa-trash"></i>
                        </a> ';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
