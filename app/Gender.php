<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'description',
    ];

    public function persons ()
    {
        return $this->hasMany(Person::class);
    }
}
