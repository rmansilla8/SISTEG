<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function employee_schools()
    {
        return $this->hasMany(Employee_school::class);
    }

    public function administrative_employees()
    {
        return $this->hasMany(Administrative_employee::class);
    }
}
