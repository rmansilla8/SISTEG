<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'name',
    ];

    public function schools ()
    {
        return $this->hasMany(School::class);
    }
}
