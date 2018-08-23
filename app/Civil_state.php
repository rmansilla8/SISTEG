<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Civil_state extends Model
{
    protected $fillable = [
        'description',
    ];

    public function people()
    {
        return $this->hasOne(Person::class);
    }
}
