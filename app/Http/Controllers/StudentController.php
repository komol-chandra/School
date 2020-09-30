<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\BloodModel;
use App\Models\CategoryNameModel;
use App\Models\ClassName;
use App\Models\SectionName;
use App\Http\Requests\StudentRequest;
use App\Traits\FileVerifyUpload;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    use FileVerifyUpload;
    public function index()
    {
        $student = Student::all();
        $blood = BloodModel::all();
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.student',[
            "student"=>$student,
            "blood"=>$blood,
            "categoryName"=>$categoryName,
            "className"=>$className,
            "sectionName"=>$sectionName,
        ]);
    }
    public function guardian_list(Request $request){
        $student=Student::all();
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.guardian_list',[
            "student"=>$student,
            "className"=>$className,
            "categoryName"=>$categoryName,
            "sectionName"=>$sectionName,
        ]);
    }
    public function create()
    {
        $blood = BloodModel::all();
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.add_student',[
            "blood"=>$blood,
            "categoryName"=>$categoryName,
            "className"=>$className,
            "sectionName"=>$sectionName,
        ]);
    }
    public function sectionData($id)
    {
        // $sectionName = SectionName::where('section_name', $class_id)->get();
        // return StudentCollection::collection($sectionName);
        $sectionData = SectionName::where('class_name',$id)->get();
        return response()->json($sectionData,200);
    }

    public function store(StudentRequest $request)
    {
        $student_model=new Student();
        $student_model->student_admission_number=$request->student_admission_number;
        $student_model->student_roll_number=$request->student_roll_number;
        $student_model->class_name=$request->class_name;
        $student_model->section_name=$request->section_name;
        $student_model->student_name=$request->student_name;
        $student_model->student_mothers_name=$request->student_mothers_name;
        $student_model->student_fathers_name=$request->student_fathers_name;
        $student_model->student_birthday_date=$request->student_birthday_date;
        $student_model->student_admition_date=$request->student_admition_date;
        $student_model->gender_name=$request->gender_name;
        $student_model->blood_name=$request->blood_name;
        $student_model->category_name=$request->category_name;
        $student_model->religion_name=$request->religion_name;
        $student_model->student_phone=$request->student_phone;
        $student_model->student_email=$request->student_email;
        $student_model->student_height=$request->student_height;
        $student_model->student_weight=$request->student_weight;
        $student_model->student_current_address=$request->student_current_address;
        $student_model->student_permanent_address=$request->student_permanent_address;
        $student_model->student_image=$this->ImageVerifyUpload($request,'student_image','Backend_assets/Files/Student/student_image/','StudentProfile');
        $student_model->student_birth_certificate=$this->ImageVerifyUpload($request,'student_birth_certificate','Backend_assets/Files/Student/student_birth_certificate/','student_birth_certificate');
        $student_model->student_marksheet=$this->ImageVerifyUpload($request,'student_marksheet','Backend_assets/Files/Student/student_marksheet/','student_marksheet');
        $student_model->student_testimonial=$this->ImageVerifyUpload($request,'student_testimonial','Backend_assets/Files/Student/student_testimonial/','student_testimonial');
        $student_model->student_registration_card=$this->ImageVerifyUpload($request,'student_registration_card','Backend_assets/Files/Student/student_registration_card/','student_registration_card');
        $student_model->student_guardian_relation=$request->student_guardian_relation;
        $student_model->student_guardian_name=$request->student_guardian_name;
        $student_model->student_guardian_phone=$request->student_guardian_phone;
        $student_model->student_guardian_email=$request->student_guardian_email;
        $student_model->student_guardian_occupation=$request->student_guardian_occupation;
        $student_model->student_guardian_address=$request->student_guardian_address;
        $student_model->student_guardian_image=$this->ImageVerifyUpload($request,'student_guardian_image','Backend_assets/Files/Guardian/student_guardian_image/','student_guardian_image');
        $student_model->student_guardian_idcard=$this->ImageVerifyUpload($request,'student_guardian_idcard','Backend_assets/Files/Guardian/student_guardian_idcard/','student_guardian_idcard');

        $student_model->save();
        return redirect('/admin/student/create')->with('status', 'Profile updated!');
    }
    public function show($id)
    {
        $stduent_show = Student::findOrFail($id);
        if($stduent_show->status==1){
            $stduent_show->update(["status"=>0]);
            $status=201;
        }else{
            $stduent_show->update(["status"=>1]);
            $status=200;
        }
        return response()->json($stduent_show,$status);
    }
    public function edit($id)
    {
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        // $student = Student::findOrFail($id)->with('className')->get()->toArray();
        $student = Student::with('className')->findOrFail($id);
        $blood = BloodModel::all();
        // echo "<pre>";
        // print_r($student);
        // exit();
        return view('Backend.Student.edit_student',[
            "student"=>$student,

            "className"=>$className,
            "categoryName"=>$categoryName,
            "sectionName"=>$sectionName,
            "blood"=>$blood,
            ]);
    }
    public function update(StudentRequest $request, $id)
    {
        $student_model=new Student();
        $student_model->student_admission_number=$request->student_admission_number;
        $student_model->student_roll_number=$request->student_roll_number;
        $student_model->class_name=$request->class_name;
        $student_model->section_name=$request->section_name;
        $student_model->student_name=$request->student_name;
        $student_model->student_mothers_name=$request->student_mothers_name;
        $student_model->student_fathers_name=$request->student_fathers_name;
        $student_model->student_birthday_date=$request->student_birthday_date;
        $student_model->student_admition_date=$request->student_admition_date;
        $student_model->gender_name=$request->gender_name;
        $student_model->blood_name=$request->blood_name;
        $student_model->category_name=$request->category_name;
        $student_model->religion_name=$request->religion_name;
        $student_model->student_phone=$request->student_phone;
        $student_model->student_email=$request->student_email;
        $student_model->student_height=$request->student_height;
        $student_model->student_weight=$request->student_weight;
        $student_model->student_current_address=$request->student_current_address;
        $student_model->student_permanent_address=$request->student_permanent_address;
        $student_model->student_image=$this->ImageVerifyUpload($request,'student_image','Backend_assets/Files/Student/student_image/','StudentProfile');
        $student_model->student_birth_certificate=$this->ImageVerifyUpload($request,'student_birth_certificate','Backend_assets/Files/Student/student_birth_certificate/','student_birth_certificate');
        $student_model->student_marksheet=$this->ImageVerifyUpload($request,'student_marksheet','Backend_assets/Files/Student/student_marksheet/','student_marksheet');
        $student_model->student_testimonial=$this->ImageVerifyUpload($request,'student_testimonial','Backend_assets/Files/Student/student_testimonial/','student_testimonial');
        $student_model->student_registration_card=$this->ImageVerifyUpload($request,'student_registration_card','Backend_assets/Files/Student/student_registration_card/','student_registration_card');
        $student_model->student_guardian_relation=$request->student_guardian_relation;
        $student_model->student_guardian_name=$request->student_guardian_name;
        $student_model->student_guardian_phone=$request->student_guardian_phone;
        $student_model->student_guardian_email=$request->student_guardian_email;
        $student_model->student_guardian_occupation=$request->student_guardian_occupation;
        $student_model->student_guardian_address=$request->student_guardian_address;
        $student_model->student_guardian_image=$this->ImageVerifyUpload($request,'student_guardian_image','Backend_assets/Files/Guardian/student_guardian_image/','student_guardian_image');
        $student_model->student_guardian_idcard=$this->ImageVerifyUpload($request,'student_guardian_idcard','Backend_assets/Files/Guardian/student_guardian_idcard/','student_guardian_idcard');

        $student_model->where("student_id",$id)->update($student_model);
        return redirect()->route('student.index')->with('status', 'Profile updated!');
    }
    public function destroy($id)
    {
        $stduent_delete = Student::findOrFail($id)->delete();
        return response()->json(201);
    }
}
