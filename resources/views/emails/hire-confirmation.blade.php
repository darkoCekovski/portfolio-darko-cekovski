<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            margin: 0;
            padding: 32px 16px;
        }

        .card {
            max-width: 540px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(0, 0, 0, .06);
        }

        .header {
            background: linear-gradient(135deg, #6366f1, #3b82f6);
            padding: 36px 32px;
            text-align: center;
        }

        .header h1 {
            color: #fff;
            margin: 0;
            font-size: 22px;
            font-weight: 700;
        }

        .body {
            padding: 32px;
            line-height: 1.7;
        }

        .body p {
            margin: 0 0 16px;
            font-size: 15px;
            color: #334155;
        }

        .summary {
            margin: 20px 0;
        }

        .row {
            margin-bottom: 14px;
        }

        .label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .08em;
            color: #94a3b8;
            margin-bottom: 3px;
        }

        .value {
            font-size: 14px;
            color: #1e293b;
        }

        .quote {
            background: #f8fafc;
            border-left: 3px solid #6366f1;
            border-radius: 8px;
            padding: 14px 16px;
            margin: 6px 0 0;
            font-size: 14px;
            color: #475569;
            white-space: pre-wrap;
        }

        .signature {
            margin-top: 24px;
            font-size: 15px;
        }

        .signature strong {
            color: #1e293b;
        }

        .links {
            margin-top: 8px;
        }

        .links a {
            color: #6366f1;
            text-decoration: none;
            font-size: 14px;
            margin-right: 14px;
        }

        .footer {
            text-align: center;
            padding: 20px 32px;
            font-size: 12px;
            color: #94a3b8;
            border-top: 1px solid #e2e8f0;
        }
    </style>
</head>
<body>
@php
    $isRole = $hire->intent === 'role';
    $de = $locale === 'de';


    // Copy of the answers in the language of the mail: [label => value], empty values are skipped below
    $rows = $isRole
        ? [
            ($de ? 'Unternehmen' : 'Company')      => $hire->company,
            ($de ? 'Stellentitel' : 'Job title')   => $hire->role_title,
            ($de ? 'Arbeitsmodell' : 'Work model') => $hire->label('work_model', $locale),
            'Start'                                => $hire->label('timeline', $locale),
        ]
        : [
            ($de ? 'Was du brauchst' : 'What you need')                 => implode(', ', $hire->typeLabels($locale)),
            ($de ? 'Budgetrahmen' : 'Budget range')                     => $hire->label('budget', $locale),
            'Start'                                                     => $hire->label('timeline', $locale),
            ($de ? 'Website oder Repository' : 'Website or repository') => $hire->link,
        ];
@endphp

<div class="card">
    <div class="header">
        <h1>{{ $de ? 'Danke für deine Anfrage!' : 'Thank you for your request!' }} &#128075;</h1>
    </div>
    <div class="body">
        @if($de)
            <p>Hallo {{ $name }},</p>
            <p>deine Anfrage ist angekommen. Ich melde mich in der Regel innerhalb von 24 Stunden bei dir.
                @if($isRole)
                    Danke, dass du an mich gedacht hast. Ich freue mich darauf, mehr über die Stelle und das Team zu
                    erfahren!
                @else
                    Ich freue mich darauf, mehr über dein Projekt zu erfahren!
                @endif
            </p>
            <p>Hier ist eine Kopie deiner Angaben:</p>
        @else
            <p>Hi {{ $name }},</p>
            <p>Your request has arrived. I typically reply within 24 hours.
                @if($isRole)
                    Thank you for considering me. I'm looking forward to learning more about the role and the team!
                @else
                    I'm looking forward to hearing more about your project!
                @endif
            </p>
            <p>Here's a copy of your details:</p>
        @endif

        <div class="summary">
            @foreach($rows as $label => $value)
                @if(filled($value))
                    <div class="row">
                        <div class="label">{{ $label }}</div>
                        <div class="value">{{ $value }}</div>
                    </div>
                @endif
            @endforeach

            @if(filled($hire->description))
                <div class="row">
                    <div class="label">{{ $de ? 'Beschreibung' : 'Description' }}</div>
                    <div class="quote">{{ $hire->description }}</div>
                </div>
            @endif
        </div>

        @if($de)
            <p>In der Zwischenzeit kannst du dir gerne meine
                <a href="https://darkocekovski.com/de/projects" target="_blank" rel="noopener"
                   style="color:#6366f1;font-weight:600;text-decoration:none;">Projekte</a> ansehen.</p>
        @else
            <p>In the meantime, feel free to explore my
                <a href="https://darkocekovski.com/en/projects" target="_blank" rel="noopener"
                   style="color:#6366f1;font-weight:600;text-decoration:none;">projects</a>.</p>
        @endif

        <div class="signature">
            <p>{{ $de ? 'Beste Grüße' : 'Best regards' }},<br><strong>Darko
                    Cekovski</strong><br>{{ $de ? 'Webentwickler' : 'Web Developer' }}</p>
            <div class="links">
                <a href="https://darkocekovski.com">darkocekovski.com</a>
                <a href="mailto:hello@darkocekovski.com">hello@darkocekovski.com</a>
            </div>
        </div>
    </div>
    <div
        class="footer">{{ $de ? 'Dies ist eine automatische Bestätigung.' : 'This is an automated confirmation.' }}</div>
</div>
</body>
</html>
