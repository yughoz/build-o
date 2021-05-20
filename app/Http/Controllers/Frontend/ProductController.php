<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\ServiceMenu;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::get();
        return view('frontend.prodcuct', ['products' => $products]);
    }

    public function detail(Request $request,$id)
    {
        $product = Product::where('id', $id)->first();
        $service = ServiceMenu::where('id',$product->service_menu_id)->first();
        $whatsapp = $value = config('buildo.whatsapp');

        return view('frontend.detail_product', [
            'product' => $product,
            "service" => $service,
            "whatsapp" => $whatsapp,
            ]);
    }
}
