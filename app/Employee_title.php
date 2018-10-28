<?php

namespace IntelGUA\Sisteg;

use Illuminate\Database\Eloquent\Model;

class Employee_title extends Model
{
    protected $fillable = [
        'title_id',
        'employee_id',
        'institution',
        'year_title'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

}
