<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    protected $table = "periods";
    protected $primaryKey = "period_id";
    protected $fillable = ["period_name"];
}
