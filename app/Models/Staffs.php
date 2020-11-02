<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    protected $table = "staffs";
    protected $primaryKey = "staff_id";
    protected $fillable = ["staff_name","staff_email","staff_password","staff_designation_name","staff_department_name","staff_phone","gender_name","blood_name","staff_facebook","staff_twitter","staff_linkedin","staff_address","staff_about","staff_image","status"];
    public function Designation(){
    	return $this->belongsTo("App\Models\StaffDesignations","staff_designation_name");
    }
    public function Department(){
    	return $this->belongsTo("App\Models\StaffDepartments","staff_department_name");
    }
    public function Gender(){
    	return $this->belongsTo("App\Models\GenderModel","gender_name");
    }
    public function Blood(){
    	return $this->belongsTo("App\Models\BloodModel","blood_name");
    }
    public function scopeActive($query)
    {
        $query->where("status", 1);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('staff_name', 'LIKE', '%' . $search . '%');
    }
}
