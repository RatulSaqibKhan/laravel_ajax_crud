<?php

namespace App\Http\Controllers;

use App\Section;
use App\Student;
use App\StudentClass;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getDashboardData(Request $request)
    {
        if (!$request->ajax()) {
            return abort(404);
        }

        try {
            $students = Student::all()->count();
            $classes = StudentClass::all()->count();
            $sections = Section::all()->count();

            return response()->json([
                'status' => 'success',
                'student_count' => $students,
                'class_count' => $classes,
                'section_count' => $sections,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'danger',
                'error' => $e->getMessage()
            ]);
        }
    }
}
