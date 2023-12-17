<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'min_salary',
        'max_salary',
    ];

    public function job_history() {
        return $this->hasOne('App\Models\JobHistory', 'position_id');
    }
}
