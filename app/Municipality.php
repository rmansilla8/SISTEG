<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable =[
        'code',
        'name',
        'department_id',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function school_districts()
    {
        return $this->hasMany(School_district::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
