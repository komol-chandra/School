<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //privacy_policy
        $privacy_policy = PrivacyPolicy::first();
        // dd($privacy_policy);
        return view('layouts.Settings.privacy_policy', ['privacy_policy' => $privacy_policy]);
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
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $privacy_policy = PrivacyPolicy::findOrFail($id);
        $privacy_policy->privacy_policy = $request->privacy_policy;
        $privacy_policy->save();
        return redirect()->back()->with('msg', 'Privacy Policy Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrivacyPolicy  $privacyPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        //
    }
}
