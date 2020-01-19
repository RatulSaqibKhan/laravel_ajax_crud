<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionMultipleRequest;
use App\Http\Requests\SectionRequest;
use App\Section;
use App\StudentClass;
use Illuminate\Http\Request;
use DB, Session, Exception;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('created_at', 'desc')->paginate();

        return view('pages.sections', [
            'sections' => $sections
        ]);
    }

    public function create()
    {
        $section = null;
        $student_classes = StudentClass::pluck('name', 'id');
        return view('forms.section', [
            'section' => $section,
            'student_classes' => $student_classes,
        ]);

    }

    public function store(SectionRequest $request)
    {
        try {
            DB::beginTransaction();
            $requested_inputs = $request->except('_token');

            Section::create($requested_inputs);

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
        $section = null;
        $student_classes = StudentClass::pluck('name', 'id');
        return view('forms.section_multiple', [
            'section' => $section,
            'student_classes' => $student_classes,
        ]);
    }

    public function storeMultiple(SectionMultipleRequest $request)
    {
        try {
            DB::beginTransaction();

            foreach ($request->name as $key => $name) {
                $section = new Section();
                $section->name = $name;
                $section->class_id = $request->class_id[$key];
                $section->save();
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
        $section = Section::findOrFail($request->id);
        $student_classes = StudentClass::pluck('name', 'id');
        return view('forms.section', [
            'section' => $section,
            'student_classes' => $student_classes,
        ]);
    }

    /**
     * @param $id
     * @param SectionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, SectionRequest $request)
    {
        try {
            DB::beginTransaction();
            $requested_inputs = $request->except('_token','_method', 'id');

            Section::where('id', $id)->update($requested_inputs);

            $html = view('includes.flash_message', [
                'flash_message_status' => 'success',
                'flash_message' => UPDATE_MSG,
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
                'error' => $e->getMessage(),
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

            $student = Section::findOrFail($request->id);
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

        $sections = Section::when($q != '', function ($query) use ($q) {
            return $query->orWhere('name', 'like', '%'.$q.'%')
                ->whereHas('studentClass', function ($query) use($q) {
                    return $query->orWhere('name', 'like', '%'.$q.'%');
                });
        })
            ->orderBy('created_at', 'desc')
            ->paginate();

        return view('pages.sections', [
            'sections' => $sections,
            'q' => $q,
        ]);
    }
}
