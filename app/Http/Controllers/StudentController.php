<?php
namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\BloodModel;
use App\Models\CategoryNameModel;
use App\Models\ClassName;
use App\Models\SectionName;
use App\Models\Student;
use App\Models\StudentGuardian;
use App\Models\User;
use App\Traits\FileUpload;
use App\Traits\FileVerifyUpload;
use File;
use function PHPSTORM_META\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    use FileVerifyUpload, FileUpload;

    public function index()
    {
        $student = Student::with('users');
        $blood = BloodModel::all();
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.student', [
            "student"      => $student,
            "blood"        => $blood,
            "categoryName" => $categoryName,
            "className"    => $className,
            "sectionName"  => $sectionName,
        ]);
    }
    public function create()
    {
        $blood = BloodModel::all();
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.add_student', [
            "blood"        => $blood,
            "categoryName" => $categoryName,
            "className"    => $className,
            "sectionName"  => $sectionName,
        ]);
    }
    public function sectionData($id)
    {
        // $sectionName = SectionName::where('section_name', $class_id)->get();
        // return StudentCollection::collection($sectionName);
        $sectionData = SectionName::where('class_name', $id)->get();
        return response()->json($sectionData, 200);
    }
    public function studentList(Request $request)
    {
        $student = Student::where(function ($query) use ($request) {
            if ($request->filterClass) {
                $query->where('class_name', $request->filterClass);
            }
            if ($request->filterSection) {
                $query->where('section_name', $request->filterSection);
            }
        })
            ->orderBy('student_id', 'asc')->get();
        $blood = BloodModel::all();
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.studentList', [
            "student"      => $student,
            "blood"        => $blood,
            "categoryName" => $categoryName,
            "className"    => $className,
            "sectionName"  => $sectionName,
        ]);
    }
    public function guardianList(Request $request)
    {
        // $guardian = StudentGuardian::with(['users' => function ($query) {
        //     return $query->where('type', 3);
        // }])->get()->toArray();
        // dd($guardian);
        $guardian = StudentGuardian::with(['guardianUsers' => function ($query) {
                return $query->where('type', 3);
            }])->get();
        // $student = Student::search($request->search)->orderBy('student_id', 'asc')->paginate(10);
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.guardianList', [
            "guardian"    => $guardian,
            "className"   => $className,
            "sectionName" => $sectionName,
        ]);
    }
    public function store(StudentRequest $request)
    {
        // dd($request->all());
        //Student
        try {
            $student_model = new Student();
            $user = new User();
            $requested_data = $request->all();
            $requested_data['student_school_id'] = 'School_' . time();
            if ($request->hasFile('student_birth_certificate')) {
                $requested_data['student_birth_certificate'] = $this->ImageUpload($request, 'student_birth_certificate', 'StudentFiles/student_birth_certificate/', 'student_birth_certificate');
            }
            $student_model->fill($requested_data)->save();

            $user->name = $request->student_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = 2;
            $user->parentId = $student_model->student_id;
            if ($request->hasFile('profile_photo')) {
                $user->profile_photo_path = $this->ImageUpload($request, 'profile_photo', 'User/', 'user_profile');
            }
            $user->save();
            //Guardian
            $guardian_model = new StudentGuardian();
            $userTwo = new User();
            $requested_data_guardian = $request->all();
            $requested_data_guardian['student_id'] = $student_model->student_id;
            if ($request->hasFile('student_guardian_idcard')) {
                $requested_data_guardian['student_guardian_idcard'] = $this->ImageUpload($request, 'student_guardian_idcard', 'StudentFiles/student_guardian_idcard/', 'student_guardian_idcard');
            }
            $guardian_model->fill($requested_data_guardian)->save();
            $userTwo->name = $request->student_guardian_name;
            $userTwo->email = $request->guardian_email;
            $userTwo->password = Hash::make($request->guardian_pass);
            $userTwo->type = 3;
            $userTwo->parentId = $guardian_model->student_guardian_id;
            if ($request->hasFile('guardian_image')) {
                $userTwo->profile_photo_path = $this->ImageUpload($request, 'guardian_image', 'User/', 'user_profile');
            }
            $userTwo->save();
            return redirect()->route('student.create')->with('msg', 'Data Successfully Inserted');
        } catch (\Exception $e) {
            return redirect()->back()->with("status", "message=" . $e->getMessage());
        }
    }
    public function show($id)
    {
        $student = Student::findOrFail($id);
        if ($student->status == 1) {
            $student->update(["status" => 0]);
            $status = 201;
        } else {
            $student->update(["status" => 1]);
            $status = 200;
        }
        return response()->json($student, $status);
    }
    public function edit($id)
    {
        $student = Student::with('className')->with('users')->findOrFail($id);
        $guardian = StudentGuardian::with(['guardianUsers' => function ($query) {
            return $query->where('type', 3);
        }])->get()->toArray();
        // dd($guardian);
        // dd($student->users->profile_photo_path);
        $className = ClassName::active()->get();
        $sectionName = SectionName::where('class_name', $student->class_name)->get();
        // $userTable = User::where()->parentId();
        // $student = Student::findOrFail($id)->with('className')->get()->toArray();
        $blood = BloodModel::all();
        $UserId = User::get();
        // echo "<pre>";
        // print_r($student);
        // exit();
        return view('Backend.Student.edit_student', [
            "student"     => $student,
            "guardian"     => $guardian,
            "className"   => $className,
            "sectionName" => $sectionName,
            "blood"       => $blood,
            "userId"      => $UserId,
        ]);
    }
    public function update(StudentUpdateRequest $request, $id)
    {
        // //    dd($request->all());
        // $student_model = Student::findOrFail($id);
        // $student_model->student_admission_number = $request->student_admission_number;
        // //Student File
        // if ($request->student_image) {
        //     $studentImage = ("Backend_assets/Files/Student/student_image/{$student_model->student_image}");
        //     if (File::exists($studentImage)) {
        //         File::delete($studentImage);
        //     }
        //     $student_model->student_image = $this->ImageVerifyUpload($request, 'student_image', 'Backend_assets/Files/Student/student_image/', 'student_image');
        // }


        // $student_model->save();
        // return redirect()->route('student.edit', $id)->with('msg', 'Data Successfully Updated');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        if (File::exists($student->student_birth_certificate)) {
            File::delete($student->student_birth_certificate);
        }
        $user = User::where('type', 2)->where('parentId', $id)->first();
        if ($user) {
            if (File::exists($user->profile_photo_path)) {
                File::delete($user->profile_photo_path);
            }
        }
        $user->delete();
        $userTwo = User::where('type', 3)->where('parentId', $id)->first();
        if ($userTwo) {
            if (File::exists($userTwo->profile_photo_path)) {
                File::delete($userTwo->profile_photo_path);
            }
        }
        $userTwo->delete();
        $student->delete();
        return response()->json(201);
    }
}
