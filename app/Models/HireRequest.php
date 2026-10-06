<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireRequest extends Model
{
    // Language-file prefix of every stored choice; the stored value is appended, e.g. hire_budget_2to5k
    private const LABEL_PREFIXES = [
        'intent'     => 'hire_intent',
        'timeline'   => 'hire_timeline',
        'budget'     => 'hire_budget',
        'work_model' => 'hire_work',
    ];

    protected $fillable = [
        'intent', 'name', 'email', 'language', 'ui_locale', 'timeline',
        'budget', 'project_types', 'description', 'link',
        'company', 'role_title', 'work_model',
    ];

    protected $casts = [
        'project_types' => 'array',
    ];

    // Translated label of a stored choice (e.g. budget "2to5k" becomes "€2,000 – €5,000") in the given language
    public function label(string $field, string $locale = 'en'): ?string
    {
        $value = $this->{$field};

        return $value
            ? __('messages.' . self::LABEL_PREFIXES[$field] . '_' . $value, [], $locale)
            : null;
    }

    // Translated labels of the selected project types
    public function typeLabels(string $locale = 'en'): array
    {
        return collect($this->project_types ?? [])
            ->map(fn (string $type) => __('messages.hire_type_' . $type, [], $locale))
            ->all();
    }
}
