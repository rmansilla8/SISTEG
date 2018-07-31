<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_title extends Model
{
    protected $fillable =[
        'title_id',
        'employee_id',
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function employee()
    {
        return $this-belongsTo(Employee::class);
    }
}
