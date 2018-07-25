<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'dpi',
        'nit',
        'first_name',
        'second_name',
        'third_name',
        'first_surname',
        'second_surname',
        'email',
        'phone',
        'person_type_id',
        'contract_id',
        'address',
        'municipality_id',
        'gender_id',
        'scale_register',
    ];

    public function person_type()
    {
        return $this->belongsTo(Person_type::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function affiliate()
    {
        return $this->hasOne(Affiliate::class);
    }


}
