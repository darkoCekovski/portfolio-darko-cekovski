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
    <div class="card">
        <div class="header">
            <h1>📬 New Contact Message</h1>
        </div>
        <div class="body">
            <div class="field">
                <div class="label">Name</div>
                <div class="value">{{ $name }}</div>
            </div>
            <div class="field">
                <div class="label">Email</div>
                <div class="value"><a href="mailto:{{ $email }}" style="color:#6366f1;">{{ $email }}</a></div>
            </div>
            <div class="field">
                <div class="label">Message</div>
                <div class="value" style="white-space:pre-wrap;">{{ $comment }}</div>
            </div>
        </div>
        <div class="footer">Sent from your portfolio contact form</div>
    </div>
</body>
</html>
