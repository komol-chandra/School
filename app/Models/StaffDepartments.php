<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDepartments extends Model
{
    use HasFactory;
    protected $table = "staff_departments";
    protected $primaryKey = "staff_department_id";
    protected $fillable = ["staff_department_name"];
}
