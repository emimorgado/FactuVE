<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel principal | FactuVE</title>
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
        }

        /* Header */
        header {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.875rem;
            color: #475569;
        }

        .verification-badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.125rem 0.5rem;
            border-radius: 999px;
        }

        .verified {
            background-color: #dcfce7;
            color: #166534;
        }

        .not-verified {
            background-color: #fef3c7;
            color: #92400e;
        }

        .logout-btn {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .logout-btn:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
        }

        /* Main content */
        main {
            padding: 2rem;
        }

        .dashboard-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 2rem;
        }

        .dashboard-card h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
        }

        .dashboard-card p {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 2rem;
        }

        /* Cards grid */
        .modules-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .module-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }

        .module-card:hover {
            border-color: #3b82f6;
            transform: translateY(-3px);
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.12);
        }

        .module-card h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .module-card p {
            font-size: 0.875rem;
            color: #64748b;
            margin: 0;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1.5rem;
            color: #94a3b8;
            font-size: 0.875rem;
            border-top: 1px solid #e2e8f0;
            margin-top: 2rem;
        }

        footer strong {
            color: #3b82f6;
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            main {
                padding: 1.5rem;
            }

            .dashboard-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h1>¡Bienvenid@, {{ Auth::user()->nombre }}!</h1>

        <div class="user-info">
            <span>{{ Auth::user()->email }}</span>
            @if(!Auth::user()->hasVerifiedEmail())
                <span class="verification-badge not-verified">Correo no verificado</span>
            @else
                <span class="verification-badge verified">✔ Verificado</span>
            @endif

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Cerrar sesión</button>
            </form>
        </div>
    </header>

    <!-- Contenido principal -->
    <main>
        <div class="dashboard-card">
            <h2>Panel de control | FactuVE</h2>
            <p>
                Gestiona tu negocio con control total de clientes, productos, inventario y facturación con IVA (16%).<br>
                Todas las operaciones están protegidas y registradas para tu seguridad.
            </p>

            <div class="modules-grid">
                <a href="{{ route('clientes.create') }}" class="module-card">
                    <h3>👥 Agregar cliente</h3>
                    <p>Registra nuevos clientes con RIF, dirección y contacto.</p>
                </a>
                <a href="{{ route('productos.index') }}" class="module-card">
                    <h3>📦 Gestionar productos</h3>
                    <p>Agrega, edita o elimina productos. Controla tu inventario en tiempo real.</p>
                </a>
                <a href="{{ route('facturas.create') }}" class="module-card">
                    <h3>📄 Nueva factura</h3>
                    <p>Crea facturas con IVA (16%) y descuento automático de stock.</p>
                </a>
                <a href="{{ route('facturas.index') }}" class="module-card">
                    <h3>📑 Facturas emitidas</h3>
                    <p>Consulta el historial y descarga tus facturas en PDF.</p>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>Desarrollado por <strong>Emily Morgado 💜</strong> | Sistema de Facturación para Venezuela</p>
    </footer>

</body>
</html>