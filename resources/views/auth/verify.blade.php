<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu correo | FactuVE</title>
    @vite('resources/css/app.css')

    <!-- Fuente Inter -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet">
    <style>
        /* Asegurar box-sizing */
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

        .verify-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        .verify-card h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .verify-card p {
            color: #64748b;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .verify-card .success-message {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .verify-card button {
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

        .verify-card button:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
        }

        .logout-link {
            display: block;
            margin-top: 1.25rem;
            color: #64748b;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .logout-link:hover {
            color: #3b82f6;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="verify-card">
        <h1>Verifica tu correo ✉️</h1>
        <p>Te enviamos un enlace de verificación a tu correo. Por favor, revísalo (incluyendo la carpeta de spam).</p>

        @if (session('status') == 'verification-link-sent')
            <div class="success-message">
                ✔️ Se ha reenviado el enlace de verificación.
            </div>
        @endif

        <form action="{{ route('verification.send') }}" method="POST">
            @csrf
            <button type="submit">Reenviar correo de verificación</button>
        </form>

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 1.25rem;">
            @csrf
            <button type="submit" class="logout-link">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>
