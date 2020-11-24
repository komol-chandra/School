<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;

    protected $table = "terms_conditions";

    protected $primaryKey = "terms_condition_id";

    protected $fillable = [
        "terms_condition",
    ];
}
