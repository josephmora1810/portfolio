<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'content',
        'thumbnail_path',
        'is_public',
        'live_url',
        'year',
    ];

    public function images() { return $this->hasMany(Image::class)->orderBy('order'); }

    public function tags() { return $this->belongsToMany(Tag::class); }
}
