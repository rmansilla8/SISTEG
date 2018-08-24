<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'affiliate_id',
        'fee_type_id',
        'amount',
        'date',
        'detail'
    ];

    public function fee_type()
    {
        return $this->belongsTo(Fee_type::class);
    }

    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }
}
