<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Factura {{ $factura->numero }}</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            color: #1e293b;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #3b82f6;
            padding-bottom: 10px;
        }
        .header h1 {
            font-size: 24px;
            color: #1e293b;
            margin: 0;
        }
        .info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #cbd5e1;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f1f5f9;
        }
        .totals {
            margin-left: auto;
            width: 250px;
        }
        .totals div {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }
        .totals .total {
            font-weight: bold;
            border-top: 1px solid #000;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>FactuVE</h1>
    <p>Sistema de Facturación - Venezuela</p>
</div>

<div class="info">
    <div>
        <strong>Factura N°:</strong> {{ $factura->numero }}<br>
        <strong>Fecha:</strong> {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y') }}
    </div>
    <div>
        <strong>Cliente:</strong> {{ $factura->cliente->nombre }}<br>
        <strong>RIF:</strong> {{ $factura->cliente->rif }}
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($factura->items as $item)
        <tr>
            <td>{{ $item->producto->nombre }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>Bs {{ number_format($item->precio_unitario, 2, ',', '.') }}</td>
            <td>Bs {{ number_format($item->total, 2, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="totals">
    <div>
        <span>Subtotal:</span>
        <span>Bs {{ number_format($factura->subtotal, 2, ',', '.') }}</span>
    </div>
    <div>
        <span>IVA (16%):</span>
        <span>Bs {{ number_format($factura->iva, 2, ',', '.') }}</span>
    </div>
    <div class="total">
        <span><strong>Total:</strong></span>
        <span><strong>Bs {{ number_format($factura->total, 2, ',', '.') }}</strong></span>
    </div>
</div>

</body>
</html>