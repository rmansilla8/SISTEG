<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable =[
        'code',
        'name',
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
