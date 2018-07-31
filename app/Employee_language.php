<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_language extends Model
{
    protected $fillable = [
        'language_id',
        'language_domain_id',
        'employee_id',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function language_domain()
    {
        return $this->belongsTo(Language_domain::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
