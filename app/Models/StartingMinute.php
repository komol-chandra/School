<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartingMinute extends Model
{
    use HasFactory;
    protected $table="starting_minutes";
    protected $primaryKey = "sm_id";
    protected $fillable = ["sm_minute"];
}
