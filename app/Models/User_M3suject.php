<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_M3suject extends Model
{
    use HasFactory;

    protected $table      = 'user_m3sujects';
    protected $primaryKey = 'id';

    protected $guarded = [];
}
