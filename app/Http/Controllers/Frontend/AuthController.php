<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailCustomer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    
    public function index(Request $request)
    {
        return view('frontend.login', ['blog' => ""]);
    }
    
    public function registration(Request $request)
    {
        return view('frontend.registration', ['blog' => ""]);
    }

    public function save_registration(Request $request)
    {
        // echo $request->input('fullName');die;
        // echo $request->maritalStatus;
        // echo $request->occupation;
        // echo $request->spouseOccupation;
        // echo $request->spouseOccupation;
        // echo $request->spouseOccupation;
        // echo $request->dob;
        // echo $request->email;
        // echo $request->mobilePhoneNo;
        // echo $request->password1;
        // echo $request->password2;


        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->input('fullName'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password1')),
            ]);


            $user = DetailCustomer::create([
                'full_name' => $request->input('fullName'),
                'status' => $request->input('maritalStatus'),
                'job' => $request->input('occupation'),
                'job_patner' => $request->input('spouseOccupation'),
                'birthday' => $request->input('dob'),
                'email' => $request->input('email'),
                'phone' => $request->input('mobilePhoneNo'),
                'phone2' => $request->input('altPhoneNo'),
                // 'password' => Hash::make($request->input('password1')),
            ]);
        });

        $message = [
            'message' => 'Success create user!'
        ];
        return response()->json($message, 200);
        // return view('frontend.registration', ['blog' => ""]);
    }

    
    public function forgot_password(Request $request)
    {
        return view('frontend.forgot_password', ['blog' => ""]);
    }
}
