<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'dpi',
        'first_name',
        'second_name',
        'third_name',
        'first_surname',
        'second_surname',
        'email',
        'phone',
        'address',
        'municipality_id',
        'gender_id',
        'birthdate',
        'civil_state_id'
        
    ];

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

    public function supervision()
    {
        return $this->hasOne(Supervision::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}
