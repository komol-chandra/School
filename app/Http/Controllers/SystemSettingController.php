<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Traits\FileVerifyUpload;
use File;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    use FileVerifyUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system_setting = SystemSetting::first();
        return view('layouts.Settings.system_settings', ['system_setting' => $system_setting]);
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
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(SystemSetting $systemSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $system_setting = SystemSetting::findOrFail($id);
        // $requested_data = $request->all();
        // dd($requested_data);
        $system_setting->system_name = $request->system_name;
        $system_setting->title_name = $request->title_name;
        $system_setting->school_email = $request->school_email;
        $system_setting->contact_no = $request->contact_no;
        $system_setting->school_address = $request->school_address;
        $system_setting->footer_text = $request->footer_text;
        $system_setting->footer_link = $request->footer_link;

        if ($request->regular_logo) {
            $RegularLogo = ("Backend_assets/Files/Logo/regular_logo/{$system_setting->regular_logo}");
            if (File::exists($RegularLogo)) {
                File::delete($RegularLogo);
            }
            $system_setting->regular_logo = $this->ImageVerifyUpload($request, 'regular_logo', 'Backend_assets/Files/Logo/regular_logo/', 'regular_logo');
        }
        if ($request->light_logo) {
            $LightLogo = ("Backend_assets/Files/Logo/light_logo/{$system_setting->light_logo}");
            if (File::exists($LightLogo)) {
                File::delete($LightLogo);
            }
            $system_setting->light_logo = $this->ImageVerifyUpload($request, 'light_logo', 'Backend_assets/Files/Logo/light_logo/', 'light_logo');
        }
        if ($request->small_logo) {
            $SmallLogo = ("Backend_assets/Files/Logo/small_logo/{$system_setting->small_logo}");
            if (File::exists($SmallLogo)) {
                File::delete($SmallLogo);
            }
            $system_setting->small_logo = $this->ImageVerifyUpload($request, 'small_logo', 'Backend_assets/Files/Logo/small_logo/', 'small_logo');
        }
        if ($request->fav_icon) {
            $FavIcon = ("Backend_assets/Files/Logo/fav_icon/{$system_setting->fav_icon}");
            if (File::exists($FavIcon)) {
                File::delete($FavIcon);
            }
            $system_setting->fav_icon = $this->ImageVerifyUpload($request, 'fav_icon', 'Backend_assets/Files/Logo/fav_icon/', 'fav_icon');
        }

        $system_setting->save();
        return redirect()->back()->with('msg', 'System Setting Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SystemSetting  $systemSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(SystemSetting $systemSetting)
    {
        //
    }
}
