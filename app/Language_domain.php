<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Language_domain extends Model
{
    protected $fillable = [
        'description',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
