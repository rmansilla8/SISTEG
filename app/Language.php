<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
    ];

    public function language_domains()
    {
        return $this->belongsTo(Language_domain::class);
    }
}
