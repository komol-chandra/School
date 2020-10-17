<?php

namespace App\Http\Controllers;

use App\Models\LibraryModel;
use Illuminate\Http\Request;
use App\Http\Requests\LibraryRequest;

class LibraryModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend.Library.library');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['library'] = LibraryModel::orderBy('library_id','asc')->paginate(10);
        return view('Backend.Library.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LibraryRequest $request)
    {
        $library_model = new LibraryModel;
        $library_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $library_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LibraryModel  $libraryModel
     * @return \Illuminate\Http\Response
     */
    public function show(LibraryModel $libraryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LibraryModel  $libraryModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $library_edit = LibraryModel::findOrFail($id);
        return response()->json($library_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LibraryModel  $libraryModel
     * @return \Illuminate\Http\Response
     */
    public function update(LibraryRequest $request, $id)
    {
        $library_update = LibraryModel::findOrFail($id);
        $library_update->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $library_update
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LibraryModel  $libraryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LibraryModel::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
