<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodModel extends Model
{
    use HasFactory;
    protected $table = "bloods";
    protected $primaryKey = "blood_id";
    protected $fillable = ["blood_name"];
}
