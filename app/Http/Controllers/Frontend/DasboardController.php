<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ServiceMenu;
use App\Models\Home;

class DasboardController extends Controller
{
    public function index(Request $request,$module_code)
    {
        // echo $module_code;die;
        $data = [];
        $data['service']   = ServiceMenu::where('url',$module_code)->first();
        $data['products']  = Product::where('service_menu_id',$data['service']->id)->get();
        
        // dd($data);   
        return view('frontend.catalogue', $data);
    }
}
