<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndingMinute extends Model
{
    use HasFactory;
    protected $table = "ending_minutes";
    protected $primaryKey = "em_id";
    protected $fillable= ['em_minute'];
}
