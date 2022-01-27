<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M4Note extends Model
{
    use HasFactory;

    protected $table = "m4_notes";

    protected $fillable = [
        'title',
        'desc',
        'url',
        'thumbnail',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(M3Subject::class, 'subject_id', 'id');
    }
}
