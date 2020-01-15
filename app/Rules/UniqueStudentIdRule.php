<?php

namespace App\Rules;

use App\Student;
use Illuminate\Contracts\Validation\Rule;

class UniqueStudentIdRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     */
    public function __construct()
    {
        return auth()->check();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = strtoupper($value);

        $student_id = Student::where([
            'student_id' => $value,
        ]);

        if (request()->route('id')) {
            $student_id = $student_id->where('id', '!=', request()->route('id'));
        }

        $student_id = $student_id->first();

        return $student_id ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This :attribute is already exists.';
    }
}
