<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable = [
        'affiliate_id',
        'position_id',
        'committee_level_id',
        'user_id',
    ];

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function committee_level()
    {
        return $this->belongsTo(Committee_level::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
