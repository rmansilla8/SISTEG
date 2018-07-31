<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class School_worker extends Model
{
    protected $fillable = [
        'school_id',
        'employee_id',
        'contract_id',
        'worker_type',
    ];

    public function schools()
    {
        return $this->belongsTo(School::class);
    }

    public function employees()
    {
        return $this-belongsTo(Employee::class);
    }

    public function contracts()
    {
        return $this->belongsTo(Contracts::class);
    }

    public function worker_types()
    {
            return $this->belongsTo(Worker_type::class);
    }
}
