<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUsRequest;
use App\Models\AboutUsSetting;
use App\Traits\FileVerifyUpload;
use File;
use Illuminate\Http\Request;

class AboutUsSettingController extends Controller
{
    use FileVerifyUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about_us = AboutUsSetting::first();
        return view('layouts.Settings.aboutus', ['about_us' => $about_us]);
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
     * @param  \App\Models\AboutUsSetting  $aboutUsSetting
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUsSetting $aboutUsSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUsSetting  $aboutUsSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUsSetting $aboutUsSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUsSetting  $aboutUsSetting
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUsRequest $request, $id)
    {
        $about_us = AboutUsSetting::findOrFail($id);
        // dd($about_us);
        $about_us->about_title = $request->about_title;

        if ($request->about_img) {
            $AboutImg = ("Backend_assets/Files/Logo/about_img/{$about_us->about_img}");
            if (File::exists($AboutImg)) {
                File::delete($AboutImg);
            }
            $about_us->about_img = $this->ImageVerifyUpload($request, 'about_img', 'Backend_assets/Files/Logo/about_img/', 'about_img');
        }
        $about_us->save();
        return redirect()->back()->with('msg', 'About Us Setting Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUsSetting  $aboutUsSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUsSetting $aboutUsSetting)
    {
        //
    }
}
