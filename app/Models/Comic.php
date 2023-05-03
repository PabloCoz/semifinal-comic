<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    const ELABORACIÓN = 1;
    const REVISIÓN = 2;
    const PUBLICADO = 3;

    protected $guarded = ['id'];

    public function scopeCategory($query, $category)
    {
        if ($category) {
            return $query->where('category_id', $category);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
