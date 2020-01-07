<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id', 'name', 'birth_date', 'gender', 'guardian_name', 'contact_no', 'address'
    ];

    protected $dates = ['deleted_at'];

    CONST GENDERS = [
        1 => 'Male',
        2 => 'Female',
        3 => 'Other',
    ];

    CONST MALE_GENDER = 1;
    CONST FEMALE_GENDER = 2;
    CONST OTHER_GENDER = 3;

    protected $cascadeDeletes = ['studentClassSectionPivots'];

    public function studentClassSectionPivots()
    {
        return $this->hasMany(StudentClassSectionPivot::class, 'student_id', 'id');
    }
}
