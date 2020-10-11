<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    use HasFactory;
    protected $table = "student_guardians";
    protected $primaryKey = "student_guardian_id";
    protected $fillable = ["student_id","student_guardian_relation","student_guardian_name",
                            "student_guardian_phone","student_guardian_email",
                            "student_guardian_occupation","student_guardian_address",
                            "student_guardian_image","student_guardian_idcard","status"];
}