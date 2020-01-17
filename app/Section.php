<?php

namespace App;

use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

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
