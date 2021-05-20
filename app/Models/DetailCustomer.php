<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCustomer extends Model
{
    use HasFactory;
    protected $table = 'detail_customers';
    protected $guarded  = [];

    public function user()
    {
        return $this->belongsTo('App\Models\UserManagement\User');
    }
}
