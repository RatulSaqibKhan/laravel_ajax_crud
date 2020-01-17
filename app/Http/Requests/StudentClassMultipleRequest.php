<?php

namespace App\Http\Requests;

use App\Rules\UniqueStudentClassRule;
use App\Rules\UniqueStudentContactNoRule;
use App\Rules\UniqueStudentIdRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentClassMultipleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    public function messages()
    {
        return [
            'name.*.required' => 'Class Name is required',
            'name.*.max' => 'Maximum 191 characters exceeded',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name.*' => ['required', 'max:191', new UniqueStudentClassRule],
        ];
    }
}
