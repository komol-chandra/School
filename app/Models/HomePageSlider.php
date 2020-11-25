<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSlider extends Model
{
    use HasFactory;

    protected $table = "home_page_sliders";

    protected $primaryKey = "slider_id";

    protected $fillable = [
        "slider_title1",
        "slider_title1_descryption",
        "slider1_img",
        "slider_title2",
        "slider_title2_descryption",
        "slider2_img",
        "slider_title3",
        "slider_title3_descryption",
        "slider3_img",
    ];
}
