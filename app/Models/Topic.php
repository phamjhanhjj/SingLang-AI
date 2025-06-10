<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'topic_name',
        'topic_description',
        'course_id',
        'created_by',
        'updated_by',
    ];
    protected $table = 'topic';
    protected $primaryKey = 'topic_id';
    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
