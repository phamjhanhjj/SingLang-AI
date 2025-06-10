<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentPractiseVideoRecord extends Model
{
    protected $table = "student_practise_video_record";
    protected $primaryKey = "practise_video_id";

    protected $fillable = [
        'practise_video_id',
        'student_id',
        'is_learned',
        'replay_time',
        'created_by',
        'updated_by',
    ];
}
