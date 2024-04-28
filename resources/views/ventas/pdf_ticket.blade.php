<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket de Venta #{{ $venta->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(239, 221, 221);
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        h2 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        h3 {
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd;
            background-color: #fff; 
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f0a5db53;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        p {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
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
