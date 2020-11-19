<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;
use File;
use App\Http\Requests\UserProfileRequest;
use App\Traits\FileUpload;

class ProfileController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.pages.Profile.profile');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserProfileRequest $request, $id)
    {
        $user_model=User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {

            if (File::exists($user_model->profile_photo_path)) {
                File::delete($user_model->profile_photo_path);
            }
            $user_model->profile_photo_path = $this->ImageUpload($request, 'profile_photo', 'User/', 'user_profile');
        }
        $user_model->fill($request->all())->save();
        return redirect()->route('profile.index', $id)->with('msg', 'User Successfully Updated');
    }
    public function password(UserPasswordRequest  $request)
    {
        dd($request->all());
        // $user_model=User::findOrFail($id);
        // if ($request->hasFile('profile_photo')) {

        //     if (File::exists($user_model->profile_photo_path)) {
        //         File::delete($user_model->profile_photo_path);
        //     }
        //     $user_model->profile_photo_path = $this->ImageUpload($request, 'profile_photo', 'User/', 'user_profile');
        // }
        // $user_model->fill($request->all())->save();
        // return redirect()->route('profile.index', $id)->with('msg', 'Data Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
