<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Civil_status extends Model
{
    protected $fillable = [
        'name',
    ];

    public function people()
    {
        return $this->hasOne(Person::class);
    }
}
