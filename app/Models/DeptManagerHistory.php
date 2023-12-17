<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeptManagerHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'department_id',
        'start_date',
        'end_date',
    ];

    public function employee() {
        return $this->belongsTo('App\Models\Employe', 'employee_id');
    }

    public function department() {
        return $this->belongsTo('App\Models\Department', 'department_id');
    }
}
