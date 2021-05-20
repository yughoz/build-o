<?php

namespace App\Http\Controllers\ContentManagementSystem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use Webpatser\Uuid\Uuid;
use App\Models\Transaction;
use Datatables;

class TransactionController extends Controller
{
    private $module;

    public function __construct() {
        $this->module = [
            'create' => "ADD_TRANSACTION",
            'update' => "UPDATE_TRANSACTION",
            'cancel' => "CANCEL_TRANSACTION",
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content_management_system.transaction_list', ['module' => $this->module]);
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
            'user_id' => ['required', 'integer'],
            'image' => ['mimes:jpeg,jpg,png,svg'],
            'address' => ['string', 'max:255'],
            'start_build' => ['date', 'date_format:Y-m-d'],
            'end_build' => ['date', 'date_format:Y-m-d'],
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
            $image     = $request->file('image');
            $file_name = Uuid::generate()->string . '.' . $image->getClientOriginalExtension();
            $image_url = asset('storage/transaction/custom-design/'.$file_name);

            // Put the file to storage
            // Use file_get_content to get the image/file from object $image
            Storage::disk('public')->put('transaction/custom-design/'.$file_name, file_get_contents($image));
        }

        $req_data = $request->input();
        $req_data['is_custom'] = $request->input('is_custom') == 'true' ? 1 : 0;

        $transaction = [
            'percentage' => 0,
            'status' => 'start',
            'image_path' => $image_url ?? null
        ];

        $transaction = array_merge($req_data, $transaction);

        // 3. Store to Database
        $transaction = Transaction::create($transaction);
        
        $message = [
            'message' => 'Success create transaction!'
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
        $transaction = Transaction::with(['user.customers','product.category', 'product.serviceMenu'])->find($id);
        $message = [
            'message' => 'Success',
            'data' => $transaction
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
        $transaction = Transaction::find($id);

        // 2. Update the field value using $request->input
        if ($request->has('address')) {
            $transaction->address = $request->input('address');
        }

        if ($request->has('build_start')) {
            $transaction->build_start = $request->input('build_start');
        }
        
        if ($request->has('build_end')) {
            $transaction->build_end = $request->input('build_end');
        }

        if ($request->has('percentage')) {
            $transaction->percentage = $request->input('percentage');
        }
        
        if ($request->has('status')) {
            $transaction->status = $request->input('status');
        }
        
        $transaction->save();

        $message = [
            'message' => 'Success update progress transaction!'
        ];
        return response()->json($message, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $transaction = Transaction::findOrFail($id); 
        $transaction->status = 'cancel';
        $transaction->save();
        $message = [
            'message' => 'Transaction has been cancelled!'
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
        $data = Transaction::with(['user','product.category'])->latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = "";
                    if (auth()->user()->can($this->module['update'])) {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="updateTransaction(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Update Progress" class="edit btn waves-effect waves-light btn-info">
                            <i class="fa fa-pencil"></i>
                        </a> ';
                    }
                    if (auth()->user()->can($this->module['cancel']) && $row->status != 'cancel') {
                        $btn .= 
                        '<a href="javascript:void(0)" onclick="cancelTransaction(\''.$row->id.'\')" data-toggle="tooltip" data-placement="top" title="Cancel Transaction" class="cancel btn waves-effect waves-light btn-danger">
                            <i class="fa fa-times"></i>
                        </a> ';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
