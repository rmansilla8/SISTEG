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

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function employee()
    {
        return $this-belongsTo(Employee::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contracts::class);
    }

    public function worker_type()
    {
            return $this->belongsTo(Worker_type::class);
    }
}
