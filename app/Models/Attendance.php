<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'created_by', 'user_id', 'attendance_date', 'attendance_status', 'leave_category_id', 'check_in', 'check_out', 'shift_in', 'shift_out'
    ];
}
