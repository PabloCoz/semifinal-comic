<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relacion uno a muchos inversa
    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}
