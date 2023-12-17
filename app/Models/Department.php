<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function dept_manager_histories() {
        return $this->hasMany('App\Models\DeptManagerHistory', 'department_id');
    }
}
