<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;


class Title extends Model
{
    protected $fillable = [
        'description',
    ];

    public function employee_schools()
    {
        return $this - hasMany(Employee_school::class);
    }
}
