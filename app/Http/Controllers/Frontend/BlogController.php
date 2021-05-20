<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    
    public function index(Request $request)
    {
        $blog = Blog::get();
        foreach ($blog as $key => $value) {
            $blog[$key]->mini = strip_tags(substr($value->content, 0, 100));
        }
        return view('frontend.blog', ['blog' => $blog]);
    }
    public function detail(Request $request,$url)
    {
        $blog = Blog::where('url', $url)->first();
        return view('frontend.detail_blog', ['blog' => $blog]);
    }
}
