<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class School_status extends Model
{
    protected $fillable = [
        'description',
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }

}
