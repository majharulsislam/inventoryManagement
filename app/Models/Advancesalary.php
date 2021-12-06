<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advancesalary extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id', 'advancesalary', 'month', 'year',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id','id');
    }
}
