<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nit',
        'scale_register',
        'person_id',
        'ethnic_community_id',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function ethnic_community()
    {
        return $this->belongsTo(Ethnic_community::class);
    }

    public function affiliates()
    {
        return $this->hasOne(Affiliate::class);
    }

    public function school_workers()
    {
        return $this->hasMany(School_worker::class);
    }
}
