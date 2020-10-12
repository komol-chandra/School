<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;
    protected $table = "days";
    protected $primaryKey = "day_id";
    protected $fillable = ["day_name"];

}
