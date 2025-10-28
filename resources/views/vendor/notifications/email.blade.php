<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'FactuVE' }}</title>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            padding: 20px;
            margin: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            text-align: center;
            padding: 24px 20px;
        }
        .header h1 {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
        }
        .content {
            padding: 32px;
            color: #1e293b;
            line-height: 1.6;
        }
        .content p {
            margin: 0 0 16px;
        }
        .action-button {
            display: inline-block;
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            margin: 16px 0;
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #64748b;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
        }
        .footer a {
            color: #3b82f6;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>FactuVE</h1>
        </div>
        <div class="content">
            {!! $introLines[0] ?? '' !!}

            @isset($actionText)
                <a href="{{ $actionUrl }}" class="action-button">{{ $actionText }}</a>
            @endisset

            @if (isset($outroLines))
                @foreach ($outroLines as $line)
                    <p>{{ $line }}</p>
                @endforeach
            @endif
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} FactuVE. Sistema de facturación para Venezuela.</p>
            <p>Desarrollado por Emily Morgado 💜</p>
        </div>
    </div>
</body>
</html>