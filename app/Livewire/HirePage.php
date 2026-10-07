<?php

namespace App\Livewire;

use App\Models\HireRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Renderless;
use Livewire\Component;
use App\Mail\HireRequestConfirmation;
use App\Mail\HireRequestReceived;
use Illuminate\Support\Facades\Mail;


class HirePage extends Component
{
    // Allowed values of every choice; the same lists drive the rendered cards and the server-side validation
    private const TYPES = ['webapp', 'feature', 'frontend', 'upgrade', 'other'];
    private const BUDGETS = ['lt2k', '2to5k', '5to10k', 'gt10k', 'unsure'];
    private const TIMELINES = ['asap', '1to3m', 'flexible'];
    private const WORK_MODELS = ['remote', 'hybrid', 'onsite'];

    // Reply languages offered in the last step (endonyms, so they need no translation)
    private const LANGUAGES = [
        'en' => 'English',
        'de' => 'Deutsch',
    ];

    // Receives the finished wizard from Alpine, validates it again (the client checks are only for comfort) and stores it.
    // Renderless: the wizard lives inside wire:ignore, so re-rendering the component would only cost time.
    #[Renderless]
    public function submit(array $data): array
    {
        // Livewire update requests carry no /en or /de prefix, so the site language travels with the payload
        $locale = in_array($data['locale'] ?? null, ['en', 'de'], true) ? $data['locale'] : 'en';
        app()->setLocale($locale);

        // Honeypot: invisible to people, filled in by bots. Answer "ok" so bots learn nothing.
        if (filled($data['website'] ?? null)) {
            return ['ok' => true];
        }

        // At most 5 requests per hour per address (behind a shared proxy address this acts as a global limit, fine for this traffic)
        $throttleKey = 'hire-request:' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            return ['ok' => false, 'message' => 'throttled'];
        }

        $validator = Validator::make($data, $this->rules($data['intent'] ?? null), $this->messages());

        if ($validator->fails()) {
            return ['ok' => false, 'errors' => $validator->errors()->toArray()];
        }

        // Checked after the validation, so a rejected form does not use up the single-use Turnstile token
        if (! $this->verifyTurnstile((string) ($data['turnstileToken'] ?? ''))) {
            return ['ok' => false, 'message' => 'turnstile'];
        }

        // Count only requests that passed every check
        RateLimiter::hit($throttleKey, 3600);

        $valid = $validator->validated();

        $hire = HireRequest::create([
            'intent'        => $valid['intent'],
            'name'          => $valid['name'],
            'email'         => $valid['email'],
            'language'      => $valid['language'],
            'ui_locale'     => $locale,
            'timeline'      => $valid['timeline'],
            'budget'        => $valid['budget'] ?? null,
            'project_types' => $valid['projectTypes'] ?? null,
            'description'   => $valid['description'] ?? null,
            'link'          => $valid['link'] ?? null,
            'company'       => $valid['company'] ?? null,
            'role_title'    => $valid['roleTitle'] ?? null,
            'work_model'    => $valid['workModel'] ?? null,
        ]);

        $this->sendMails($hire);

