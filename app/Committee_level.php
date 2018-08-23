<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Committee_level extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function committees()
    {
        return $this->hasMany(Committee::class);
    }
}
