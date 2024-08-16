<!DOCTYPE html>
<html>
<head>
    <title>Notificación de Vehículo</title>
</head>
<body>
    <h1>Notificación de Vehículo</h1>
    <p>Estimado/a {{ $vehiculo->cliente->nombre }},</p>
    <p>Le informamos que el proceso de su vehículo {{ $vehiculo->marca }} {{ $vehiculo->modelo }} con placa {{ $vehiculo->placa }} ha finalizado.</p>
    <p>El estado actual del vehículo es: Finalizado</p>
    <p>Agradecemos su confianza en nuestros servicios.</p>
</body>
</html>
