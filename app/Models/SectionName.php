<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionName extends Model
{
    use HasFactory;
    protected $table = "section_names";
    protected $primaryKey = "section_id";
    protected $fillable = ["class_name","section_name","status"];

    public function scopeSearch($query, $search)
  	{
      	return $query->where('section_name', 'LIKE', '%' . $search . '%');
     }

    public function scopeActive($query)
  	{
  	  	$query->where("status", 1);
  	}
}
