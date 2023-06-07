<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Pedido</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .order-details {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-details h2 {
            color: #333;
            font-size: 18px;
        }

        .order-details p {
            margin: 0;
            padding: 0;
            font-size: 16px;
        }

        .order-details .item {
            margin-bottom: 10px;
        }

        .order-details .item .name {
            font-weight: bold;
        }

        .order-details .item .quantity {
            color: #777;
        }

        .order-details .item .price {
            color: #555;
        }

        .order-details .total {
            margin-top: 10px;
        }

        .order-details .total .label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Detalles del Pedido</h1>

    <div class="order-details">
        <h2>Información del Pedido</h2>
        <p><strong>Número de Pedido:</strong> {{ $order->order_number }}</p>
        <p><strong>Fecha:</strong> {{ $order->created_at }}</p>
        <!-- Agrega más detalles del pedido según tus necesidades -->

        <h2>Productos</h2>
        @foreach($order->items as $item)
            <div class="item">
                <p class="name">{{ $item->product_name }}</p>
                <p class="quantity">Cantidad: {{ $item->quantity }}</p>
                <p class="price">Precio Unitario: {{ $item->price }}</p>
            </div>
        @endforeach

        <div class="total">
            <p class="label">Total del Pedido:</p>
            <p>{{ $order->total }}</p>
        </div>
    </div>
</body>
</html>