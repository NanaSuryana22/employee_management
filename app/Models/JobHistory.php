<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'position_id',
        'start_date',
        'end_date',
    ];

    public function user() {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }

    public function position() {
        return $this->belongsTo('App\Models\Position', 'position_id');
    }
}
