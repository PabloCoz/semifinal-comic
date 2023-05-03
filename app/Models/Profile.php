<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    const ORIGINAL = 1;
    const PROCESO = 2;
    const NOT = 3;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comics()
    {
        return $this->hasMany(Comic::class);
    }
}
