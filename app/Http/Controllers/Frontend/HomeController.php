<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\ServiceMenu;
use App\Models\Home;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data = [];
        $data['service_menus'] = ServiceMenu::get();
        $data['blogs'] = Blog::limit(5)->get();
        $data['about_buildo']   = Home::where('module_code','about_buildo')->get();
        $data['works']          = Home::where('module_code','works')->get();
        $data['portofolio']     = Home::where('module_code','portofolio')->get();
        $data['review']         = Home::where('module_code','review')->get();
        $data['brand']          = Home::where('module_code','brand')->get();
        $data['baner2']         = Home::where('module_code','baner2')->first();
        // dd($baner2);
        return view('frontend.home', $data);
    }
}
