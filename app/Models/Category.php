<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'service_menu_id',
    ];

    /**
     * Get the Service Menu that owns the Product.
     */
    public function serviceMenu()
    {
        return $this->belongsTo(ServiceMenu::class);
    }

    /**
     * Get the Product that owns the Product.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
