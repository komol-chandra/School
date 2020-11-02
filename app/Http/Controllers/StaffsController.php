<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\Request;
use File;
use App\Models\BloodModel;
use App\Models\GenderModel;
use App\Models\StaffDepartments;
use App\Models\StaffDesignations;
use App\Http\Requests\StaffRequest;
use JsValidator;
use App\Traits\FileVerifyUpload;

class StaffsController extends Controller
{
    use FileVerifyUpload;
    public function index()
    {
        $department = StaffDepartments::get();
        $designation = StaffDesignations::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        $staff = Staffs::get();
        return view('Backend.Staff.staff',[
            "staff"=>$staff,
            "department"=>$department,
            "designation"=>$designation,
            "blood"=>$blood,
            "gender"=>$gender,
        ]);
    }
    public function create(Request $request)
    {
        $department = StaffDepartments::get();
        $designation = StaffDesignations::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        $staff = Staffs::get();
        return view('Backend.Staff.staffList',[
            "staff"=>$staff,
            "department"=>$department,
            "designation"=>$designation,
            "blood"=>$blood,
            "gender"=>$gender,
        ]);
    }
    public function store(StaffRequest $request)
    {
        $staff=new Staffs();
        $staff->staff_image=$this->ImageVerifyUpload($request,'staff_image','Backend_assets/Files/Staff','staff_image');
        $staff->staff_name=$request->staff_name;
        $staff->staff_email=$request->staff_email;
        $staff->staff_password=$request->staff_password;
        $staff->staff_designation_name=$request->staff_designation_name;
        $staff->staff_department_name=$request->staff_department_name;
        $staff->staff_phone=$request->staff_phone;
        $staff->gender_name=$request->gender_name;
        $staff->blood_name=$request->blood_name;
        $staff->staff_facebook=$request->staff_facebook;
        $staff->staff_twitter=$request->staff_twitter;
        $staff->staff_linkedin=$request->staff_linkedin;
        $staff->staff_address=$request->staff_address;
        $staff->staff_about=$request->staff_about;
        $staff->save();
        $status=201;
        $response=[
                'status'=>$status,
                'message'=>'Data Successfully Inserted',
            ];
        return response()->json($response,$status);
    }
    public function show($id)
    {
        $staff = Staffs::findOrFail($id);
        if($staff->status==1){
            $staff->update(['status'=>0]);
            $status = 201;
        }else{
            $staff->update(['status'=>1]);
            $status=200;
        }
        return response()->json($staff,$status);
    }
    public function edit($id)
    {
        $department['department'] = StaffDepartments::get();
        $designation['designation'] = StaffDesignations::get();
        $blood['blood'] = BloodModel::get();
        $gender['gender'] = GenderModel::get();
        $staff= Staffs::findOrFail($id);
        return response()->json($staff, 201);
    }
    public function update(Request $request, Staffs $staffs)
    {
        //
    }
    public function destroy($id)
    {
        $staff=Staffs::findOrFail($id);
        $staffImage=("Backend_assets/Files/Staff/{$staff->staff_image}");
            if (File::exists($staffImage)) {
                File::delete($staffImage);
            }
        $staff->delete();
        $dd($staff);
        return response()->json(201);
    }
}
