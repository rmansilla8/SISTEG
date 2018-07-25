<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'code',
        'name',
        'nivel_id',
        'school_district_id',
        'area_id',
        'clasification_id',
        'modality_id',
        'turn_id',
        'address',
    ];

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function school_district()
    {
        return $this->belongsTo(School_district::class);
    }

    public function area()
    {
        return $this->belognsTo(Area::class);
    }

    public function clasification()
    {
        return $this->belongsTo(Clasification::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function turn()
    {
        return $this->belongsTo(Turn::class);
    }
}