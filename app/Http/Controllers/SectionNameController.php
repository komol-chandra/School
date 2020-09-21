<?php
 
namespace App\Http\Controllers;

use App\Models\SectionName;
use App\Models\ClassName;
use Illuminate\Http\Request; 
use App\Http\Requests\SectionRequest;
class SectionNameController extends Controller
{
    public function index()
    {
        $class=ClassName::active()->get();
        return view ('Backend.Section.section',['class'=>$class]);
    }
    public function create(Request $request)
    {

        $class= ClassName::active()->get();
        $section=SectionName::search($request->search)->orderBy('section_id','asc')->paginate(10);
        return view ('Backend.Section.list',["section"=>$section,"class"=>$class]);
    }
    public function store(SectionRequest $request)
    {
        $section_modal =new SectionName;
        $section_modal->class_name=$request->class_name;
        $section_modal->section_name=$request->section_name;
        $section_modal->save();
        $status=201;
        return response()->json($section_modal,$status);
    }

    public function show($id)
    {
        $section_modal = SectionName::findOrFail($id);
        if ($section_modal->status ==1) {
            $section_modal->update(["status"=>0]);
            $status=201;
        }else{
            $section_modal->update(["status"=>1]);
            $status=200;
        }
        return response()->json($section_modal,$status);
    }
    public function edit(SectionName $sectionName)
    {
        //
    }
    public function update(Request $request, SectionName $sectionName)
    {
        //
    }
    public function destroy($id)
    {
        $data = SectionName::findOrFail($id)->delete();
        return response()->json(201);
    }
}
