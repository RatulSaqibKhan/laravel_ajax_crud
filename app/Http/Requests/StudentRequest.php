<?php

namespace App\Http\Requests;

use App\Rules\UniqueStudentContactNoRule;
use App\Rules\UniqueStudentIdRule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_id.required' => 'Student Id is required',
            'student_id.max' => 'Maximum 191 characters exceeded',
            'name.required' => 'Student Name is required',
            'name.max' => 'Maximum 191 characters exceeded',
            'birth_date.required' => 'Birth date is required',
            'birth_date.date' => 'Birth date must be a date',
            'guardian_name.required' => 'Guardian name is required',
            'guardian_name.max' => 'Maximum 191 characters exceeded',
            'contact_no.required' => 'Contact no is required',
            'contact_no.max' => 'Maximum 191 characters exceeded',
            'address.max' => 'Maximum 191 characters exceeded',
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
            'student_id' => ['required', 'max:191', new UniqueStudentIdRule],
            'name' => 'required|max:191',
            'birth_date' => 'required|date',
            'gender' => 'required|integer',
            'guardian_name' => 'required|max:191',
            'contact_no' => ['required','max:191', new UniqueStudentContactNoRule],
            'address' => 'nullable|max:191',
        ];
    }
}
