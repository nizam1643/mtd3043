<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M1Year extends Model
{
    use HasFactory;

    protected $table = "m1_years";

    protected $fillable = [
        'year',
        'batch_code'
    ];

    public function subject()
    {
        return $this->hasMany(M3Subject::class, 'year_id', 'id');
    }
}
