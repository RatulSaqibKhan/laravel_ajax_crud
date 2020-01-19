<?php

namespace App\Rules;

use App\Section;
use Illuminate\Contracts\Validation\Rule;

class UniqueSectionRule implements Rule
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
        if (count($attribute_explode) > 1) {
            $class_id = request()->get('class_id')[$attribute_explode[1]];
        } else {
            $class_id = request()->get('class_id');
        }

        $section = Section::where([
            'name' => $value,
            'class_id' => $class_id,
        ]);

        if (request()->route('id')) {
            $section = $section->where('id', '!=', request()->route('id'));
        }

        $section = $section->first();

        return $section ? false : true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This section for this class already exists.';
    }
}
