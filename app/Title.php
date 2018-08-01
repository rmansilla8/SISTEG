<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable =[
        'description',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
