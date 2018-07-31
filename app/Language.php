<?php

namespace Sisteg;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'name',
    ];

    public function employee_languages()
    {
        return $this->hasMany(Employee_language::class);
    }
}
