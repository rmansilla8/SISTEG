<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Supervision extends Model
{
    protected $fillable = [
        'employee_type_id',
        'person_id',
        'school_district',
    ];

    public function worker_type()
    {
        return $this->belongsTo(Worker_type::class);
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
