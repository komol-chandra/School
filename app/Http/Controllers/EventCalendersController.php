<?php

namespace App\Http\Controllers;

use App\Models\EventCalenders;
use App\Http\Requests\EvenCalanderRequest;

use Illuminate\Http\Request;

class EventCalendersController extends Controller
{
    public function index()
    {
        $data['data']=EventCalenders::get();
        return view('Backend.EventCalender.eventcalander',$data);
    }
    public function create(Request $request)
    {
        $data['data']=EventCalenders::get();
        return view('Backend.EventCalender.list',$data);
    }
    public function store(EvenCalanderRequest $request)
    {
        $save_modal = new EventCalenders();
        $save_modal->fill($request->all())->save();
        $status = 201;
        $response = [
            'staus'   => $status,
            'message' => 'Data inserted Succesfully!',
        ];
        return response()->json($response, $status);
    }
    public function show($id)
    {
        $status = EventCalenders::findOrFail($id);
        if ($status->status == 1) {
            $status->update(["status" => 0]);
            $status = 201;
        } else {
            $status->update(["status" => 1]);
            $status = 200;
        }
        return response()->json($status, $status);
    }
    public function edit(EventCalenders $eventCalenders)
    {
        //
    }
    public function update(Request $request, EventCalenders $eventCalenders)
    {
        //
    }
    public function destroy($id)
    {
        $delete = EventCalenders::findOrFail($id)->delete();
        return response()->json($delete, 202);
    }
}
