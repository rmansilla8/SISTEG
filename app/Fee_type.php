<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Fee_type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}
