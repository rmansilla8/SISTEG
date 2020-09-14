<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_school extends Model
{
    protected $fillable = [
        'school_id',
        'empleado_id',
        'contract_id',
        'work_status_id',
        'year_start',
        'employee_type_id',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function work_status()
    {
        return $this->belongsTo(Work_status::class);
    }
    public function employee_type()
    {
        return $this->belongsTo(Employee_type::class);
    }




}
