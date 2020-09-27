<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Department;
use App\Models\BloodModel;
use App\Models\GenderModel;
use App\Models\TeacherDesignationModel;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use JsValidator;
use App\Traits\FileVerifyUpload;

class TeacherController extends Controller
{
    use FileVerifyUpload;
    public function index()
    {
        return view ('Backend.Teacher.teacher');
    }
    public function create()
    {
        $department = Department::get();
        $designation = TeacherDesignationModel::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        return view ('Backend.Teacher.add_teacher',[
            "department"=>$department,
            "blood"=>$blood,
            "designation"=>$designation,
            "gender"=>$gender,
        ]);
    }
    public function store(TeacherRequest $request)
    {
        $teacher = new Teacher();
        $teacher->teacher_name=$request->teacher_name;
        $teacher->teacher_email=$request->teacher_email;
        $teacher->teacher_password=$request->teacher_password;
        $teacher->teacher_designation_name=$request->teacher_designation_name;
        $teacher->department_name=$request->department_name;
        $teacher->teacher_phone=$request->teacher_phone;
        $teacher->gender_name=$request->gender_name;
        $teacher->blood_name=$request->blood_name;
        $teacher->teacher_facebook=$request->teacher_facebook;
        $teacher->teacher_twitter=$request->teacher_twitter;
        $teacher->teacher_linkedin=$request->teacher_linkedin;
        $teacher->teacher_address=$request->teacher_address;
        $teacher->teacher_about=$request->teacher_about;
        $teacher->teacher_image=$this->ImageVerifyUpload($request,'teacher_image','Backend_assets/Files/Teacher','teacher_image');
        $teacher->save();
        return redirect('/admin/teacher/create');
    }
    public function show(Teacher $teacher)
    {
        //
    }
    public function edit(Teacher $teacher)
    {
        //
    }
    public function update(Request $request, Teacher $teacher)
    {
        //
    }
    public function destroy(Teacher $teacher)
    {
        //
    }
}
