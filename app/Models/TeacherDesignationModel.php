<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherDesignationModel extends Model
{
    use HasFactory;
    protected $table = "teacher_designations";
    protected $primaryKey = "teacher_designation_id";
    protected $fillable = ["teacher_designation_name"];
}
