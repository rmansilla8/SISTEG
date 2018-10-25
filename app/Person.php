<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'names',
        'surnames',
        'email',
        'phone',
        'address',
        'municipality_id',
        'gender_id',
        'birthdate',
        'civil_state_id'

    ];

    public function getFullNameAttribute()
    {
        return $this->names . ' ' . $this->surnames;
    }
    public function civil_state()
    {
        return $this->belongsTo(Civil_state::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function administrative_employee()
    {
        return $this->hasOne(Administrative_employee::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
