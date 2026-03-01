<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'course_id',
        'class_id',
        'fullname',
        'birthday',
        'email',
        'phone',
        'amount',
        'payment_status',
        'payment_note',
    ];

    public function course()
    {
        return $this->belongsTo(\App\Course::class, 'course_id');
    }

    public function classRoom()
    {
        return $this->belongsTo(\App\ClassRoom::class, 'class_id');
    }
}