<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facturas | FactuVE</title>
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

        /* Main */
        main {
            padding: 2rem;
        }

        .page-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 2rem;
        }

        .page-card h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-primary {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            font-weight: 600;
            color: #475569;
            font-size: 0.875rem;
            text-transform: uppercase;
        }

        td {
            color: #1e293b;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        .action-links a {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            text-decoration: none;
            padding: 0.4rem 0.75rem;
            border-radius: 6px;
            font-weight: 600;
            font-size: 0.8125rem;
            display: inline-block;
            transition: all 0.2s ease;
        }

        .action-links a:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
        }

        /* Alertas */
        .alert-success {
            background-color: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: #64748b;
        }

        /* Paginación */
        .pagination {
            margin-top: 1.5rem;
            display: flex;
            justify-content: center;
            gap: 0.25rem;
        }

        .pagination a,
        .pagination span {
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .pagination a {
            color: #3b82f6;
            border: 1px solid #cbd5e1;
        }

        .pagination a:hover {
            background-color: #f1f5f9;
        }

        .pagination .active span {
            background-color: #3b82f6;
            color: white;
            border: 1px solid #3b82f6;
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

            .page-card {
                padding: 1.5rem;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #e2e8f0;
            }

            td:before {
                content: attr(data-label) ": ";
                position: absolute;
                left: 1rem;
                width: 45%;
                font-weight: 600;
                color: #475569;
            }

            .action-links {
                display: flex;
                justify-content: flex-end;
                margin-top: 0.5rem;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit;">
            <h1>FactuVE</h1>
        </a>
        <div class="user-info">
            <span>{{ Auth::user()->email }}</span>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Cerrar sesión</button>
            </form>
        </div>
    </header>

    <!-- Main -->
    <main>
        <!-- Subheader: menú de módulos + buscador -->
        <div style="padding: 0 2rem; margin-bottom: 1.5rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; background: white; padding: 1rem; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); flex-wrap: wrap; gap: 1rem;">
                
                <!-- Navegación -->
                <div style="display: flex; gap: 1rem; overflow-x: auto; padding-bottom: 0.5rem; white-space: nowrap;">
                    <a href="{{ route('clientes.index') }}" style="text-decoration: none;">
                        <div style="background: #f0f9ff; color: #0c4a6e; padding: 0.5rem 1.25rem; border-radius: 8px; font-weight: 600;">
                            👥 Clientes
                        </div>
                    </a>
                    <a href="{{ route('productos.index') }}" style="text-decoration: none;">
                        <div style="background: #f0f9ff; color: #0c4a6e; padding: 0.5rem 1.25rem; border-radius: 8px; font-weight: 600;">
                            📦 Productos
                        </div>
                    </a>
                    <a href="{{ route('facturas.index') }}" style="text-decoration: none;">
                        <div style="background: #dbeafe; color: #1d4ed8; padding: 0.5rem 1.25rem; border-radius: 8px; font-weight: 600;">
                            📄 Facturas
                        </div>
                    </a>
                </div>

                <!-- Buscador -->
                <form method="GET" style="display: flex; gap: 0.5rem; min-width: 240px;">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Buscar por número o cliente..."
                        style="flex: 1; padding: 0.5rem 1rem; border: 1px solid #cbd5e1; border-radius: 8px; background-color: #f8fafc; font-size: 0.875rem; color: #1e293b;"
                    >
                    <button type="submit" style="background: #3b82f6; color: white; border: none; padding: 0 1rem; border-radius: 8px; font-weight: 600; cursor: pointer;">
                        🔍
                    </button>
                </form>
            </div>
        </div>
        <div class="page-card">
            <h2>
                Facturas emitidas
                <a href="{{ route('facturas.create') }}" class="btn-primary">📄 Nueva factura</a>
            </h2>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($facturas->isEmpty())
                <div class="empty-state">
                    <p>No hay facturas registradas.</p>
                </div>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facturas as $factura)
                        <tr>
                            <td data-label="Número">{{ $factura->numero }}</td>
                            <td data-label="Cliente">{{ $factura->cliente->nombre }}</td>
                            <td data-label="Fecha">{{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}</td>
                            <td data-label="Total">Bs {{ number_format($factura->total, 2, ',', '.') }}</td>
                            <td data-label="Acciones" class="action-links">
                                <a href="{{ route('facturas.pdf', $factura) }}" target="_blank">📄 Ver PDF</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $facturas->links() }}
                </div>
            @endif
        </div>
    </main>

</body>
</html>