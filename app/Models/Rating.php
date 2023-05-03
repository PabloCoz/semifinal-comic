<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
