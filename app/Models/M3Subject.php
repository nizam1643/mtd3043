<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M3Subject extends Model
{
    use HasFactory;

    protected $table = "m3_subjects";

    protected $fillable = [
        'subject',
        'subject_code',
        'desc',
        'thumbnail',
        'teacher_name',
        'year_id',
        'group_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_m3sujects', 'subject_id', 'user_id');
    }

    public function year()
    {
        return $this->belongsTo(M1Year::class, 'year_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(M2Group::class, 'group_id', 'id');
    }

    public function note()
    {
        return $this->hasMany(M4Note::class, 'subject_id', 'id');
    }

    public function assignment()
    {
        return $this->hasMany(M5Assigment::class, 'subject_id', 'id');
    }

    public function virtual()
    {
        return $this->hasMany(M7Meet::class, 'subject_id', 'id');
    }
}
