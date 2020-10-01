<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primaryKey = "student_id";
    protected $fillable = ["student_admission_number","student_roll_number","class_name","section_name","student_name","student_mothers_name","student_fathers_name","student_birthday_date","student_admition_date","gender_name","blood_name","category_name","religion_name","student_phone","student_email","student_height","student_weight","student_current_address","student_permanent_address","student_image","student_birth_certificate","student_marksheet","student_testimonial","student_registration_card","student_guardian_relation","student_guardian_name","student_guardian_phone","student_guardian_email","student_guardian_occupation","student_guardian_address","student_guardian_image","student_guardian_idcard","status"];

    public function className()
    {
        return $this->belongsTo("App\Models\ClassName", "class_name");
    }
    public function sectionName()
    {
        return $this->belongsTo("App\Models\SectionName", "section_name");
    }
    public function catagoryName()
    {
        return $this->belongsTo("App\Models\CategoryNameModel", "category_name");
    }
    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('student_name', 'LIKE', '%' . $search . '%');
    }
}
