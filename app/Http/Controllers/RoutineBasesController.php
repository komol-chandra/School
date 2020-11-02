<?php

namespace App\Http\Controllers;

use App\Models\routine_bases;
use Illuminate\Http\Request;

class RoutineBasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('Backend.Routine.routine');
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
     * @param  \App\Models\routine_bases  $routine_bases
     * @return \Illuminate\Http\Response
     */
    public function show(routine_bases $routine_bases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\routine_bases  $routine_bases
     * @return \Illuminate\Http\Response
     */
    public function edit(routine_bases $routine_bases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\routine_bases  $routine_bases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, routine_bases $routine_bases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\routine_bases  $routine_bases
     * @return \Illuminate\Http\Response
     */
    public function destroy(routine_bases $routine_bases)
    {
        //
    }
}
