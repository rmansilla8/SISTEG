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

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function affilliate_state()
    {
        return $this->belongsTo(Affiliate_state::class);
    }

}
