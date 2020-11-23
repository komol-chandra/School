<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    use HasFactory;

    protected $table = "general_settings";

    protected $primaryKey = "website_id";

    protected $fillable = [
        "website_title",
        "link_facebook",
        "link_twitter",
        "link_linkedin",
        "link_google",
        "link_youtube",
        "link_instagram",
        "home_title",
        "school_address",
        "copy_right_text",
        "header_logo",
        "footer_logo",
    ];
}
