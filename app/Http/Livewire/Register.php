<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\DetailCustomer;
use App\Models\UserManagement\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public $email; 
    public $fullName; 
    public $maritalStatus = "1"; 
    public $occupation = 'Pegawai Swasta'; 
    public $spouseOccupation; 
    public $dob; 
    public $mobilePhoneNo; 
    public $altPhoneNo; 
    public $password; 
    public $password_confirmation; 


    public function submit()
    {

        $this->validate([
            'email'    => 'required|email',
            'fullName' => 'required',
            'occupation' => 'required',
            'dob' => 'required',
            'mobilePhoneNo' => 'required',
            'altPhoneNo' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $this->fullName,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $detail = DetailCustomer::create([
            'user_id'       => $user->id,
            'full_name'     => $this->fullName,
            'marital_status' => $this->maritalStatus,
            'job'           => $this->occupation,
            'job_partner'   => $this->spouseOccupation,
            'birthday'      => $this->dob,
            'phone'         => $this->mobilePhoneNo,
            'phone2'        => $this->altPhoneNo,
        ]);

        $user->assignRole(3);


        Auth::login($user);
        redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.register');
    }
}
