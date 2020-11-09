<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routine_eachs extends Model
{
    use HasFactory;
    protected $table = "routine_eachs";
    protected $primaryKey = "each_id";
    protected $fillable = ["base_id","day_name","teacher_name","subject_name","classroom_name","sarting_hour","ending_hour","duration"];

    public function dayName()
    {
        return $this->belongsTo("App\Models\Days", "day_name");
    }
    public function subjectName()
    {
        return $this->belongsTo("App\Models\SubjectModel", "subject_name");
    }
    
    public function teacher()
    {
        return $this->belongsTo("App\Models\Teacher", "teacher_name");
    }
    public function classRoom()
    {
        return $this->belongsTo("App\Models\ClassRoom", "classroom_name");
    }
}
