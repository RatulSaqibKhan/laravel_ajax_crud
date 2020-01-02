<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Student;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use DB, Session, Exception;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate();

        return view('pages.students', [
            'students' => $students
        ]);
    }

    public function create()
    {
        $student = null;
        return view('forms.student', ['student' => $student]);
    }

    public function store(StudentRequest $request)
    {
        try {
            DB::beginTransaction();
            $requested_inputs = $request->except('_token');

            Student::create($requested_inputs);

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => SUCCESS_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'danger',
                'html' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'html' => $html,
            ];
        }

        return response()->json($json_response_data);
    }

    public function edit(Request $request)
    {
        try {
            $id = $request->id;
            $student = Student::findOrFail($id);
            return view('forms.student', ['student' => $student]);
        } catch (Exception $e) {
            Session::flash('danger', WARNING_MSG);
            return redirect()->back();
        }
    }

    public function update(StudentRequest $request)
    {
        try {
            DB::beginTransaction();
            $requested_inputs = $request->except('_token', 'id', '_method');

            Student::where('id', $request->id)->update($requested_inputs);

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => UPDATE_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'success',
                'html' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'html' => $html,
            ];
        }

        return response()->json($json_response_data);
    }

    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();

            $student = Student::findOrFail($request->id);
            $student->delete();

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => DELETE_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'success',
                'html' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'html' => $html,
            ];
        }
        return response()->json($json_response_data);
    }
}
