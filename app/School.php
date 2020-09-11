<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'code',
        'name',
        'level_id',
        'school_district_id',
        'area_id',
        'classification_id',
        'modality_id',
        'turn_id',
        'address',
        'plan_id',
        'cycle_id',
        'school_status_id'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function school_district()
    {
        return $this->belongsTo(School_district::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function contracts()
    {
        return $this->belongsToMany(Contract::class);
    }

    public function cycle()
    {
        return $this->belongsTo(Cycle::class);
    }

    public function school_status()
    {
        return $this->belongsTo(School_status::class);
    }
}