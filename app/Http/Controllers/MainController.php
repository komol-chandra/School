<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Staffs;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('Backend.dashboard');
    }
    public function ex()
    {
        return view('index');
    }
    public function teacherDashboard()
    {
        $data = Teacher::count();
        return response()->json($data, 200);
    }
    public function studentDashboard()
    {
        $data = student::count();
        return response()->json($data, 200);
    }
    public function parentDashboard()
    {
        $data = student::count();
        return response()->json($data, 200);
    }
    public function staffDashboard()
    {
        $data = Staffs::count();
        return response()->json($data, 200);
    }
}
