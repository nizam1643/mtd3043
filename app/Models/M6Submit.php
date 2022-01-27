<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M6Submit extends Model
{
    use HasFactory;

    protected $table = "m6_submits";

    protected $fillable = [
        'url',
        'assignment_id',
        'user_id',
    ];

    public function assignment()
    {
        return $this->belongsTo(M5Assigment::class, 'assignment_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
