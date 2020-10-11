<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryNameModel extends Model
{
    use HasFactory;

    protected $table = "category_names";
    protected $primaryKey = "category_id";
    protected $fillable = ["category_name"];
    
    public function Student(){
      return $this->hasMany('App\Models\Student','category_name');
    }
}
