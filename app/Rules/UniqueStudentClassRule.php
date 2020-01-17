<?php

namespace App\Rules;

use App\StudentClass;
use Illuminate\Contracts\Validation\Rule;

class UniqueStudentClassRule implements Rule
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

        $student_class = StudentClass::where([
            'name' => $value,
        ]);

        if (request()->route('id')) {
            $student_class = $student_class->where('id', '!=', request()->route('id'));
        }

        $student_class = $student_class->first();

        return $student_class ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This class is already exists.';
    }
}
