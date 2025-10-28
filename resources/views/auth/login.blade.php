<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | FactuVE</title>
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
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        }

        .auth-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Lado izquierdo: bienvenida */
        .welcome-section {
            flex: 1;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            text-align: center;
        }

        .welcome-section h2 {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.15);
        }

        .welcome-section p {
            font-size: 1.125rem;
            max-width: 90%;
            opacity: 0.95;
            line-height: 1.6;
        }

        .welcome-section .icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        /* Lado derecho: formulario */
        .form-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            background-color: #ffffff;
        }

        .form-card {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
        }

        .form-card h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            text-align: center;
            margin-bottom: 0.5rem;
        }

        .form-card p.subtitle {
            text-align: center;
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        /* Inputs */
        .input-group {
            margin-bottom: 1.25rem;
        }

        .input-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #f8fafc;
            font-size: 0.9375rem;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .input-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* Checkbox y enlace de contraseña */
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.5rem;
            font-size: 0.875rem;
        }

        .form-footer label {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #475569;
        }

        .form-footer input[type="checkbox"] {
            accent-color: #3b82f6;
        }

        .form-footer a {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 600;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        /* Botón */
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .btn-login:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px -2px rgba(59, 130, 246, 0.4);
        }

        /* Mensajes */
        .alert-success {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
            text-align: center;
        }

        .alert-error {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
        }

        .alert-error p {
            margin: 0.25rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Enlace de registro */
        .signup-link {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.875rem;
            color: #64748b;
        }

        .signup-link a {
            color: #3b82f6;
            font-weight: 600;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .auth-container {
                flex-direction: column;
            }

            .welcome-section {
                padding: 1.5rem;
                background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            }

            .form-section {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

<div class="auth-container">
    <!-- Sección de bienvenida -->
    <div class="welcome-section">
        <div class="icon">🔐</div>
        <h2>Accede a tu cuenta</h2>
        <p>Ingresa tus credenciales para continuar con tu trabajo en FactuVE.</p>
        <p>Seguridad y eficiencia en cada paso.</p>
    </div>

    <!-- Formulario de login -->
    <div class="form-section">
        <div class="form-card">
            <h1>Bienvenido 👋</h1>
            <p class="subtitle">Inicia sesión para acceder a tu panel</p>

            <!-- Mensaje de éxito (ej. restablecimiento de contraseña) -->
            @if(session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Errores de validación -->
            @if($errors->any())
                <div class="alert-error">
                    @foreach ($errors->all() as $error)
                        <p>• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="input-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-footer">
                    <label>
                        <input type="checkbox" name="remember">
                        Recuérdame
                    </label>
                    <a href="/forgot-password">¿Olvidaste tu contraseña?</a>
                </div>

                <button type="submit" class="btn-login">
                    Ingresar
                </button>
            </form>

            <div class="signup-link">
                ¿No tienes cuenta? <a href="/register">Regístrate</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>