<?php

namespace App\Models\Absesni;

use Illuminate\Database\Eloquent\Model;

class LaporanDetail extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'laporan_detail';

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

    public function laporan()
    {
        return $this->belongsTo('App\Models\Absesni\Laporan', 'laporan_id');
    }
}
