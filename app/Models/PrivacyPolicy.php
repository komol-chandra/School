<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $table = "privacy_policies";

    protected $primaryKey = "privacy_policy_id";

    protected $fillable = [
        "privacy_policy",
    ];
}
