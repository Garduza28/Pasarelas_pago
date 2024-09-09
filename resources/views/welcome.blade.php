<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacciones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <h1>Consulta de Transacciones</h1>
        <a href="{{ route('payment.transactions') }}" class="btn btn-mercado-pago">Ver Transacciones Mercado Pago</a>
        <a href="{{ route('transactions.index') }}" class="btn btn-openpay">Ver Transacciones Openpay</a>
    </div>
</body>
</html>
