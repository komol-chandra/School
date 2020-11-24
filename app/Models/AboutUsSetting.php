<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsSetting extends Model
{
    use HasFactory;

    protected $table = "about_us_settings";

    protected $primaryKey = "aboutus_id";

    protected $fillable = [
        "about_title",
        "about_img",
    ];
}
