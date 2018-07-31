<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Worker_type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function school_workers()
    {
        return $this->hasMany(School_worker::class);
    }

    public function supervisions()
    {
        return $this->hasMany(Supervision::class);
    }
}
