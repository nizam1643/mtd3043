<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M5Assigment extends Model
{
    use HasFactory;

    protected $table = "m5_assigments";

    protected $fillable = [
        'title',
        'desc',
        'url',
        'start',
        'end',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(M3Subject::class, 'subject_id', 'id');
    }

    public function submit()
    {
        return $this->hasMany(M6Submit::class, 'assignment_id', 'id');
    }
}
