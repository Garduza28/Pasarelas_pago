<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/indexopenpay.css') }}">
    <title>Transacciones y Pago</title>
</head>
<body>
    <h1>Transacciones de Openpay</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha Creación</th>
                    <th>Estatus</th>
                    <th>Método de Pago</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $recentTransaction = collect($transactions)->sortByDesc('creation_date')->first();
                @endphp
                @foreach($transactions as $transaction)
                    <tr class="{{ $transaction->id == $recentTransaction->id ? 'recent-payment' : '' }}">
                        <td>{{ $transaction->id }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction->creation_date)->format('d-m-Y H:i:s') }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->method }}</td>
                        <td>${{ number_format($transaction->amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-container">
        <h2>Realiza un Pago con Openpay</h2>
        <form id="payment-form" action="{{ route('create.charge') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="text" name="last_name" placeholder="Apellido" required>
            <input type="text" name="phone_number" placeholder="Teléfono" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="amount" placeholder="Cantidad" required>
            <button type="submit">Pagar</button>
        </form>

       
    </div>
    <center> <a href="/" class="btn">Volver al Inicio</a>  </center>
</body>
</html>
