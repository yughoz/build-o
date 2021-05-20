<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

abstract class BaseModel extends Model
{
    use Notifiable, EventUpdater, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** Default sort direction
     * @var string
     */
    protected $defaultSort = 'asc';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'deleted_by',
        'deleted_at'
    ];

    public function getSortDirection()
    {
        return $this->defaultSort;
    }

    private function formatDate($attr)
    {
        return $attr ? Carbon::parse($attr)->format('c') : null;
    }

    public function getCreatedAtAttribute($attr)
    {
        return $this->formatDate($attr);
    }

    public function getUpdatedAtAttribute($attr)
    {
        return $this->formatDate($attr);
    }

    public function getDeletedAtAttribute($attr)
    {
        return $this->formatDate($attr);
    }

    public function onCreated()
    {
        return [
            'id' => $this->{$this->getKeyName()},
            'created_at' => $this->formatDate($this->attributes['created_at'])
        ];
    }

    public function onUpdated()
    {
        return [
            'id' => $this->{$this->getKeyName()},
            'updated_at' => $this->formatDate($this->attributes['updated_at']),
        ];
    }

    public function onDeleted()
    {
        return [
            'id' => $this->{$this->getKeyName()},
            'deleted_at' => $this->formatDate($this->attributes['deleted_at']),
        ];
    }
}
