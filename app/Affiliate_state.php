<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Affiliate_state extends Model
{
    protected $fillable = [
        'description',
    ];

    public function affiliates()
    {
        return $this->hasMany(Affiliate::class);
    }
}
