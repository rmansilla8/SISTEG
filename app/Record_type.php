<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Record_type extends Model
{
    protected $fillable = [
        'description',
    ];

    public function accounting_records()
    {
        return $this->hasMany(Accounting_record::class);
    }
}
