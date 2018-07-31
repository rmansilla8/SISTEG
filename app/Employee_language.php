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

    public function languages()
    {
        return $this->belongsTo(Language::class);
    }

    public function language_domains()
    {
        return $this->belongsTo(Language_domain::class);
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class);
    }
}
