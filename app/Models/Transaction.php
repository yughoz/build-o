<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'build_start',
        'build_end',
        'percentage',
        'is_custom',
        'status',
        'desc',
        'product_id',
        'user_id'
    ];

    protected $appends = [
        'build_start_format',
        'build_end_format',
    ];

    /**
     * Eeager loading to product table.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Eeager loading to user table.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\UserManagement\User');
    }

    public function getBuildStartFormatAttribute()
    {
        return Carbon::create($this->build_start)->format('d F Y');
    }

    public function getBuildEndFormatAttribute()
    {
        return Carbon::create($this->build_end)->format('d F Y');
    }
}
