<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable =[
        'number',
        'description',
    ];

    public function schools()
    {
        return $this->belongsToMany(School::class);
    }
}
