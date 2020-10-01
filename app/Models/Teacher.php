<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = "teachers";
    protected $primaryKey = "teacher_id";
    protected $fillable = ["teacher_name","teacher_email","teacher_password","teacher_designation_name","department_name","teacher_phone","gender_name","blood_name","teacher_facebook","teacher_twitter","teacher_linkedin","teacher_address","teacher_about","teacher_image","status"];

}
