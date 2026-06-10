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

        .quote {
            background: #f8fafc;
            border-left: 3px solid #6366f1;
            border-radius: 8px;
            padding: 14px 16px;
            margin: 20px 0;
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
<div class="card">
    <div class="header">
        <h1>{{ $locale === 'de' ? 'Vielen Dank! 👋' : 'Thank you! 👋' }}</h1>
    </div>
    <div class="body">
        @if($locale === 'de')
            <p>Hallo {{ $name }},</p>
            <p>vielen Dank für Ihre Nachricht! Ich habe sie erhalten und melde mich in der Regel innerhalb von 24–48
                Stunden bei Ihnen.</p>
            <p>Hier ist eine Kopie Ihrer Nachricht:</p>
            <div class="quote">{{ $comment }}</div>
            <p>In der Zwischenzeit können Sie sich gerne meine Projekte ansehen.</p>
            <div class="signature">
                <p>Beste Grüße,<br><strong>Darko Cekovski</strong><br>Webentwickler</p>
                <div class="links">
                    <a href="https://darkocekovski.com">darkocekovski.com</a>
                    <a href="mailto:hello@darkocekovski.com">hello@darkocekovski.com</a>
                </div>
            </div>
        @else
            <p>Hi {{ $name }},</p>
            <p>Thanks for getting in touch! I've received your message and will get back to you within 24–48 hours.</p>
            <p>Here's a copy of your message:</p>
            <div class="quote">{{ $comment }}</div>
            <p>In the meantime, feel free to explore my projects.</p>
            <div class="signature">
                <p>Best regards,<br><strong>Darko Cekovski</strong><br>Web Developer</p>
                <div class="links">
                    <a href="https://darkocekovski.com">darkocekovski.com</a>
                    <a href="mailto:hello@darkocekovski.com">hello@darkocekovski.com</a>
                </div>
            </div>
        @endif
    </div>
    <div class="footer">
        {{ $locale === 'de' ? 'Dies ist eine automatische Bestätigung.' : 'This is an automated confirmation.' }}
    </div>
</div>
</body>
</html>
