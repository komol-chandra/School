<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDesignations extends Model
{
    use HasFactory;
    protected $table = "staff_designations";
    protected $primaryKey = "staff_designation_id";
    protected $fillable = ["staff_designation_name"];
}
