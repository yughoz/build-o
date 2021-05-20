<?php

namespace App\Repositories;

//PANGGIL MODEL USER
use App\Models\UserManagement\User;

class UserRepository
{
	protected $user;

	public function __construct(User $user)
	{
        //Instance model User ke dalam property user
	    $this->user = $user;
    }
    
    public function getPaginate($per_page)
    {
        return $this->user->orderBy('created_at', 'DESC')->paginate($per_page);
    }

	public function find($id)
	{
		return $this->user->find($id);
	}

	public function findBy($column, $data)
	{
		return $this->user->where($column, $data)->get();
	}
}