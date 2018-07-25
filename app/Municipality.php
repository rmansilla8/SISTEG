<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable =[
        'code',
        'name',
        'departament_id',
    ];
}
