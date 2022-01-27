<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'system_level'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subject()
    {
        return $this->belongsToMany(M3Subject::class, 'user_m3sujects', 'user_id', 'subject_id');
    }

    public function submit()
    {
        return $this->hasMany(M6Submit::class, 'user_id', 'id');
    }

    public function feedback()
    {
        return $this->hasMany(M8Feedback::class, 'user_id', 'id');
    }

    public function formstudent()
    {
        return $this->hasMany(M9Student::class, 'student_id', 'id');
    }
}
