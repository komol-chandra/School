<?php
namespace App\Http\Controllers;
use App\Models\Teacher;
use File;
use App\Models\Department;
use App\Models\BloodModel;
use App\Models\GenderModel;
use App\Models\TeacherDesignationModel;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use JsValidator;
use App\Traits\FileVerifyUpload;

class TeacherController extends Controller
{
    use FileVerifyUpload;
    public function index()
    {
        $teacher = Teacher::get();
        $department = Department::get();
        $designation = TeacherDesignationModel::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        return view ('Backend.Teacher.teacher',[
            "department"=>$department,
            "blood"=>$blood,
            "designation"=>$designation,
            "gender"=>$gender,
            "teacher"=>$teacher,
        ]);
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
    public function teacherList(Request $request){
        $teacher = Teacher::search($request->search)->orderBy('teacher_id', 'asc')->paginate(10);
        $department = Department::get();
        $designation = TeacherDesignationModel::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        return view ('Backend.Teacher.teacherList',[
            "department"=>$department,
            "blood"=>$blood,
            "designation"=>$designation,
            "gender"=>$gender,
            "teacher"=>$teacher,
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
        return redirect()->route('teacher.create')->with('msg','Data Successfully Inserted');
    }
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        if($teacher->status==1){
            $teacher->update(['status'=>0]);
            $status = 201;
        }else{
            $teacher->update(['status'=>1]);
            $status=200;
        }
        return response()->json($teacher,$status);
    }
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $department = Department::get();
        $designation = TeacherDesignationModel::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        return view ('Backend.Teacher.edit_teacher',[
            "department"=>$department,
            "blood"=>$blood,
            "designation"=>$designation,
            "gender"=>$gender,
            "teacher"=>$teacher,
        ]); 
    }
    public function update(TeacherUpdateRequest $request ,$id)
    {
        $teacher =Teacher::findOrFail($id);
        $teacher->teacher_name=$request->teacher_name;
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
        if ($request->teacher_image) {
            $teacherImage=("Backend_assets/Files/Teacher/{$teacher->teacher_image}");
            if (File::exists($teacherImage)) {
                File::delete($teacherImage);
            }
            $teacher->teacher_image=$this->ImageVerifyUpload($request,'teacher_image','Backend_assets/Files/Teacher','teacher_image');
        }
        
        $teacher->save();  
        return redirect()->route('teacher.edit',$id)->with('msg','Data Successfully Updated');
    }
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacherImage=("Backend_assets/Files/Teacher/{$teacher->teacher_image}");
            if (File::exists($teacherImage)) {
                File::delete($teacherImage);
            }
        $teacher->delete();
        return response()->json($teacher, 200);
    }
}
