<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use App\Http\Requests\AppSettingsRequest;
use Redirect;
use Illuminate\Support\Arr;
use File;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app_data = AppSettings::first();
        return view('Backend.Settings.settings', ['app_data' => $app_data]);
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
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function show(AppSettings $appSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(AppSettings $appSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function update(AppSettingsRequest $request,$id)
    {
        $appSettings_model = AppSettings::findOrFail($id);
        $requested_data = $request->all();
        if ($request->hasFile('app_settings_logo')) {
            if (File::exists($appSettings_model->app_settings_logo)) {
                File::delete($appSettings_model->app_settings_logo);
            }
            $image_type = $request->file('app_settings_logo')->getClientOriginalExtension();
            $path = "Files/App_Settings";
            $name = 'app_' . time() . "." . $image_type;
            $image = $request->file('app_settings_logo')->move($path, $name);
            $requested_data = Arr::set($requested_data, 'app_settings_logo', $image);

        }
        $appSettings_model->fill($requested_data)->save();
        return redirect()->back()->with('success', 'App Setting Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSettings $appSettings)
    {
        //
    }
}
