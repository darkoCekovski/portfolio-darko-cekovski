<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'thumbnail', 'demo_url', 'github_url', 'tech_stack'];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}
