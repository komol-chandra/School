<?php

namespace App\Http\Controllers;

use App\Models\AppSettings;
use Illuminate\Http\Request;
use App\Http\Requests\AppSettingsRequest;
use File;
use App\Traits\FileVerifyUpload;
class AppSettingsController extends Controller
{
    use FileVerifyUpload;
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
        $appSettings =AppSettings::findOrFail($id);
        $appSettings->app_settings_name=$request->app_settings_name;
        $appSettings->app_settings_about=$request->app_settings_about;
        $appSettings->app_settings_email=$request->app_settings_email;
        $appSettings->app_settings_phone=$request->app_settings_phone;
        if ($request->app_settings_logo) {
            $settingsImage=("Backend_assets/Files/App_Settings/{$appSettings->app_settings_logo}");
            if (File::exists($settingsImage)) {
                File::delete($settingsImage);
            }
            $appSettings->app_settings_logo=$this->ImageVerifyUpload($request,'app_settings_logo','Backend_assets/Files/App_Settings','app_settings_logo');
        }

        $appSettings->save();
        return redirect()->route('settings.index',$id)->with('msg','Data Successfully Updated');
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
