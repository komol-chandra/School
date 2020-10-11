<?php

namespace App\Http\Controllers;

use App\Models\ClassRoutine;
use App\Models\ClassName;
use App\Models\SectionName;
use App\Models\SubjectModel;
use App\Models\Teacher;
use App\Models\Days;
use App\Models\ClassRoom;
use App\Models\StartingHour;
use App\Models\StartingMinute;
use App\Models\EndingHour;
use App\Models\EndingMinute;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRoutineRequest;
use JsValidator;

class ClassRoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['class'] = ClassName::active()->get();
        $data['section'] = SectionName::active()->get();
        $data['subject'] = SubjectModel::get();
        $data['teacher'] = Teacher::get();
        $data['classroom'] = ClassRoom::active()->get();
        $data['day'] = Days::get();
        $data['startingHour'] = StartingHour::get();
        $data['startingMinute'] = StartingMinute::get();
        $data['endingHour'] = EndingHour::get();
        $data['endingMinute'] = EndingMinute::get();
        return view("Backend.ClassRoutine.routine",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['routine'] = ClassRoutine::where(function($query) use($request){
            if ($request->class) {
                $query->where('class_name', $request->class);
            }
            if ($request->section) {
                $query->where('section_name', $request->section);
            }
        })->get();
        return view('Backend.ClassRoutine.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRoutineRequest $request)
    {
        $routine_model = new ClassRoutine;
        $routine_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $routine_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoutine  $classRoutine
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoutine $classRoutine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoutine  $classRoutine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['class'] = ClassName::active()->get();
        $data['section'] = SectionName::active()->get();
        $data['subject'] = SubjectModel::get();
        $data['teacher'] = Teacher::get();
        $data['classroom'] = ClassRoom::active()->get();
        $data['day'] = Days::get();
        $data['startingHour'] = StartingHour::get();
        $data['startingMinute'] = StartingMinute::get();
        $data['endingHour'] = EndingHour::get();
        $data['endingMinute'] = EndingMinute::get();
        $routine_edit = ClassRoutine::findOrFail($id);
        return response()->json($routine_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoutine  $classRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRoutineRequest $request,$id)
    {
        $routine_update = ClassRoutine::findOrFail($id);
        $routine_update->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $routine_update
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoutine  $classRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassRoutine::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
