<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Formulaire de Transactions</h1>
    <p>Date : {{ date('d/m/Y') }}</p>
    @if (!$empty)
        

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom </th>
                <th>Numero de Compte</th>
                <th>Montant (€)</th>
                <th>Date</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction['type'] }}</td>
                    <td>{{ $transaction['other_name'] }}</td>
                    <td>{{ $transaction['other_account_number'] }}</td>
                    <td>{{ number_format($transaction['amount'], 2, ',', ' ') }}</td>
                    <td>{{ $transaction['date'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else

    No transaction yet
        
    @endif
</body>
</html>
