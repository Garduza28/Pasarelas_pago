<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago Completado</title>
    <link rel="stylesheet" href="{{ asset('css/completed.css') }}">
    <style>
 
    </style>
</head>
<body>
    <div class="receipt-container">
        <div class="receipt-header">
        
            <h2>{{ $charge->customer->name }} {{ $charge->customer->last_name }}</h2> 
        </div>
        <div class="payment-details">
            <p class="success-message">El pago se realizó exitosamente</p>
            <p>{{ \Carbon\Carbon::parse($charge->operation_date)->format('d F Y, h:i a') }}</p> 
            <p class="amount">${{ number_format($charge->amount, 2) }} MXN</p> 
        </div>
        <div class="card-details">
            <p><strong>Número de tarjeta:</strong> **** **** **** {{ substr($charge->card->card_number, -4) }}</p> 
            <p><strong>Banco:</strong> {{ $charge->card->bank_name }}</p> 
            <p><strong>Tipo de tarjeta:</strong> {{ $charge->card->type }}</p> 
            <p><strong>ID de transacción:</strong> {{ $charge->id }}</p>
            <p><strong>Número de autorización:</strong> {{ $charge->authorization }}</p>
        </div>
        <div class="footer">
            <p><strong>Tarifa:</strong> ${{ number_format($charge->fee->amount, 2) }} MXN (Impuestos: ${{ number_format($charge->fee->tax, 2) }} MXN)</p>
            <p><strong>Descripción:</strong> {{ $charge->description }}</p> 
        </div>

        
        <a href="/" class="btn">Volver al Inicio</a>
    </div>
</body>
</html>
