<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva factura | FactuVE</title>
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

        .input-group select,
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

        .input-group select:focus,
        .input-group input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

        /* Tabla de productos */
        .items-table {
            width: 100%;
            margin: 1.5rem 0;
            border-collapse: collapse;
        }

        .items-table th {
            background-color: #f1f5f9;
            padding: 0.75rem;
            text-align: left;
            font-weight: 600;
            color: #334155;
            font-size: 0.875rem;
        }

        .items-table td {
            padding: 0.75rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .items-table input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
        }

        .btn-add {
            background: #dcfce7;
            color: #166534;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
        }

        .btn-add:hover {
            background: #bbf7d0;
        }

        .btn-remove {
            background: #fee2e2;
            color: #b91c1c;
            border: none;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Totales */
        .totals {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 1.125rem;
        }

        .totals-row.total {
            font-weight: 700;
            color: #1e293b;
            font-size: 1.25rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
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
            <h2>Nueva factura</h2>

            @if($errors->any())
                <div class="alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="facturaForm" action="{{ route('facturas.store') }}" method="POST">
                @csrf

                <div class="input-group">
                    <label for="cliente_id">Cliente</label>
                    <select name="cliente_id" id="cliente_id" required>
                        <option value="">Selecciona un cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }} ({{ $cliente->rif }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group">
                    <label>Agregar producto</label>
                    <select id="productoSelector">
                        <option value="">Selecciona un producto</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id }}" 
                                    data-precio="{{ $producto->precio }}"
                                    data-stock="{{ $producto->stock }}"
                                    data-nombre="{{ $producto->nombre }}">
                                {{ $producto->codigo }} - {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                            </option>
                        @endforeach
                    </select>
                    <button type="button" class="btn-add" onclick="agregarProducto()">➕ Agregar a la factura</button>
                </div>

                <table class="items-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="itemsContainer">
                        <!-- Los productos se agregarán aquí dinámicamente -->
                    </tbody>
                </table>

                <input type="hidden" name="productos" id="productosInput">

                <div class="totals">
                    <div class="totals-row">
                        <span>Subtotal:</span>
                        <span id="subtotal">Bs 0,00</span>
                    </div>
                    <div class="totals-row">
                        <span>IVA (16%):</span>
                        <span id="iva">Bs 0,00</span>
                    </div>
                    <div class="totals-row total">
                        <span>Total:</span>
                        <span id="total">Bs 0,00</span>
                    </div>
                </div>

                <div class="form-buttons" style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                    <a href="{{ route('facturas.index') }}" class="btn-secondary">Cancelar</a>
                    <button type="submit" class="btn-primary">Generar factura</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        let items = [];

        function agregarProducto() {
            const select = document.getElementById('productoSelector');
            const option = select.options[select.selectedIndex];
            if (!option.value) return;

            const id = option.value;
            const nombre = option.getAttribute('data-nombre');
            const precio = parseFloat(option.getAttribute('data-precio'));
            const stock = parseInt(option.getAttribute('data-stock'));

            if (items.some(item => item.id == id)) {
                alert('Este producto ya está en la factura.');
                return;
            }

            if (stock <= 0) {
                alert('No hay stock disponible para este producto.');
                return;
            }

            const cantidad = 1;

            items.push({
                id: id,
                nombre: nombre,
                cantidad: cantidad,
                precio: precio,
                total: precio * cantidad
            });

            renderItems();
            actualizarTotales();
            select.selectedIndex = 0;
        }

        function eliminarProducto(index) {
            items.splice(index, 1);
            renderItems();
            actualizarTotales();
        }

        function actualizarCantidad(index, nuevaCantidad) {
            const item = items[index];
            const productoOption = [...document.querySelectorAll('#productoSelector option')].find(opt => opt.value == item.id);
            const stockMax = parseInt(productoOption.getAttribute('data-stock'));

            if (nuevaCantidad < 1) nuevaCantidad = 1;
            if (nuevaCantidad > stockMax) nuevaCantidad = stockMax;

            item.cantidad = nuevaCantidad;
            item.total = item.precio * nuevaCantidad;

            renderItems();
            actualizarTotales();
        }

        function renderItems() {
            const container = document.getElementById('itemsContainer');
            container.innerHTML = '';

            items.forEach((item, index) => {
                const productoOption = [...document.querySelectorAll('#productoSelector option')].find(opt => opt.value == item.id);
                const stockMax = parseInt(productoOption.getAttribute('data-stock'));

                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.nombre}</td>
                    <td>
                        <input type="number" min="1" max="${stockMax}" value="${item.cantidad}" 
                               onchange="actualizarCantidad(${index}, this.value)">
                    </td>
                    <td>Bs ${item.precio.toLocaleString('es-VE', { minimumFractionDigits: 2 })}</td>
                    <td>Bs ${item.total.toLocaleString('es-VE', { minimumFractionDigits: 2 })}</td>
                    <td><button type="button" class="btn-remove" onclick="eliminarProducto(${index})">🗑️</button></td>
                `;
                container.appendChild(row);
            });

            // Actualizar input oculto
            document.getElementById('productosInput').value = JSON.stringify(items);
        }

        function actualizarTotales() {
            const subtotal = items.reduce((sum, item) => sum + item.total, 0);
            const iva = subtotal * 0.16;
            const total = subtotal + iva;

            document.getElementById('subtotal').textContent = `Bs ${subtotal.toLocaleString('es-VE', { minimumFractionDigits: 2 })}`;
            document.getElementById('iva').textContent = `Bs ${iva.toLocaleString('es-VE', { minimumFractionDigits: 2 })}`;
            document.getElementById('total').textContent = `Bs ${total.toLocaleString('es-VE', { minimumFractionDigits: 2 })}`;
        }
    </script>

</body>
</html>