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
    public function Designation(){
    	return $this->belongsTo("App\Models\TeacherDesignationModel","teacher_designation_name");
    }
    public function Department(){
    	return $this->belongsTo("App\Models\Department","department_name");
    }
    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('teacher_name', 'LIKE', '%' . $search . '%');
    }
}
