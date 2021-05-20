<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Koordinator extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'koordinasi';

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

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Master\Pegawai');
    }

    public function absensi()
    {
        return $this->hasOne('App\Models\Absesni\Absensi');
    }
}
