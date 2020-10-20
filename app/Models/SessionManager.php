<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SessionManager extends Model
{
    use HasFactory;
    protected $table = "session_managers";
    protected $primaryKey = "session_id";
    protected $fillable = ["session_name","session_status"];

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

    public function scopeActive($query)
    {
        return $query->where('session_status', 1);
    }
}
