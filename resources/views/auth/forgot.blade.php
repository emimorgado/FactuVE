<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar contraseña | FactuVE</title>
    @vite('resources/css/app.css')

    <!-- Fuente Inter -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    <style>
        /* Asegurar box-sizing en todo el documento */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .recovery-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .recovery-card h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .recovery-card label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 0.5rem;
        }

        .recovery-card input[type="email"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #f8fafc;
            color: #1e293b;
            font-size: 0.875rem;
            transition: border-color 0.2s ease;
        }

        .recovery-card input[type="email"]:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        .recovery-card button {
            width: 100%;
            padding: 0.75rem;
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .recovery-card button:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
        }

        .recovery-card .status-message {
            text-align: center;
            font-size: 0.875rem;
            color: #16a34a;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .recovery-card .back-link {
            display: block;
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.875rem;
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s;
        }

        .recovery-card .back-link:hover {
            color: #3b82f6;
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .recovery-card {
                padding: 1.5rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="recovery-card">
        <h1>Recuperar contraseña 🔐</h1>

        @if(session('status'))
            <div class="status-message">{{ session('status') }}</div>
        @endif

        <form action="/forgot-password" method="POST">
            @csrf
            <div>
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Enviar enlace de recuperación</button>
        </form>

        <a href="/login" class="back-link">← Volver al inicio de sesión</a>
    </div>
</body>
</html>

