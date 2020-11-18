<?php

namespace App\Http\Controllers;

use App\Models\Staffs;
use Illuminate\Http\Request;
use File;
use Arr;
use App\Traits\FileUpload;
use App\Models\BloodModel;
use App\Models\GenderModel;
use App\Models\StaffDepartments;
use App\Models\StaffDesignations;
use App\Http\Requests\StaffRequest;
use JsValidator;
use Illuminate\Support\Facades\Hash;

class StaffsController extends Controller
{
    use FileUpload;
    public function index()
    {
        $department = StaffDepartments::get();
        $designation = StaffDesignations::get();
        $blood = BloodModel::get();
        $gender = GenderModel::get();
        $staff = Staffs::get();
        return view('Backend.Staff.staff',[
            "staffs"=>$staff,
            "departments"=>$department,
            "designations"=>$designation,
            "bloods"=>$blood,
            "genders"=>$gender,
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
        
        if($request->image){
            $ext=$request->file('image')->getClientOriginalExtension();
            $path="Backend_assets/Files/Staff/";
            $name='Staff_'.time().'.'.$ext;
            $request->file('image')->move($path,$name);
            Arr::set($request,'staff_image',"/".$path.$name);
        }
        $staff->fill($request->all())->save();
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
    public function update(StaffRequest $request )
    {
        $staff=Staffs::findOrFail($request->staff_id);

        if ($request->image) {
            if (File::exists($staff->staff_image)) {
                File::delete($staff->staff_image);
            }
            $ext=$request->file('image')->getClientOriginalExtension();
            $path="Backend_assets/Files/Staff/";
            $name='Staff_'.time().'.'.$ext;
            $request->file('image')->move($path,$name);
            Arr::set($request,'staff_image',"/".$path.$name);
        }
        $staff->fill($request->all())->save();
        $status=201;
        $response=[
                'status'=>$status,
                'message'=>'Data Successfully Updated',
            ];
        return response()->json($response,$status);
    }
    public function destroy($id)
    {
        $staff=Staffs::findOrFail($id);
        // $staffImage=("{$staff->staff_image}");
        if(\File::exists(public_path($staff->staff_image))){
            \File::delete(public_path($staff->staff_image));
          }
        $staff->delete();
        return response()->json(201);
    }
}
