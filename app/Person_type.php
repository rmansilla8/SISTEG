<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Person_type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
