<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralSettingRequest;
use App\Models\GeneralSetting;
use App\Traits\FileVerifyUpload;
use File;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    use FileVerifyUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_setting = GeneralSetting::first();
        return view('layouts.Settings.web_settings', ['general_setting' => $general_setting]);
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
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralSetting $generalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralSettingRequest $request, $id)
    {
        $general_setting = GeneralSetting::findOrFail($id);
        // $requested_data = $request->all();
        // dd($requested_data);
        $general_setting->website_title = $request->website_title;
        $general_setting->link_facebook = $request->link_facebook;
        $general_setting->link_twitter = $request->link_twitter;
        $general_setting->link_linkedin = $request->link_linkedin;
        $general_setting->link_google = $request->link_google;
        $general_setting->link_youtube = $request->link_youtube;
        $general_setting->link_instagram = $request->link_instagram;
        $general_setting->home_title = $request->home_title;
        $general_setting->school_address = $request->school_address;
        $general_setting->copy_right_text = $request->copy_right_text;

        if ($request->header_logo) {
            $HeaderLogo = ("Backend_assets/Files/Logo/header_logo/{$general_setting->header_logo}");
            if (File::exists($HeaderLogo)) {
                File::delete($HeaderLogo);
            }
            $general_setting->header_logo = $this->ImageVerifyUpload($request, 'header_logo', 'Backend_assets/Files/Logo/header_logo/', 'header_logo');
        }

        if ($request->footer_logo) {
            $FooterLogo = ("Backend_assets/Files/Logo/footer_logo/{$general_setting->footer_logo}");
            if (File::exists($FooterLogo)) {
                File::delete($FooterLogo);
            }
            $general_setting->footer_logo = $this->ImageVerifyUpload($request, 'footer_logo', 'Backend_assets/Files/Logo/footer_logo/', 'footer_logo');
        }

        $general_setting->save();
        return redirect()->back()->with('msg', 'General Setting Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralSetting  $generalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralSetting $generalSetting)
    {
        //
    }
}
