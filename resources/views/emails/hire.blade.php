<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: 'Inter', Arial, sans-serif; background: #f8fafc; color: #1e293b; margin: 0; padding: 32px 16px; }
        .card { max-width: 540px; margin: 0 auto; background: #fff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,.06); }
        .header { background: linear-gradient(135deg, #6366f1, #3b82f6); padding: 32px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 20px; font-weight: 700; }
        .body { padding: 32px; }
        .field { margin-bottom: 20px; }
        .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: #94a3b8; margin-bottom: 4px; }
        .value { font-size: 15px; color: #1e293b; background: #f8fafc; border-radius: 8px; padding: 12px 14px; border: 1px solid #e2e8f0; }
        .footer { text-align: center; padding: 20px 32px; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
    </style>
</head>
<body>
@php
    // Plain rows in display order; empty values are skipped below
    $rows = $hire->intent === 'role'
        ? [
            'Company'    => $hire->company,
            'Job title'  => $hire->role_title,
            'Work model' => $hire->label('work_model'),
            'Start'      => $hire->label('timeline'),
        ]
        : [
            'Looking for' => implode(', ', $hire->typeLabels()),
            'Budget'      => $hire->label('budget'),
            'Start'       => $hire->label('timeline'),
        ];
@endphp

<div class="card">
    <div class="header">
        <h1>&#128236; {{ $hire->intent === 'role' ? 'New Role Inquiry' : 'New Project Request' }}</h1>
    </div>
    <div class="body">
        <div class="field">
            <div class="label">Name</div>
            <div class="value">{{ $hire->name }}</div>
        </div>
        <div class="field">
            <div class="label">Email</div>
            <div class="value"><a href="mailto:{{ $hire->email }}" style="color:#6366f1;">{{ $hire->email }}</a></div>
        </div>
        <div class="field">
            <div class="label">Reply language</div>
            <div class="value">{{ $hire->language === 'de' ? 'Deutsch' : 'English' }} (form sent from the {{ strtoupper($hire->ui_locale) }} site)</div>
        </div>

        @foreach($rows as $label => $value)
            @if(filled($value))
                <div class="field">
                    <div class="label">{{ $label }}</div>
                    <div class="value">{{ $value }}</div>
                </div>
            @endif
        @endforeach

        @if(filled($hire->description))
            <div class="field">
                <div class="label">Description</div>
                <div class="value" style="white-space:pre-wrap;">{{ $hire->description }}</div>
            </div>
        @endif

        @if(filled($hire->link))
            <div class="field">
                <div class="label">Existing website or repository</div>
                <div class="value"><a href="{{ $hire->link }}" style="color:#6366f1;">{{ $hire->link }}</a></div>
            </div>
        @endif
    </div>
    <div class="footer">Sent from your portfolio hire form</div>
</div>
</body>
</html>
