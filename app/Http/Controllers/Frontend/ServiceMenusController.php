<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceMenu;

class ServiceMenusController extends Controller
{
    //
    public function index(Request $request)
    {
        // Validate the request...

        // $Service_menus = new Service_menus;
        $Service_menus = ServiceMenu::get();

        echo $Service_menus;

        // $flight->name = $request->name;

        // $flight->save();
    }
}
