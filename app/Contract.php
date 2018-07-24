<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable =[
        'number',
        'description',
    ];

    public function persons()
    {
        return $this->hasMany(Person::class);
    }
}
