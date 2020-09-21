<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view ('Backend.Student.student');
    }
    public function create()
    {
        return view ('Backend.Student.add_student');
    }
    public function store(Request $request)
    {
        //
    }
    public function show(student $student)
    {
        //
    }
    public function edit(student $student)
    {
        //
    }
    public function update(Request $request, student $student)
    {
        //
    }
    public function destroy(student $student)
    {
        //
    }
}
