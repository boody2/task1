<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{$Subject}}</title>
</head>
<body>
    <h1>Invoice #{{ $invoiceNumber }}</h1>
    <p>Your invoice has been <strong>{{ $status }}</strong>.</p>
    <p>The current time is: {{ $currentTime }}</p>
    <br>
    <p>Thanks,</p>
    <p>Abdelrahman Talaat Ali.</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>
