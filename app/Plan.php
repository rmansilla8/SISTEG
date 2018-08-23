<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
