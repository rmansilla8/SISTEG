<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
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
