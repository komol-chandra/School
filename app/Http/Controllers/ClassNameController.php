<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use Illuminate\Http\Request;
use App\Http\Requests\ClassNameRequest;
use JsValidator;

class ClassNameController extends Controller
{
    public function index()
    {
        // dd(ClassName::with('Student')->get()->toArray());
        return view("Backend.Class.class");
    }
    public function create(Request $request)
    {
        $data = ClassName::search($request->search)->orderBy('class_id', 'asc')->paginate(10);
        return view('Backend.Class.list', ['data' => $data]);
    }
    public function store(ClassNameRequest $request)
    {
        $save_modal = new ClassName();
        $save_modal->class_name = $request->class_name;
        $save_modal->save();
        $status = 201;
        $response = [
            'staus'   => $status,
            'message' => 'Data inserted Succesfully!',
        ];
        return response()->json($response, $status);
    }
    public function show($id)
    {
        $class_status = ClassName::findOrFail($id);
        if ($class_status->status == 1) {
            $class_status->update(["status" => 0]);
            $status = 201;
        } else {
            $class_status->update(["status" => 1]);
            $status = 200;
        }
        return response()->json($class_status, $status);
    }

    public function edit($id)
    {
        $data = ClassName::findOrFail($id);
        return response()->json($data, 201);
    }
    public function update(ClassNameRequest $request)
    {
        $class_modal = ClassName::findOrFail($request->class_id);
        $class_modal->class_name = $request->class_name;
        $class_modal->save();
        $status = 201;
        return response()->json($status);
    }
    public function destroy($id)
    {
        $delete = ClassName::findOrFail($id)->delete();
        return response()->json($delete, 202);
    }
}
