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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    use FileVerifyUpload, FileUpload;

    public function index()
    {
        $student = Student::all();
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
        $student = Student::search($request->search)->orderBy('student_id', 'asc')->paginate(10);
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Student.guardianList', [
            "student"      => $student,
            "className"    => $className,
            "categoryName" => $categoryName,
            "sectionName"  => $sectionName,
        ]);
    }
    public function store(StudentRequest $request)
    {
        // dd($request->all());
        //Student
        try{
            $student_model = new Student();
            $user = new User();
            $requested_data = $request->all();
            $requested_data['student_sku_id'] = 'Student_' . time();
            if ($request->hasFile('student_birth_certificate')) {
                $requested_data['student_birth_certificate'] = $this->ImageUpload($request, 'student_birth_certificate', 'student', 'student_birth_certificate');
            }
            $student_model->fill($requested_data)->save();

            $user->name = $request->student_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = 2;
            $user->parentId = $student_model->student_id;
            if ($request->hasFile('profile_photo')) {
                $user->profile_photo_path = $this->ImageUpload($request, 'profile_photo', 'student', 'student');
            }
            $user->save();
            //Guardian
            $guardian_model = new StudentGuardian();
            $userTwo = new User();
            $requested_data_guardian = $request->all();
            $requested_data_guardian['student_id'] = $student_model->student_id;
            if ($request->hasFile('student_guardian_idcard')) {
                $requested_data_guardian['student_guardian_idcard'] = $this->ImageUpload($request, 'student_guardian_idcard', 'student_guardian_idcard', 'student_guardian_idcard');
            }
            $guardian_model->fill($requested_data_guardian)->save();
            $userTwo->name = $request->student_guardian_name;
            $userTwo->email = $request->guardian_email;
            $userTwo->password = Hash::make($request->guardian_pass);
            $userTwo->type = 3;
            $userTwo->parentId = $guardian_model->student_guardian_id;
            if ($request->hasFile('guardian_image')) {
                $userTwo->profile_photo_path = $this->ImageUpload($request, 'guardian_image', 'guardian', 'guardian');
            }
            $userTwo->save();

            return redirect()->route('student.create')->with('msg', 'Data Successfully Inserted');
        }catch (\Exception $e) {
            return redirect()->back()->with("status", "message=" . $e->getMessage());

        }
    }
    public function show($id)
    {
        $stduent_show = Student::findOrFail($id);
        if ($stduent_show->status == 1) {
            $stduent_show->update(["status" => 0]);
            $status = 201;
        } else {
            $stduent_show->update(["status" => 1]);
            $status = 200;
        }
        return response()->json($stduent_show, $status);
    }
    public function edit($id)
    {
        $student = Student::with('className')->findOrFail($id);
        $categoryName = CategoryNameModel::all();
        $className = ClassName::active()->get();
        $sectionName = SectionName::where('class_name', $student->class_name)->get();
        // $student = Student::findOrFail($id)->with('className')->get()->toArray();
        $blood = BloodModel::all();
        // echo "<pre>";
        // print_r($student);
        // exit();
        return view('Backend.Student.edit_student', [
            "student"      => $student,
            "className"    => $className,
            "categoryName" => $categoryName,
            "sectionName"  => $sectionName,
            "blood"        => $blood,
        ]);
    }
    public function update(StudentUpdateRequest $request, $id)
    {
        //    dd($request->all());
        $student_model = Student::findOrFail($id);
        $student_model->student_admission_number = $request->student_admission_number;
        $student_model->student_roll_number = $request->student_roll_number;
        $student_model->class_name = $request->class_name;
        $student_model->section_name = $request->section_name;
        $student_model->student_name = $request->student_name;
        $student_model->student_mothers_name = $request->student_mothers_name;
        $student_model->student_fathers_name = $request->student_fathers_name;
        $student_model->student_birthday_date = $request->student_birthday_date;
        $student_model->student_admition_date = $request->student_admition_date;
        $student_model->gender_name = $request->gender_name;
        $student_model->blood_name = $request->blood_name;
        $student_model->category_name = $request->category_name;
        $student_model->religion_name = $request->religion_name;
        $student_model->student_phone = $request->student_phone;
        $student_model->student_email = $request->student_email;
        $student_model->student_height = $request->student_height;
        $student_model->student_weight = $request->student_weight;
        $student_model->student_current_address = $request->student_current_address;
        $student_model->student_permanent_address = $request->student_permanent_address;
        //Guardian

        $student_model->student_guardian_relation = $request->student_guardian_relation;
        $student_model->student_guardian_name = $request->student_guardian_name;
        $student_model->student_guardian_phone = $request->student_guardian_phone;
        $student_model->student_guardian_email = $request->student_guardian_email;
        $student_model->student_guardian_occupation = $request->student_guardian_occupation;
        $student_model->student_guardian_address = $request->student_guardian_address;

        //Student File
        if ($request->student_image) {
            $studentImage = ("Backend_assets/Files/Student/student_image/{$student_model->student_image}");
            if (File::exists($studentImage)) {
                File::delete($studentImage);
            }
            $student_model->student_image = $this->ImageVerifyUpload($request, 'student_image', 'Backend_assets/Files/Student/student_image/', 'student_image');
        }
        if ($request->student_birth_certificate) {
            $studentCertificate = ("Backend_assets/Files/Student/student_birth_certificate/{$student_model->student_birth_certificate}");
            if (File::exists($studentCertificate)) {
                File::delete($studentCertificate);
            }
            $student_model->student_birth_certificate = $this->ImageVerifyUpload($request, 'student_birth_certificate', 'Backend_assets/Files/Student/student_birth_certificate/', 'student_birth_certificate');
        }
        if ($request->student_marksheet) {
            $studentMarksheet = ("Backend_assets/Files/Student/student_marksheet/{$student_model->student_marksheet}");
            if (File::exists($studentMarksheet)) {
                File::delete($studentMarksheet);
            }
            $student_model->student_marksheet = $this->ImageVerifyUpload($request, 'student_marksheet', 'Backend_assets/Files/Student/student_marksheet/', 'student_marksheet');

        }
        if ($request->student_testimonial) {
            $studentTestimonial = ("Backend_assets/Files/Student/student_testimonial/{$student_model->student_testimonial}");
            if (File::exists($studentTestimonial)) {
                File::delete($studentTestimonial);
            }
            $student_model->student_testimonial = $this->ImageVerifyUpload($request, 'student_testimonial', 'Backend_assets/Files/Student/student_testimonial/', 'student_testimonial');
        }
        if ($request->student_registration_card) {
            $studentRegistration = ("Backend_assets/Files/Student/student_registration_card/{$student_model->student_registration_card}");
            if (File::exists($studentRegistration)) {
                File::delete($studentRegistration);
            }
            $student_model->student_registration_card = $this->ImageVerifyUpload($request, 'student_registration_card', 'Backend_assets/Files/Student/student_registration_card/', 'student_registration_card');
        }

        //Guarian File
        if ($request->student_guardian_image) {
            $guardianImage = ("Backend_assets/Files/Guardian/student_guardian_image/{$student_model->student_guardian_image}");
            if (File::exists($guardianImage)) {
                File::delete($guardianImage);
            }
            $student_model->student_guardian_image = $this->ImageVerifyUpload($request, ' student_guardian_image', 'Backend_assets/Files/Guardian/student_guardian_image/', 'student_guardian_image');
        }

        if ($request->student_guardian_idcard) {
            $guardianIdcard = ("Backend_assets/Files/Guardian/student_guardian_idcard/{$student_model->student_guardian_idcard}");
            if (File::exists($guardianIdcard)) {
                File::delete($guardianIdcard);
            }
            $student_model->student_guardian_idcard = $this->ImageVerifyUpload($request, 'student_guardian_idcard', 'Backend_assets/Files/Guardian/student_guardian_idcard/', 'student_guardian_idcard');
        }

        $student_model->save();
        return redirect()->route('student.edit', $id)->with('msg', 'Data Successfully Updated');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $studentImage = ("Backend_assets/Files/Student/student_image/{$student->student_image}");
        if (File::exists($studentImage)) {
            File::delete($studentImage);
        }
        $studentBirthCertificate = ("Backend_assets/Files/Student/student_birth_certificate/{$student->student_birth_certificate}");
        if (File::exists($studentBirthCertificate)) {
            File::delete($studentBirthCertificate);
        }
        $studentMarksheet = ("Backend_assets/Files/Student/student_marksheet/{$student->student_marksheet}");
        if (File::exists($studentMarksheet)) {
            File::delete($studentMarksheet);
        }
        $studenTestimonial = ("Backend_assets/Files/Student/student_testimonial/{$student->student_testimonial}");
        if (File::exists($studenTestimonial)) {
            File::delete($studenTestimonial);
        }
        $studentRegistration = ("Backend_assets/Files/Student/student_registration_card/{$student->student_registration_card}");
        if (File::exists($studentRegistration)) {
            File::delete($studentRegistration);
        }
        $studentGuardianImage = ("Backend_assets/Files/Guardian/student_guardian_image/{$student->student_guardian_image}");
        if (File::exists($studentGuardianImage)) {
            File::delete($studentGuardianImage);
        }
        $studentGuardianIdcard = ("Backend_assets/Files/Guardian/student_guardian_idcard/{$student->student_guardian_idcard}");
        if (File::exists($studentGuardianIdcard)) {
            File::delete($studentGuardianIdcard);
        }
        $student->delete();
        return response()->json(201);
    }
}
