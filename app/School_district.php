<?php

namespace Sisteg;

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

    public function supervisions()
    {
        return $this->hasOne(Supervision::class);
    }

    public function municipalities()
    {
        return $this->belongsTo(Municipality::class);
    }
}
