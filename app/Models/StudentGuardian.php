<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    use HasFactory;
    protected $table = "student_guardians";
    protected $primaryKey = "student_guardian_id";
    protected $fillable = [
        "student_id",
        "student_guardian_relation",
        "student_guardian_name",
        "student_guardian_phone",
        "student_guardian_occupation",
        "student_guardian_address",
        "student_guardian_idcard"
    ];
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
    public function scopeSearch($query, $search)
    {
        return $query->where('student_name', 'LIKE', '%' . $search . '%');
    }
    public function guardianUsers()
    {
        return $this->hasOne(User::class, 'parentId', 'student_guardian_id');
    }
}

