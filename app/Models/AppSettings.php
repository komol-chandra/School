<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AppSettings extends Model
{
    use HasFactory;
    protected $table = "app_settings";
    protected $primaryKey = "app_settings_id";
    protected $fillable = ['app_settings_logo', 'app_settings_name', 'app_settings_email', 'app_settings_phone', 'app_settings_address','app_settings_about'];


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
}
