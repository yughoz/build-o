<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class DashboardCustomer extends Component
{
    public $transaction = []; 
    public $init = false;
    public $full_name; 
    public $marital_status = "1"; 
    public $job = 'Pegawai Swasta'; 
    public $job_partner; 
    public $birthday; 
    public $phone; 
    public $phone2; 
    public $old_password; 
    public $password; 
    public $password_confirmation; 
    public $email; 
    public $agreement; 


    public function submit()
    {

    }
    public function get_data()
    {
        $this->init         = true;
        $this->email        = auth()->user()->email;
        $this->full_name    = auth()->user()->customers()->first()->full_name;
        $this->marital_status = auth()->user()->customers()->first()->marital_status;
        $this->job          = auth()->user()->customers()->first()->job;
        $this->job_partner  = auth()->user()->customers()->first()->job_partner;
        $this->phone        = auth()->user()->customers()->first()->phone;
        $this->phone2       = auth()->user()->customers()->first()->phone2;
        $this->birthday     = auth()->user()->customers()->first()->birthday;
        $this->transaction  = Transaction::get();
        
    }

    public function change_pass()
    {

        $this->validate([
            'password' => 'required|confirmed',
            'old_password' => ['required', 'string', new OldPassword],
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        
        $user->password       = Hash::make($this->password);

        $user->save();


        Auth::login($user);
        redirect(route('home'));
    }
    public function render()
    {
        if (!$this->init) {
            $this->get_data();
        }
        return view('livewire.dashboard-customer');
    }
}
