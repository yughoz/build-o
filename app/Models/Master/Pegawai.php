<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pegawai';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'deleted_at',
        'deleted_by',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'aktif' => true,
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\UserManagement\User');
    }

    public function koordinator()
    {
        return $this->belongsTo('App\Models\Master\Koordinator', 'pegawai_id', 'id');
    }

    public function absensi()
    {
        return $this->haseOne('App\Models\Absesni\Absensi');
    }
    
}
