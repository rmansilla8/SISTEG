<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class School_district extends Model
{
    protected $fillable = [
        'code',
        'municipality_id',
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function administrative_employees()
    {
        return $this->hasOne(Administrative_employee::class);
    }

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
}
