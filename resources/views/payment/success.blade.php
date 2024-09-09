<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Exitoso</title>
    <link rel="stylesheet" href="{{ asset('css/success.css') }}">
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            <h2>Pago Exitoso</h2>
        </div>
        <div class="payment-details">
            @if(isset($data['message']))
                <p class="success-message">{{ $data['message'] }}</p>
            @else
                <p>Estado del pago no disponible.</p>
            @endif
            @if(isset($data['details']))
                <p><strong>ID de colección:</strong> {{ $data['details']['collection_id'] ?? 'No disponible' }}</p>
                <p><strong>ID de pago:</strong> {{ $data['details']['payment_id'] ?? 'No disponible' }}</p>
                <p><strong>Estado:</strong> {{ $data['details']['status'] ?? 'No disponible' }}</p>
                <p><strong>Tipo de pago:</strong> {{ $data['details']['payment_type'] ?? 'No disponible' }}</p>
                <p><strong>ID de preferencia:</strong> {{ $data['details']['preference_id'] ?? 'No disponible' }}</p>
                <p><strong>ID de orden de comerciante:</strong> {{ $data['details']['merchant_order_id'] ?? 'No disponible' }}</p>
            @else
                <p>Detalles del pago no disponibles.</p>
            @endif
        </div>
        <div class="footer">
            <p>Gracias por tu compra. Si tienes alguna duda, contacta con nuestro soporte.</p>
        </div>
        <a href="/" class="btn">Volver al Inicio</a>
    </div>
    
</body>
</html>
