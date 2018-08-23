<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $fillable = [
        'description',
    ];

    public function people ()
    {
        return $this->hasMany(Person::class);
    }
}
