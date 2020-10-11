<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndingHour extends Model
{
    use HasFactory;
    protected $table ="ending_hours";
    protected $primaryKey ="en_id";
    protected $fillable =['en_hour'];
}
