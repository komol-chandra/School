<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ClassRoom extends Model
{
    use HasFactory;
    protected $table = "class_room";
    protected $primaryKey = "classroom_id";
    protected $fillable = ["classroom_name"];

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

    public function scopeSearch($query, $search)
    {
        return $query->where('classroom_name', 'LIKE', '%' . $search . '%');
    }
}
