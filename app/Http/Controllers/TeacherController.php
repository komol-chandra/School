<?php
namespace App\Http\Controllers;
use App\Models\Teacher;
use File;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\BloodModel;
use App\Models\GenderModel;
use App\Models\TeacherDesignationModel;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\User;
use JsValidator;
use App\Traits\FileUpload;

class TeacherController extends Controller
{
    use FileUpload;
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
        // dd($teacher);
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
        $user = new User();
        $data = $request->all();
        $teacher->fill($data)->save();
        $user->name = $request->teacher_user_name;
        $user->email=$request->teacher_email;
        $user->password=Hash::make($request->teacher_password);
        $user->type = 4 ;
        $user->parentId = $teacher->teacher_id;
        $user->name = $teacher->teacher_name;
        if($request->hasFile('teacher_image')){
            $user->profile_photo_path = $this->ImageUpload($request, 'teacher_image', 'User/', 'user_profile');
        }
        $user->save();
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
        // dd($teacher);
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
    public function update(TeacherRequest $request ,$id)
    {
        $teacher =Teacher::findOrFail($id);
        $data = $request->all();
        $user = User::where('type','4')->where('parentId',$id)->first();
        if ($request->hasFile('teacher_image')) {
            if (File::exists($user->profile_photo_path)) {
                File::delete($user->profile_photo_path);
            }
            $user->profile_photo_path = $this->ImageUpload($request, 'teacher_image', 'User/', 'user_profile');
        }
        $user->name = $request->teacher_name;
        $user->save();
        $teacher->fill($data)->save();  
        return redirect()->route('teacher.edit',$id)->with('msg','Data Successfully Updated');
    }
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $user = User::where('type','4')->where('parentId',$id)->first();
        if ($user) {
            if (File::exists($user->profile_photo_path)) {
                File::delete($user->profile_photo_path);
            }
        }
        $user->delete();
        $teacher->delete();
        return response()->json($teacher, 200);
    }
}
