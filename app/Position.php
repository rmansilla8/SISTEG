<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'description',
    ];

    public function committees()
    {
        return $this->hasMany(Committee::class);
    }
}
