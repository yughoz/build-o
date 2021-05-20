<?php

namespace App\Models\Absesni;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'absensi';

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

    public function koordinator()
    {
        return $this->belongsTo('App\Models\Master\Koordinator');
    }
}
