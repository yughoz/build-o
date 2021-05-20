<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'indexing_name',
        'price',
        'show',
        'image_path_1',
        'image_path_2',
        'image_path_3',
        'image_path_4',
        'image_path_5',
        'description',
        'is_service',
        'url_ecommerce',
        'service_menu_id',
        'category_id'
    ];

    /**
     * Get the Service Menu that owns the Product.
     */
    public function serviceMenu()
    {
        return $this->belongsTo(ServiceMenu::class);
    }

    /**
     * Get the Category that owns the Product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
