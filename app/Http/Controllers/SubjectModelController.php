<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use App\Models\ClassName;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class['data'] = ClassName::get();
        return view("Backend.Subject.subject",$class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $page = $request->input('page', 1);
        $data['sl'] = (($page - 1) * 10) + 1;
        $data['search'] = $search = $request->search;
        $data['data'] = SubjectModel::Search($request->search)->paginate(10);
        return view('Backend.Subject.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectModel  $subjectModel
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectModel $subjectModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectModel  $subjectModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class['data'] = ClassName::get();
        $subject_edit = SubjectModel::findOrFail($id);
        return response()->json($subject_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectModel  $subjectModel
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectModel  $subjectModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubjectModel::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
