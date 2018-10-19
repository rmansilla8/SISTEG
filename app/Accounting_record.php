<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Accounting_record extends Model
{
    protected $fillable = [
        'description',
        'amount',
        'date',
        'record_type_id',
    ];

    public function record_type()
    {
        return $this->belongsTo(Record_type::class);
    }
}
