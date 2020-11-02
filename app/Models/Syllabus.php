<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Syllabus extends Model
{
    use HasFactory;
    protected $table = "syllabuss";
    protected $primaryKey = "syllabus_id";
    protected $fillable = ["syllabus_title_name","class_name","section_name","subject_name","syllabus_image"];

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
    public function subjectName()
    {
        return $this->belongsTo("App\Models\SubjectModel", "subject_name");
    }

}
