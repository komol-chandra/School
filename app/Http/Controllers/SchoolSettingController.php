<?php

namespace App\Http\Controllers;

use App\Models\SchoolSetting;
use Illuminate\Http\Request;
use App\Http\Requests\SchoolSettingRequest;
use JsValidator;

class SchoolSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school_settings = SchoolSetting::first();
        // dd($school_settings);
        return view('layouts.Settings.school_settings', ['school_settings' => $school_settings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchoolSetting  $schoolSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolSetting $schoolSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchoolSetting  $schoolSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolSetting $schoolSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchoolSetting  $schoolSetting
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolSettingRequest $request, $id)
    {
        $school_settings = SchoolSetting::findOrFail($id);
        // $requested_data = $request->all();
        $school_settings->school_name = $request->school_name;
        $school_settings->school_phone = $request->school_phone;
        $school_settings->school_address = $request->school_address;
        // dd($school_settings);
        $school_settings->save();
        return redirect()->back()->with('msg', 'School Setting Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchoolSetting  $schoolSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSetting $schoolSetting)
    {
        //
    }
}
