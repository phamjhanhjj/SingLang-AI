<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProgress extends Model
{
    protected $table = "student_progress";
    protected $primaryKey = "student_id";

    protected $fillable = [
        'student_id',
        'course_id',
        'topic_id',
        'progress_percentage',
        'last_accessed_at',
        'created_by',
        'updated_by',
    ];
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_accessed_at' => 'datetime',
    ];
}
