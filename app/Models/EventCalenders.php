<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventCalenders extends Model
{
    use HasFactory;
    protected $table = "event_calenders";
    protected $primaryKey = "event_calender_id";
    protected $fillable = ["event_title","event_start_date","event_end_date","status","created_by","updated_by"];

    // public static function boot()
    // {
    //     parent::boot();

    //     static::saving(function ($model) {
    //         $model->created_by = Auth::user()->id;
    //     });

    //     static::updating(function ($model) {
    //         $model->updated_by = Auth::user()->id;
    //     });
    // }

    public function scopeSearch($query, $search)
    {
        return $query->where('event_start_date', 'LIKE', '%' . $search . '%');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
