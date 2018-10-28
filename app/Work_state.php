<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Work_state extends Model
{
    protected $fillable = [
        'description',
    ];

    public function schools()
    {
        return $this->hasMany(Employee_school::class);
    }
}
