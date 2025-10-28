<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | FactuVE</title>
    @vite('resources/css/app.css')

    <!-- Fuente Inter desde Bunny Fonts -->
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

        .form-card p {
            text-align: center;
            color: #64748b;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }

        /* Inputs estilizados */
        .input-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #f8fafc;
            font-size: 0.9375rem;
            color: #1e293b;
            transition: all 0.2s ease;
        }

        .input-group input:focus,
        .input-group select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* Botón */
        .btn-submit {
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

        .btn-submit:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-2px);
            box-shadow: 0 6px 12px -2px rgba(59, 130, 246, 0.4);
        }

        /* Enlaces */
        .login-link {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.875rem;
            color: #64748b;
        }

        .login-link a {
            color: #3b82f6;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Errores */
        .alert-error {
            background-color: #fee2e2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
        }

        .alert-error ul {
            list-style: disc;
            padding-left: 1.25rem;
            margin: 0.25rem 0;
        }

        /* Responsive: en móviles, una columna */
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
    <!-- Sección de bienvenida (izquierda) -->
    <div class="welcome-section">
        <div class="icon">🔒</div>
        <h2>Únete a FactuVE</h2>
        <p>Gestiona, optimiza y transforma tu trabajo con nuestra plataforma segura y eficiente. Tu productividad comienza aquí.</p>
    </div>

    <!-- Formulario (derecha) -->
    <div class="form-section">
        <div class="form-card">
            <h1>Crea tu cuenta</h1>
            <p>Completa tus datos para registrarte</p>

            <!-- Mostrar errores -->
            @if ($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div class="flex gap-3">
                    <div class="w-1/2 input-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="w-1/2 input-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}" required>
                    </div>
                </div>

                <div class="input-group">
                    <label>Cédula</label>
                    <div class="flex gap-2">
                        <select name="nacionalidad" required>
                            <option value="V" {{ old('nacionalidad') == 'V' ? 'selected' : '' }}>V</option>
                            <option value="E" {{ old('nacionalidad') == 'E' ? 'selected' : '' }}>E</option>
                        </select>
                        <input type="text" name="cedula_numero" placeholder="Ej: 30699955" value="{{ old('cedula_numero') }}" required>
                    </div>
                </div>

                <div class="input-group">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                </div>

                <div class="input-group">
                    <label for="telefono">Teléfono (opcional)</label>
                    <input type="text" name="telefono" id="telefono" placeholder="Ej: 04141234567">
                </div>

                <div class="input-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>

                <div class="flex gap-3">
                    <div class="w-1/2 input-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="w-1/2 input-group">
                        <label for="password_confirmation">Confirmar</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    Crear cuenta
                </button>

                <div class="login-link">
                    ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
