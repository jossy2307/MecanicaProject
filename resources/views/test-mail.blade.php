<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Vehículo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .header {
            text-align: center;
            background-color: #f4f7fa;
            padding: 20px;
        }

        .header img {
            width: 100%;
            max-width: 500px;
            height: auto;
        }

        .content {
            padding: 20px;
        }

        .content h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 20px;
            text-align: center;
        }

        .content p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 15px;
        }

        .content strong {
            color: #333333;
        }

        .footer {
            background-color: #f4f7fa;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Cabecera con imagen -->
        <div class="header">
            <img src="https://img.freepik.com/vector-premium/ilustracion-vector-plano-inspeccion-tecnica-coche-empleado-dibujos-animados-reparando-o-inspeccionando-automovil-mientras-propietario-marca-elementos-lista-gigante-diagnostico-reparacion-concepto-mantenimiento-diseno-banner_179970-5969.jpg" alt="Inspección del vehículo">
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h1>Notificación de Vehículo</h1>
            <p>Estimado/a <strong>{{ $vehiculo->cliente->nombre }}</strong>,</p>
            <p>Le informamos que el proceso de su vehículo <strong>{{ $vehiculo->marca->nombre }} {{ $vehiculo->modelo->nombre }}</strong> con placa <strong>{{ $vehiculo->placa }}</strong> ha cambiado de estado.</p>
            <p>El estado anterior del vehículo era: <strong>{{ $estadoAnterior }}</strong></p>
            <p>El nuevo estado del vehículo es: <strong>{{ $estadoNuevo }}</strong></p>
            <br>
        </div>

        <!-- Pie de página -->
        <div class="footer">
            <p>Gracias por confiar en nosotros.</p>
        </div>
    </div>

</body>

</html>
