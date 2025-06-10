<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_name',
        'student_email',
        'student_phone',
        'course_id',
        'created_by',
        'updated_by',
    ];
    protected $table = 'student';
    protected $primaryKey = 'student_id';
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
