<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRoomRequest;
class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Backend.ClassRoom.classroom");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = ClassRoom::search($request->search)->orderBy('classroom_id','asc')->paginate(10);
        return view('Backend.ClassRoom.list',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRoomRequest $request)
    {

        $classroom_model = new ClassRoom;
        $classroom_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $classroom_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class_room_status = ClassRoom::findOrFail($id);
        if ($class_room_status->classroom_status == 1) {
            $class_room_status->update(["classroom_status" => 0]);
            $status = 201;
        } else {
            $class_room_status->update(["classroom_status" => 1]);
            $status = 200;
        }
        return response()->json($class_room_status, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom_edit = ClassRoom::findOrFail($id);
        return response()->json($classroom_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRoomRequest $request, $id)
    {
        $classroom_model = ClassRoom::findOrFail($id);
        $classroom_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $classroom_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ClassRoom::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
