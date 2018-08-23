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
        'employee_type_id',
    ];

    public function employee_type()
    {
        return $this->belongsTo(Employee_type::class);
    }
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

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function language_domains()
    {
        return $this->belongsToMany(Language_domain::class);
    }

    public function titles()
    {
        return $this->belongsToMany(Title::class);
    }


}
