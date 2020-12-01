<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    use HasFactory;
    protected $table = "students";
    protected $primaryKey = "student_id";
    protected $fillable = [
        "student_school_id",
        "student_roll_number",
        "class_name",
        "section_name",
        "student_name",
        "student_mothers_name",
        "student_fathers_name",
        "student_birthday_date",
        "student_admission_date",
        "gender_name",
        "blood_name",
        "religion_name",
        "student_phone",
        "student_current_address",
        "student_birth_certificate",
        "status"];

    public function className()
    {
        return $this->belongsTo("App\Models\ClassName", "class_name");
    }
    public function sectionName()
    {
        return $this->belongsTo("App\Models\SectionName", "section_name");
    }
    public function bloodName()
    {
        return $this->belongsTo("App\Models\BloodModel", "blood_name");
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
    public function users()
    {
        return $this->hasOne(User::class, 'parentId', 'student_id');
    }
}
