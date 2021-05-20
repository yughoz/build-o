<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ServiceMenu;
use App\Models\Home;
use App\Models\Category;

class Catalogoe extends Component
{
    public $service = false; 
    public $init = false;
    public $products = []; 
    public $categories = []; 
    public $category = 0; 
    public $max_price; 
    public $min_price; 
    public $module_code; 
    public $filter_max; 
    public $filter_min; 


    public function render()
    {
        // $this->module_code = $module_code;
        // echo $this->module_code;die;


        if (!$this->init) {
            $this->get_data();
        }


        $temp_prod = Product::where('service_menu_id',$this->service->id);

        if ($this->filter_max) {
           $temp_prod->where("price", '<=', $this->filter_max);
        }

        if ($this->filter_min) {
            $temp_prod->where("price", '>=', $this->filter_min);
        }

        if ($this->category > 0) {
            $temp_prod->where("category_id", '>=', $this->category);
        }

        $this->products = $temp_prod->get();

        return view('livewire.catalogoe');
    }

    public function filter()
    {
        // $this->filter_min = $min;
        // $this->filter_max = $max;
    }
    

    public function get_data()
    {
        $this->init         = true;
        $this->service      = ServiceMenu::where('url',$this->module_code)->first();;
        $this->max_price    = Product::where('service_menu_id',$this->service->id)->max('price');
        $this->min_price    = Product::where('service_menu_id',$this->service->id)->min('price');
        $this->categories   = Category::where('service_menu_id',$this->service->id)->get();
        
    }
}
