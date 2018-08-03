<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'affiliate_id',
        'fee_type_id',
        'amount',
        'date',
        'year',
        'detail'
    ];

    public function fee_type()
    {
        return $this->belongsTo(Fee_type::class);
    }

    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }
}
