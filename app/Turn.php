<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    protected $fillable = [
        'description',
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