        return ['ok' => true];
    }

    // Sends the notification to the site owner and the confirmation to the visitor.
    // The request is already stored, so a failing mail is only logged and never shown to the visitor as a failed request.
    private function sendMails(HireRequest $hire): void
    {
        try {
            Mail::to(config('mail.from.address'))->send(new HireRequestReceived($hire));
        } catch (\Throwable $e) {
            report($e);
        }

        try {
            Mail::to($hire->email)->send(new HireRequestConfirmation($hire));
        } catch (\Throwable $e) {
            report($e);
        }
    }

    // Asks Cloudflare whether the widget token is genuine; any failure counts as "not verified"
    private function verifyTurnstile(string $token): bool
    {
        $secret = config('services.turnstile.secret_key');

        if ($token === '' || blank($secret)) {
            return false;
        }

        try {
            $response = Http::asForm()->timeout(5)->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'secret' => $secret,
                'response' => $token,
                'remoteip' => request()->ip(),
            ]);
        } catch (\Throwable $e) {
            // Cloudflare unreachable: logged, and the visitor is asked to try again
            report($e);

            return false;
        }

        return $response->json('success') === true;
    }

    // Validation rules for the chosen path; the common fields are shared, the rest depends on project or role
    private function rules(?string $intent): array
    {
        $common = [
            'intent' => ['required', Rule::in(['project', 'role'])],
            'timeline' => ['required', Rule::in(self::TIMELINES)],
            'name' => ['required', 'string', 'min:2', 'max:225'],
            'email' => ['required', 'email:rfc', 'max:225'],
            'language' => ['required', Rule::in(array_keys(self::LANGUAGES))],
        ];

        if ($intent === 'role') {
            return $common + [
                    'company' => ['required', 'string', 'max:120'],
                    'roleTitle' => ['nullable', 'string', 'max:255'],
                    'workModel' => ['required', Rule::in(self::WORK_MODELS)],
                ];
        }

        return $common + [
                'projectTypes' => ['required', 'array', 'min:1'],
                'projectTypes.*' => [Rule::in(self::TYPES)],
                'description' => ['required', 'string', 'min:20', 'max:2000'],
                'link' => ['nullable', 'url:http,https', 'max:255'],
                'budget' => ['required', Rule::in(self::BUDGETS)],
            ];
    }

    // Same wording as the contact form for the fields both forms share
    private function messages(): array
    {
        return [
            'name.required' => __('messages.contact_name_required'),
            'name.min' => __('messages.contact_name_min'),
            'name.max' => __('messages.contact_name_max'),
            'email.required' => __('messages.contact_email_required'),
            'email.email' => __('messages.contact_email_invalid'),
            'email.max' => __('messages.contact_email_max'),
        ];
    }

    // Builds [value => translated label] for a list of option values, e.g. hire_budget_lt2k
    private function labels(string $prefix, array $values): array
    {
        return collect($values)
            ->mapWithKeys(fn(string $value) => [$value => __("messages.{$prefix}_{$value}")])
            ->all();
    }

    public function render()
    {
        $locale = app()->getLocale();

        $options = [
            'types' => $this->labels('hire_type', self::TYPES),
            'budgets' => $this->labels('hire_budget', self::BUDGETS),
            'timelines' => $this->labels('hire_timeline', self::TIMELINES),
            'workModels' => $this->labels('hire_work', self::WORK_MODELS),
        ];

        // Everything the Alpine wizard needs from the server: language, texts, error messages and option labels for the summary
        $config = [
            'locale' => $locale,
            // Public key of the Cloudflare Turnstile widget (the same one the contact form uses)
            'turnstileSiteKey' => config('services.turnstile.site_key'),
            'steps' => [
                __('messages.hire_step_goal'),
                __('messages.hire_step_details'),
                __('messages.hire_step_conditions'),
                __('messages.hire_step_contact'),
            ],
            'ui' => [
                'stepOf' => __('messages.hire_step_of'),
                'next' => __('messages.hire_next'),
                'send' => __('messages.hire_send'),
                'sending' => __('messages.hire_sending'),
                'doneTitle' => __('messages.hire_done_title'),
            ],
            // Steps 2 and 3 have a different heading per path, so headings are looked up by "step + path"
            'headings' => [
                '1' => ['title' => __('messages.hire_s1_title'), 'text' => __('messages.hire_s1_text')],
                '2project' => ['title' => __('messages.hire_s2p_title'), 'text' => __('messages.hire_s2p_text')],
                '2role' => ['title' => __('messages.hire_s2r_title'), 'text' => __('messages.hire_s2r_text')],
                '3project' => ['title' => __('messages.hire_s3p_title'), 'text' => __('messages.hire_s3p_text')],
                '3role' => ['title' => __('messages.hire_s3r_title'), 'text' => __('messages.hire_s3r_text')],
                '4' => ['title' => __('messages.hire_s4_title'), 'text' => __('messages.hire_s4_text')],
            ],
            'messages' => [
                'choose' => __('messages.hire_err_choose'),
                'chooseOne' => __('messages.hire_err_choose_one'),
                'required' => __('messages.hire_err_required'),
                'minLength' => __('messages.hire_err_min', ['min' => 20]),
                'url' => __('messages.hire_err_url'),
                'server' => __('messages.hire_err_server'),
                'throttled' => __('messages.form_err_throttled'),
                // Same wording as the contact form for the fields both forms share
                'nameRequired' => __('messages.contact_name_required'),
                'nameMin' => __('messages.contact_name_min'),
                'emailRequired' => __('messages.contact_email_required'),
                'emailInvalid' => __('messages.contact_email_invalid'),
                // Same wording as the contact form
                'turnstileRequired' => __('messages.contact_turnstile_required'),
                'turnstileFailed' => __('messages.contact_turnstile_failed'),
            ],
            'labels' => [
                'intent' => [
                    'project' => __('messages.hire_intent_project'),
                    'role' => __('messages.hire_intent_role'),
                ],
                'projectTypes' => $options['types'],
                'budget' => $options['budgets'],
                'timeline' => $options['timelines'],
                'workModel' => $options['workModels'],
            ],
        ];

        $metaTitle = $locale === 'de'
            ? 'Projekt oder Stelle anfragen — Darko Cekovski'
            : 'Hire me — Darko Cekovski';

        $metaDescription = $locale === 'de'
            ? 'Freelance-Projekt oder Festanstellung: In vier kurzen Schritten erzählst du mir, was du brauchst.'
            : 'Freelance project or full-time role: tell me what you need in four short steps.';

        return view('livewire.pages.hire-page', [
            'config' => $config,
            'options' => $options,
            'languages' => self::LANGUAGES,
        ])->layout('layouts.app', [
            'title' => $metaTitle,
            'metaTitle' => $metaTitle,
            'metaDescription' => $metaDescription,
            'canonical' => url($locale . '/hire'),
        ]);
    }
}
