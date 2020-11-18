<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\ClassName;
use App\Models\SectionName;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\AttendanceRequest;
class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['class']=ClassName::get();
        $data['section']=SectionName::get();
        $data['student']=Student::get();
        return view ("Backend.Attendance.attendance",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['student'] = Student::where(function($query) use($request){
            if ($request->className) {
                $query->where('class_name', $request->className);
            }
            if ($request->sectionName) {
                $query->where('section_name', $request->sectionName);
            }
        })->get();
        return view('Backend.Attendance.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceRequest $request)
    {
        $library_model = new Attendance;
        $library_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $library_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
