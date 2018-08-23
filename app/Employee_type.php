<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function school_workers()
    {
        return $this->hasMany(School_worker::class);
    }

    public function administrative_employees()
    {
        return $this->hasMany(Administrative_employee::class);
    }
}
