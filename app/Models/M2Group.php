<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M2Group extends Model
{
    use HasFactory;

    protected $table = "m2_groups";

    protected $fillable = [
        'group',
        'group_code'
    ];

    public function subject()
    {
        return $this->hasMany(M3Subject::class, 'group_id', 'id');
    }
}
