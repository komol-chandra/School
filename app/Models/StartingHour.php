<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartingHour extends Model
{
    use HasFactory;
    protected $table="starting_hours";
    protected $primaryKey = "sh_id";
    protected $fillable = ["sh_hour"];
}
