<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DetailCustomer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Rules\OldPassword;
use Illuminate\Support\Facades\Hash;

class AccountSetting extends Component
{
    public $email; 
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
    public $agreement; 


    public function submit()
    {

        $this->validate([
            'full_name' => 'required',
            'job' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
            'phone2' => 'required',
        ]);

        $detailCustomer     = DetailCustomer::where('user_id', auth()->user()->id)->first();
        
        $detailCustomer->full_name      = $this->full_name;
        $detailCustomer->marital_status = $this->marital_status;
        $detailCustomer->job            = $this->job;
        $detailCustomer->job_partner    = $this->job_partner;
        $detailCustomer->birthday       = $this->birthday;
        $detailCustomer->phone          = $this->phone;
        $detailCustomer->phone2         = $this->phone2;

        $detailCustomer->save();

        redirect(route('home'));
    }
    public function get_data()
    {
        $this->email        = auth()->user()->email;
        $this->full_name    = auth()->user()->customers()->first()->full_name;
        $this->marital_status = auth()->user()->customers()->first()->marital_status;
        $this->job          = auth()->user()->customers()->first()->job;
        $this->job_partner  = auth()->user()->customers()->first()->job_partner;
        $this->phone        = auth()->user()->customers()->first()->phone;
        $this->phone2       = auth()->user()->customers()->first()->phone2;
        $this->birthday     = auth()->user()->customers()->first()->birthday;
        
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
        
        
        // echo $this->full_name;
        // echo auth()->user();
        // echo "test render 12312";
        // exit;

        return view('livewire.account-setting');
    }
}
