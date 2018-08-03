<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'number',
        'employee_id',
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

    public function positions()
    {
        return $this->belongsToMany(Position::class);
    }

    public function committee_levels()
    {
        return $this->belongsToMany(Committee_level::class);
    }

}
