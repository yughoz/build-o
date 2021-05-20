<?php

namespace App\Models\Absesni;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporan';

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

    public function laporan_detail()
    {
        return $this->hasMany('App\Models\Absesni\LaporanDetail', 'laporan_id', 'id');
    }
}
