<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'number',
        'person_id',
        'affiliate_state_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function affiliate_state()
    {
        return $this->belongsTo(Affiliate_state::class);
    }

    public function committees()
    {
        return $this->hasMany(Committee::class);
    }

}
