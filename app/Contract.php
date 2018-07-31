<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable =[
        'number',
        'description',
    ];

    public function school_workers()
    {
        return $this->hasMany(School_worker::class);
    }
}
