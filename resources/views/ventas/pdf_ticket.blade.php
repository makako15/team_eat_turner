<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Venta #{{ $venta->id }}</title>
    <style>
        body {
             font-family: 'DejaVu Sans', sans-serif;
         }
        .table { 
            width: 100%; 
            border-collapse: collapse; 
        }
        .table th, .table td {
             border: 1px solid black; 
             padding: 8px; 
             text-align: left;
             }
    </style>
</head>
<body>
    <h1><small>Team Eat Turner</small></h1>
    <h2>¡Gracias por su compra!</h2>
    <h3>Ticket de Venta #{{ $venta->id }}</h3>
    <p>Fecha: {{ $venta->created_at->format('Y-m-d') }}</p>
    <p>Cliente: {{ $venta->usuario->name }}</p>
    <table class="table">
        <thead>
            <tr>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta->productos as $producto)
                <tr>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>${{ number_format($producto->cantidad * $producto->precio, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total: ${{ number_format($venta->productos->sum(function($prod) { return $prod->cantidad * $prod->precio; }), 2) }}</h3>
</body>
</html>
