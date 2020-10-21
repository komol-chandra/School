<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Department extends Model
{
    use HasFactory;
    protected $table = "department";
    protected $primaryKey = "department_id";
    protected $fillable = ["department_name"];

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
        return $query->where('department_name', 'LIKE', '%' . $search . '%');
   }
}
