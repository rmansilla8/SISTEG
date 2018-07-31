<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $fillable =[
        'description',
    ];

    public function employee_titles()
    {
        return $this->hasMany(Employee_titles);
    }
}
