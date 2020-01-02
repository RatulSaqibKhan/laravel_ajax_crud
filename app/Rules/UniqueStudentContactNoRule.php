<?php

namespace App\Rules;

use App\Student;
use Illuminate\Contracts\Validation\Rule;

class UniqueStudentContactNoRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        $contact_no = Student::where([
            'contact_no' => $value,
        ]);

        if (request()->route('id')) {
            $contact_no = $contact_no->where('id', '!=', request()->route('id'));
        }

        $contact_no = $contact_no->first();

        return $contact_no ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This contact no is already exists.';
    }
}
