<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'dpi',
        'nit',
        'scale_register',
        'person_id',
        'ethnic_community_id',

    ];


    public function person()
    {
        return $this->belongsTo(Person::class, 'id', 'employee_id');
    }

    public function ethnic_community()
    {
        return $this->belongsTo(Ethnic_community::class);
    }

    public function affiliates()
    {
        return $this->hasOne(Affiliate::class);
    }

    public function language_domains()
    {
        return $this->hasMany(Language_domain::class);
    }

    public function employee_schools()
    {
        return $this->hasMany(Employee_school::class);
    }


}
