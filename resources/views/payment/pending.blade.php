<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Pendiente</title>
    <link rel="stylesheet" href="{{ asset('css/pending.css') }}">
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
            
            <h2>Pago Pendiente</h2>
        </div>
        <div class="payment-details">
            <p class="status-message">{{ $data['message'] }}</p>
            @if(isset($data['details']))
                <p><strong>ID de colección:</strong> {{ $data['details']['collection_id'] }}</p>
                <p><strong>ID de pago:</strong> {{ $data['details']['payment_id'] }}</p>
                <p><strong>Estado:</strong> {{ $data['details']['status'] }}</p>
                <p><strong>Tipo de pago:</strong> {{ $data['details']['payment_type'] }}</p>
                <p><strong>ID de preferencia:</strong> {{ $data['details']['preference_id'] }}</p>
                <p><strong>ID de orden de comerciante:</strong> {{ $data['details']['merchant_order_id'] }}</p>
            @else
                <p>Detalles del pago no disponibles.</p>
            @endif
        </div>
        <div class="footer">
            <p>Por favor, espera mientras procesamos tu pago. Si tienes alguna duda, contacta con nuestro soporte.</p>
        </div>
        <a href="{{ url('/payment/download-pdf') }}" class="download-btn">Descargar PDF</a>
        <a href="/" class="btn">Volver al Inicio</a>
    </div>
  
</body>
</html>
