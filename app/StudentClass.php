<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $dates = ['deleted_at'];

    protected $cascadeDeletes = ['studentClassSectionPivots'];

    public function studentClassSectionPivots()
    {
        return $this->hasMany(StudentClassSectionPivot::class, 'class_id', 'id');
    }
}
