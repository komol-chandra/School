<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraFiles extends Model
{
    use HasFactory;
    protected $table = "extra_file_students";
    protected $primaryKey = "extra_file_student_id";
    protected $fillable = ["student_id",
                            "file_name",
                            "image_file"];
}
