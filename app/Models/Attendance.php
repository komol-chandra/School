<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = "attendances";
    protected $primaryKey = "attendance_id";
    protected $fillable = ["attendance_date","class_name","section_name","student_name","attendance_status"];
}
