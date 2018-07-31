<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Language_domain extends Model
{
    protected $fillable = [
        'description',
    ];

    public function employee_languages()
    {
        return $this->hasMany(Employee_languages::class);
    }
}
