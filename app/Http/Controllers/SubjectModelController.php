<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use App\Models\ClassName;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectModelController extends Controller
{
    public function index()
    {
        $class['data'] = ClassName::get();
        return view("Backend.Subject.subject",$class);
    }
    public function create(Request $request)
    {
        $data['subject'] = SubjectModel::where(function($query) use($request){
            if ($request->filterClass) {
                $query->where('class_name', $request->filterClass);
            }
        })->get();
        return view('Backend.Subject.list',$data);
    }
    public function store(SubjectRequest $request)
    {
        $subject_model = new SubjectModel;
        $subject_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $subject_model
        ];
        return response()->json($response, 200);
    }
    public function show(SubjectModel $subjectModel)
    {
        //
    }
    public function edit($id)
    {
        $class['data'] = ClassName::get();
        $subject_edit = SubjectModel::findOrFail($id);
        return response()->json($subject_edit, 201);
    }
    public function update(SubjectRequest $request, $id)
    {
        $subject_model = SubjectModel::findOrFail($id);
        $subject_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $subject_model
        ];
        return response()->json($response, 200);
    }
    public function destroy($id)
    {
        SubjectModel::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
