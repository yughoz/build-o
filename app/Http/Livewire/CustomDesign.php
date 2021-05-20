<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Product;
use App\Models\ServiceMenu;
use App\Models\Transaction;
use App\Models\Category;

class CustomDesign extends Component
{
    public $init = false;
    public $id_service = false; 
    public $id_product ; 
    public $title; 
    public $address; 
    public $description; 
    public $service = []; 
    public $product = []; 

    public function render()
    {
        $this->service      = ServiceMenu::where('id',$this->id_service)->first();;
        return view('livewire.custom-design');
    }

    public function submit()
    {

        $this->validate([
            'title' => 'required',
            'address' => 'required',
            'description' => 'required',
        ]);

        $transaction = [
            'percentage' => 0,
            'name' => $this->title,
            'address' => $this->address,
            'desc' => $this->description,
            'user_id' => auth()->user()->id,
            'service_menu_id' => $this->id_service,
            'is_custom' => '1',
            'status' => 'pending',
        ];

        // 3. Store to Database
        $transaction = Transaction::create($transaction);

        redirect(route('dasboard_customers'));
    }

    public function get_data()
    {
        $this->init         = true;
        $this->product      = Product::where('id', $this->  id_product)->first();
        $this->title        = " ".$this->product->name;

        
    }
}
