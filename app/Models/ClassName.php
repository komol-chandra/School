<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $table = "class_names";
    protected $primaryKey = "class_id";
    protected $fillable = ["class_name", "status"];
    protected $casts = [
        "class_name" => "string",
        "status"     => "integer",
    ];

    public function Student()
    {
        return $this->hasMany('App\Models\Student', 'class_name');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('class_name', 'LIKE', '%' . $search . '%');
    }

    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
}
