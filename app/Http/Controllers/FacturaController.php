<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Factura;
use App\Models\FacturaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class FacturaController extends Controller
{
    public function index(Request $request)
    {
        $query = Factura::with('cliente', 'user');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('numero', 'like', "%{$search}%")
                ->orWhereHas('cliente', function ($q) use ($search) {
                    $q->where('nombre', 'like', "%{$search}%");
                });
        }

        $facturas = $query->latest()->paginate(10)->appends(['search' => $request->search]);

        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        return view('facturas.create', compact('clientes', 'productos'));
    }

    public function store(Request $request)
    {// Parsear el campo 'productos' si viene como JSON
    if (is_string($request->productos)) {
        $request->merge(['productos' => json_decode($request->productos, true)]);
    }

        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'productos' => 'required|array|min:1',
            'productos.*.id' => 'required|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        $cliente = Cliente::findOrFail($request->cliente_id);
        $productosInput = $request->productos;

        // Validar stock antes de proceder
        foreach ($productosInput as $item) {
            $producto = Producto::findOrFail($item['id']);
            if ($producto->stock < $item['cantidad']) {
                return back()->withErrors("Stock insuficiente para: {$producto->nombre}");
            }
        }

        DB::beginTransaction();
        try {
            $subtotal = 0;
            $items = [];

            foreach ($productosInput as $item) {
                $producto = Producto::findOrFail($item['id']);
                $precio = $producto->precio;
                $cantidad = $item['cantidad'];
                $totalItem = $precio * $cantidad;

                $subtotal += $totalItem;
                $items[] = [
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $precio,
                    'total' => $totalItem,
                ];

                // Reducir stock
                $producto->decrement('stock', $cantidad);
            }

            $iva = $subtotal * 0.16; // IVA 16% Venezuela
            $total = $subtotal + $iva;

            $factura = Factura::create([
                'numero' => Factura::generarNumero(),
                'user_id' => auth()->id(),
                'cliente_id' => $cliente->id,
                'fecha' => now()->toDateString(),
                'subtotal' => $subtotal,
                'iva' => $iva,
                'total' => $total,
            ]);

            foreach ($items as $itemData) {
                $factura->items()->create($itemData);
            }

            DB::commit();

            // Redirigir al PDF
            return redirect()->route('facturas.pdf', $factura);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error al crear la factura.');
        }
    }

    public function pdf(Factura $factura)
{
    // Obtener una instancia del servicio desde el contenedor
    $pdf = app(PDF::class);
    
    $pdf->loadView('facturas.pdf', compact('factura'))
        ->setPaper('a4')
        ->setOptions([
            'margin-top' => 5,
            'margin-bottom' => 5,
            'margin-left' => 10,
            'margin-right' => 10,
        ]);

    return $pdf->stream("Factura_{$factura->numero}.pdf");
}
}