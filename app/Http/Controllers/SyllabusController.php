<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use App\Models\ClassName;
use App\Models\SectionName;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use App\Traits\FileVerifyUpload;
use App\Http\Requests\SyllabusRequest;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use FileVerifyUpload;

    public function index()
    {
        $data['class']=ClassName::get();
        $data['section']=SectionName::get();
        $data['subject']=SubjectModel::get();
        return view('Backend.Syllabus.syllabus',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['syllabus'] = Syllabus::where(function($query) use($request){
            if ($request->class) {
                $query->where('class_name', $request->class);
            }
            if ($request->section) {
                $query->where('section_name', $request->section);
            }
        })->get();
        return view('Backend.Syllabus.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SyllabusRequest $request)
    {
       // dd($request->all());

        $syllabus = new Syllabus;
        $syllabus->syllabus_title_name=$request->syllabus_title_name;
        $syllabus->class_name=$request->class_name;
        $syllabus->section_name=$request->section_name;
        $syllabus->subject_name=$request->subject_name;
        $syllabus->syllabus_image=$this->ImageVerifyUpload($request,'syllabus_image','Backend_assets/Files/Syllabus','syllabus_image');
        $syllabus->save();
        return redirect()->route('syllabus.index')->with('msg','Data Successfully Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sylabous  $sylabus
     * @return \Illuminate\Http\Response
     */
    public function show(Sylabus $sylabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sylabous  $sylabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Sylabus $sylabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sylabus  $sylabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sylabus $sylabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sylabus  $sylabus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        unlink(public_path("Backend_assets/Files/Syllabus/").$syllabus['syllabus_image']);
        $syllabus->delete();
        return response()->json(201);
    }
}
