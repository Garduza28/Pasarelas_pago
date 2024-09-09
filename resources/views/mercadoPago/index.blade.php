<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transacciones y Pago</title>
    <link rel="stylesheet" href="{{ asset('css/indexmercado.css') }}">
    <!-- SDK de Mercado Pago -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>

    <h1>Transacciones de Mercado Pago</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Creación</th>
                    <th>Fecha Aprobación</th>
                    <th>Estado</th>
                    <th>Tipo de Pago</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
@php
    $recentTransaction = collect($transactions)->sortByDesc('date_created')->first();
@endphp
                @foreach($transactions as $transaction)
                    <tr class="{{ $transaction['id'] == $recentTransaction['id'] ? 'recent-payment' : '' }}">
                        <td>{{ $transaction['id'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction['date_created'])->format('d-m-Y H:i:s') }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction['date_approved'])->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $transaction['status'] }}</td>
                        <td>{{ $transaction['payment_type_id'] }}</td>
                        <td>${{ number_format($transaction['transaction_amount'], 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div class="payment-container">
        <h1>Realiza un Pago con Mercado Pago</h1>
        <div id="wallet_container"></div>
        <a href="/" class="btn">Volver al Inicio</a>
    </div>

    <script>
        const mp = new MercadoPago('TEST-0df9e80e-3d38-4ece-aa64-09447a4a97c6');

        // Obtener la preferencia del backend
        fetch('/create-preference')
            .then(response => response.json())
            .then(data => {
                // Renderizar el botón de pago con la preferencia creada
                mp.bricks().create('wallet', 'wallet_container', {
                    initialization: {
                        preferenceId: data.preference_id,
                    },
                    customization: {
                        texts: {
                            valueProp: 'Opción Inteligente de Pago',
                        },
                    },
                });
            });
    </script>

</body>
</html>
