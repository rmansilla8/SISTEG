<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Language_domain extends Model
{
    protected $fillable = [
        'language_id',
        'employee_id',
        'speak',
        'understand',
        'read',
        'write',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}