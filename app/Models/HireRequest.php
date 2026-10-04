<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    protected $fillable = [
        'intent', 'name', 'email', 'language', 'ui_locale', 'timeline',
        'budget', 'project_types', 'description', 'link',
        'company', 'role_title', 'work_model',
    ];

    protected $casts = [
        'project_types' => 'array',
    ];
}
