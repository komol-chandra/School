<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoutineBasesRequest;
use App\Models\ClassName;
use App\Models\ClassRoom;
use App\Models\Days;
use App\Models\Period;
use App\Models\routine_bases;
use App\Models\routine_eachs;
use App\Models\SectionName;
use App\Models\SubjectModel;
use App\Models\Teacher;
use Illuminate\Http\Request;

class RoutineBasesController extends Controller
{
    public function index()
    {
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Routine.routine', [
            'className'   => $className,
            'sectionName' => $sectionName,
        ]);
    }
    public function create()
    {
        $data['classNames'] = ClassName::active()->get();
        $data['sections'] = SectionName::active()->get();
        $data['teachers'] = Teacher::active()->get();
        $data['days'] = Days::get();
        $data['periods'] = Period::get();
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
    public function routineList(Request $request)
    {
        $data = routine_bases::where(function ($query) use ($request) {
            if ($request->filterClass) {
                $query->where('class_name', $request->filterClass);
            }
            if ($request->filterSection) {
                $query->where('section_name', $request->filterSection);
            }
        })->get();
        $eachData = routine_eachs::get();
        $className = ClassName::active()->get();
        $sectionName = SectionName::active()->get();
        return view('Backend.Routine.routineList', [
            'className'   => $className,
            'sectionName' => $sectionName,
            'data'        => $data,
            'eachData'    => $eachData,
        ]);
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
                    'period_name'    => $request->period_name[$key],
                    'teacher_name'   => $request->teacher_name[$key],
                    'subject_name'   => $request->subject_name[$key],
                    'classroom_name' => $request->classroom_name[$key],
                    'sarting_hour'   => $request->sarting_hour[$key],
                    'ending_hour'    => $request->ending_hour[$key],
                    'duration'       => $request->duration[$key],
                ];
            }
            routine_eachs::insert($data);
            return redirect()->route('routine.create')->with('msg', 'Data Successfully Inserted');
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
