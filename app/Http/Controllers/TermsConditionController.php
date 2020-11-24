<?php

namespace App\Http\Controllers;

use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms_condition = TermsCondition::first();
        return view('layouts.Settings.terms_n_codition', ['terms_condition' => $terms_condition]);
        // return view('layouts.Settings.terms_n_codition');
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
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(TermsCondition $termsCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $terms_condition = TermsCondition::findOrFail($id);
        // $requested_data = $request->all();
        $terms_condition->terms_condition = $request->terms_condition;
        // dd($requested_data);
        $terms_condition->save();
        return redirect()->back()->with('msg', 'Terms & Condition Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsCondition  $termsCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsCondition $termsCondition)
    {
        //
    }
}
