<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueClassSectionCombinationRule implements Rule
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
        $attribute_explode = explode('.', $attribute);
        $field_key = $attribute_explode[1];

        $class_ids = request()->get('class_id');
        $this_class_id = request()->get('class_id')[$field_key];

        $names = request()->get('name');
        $this_name = request()->get('name')[$field_key];

        $validation_status = 1;
        foreach ($class_ids as $i => $class_id) {
            if ($i != $field_key && $class_ids[$i] == $this_class_id && $names[$i] == $this_name) {
                $validation_status = 0;
                break;
            }
        }

        return $validation_status ? true : false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Same section for same class found.';
    }
}
