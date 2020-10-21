<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = "subject";
    protected $primaryKey = "subject_id";
    protected $fillable = ["subject_name","class_name"];

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

    public function scopeSearch($query, $search)
    {
        return $query->where('subject_name', 'LIKE', '%' . $search . '%');
   }
}
