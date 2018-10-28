<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'number',
        'description',
    ];

    public function employee_schools()
    {
        return $this->belongsTo(Employee_school::class);
    }
}
