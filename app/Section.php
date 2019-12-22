<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name', 'class_id'
    ];

    protected $dates = ['deleted_at'];

    protected $cascadeDeletes = [
        'studentClassSectionPivots'
    ];

    public function studentClass()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id')->withDefault();
    }

    public function studentClassSectionPivots()
    {
        return $this->hasMany(StudentClassSectionPivot::class, 'section_id', 'id');
    }
}
