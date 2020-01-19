<?php

namespace App\Http\Requests;

use App\Rules\UniqueSectionRule;
use App\Rules\UniqueStudentContactNoRule;
use App\Rules\UniqueStudentIdRule;
use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
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
            'name.required' => 'Section Name is required',
            'name.max' => 'Maximum 191 characters exceeded',
            'class_id.required' => 'Class Name is required',
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
            'name' => ['required', 'max:191', new UniqueSectionRule],
            'class_id' => 'required'
        ];
    }
}
