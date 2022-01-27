<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M8Feedback extends Model
{
    use HasFactory;

    protected $table = "m8_feedback";

    protected $fillable = [
        'title',
        'category',
        'content',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
