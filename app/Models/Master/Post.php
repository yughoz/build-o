<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relation to Users
    public function user()
    {
    	return $this->hasOne('App\Models\UserManagement\User');
    }
}
