<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentClassMultipleRequest;
use App\Http\Requests\StudentClassRequest;
use App\StudentClass;
use Illuminate\Http\Request;
use DB, Session, Exception;

class StudentClassController extends Controller
{
    public function index()
    {
        $student_classes = StudentClass::orderBy('created_at', 'desc')->paginate();

        return view('pages.student_classes', [
            'student_classes' => $student_classes
        ]);
    }

    public function create()
    {
        $student_class = null;

        return view('forms.student_class', ['student_class' => $student_class]);

    }

    public function store(StudentClassRequest $request)
    {
        try {
            DB::beginTransaction();
            $requested_inputs = $request->except('_token');

            StudentClass::create($requested_inputs);

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => SUCCESS_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'success',
                'message' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'message' => $html,
            ];
        }

        return response()->json($json_response_data);
    }

    public function createMultiple()
    {
        $student_class = null;

        return view('forms.student_class_multiple');

    }

    public function storeMultiple(StudentClassMultipleRequest $request)
    {
        try {
            DB::beginTransaction();

            foreach ($request->name as $key => $name) {
                $student_class = new StudentClass();
                $student_class->name = $name;
                $student_class->save();
            }

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => SUCCESS_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'success',
                'message' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'message' => $html,
            ];
        }

        return response()->json($json_response_data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $student_class = StudentClass::findOrFail($request->id);

        return view('forms.student_class', ['student_class' => $student_class]);

    }

    /**
     * @param $id
     * @param StudentClassRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, StudentClassRequest $request)
    {
        try {
            DB::beginTransaction();
            $requested_inputs = $request->except('_token', 'id');

            StudentClass::where('id', $id)->update($requested_inputs);

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => SUCCESS_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'success',
                'message' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'message' => $html,
            ];
        }

        return response()->json($json_response_data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            DB::beginTransaction();

            $student = StudentClass::findOrFail($request->id);
            $student->delete();

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => DELETE_MSG,
            ])->render();

            DB::commit();
            $json_response_data = [
                'status' => 'success',
                'message' => $html,
            ];

        } catch (Exception $e) {
            $html = view('includes.flash_message', [
                'flash_message_status' => 'danger',
                'flash_message' => WARNING_MSG,
            ])->render();
            DB::rollBack();
            $json_response_data = [
                'status' => 'danger',
                'message' => $html,
            ];
        }
        return response()->json($json_response_data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $q = $request->q ?? '';

        $student_classes = StudentClass::when($q != '', function ($query) use ($q) {
            return $query->orWhere('name', 'like', '%'.$q.'%');
        })->orderBy('created_at', 'desc')->paginate();

        return view('pages.student_classes', [
            'student_classes' => $student_classes
        ]);
    }
}
