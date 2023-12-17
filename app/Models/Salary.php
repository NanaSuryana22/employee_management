<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'salary',
        'start_date',
        'end_date',
    ];

    public function employee() {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
}
