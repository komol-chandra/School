<?php

namespace App\Http\Controllers;

use App\Models\SessionManager;
use Illuminate\Http\Request;
use App\Http\Requests\SessionManagerRequest;

class SessionManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Session.session');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['session'] = SessionManager::get();
        return view('Backend.Session.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionManagerRequest $request)
    {

        $session_model = new SessionManager;
        $session_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $session_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SessionManager  $sessionManager
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Session_status = SessionManager::findOrFail($id);
        if ($Session_status->session_status == 1) {
            $Session_status->update(["session_status" => 0]);
            $status = 201;
        } else {
            $Session_status->update(["session_status" => 1]);
            $status = 200;
        }
        return response()->json($Session_status, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SessionManager  $sessionManager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session_edit = SessionManager::findOrFail($id);
        return response()->json($session_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SessionManager  $sessionManager
     * @return \Illuminate\Http\Response
     */
    public function update(SessionManagerRequest $request,$id)
    {
        $session_model = SessionManager::findOrFail($id);
        $session_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $session_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SessionManager  $sessionManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SessionManager::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
