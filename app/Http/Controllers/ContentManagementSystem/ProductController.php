<?php

namespace App\Http\Controllers\ContentManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\ServiceMenu;
use Datatables;
use Webpatser\Uuid\Uuid;

class ProductController extends Controller
{
    private $module;

    public function __construct() {
        $this->module = [
            'create' => "ADD_PRODUCT",
            'update' => "UPDATE_PRODUCT",
            'delete' => "DELETE_PRODUCT",
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($service_menu_id)
    {
        $service_menu = ServiceMenu::find($service_menu_id);
        $data = [
            'service_menu' => $service_menu,
            'module' => $this->module
        ];
        return view('content_management_system.product_list', $data);
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
            'name' => ['required', 'string', 'max:35'],
            'indexing_name' => ['string', 'max:255'],
            'price' => ['required', 'integer'],
            'show' => ['required', 'in:true,false'],
            'image_1' => ['mimes:jpeg,jpg,png,svg'],
            'image_2' => ['mimes:jpeg,jpg,png,svg'],
            'image_3' => ['mimes:jpeg,jpg,png,svg'],
            'image_4' => ['mimes:jpeg,jpg,png,svg'],
            'image_5' => ['mimes:jpeg,jpg,png,svg'],     
            'service_menu_id' => ['required', 'integer'], 
            'category_id' => ['required', 'integer'],  
        ]);

        if ($validation->fails()) {
            $message = [
                'errors' => $validation->errors()->toArray(),
                'message' => collect($validation->errors()->all())->implode(' '),
            ];
            return response()->json($message, 422);
        }

        // 2. Save the image and get the link
        $max_image = 5;
        $images = [];
        for ($i=1; $i <= $max_image ; $i++) { 
            $index = "image_path_{$i}";
            
            if ($request->hasFile("image_{$i}")) {
                $image      = $request->file("image_{$i}");
                $file_name  = Uuid::generate()->string. '.' . $image->getClientOriginalExtension();
                $image_url  = asset('storage/product/'.$file_name);
    
                // Put the file to storage
                // Use file_get_content to get the image/file from object $image
                Storage::disk('public')->put('product/'.$file_name, file_get_contents($image));
                $images[$index] = $image_url;
            }
        }

        $product = [
            'name' => $request->input('name'),
            'indexing_name' => $request->input('indexing_name'),
            'price' => $request->input('price'),
            'show' => $request->input('show') == "true" ? true : false,
            'url_ecommerce' => $request->input('url_ecommerce'),
            'description' => $request->input('description'),
            'service_menu_id' => $request->input('service_menu_id'),
            'category_id' => $request->input('category_id'),
        ];

        $product = array_merge($product, $images);

        // 3. Store to Database
        $product = Product::create($product);


        $message = [
            'message' => 'Success create product!'
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
        $product = Product::with('category')->find($id);
        $message = [
            'message' => 'Success',
            'data' => $product
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
        $product = Product::find($id);

        // 2. Update the field value using $request->input
        if ($request->has('name')) {
            $product->name = $request->input('name');
        }

        if ($request->has('indexing_name')) {
            $product->indexing_name = $request->input('indexing_name');
        }
        
        if ($request->has('url_ecommerce')) {
            $product->url_ecommerce = $request->input('url_ecommerce');
        }
        
        if ($request->has('price')) {
            $product->price = $request->input('price');
        }

        if ($request->has('show')) {
            $product->show = $request->input('show') == "true" ? true : false;
        }

        if ($request->has('description')) {
            $product->description = $request->input('description');
        }
        
        // 3. Update the image and get the link
        // 2. Save the image and get the link
        $max_image = 5;
        for ($i=1; $i <= $max_image ; $i++) { 
            $index = "image_path_{$i}";

            if ($request->hasFile("image_{$i}")) {
                $image      = $request->file("image_{$i}");
                $file_name   = time() . '.' . $image->getClientOriginalExtension();
                $image_url = asset('storage/product/'.$file_name);
    
                // Put the file to storage
                // Use file_get_content to get the image/file from object $image
                Storage::disk('public')->put('product/'.$file_name, file_get_contents($image));
    
                // Update URL using new image updated
                $product->{$index} = $image_url;
            }
        }
        
        $product->save();

        $message = [
            'message' => 'Success update product!'
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
        $product = Product::findOrFail($id); 
        $product->delete();
        $message = [
            'message' => 'Success remove product!'
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
            $data = Product::with(['serviceMenu','category'])->where('name','LIKE','%'.$term.'%')
                ->get()
            ;
        }

        return response()->json($data);
    }

    /** 
     *  
     * @Date: 2019-10-15 15:53:09 
     * @Desc:  Return datatable
     */    
    public function anyData($service_menu_id)
    {
        $data = Product::with('category')->where('service_menu_id', $service_menu_id)->latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "";
                    if (auth()->user()->can($this->module['update'])) {
                        $btn = 
                        '<a href="javascript:void(0)" onclick="updateProduct(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Edit Product" class="edit btn waves-effect waves-light btn-info">
                            <i class="fa fa-pencil"></i>
                        </a> ';
                    }
                    
                    if (auth()->user()->can($this->module['update'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="removeProduct(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Delete Product" class="delete btn waves-effect waves-light btn-danger">
                            <i class="fa fa-trash"></i>
                        </a> ';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
