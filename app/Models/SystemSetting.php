<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $table = "system_settings";

    protected $primaryKey = "system_id";

    protected $fillable = [
        "system_name",
        "title_name",
        "scholl_email",
        "contact_no",
        "school_address",
        "footer_text",
        "footer_link",
        "regular_logo",
        "light_logo",
        "small_logo",
        "fav_icon",
    ];
}
