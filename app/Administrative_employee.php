<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Administrative_employee extends Model
{
    protected $fillable = [
        'employee_type_id',
        'person_id',
        'school_district_id',
    ];

    public function employee_type()
    {
        return $this->belongsTo(Employee_type::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function school_district()
    {
        return $this->belongsTo(School_district::class);
    }
}
