<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use DB, Session, Exception;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate();
        Session::flash('danger','Its a flash message');
        return view('pages.students', [
            'students' => $students
        ]);
    }

    public function create()
    {
        $student = null;
        return view('forms.student', ['student' => $student]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'birth_date' => 'required|date',
            'gender' => 'required|integer',
            'guardian_name' => 'required|max:191',
            'contact_no' => 'required|max:191',
            'address' => 'nullable|max:191',
        ], [
            'name.required' => 'Student Name is required',
            'name.max' => 'Maximum 191 characters exceeded',
            'birth_date.required' => 'Birth date is required',
            'birth_date.date' => 'Birth date must be a date',
            'guardian_name.required' => 'Guardian name is required',
            'guardian_name.max' => 'Maximum 191 characters exceeded',
            'contact_no.required' => 'Contact no is required',
            'contact_no.max' => 'Maximum 191 characters exceeded',
            'address.max' => 'Maximum 191 characters exceeded',
        ]);

        try {

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => 'Something went wrong',
            ])->render();
        }
    }
}
