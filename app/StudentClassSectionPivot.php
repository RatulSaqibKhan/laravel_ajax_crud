<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentClassSectionPivot extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $fillable = [
        'student_id', 'class_id', 'section_id'
    ];

    protected $dates = ['deleted_at'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id')->withDefault();
    }

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id')->withDefault();
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id')->withDefault();
    }

}
