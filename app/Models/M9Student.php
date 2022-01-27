<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M9Student extends Model
{
    use HasFactory;

    protected $table = "m9_students";

    protected $fillable = [
        'point1',
        'point2',
        'point3',
        'point4',
        'point5',
        'pointMark',
        'student_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }
}
