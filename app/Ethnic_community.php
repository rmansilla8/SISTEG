<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Ethnic_community extends Model
{
    protected $fillable = [
        'name',
    ];

    public function employees()
    {
        return $this->hasOne(Employee::class);
    }
}
