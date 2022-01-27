<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M7Meet extends Model
{
    use HasFactory;

    protected $table = "m7_meets";

    protected $fillable = [
        'title',
        'url',
        'subject_id',
    ];

    public function subject()
    {
        return $this->belongsTo(M3Subject::class, 'subject_id', 'id');
    }
}
