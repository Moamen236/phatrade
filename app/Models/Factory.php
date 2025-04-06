<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'images'
    ];

    protected $casts = [
        'images' => 'array'
    ];
}
