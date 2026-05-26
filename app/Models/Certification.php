<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};

class Certification extends Model
{
    protected $fillable = [
        'type', 'title', 'slug', 'short_description_es', 'short_description_en',
        'certificate_url', 'date', 'extra_info', 'order'
    ];
}
