<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class routine_bases extends Model
{
    use HasFactory;
    protected $table = "routine_bases";
    protected $primaryKey = "base_id";
    protected $fillable = ["class_name","section_name"];
    public function className()
    {
        return $this->belongsTo("App\Models\ClassName", "class_name");
    }
    public function sectionName()
    {
        return $this->belongsTo("App\Models\SectionName", "section_name");
    }
    
}
