<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use App\Models\ClassRoom;
use App\Models\Days;
use App\Models\routine_bases;
use App\Models\routine_eachs;
use App\Models\SectionName;
use App\Models\SubjectModel;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\RoutineBasesRequest;

class RoutineBasesController extends Controller
{
    public function index()
    {
        return view('Backend.Routine.routine');
    }
    public function create()
    {
        $data['classNames'] = ClassName::active()->get();
        $data['sections'] = SectionName::active()->get();
        $data['teachers'] = Teacher::active()->get();
        $data['days'] = Days::get();
        $data['subjects'] = SubjectModel::get();
        $data['classRooms'] = ClassRoom::active()->get();
        return view('Backend.Routine.routineCreate', $data);
    }
    public function sectionData($id)
    {
        // $sectionName = SectionName::where('section_name', $class_id)->get();
        // return StudentCollection::collection($sectionName);
        $sectionData = SectionName::where('class_name', $id)->get();
        return response()->json($sectionData, 200);
    }
    public function store(RoutineBasesRequest $request)
    {
        try {
            $base_model = new routine_bases();
            $base_model->fill($request->all())->save();
            $data = [];
            foreach ($request->day_name as $key => $value) {
                $data[] = [
                    'base_id'        => $base_model->base_id,
                    'day_name'       => $value,
                    'teacher_name'   => $request->teacher_name[$key],
                    'subject_name'   => $request->subject_name[$key],
                    'classroom_name' => $request->classroom_name[$key],
                    'sarting_hour'   => $request->sarting_hour[$key],
                    'ending_hour'    => $request->ending_hour[$key],
                    'duration'       => $request->duration[$key],
                ];
            }
            routine_eachs::insert($data);
        return redirect()->route('routine.create')->with('msg','Data Successfully Inserted');
        } catch (\Exception $e) {
            return redirect()->back()->with("status", "message=" . $e->getMessage());

        }
    }
    public function show(routine_bases $routine_bases)
    {
        //
    }
    public function edit(routine_bases $routine_bases)
    {
        //
    }
    public function update(Request $request, routine_bases $routine_bases)
    {
        //
    }
    public function destroy(routine_bases $routine_bases)
    {
        //
    }
}
