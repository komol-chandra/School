<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    use HasFactory;

    protected $table = "school_settings";

    protected $primaryKey = "school_id";

    protected $fillable = [
        "school_name",
        "school_phone",
        "school_address",
    ];
}
