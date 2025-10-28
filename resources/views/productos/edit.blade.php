<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto | FactuVE</title>
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

        .form-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
            padding: 2rem;
        }

        .form-card h2 {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1e293b;
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

        /* Botones */
        .btn-secondary {
            background: white;
            color: #334155;
            border: 1px solid #cbd5e1;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #f1f5f9;
        }

        .btn-primary {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
        }

        /* Alertas */
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

            .form-card {
                padding: 1.5rem;
            }

            .form-buttons {
                flex-direction: column;
                gap: 0.75rem;
            }

            .form-buttons .btn-secondary {
                width: 100%;
                text-align: center;
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
        <div class="form-card">
            <h2>Editar producto</h2>

            @if($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.update', $producto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="input-group">
                    <label for="codigo">Código</label>
                    <input type="text" id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}" placeholder="Ej: LAPTOP-HP-001" required>
                    <p class="mt-1 text-sm text-gray-500">Código único para identificar el producto</p>
                </div>

                <div class="input-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" placeholder="Ej: Laptop HP Pavilion" required>
                </div>

                <div class="input-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" placeholder="Opcional">
                </div>

                <div class="input-group">
                    <label for="precio">Precio (Bs)</label>
                    <input type="number" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" step="0.01" min="0" required>
                </div>

                <div class="input-group">
                    <label for="stock">Stock actual</label>
                    <input type="number" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" min="0" required>
                    <p class="mt-1 text-sm text-gray-500">El stock se ajustará al guardar. No se puede vender más de lo disponible.</p>
                </div>

                <div class="form-buttons" style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                    <a href="{{ route('productos.index') }}" class="btn-secondary">Cancelar</a>
                    <button type="submit" class="btn-primary">Actualizar producto</button>
                </div>
            </form>
        </div>
    </main>

</body>
</html>