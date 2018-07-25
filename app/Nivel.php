<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $fillable = [
        'number',
        'description',
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
