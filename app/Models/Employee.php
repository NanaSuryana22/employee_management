<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'phone_number',
        'hire_date',
        'position_id',
        'department_id',
        'gender',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function job_histories() {
        return $this->hasMany('App\Models\JobHistory', 'employee_id');
    }

    public function dept_manager_histories() {
        return $this->hasMany('App\Models\DeptManagerHistory', 'employee_id');
    }

    public function salary() {
        return $this->hasOne('App\Models\Salary', 'employee_id');
    }
}
