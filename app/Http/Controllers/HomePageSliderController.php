<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomePageSliderRequest;
use App\Models\HomePageSlider;
use App\Traits\FileVerifyUpload;
use File;
use Illuminate\Http\Request;

class HomePageSliderController extends Controller
{
    use FileVerifyUpload;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_slider = HomePageSlider::first();
        return view('layouts.Settings.home_page_slider', ['home_slider' => $home_slider]);
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
     * @param  \App\Models\HomePageSlider  $homePageSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomePageSlider $homePageSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePageSlider  $homePageSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePageSlider $homePageSlider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePageSlider  $homePageSlider
     * @return \Illuminate\Http\Response
     */
    public function update(HomePageSliderRequest $request, $id)
    {
        $home_slider = HomePageSlider::findOrFail($id);
        // dd($home_slider);
        $home_slider->slider_title1 = $request->slider_title1;
        $home_slider->slider_title1_descryption = $request->slider_title1_descryption;
        $home_slider->slider_title2 = $request->slider_title2;
        $home_slider->slider_title2_descryption = $request->slider_title2_descryption;
        $home_slider->slider_title3 = $request->slider_title3;
        $home_slider->slider_title3_descryption = $request->slider_title3_descryption;

        if ($request->slider1_img) {
            $Slider1 = ("Backend_assets/Files/Logo/slider1_img/{$home_slider->slider1_img}");
            if (File::exists($Slider1)) {
                File::delete($Slider1);
            }
            $home_slider->slider1_img = $this->ImageVerifyUpload($request, 'slider1_img', 'Backend_assets/Files/Logo/slider1_img/', 'slider1_img');
        }
        if ($request->slider2_img) {
            $Slider2 = ("Backend_assets/Files/Logo/slider2_img/{$home_slider->slider2_img}");
            if (File::exists($Slider2)) {
                File::delete($Slider2);
            }
            $home_slider->slider2_img = $this->ImageVerifyUpload($request, 'slider2_img', 'Backend_assets/Files/Logo/slider2_img/', 'slider2_img');
        }
        if ($request->slider3_img) {
            $Slider3 = ("Backend_assets/Files/Logo/slider3_img/{$home_slider->slider3_img}");
            if (File::exists($Slider3)) {
                File::delete($Slider3);
            }
            $home_slider->slider3_img = $this->ImageVerifyUpload($request, 'slider3_img', 'Backend_assets/Files/Logo/slider3_img/', 'slider3_img');
        }

        $home_slider->save();
        return redirect()->back()->with('msg', 'Home Page Slider Change Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePageSlider  $homePageSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePageSlider $homePageSlider)
    {
        //
    }
}
