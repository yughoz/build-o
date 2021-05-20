<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceMenu extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that aren't show.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the product for the service menu.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
