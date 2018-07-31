<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_title extends Model
{
    protected $fillable =[
        'title_id',
        'employee_id',
    ];

    public function titles()
    {
        return $this->belongsTo(Title::class);
    }

    public function employees()
    {
        return $this-belongsTo(Employee::class);
    }
}
