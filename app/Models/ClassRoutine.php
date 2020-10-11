<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ClassRoutine extends Model
{
    use HasFactory;
    protected $table = "class_routines";
    protected $primaryKey = "routine_id";
    protected $fillable = ["class_name","section_name","subject_name","teacher_name","classroom_name","day_name","sh_hour","sm_minute","en_hour","em_minute"];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->created_by = Auth::user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }

    public function className()
    {
        return $this->belongsTo("App\Models\ClassName", "class_name");
    }
    public function dayName()
    {
        return $this->belongsTo("App\Models\Days", "day_name");
    }
    public function subjectName()
    {
        return $this->belongsTo("App\Models\SubjectModel", "subject_name");
    }
    public function startHour()
    {
        return $this->belongsTo("App\Models\StartingHour", "sh_hour");
    }

    public function startMinute()
    {
        return $this->belongsTo("App\Models\StartingMinute", "sm_minute");
    }
    public function endHour()
    {
        return $this->belongsTo("App\Models\EndingHour", "en_hour");
    }
    public function endMinute()
    {
        return $this->belongsTo("App\Models\EndingMinute", "em_minute");
    }
    public function teacher()
    {
        return $this->belongsTo("App\Models\Teacher", "teacher_name");
    }
    public function classRoom()
    {
        return $this->belongsTo("App\Models\ClassRoom", "classroom_name");
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('class_name', 'LIKE', '%' . $search . '%');
    }
}
