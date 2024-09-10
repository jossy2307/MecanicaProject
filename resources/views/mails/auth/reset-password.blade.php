<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
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
            background-color: #f4f7fa;
            padding: 20px;
            text-align: center;
        }

        .header img {
            width: 100%;
            max-width: 400px;
            height: auto;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .content h1 {
            font-size: 24px;
            color: #333333;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            color: #666666;
            margin-bottom: 20px;
        }

        .content a {
            background-color: #1d4ed8;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .content a:hover {
            background-color: #2563eb;
        }

        .footer {
            background-color: #f4f7fa;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #666666;
        }

        .footer p {
            margin-bottom: 5px;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Cabecera con imagen -->
        <div class="header">
            <img src="https://img.freepik.com/vector-gratis/hombre-negocios-llave-coche-mujer-escudo-coche-candado-sistema-alarma-coche-sistema-antirrobo-concepto-estadisticas-robos-vehiculos_335657-2207.jpg" alt="Imagen de seguridad para restablecer contraseña">
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h1>Restablecer Contraseña</h1>
            <p>Estás recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.</p>
            <a href="{{ $url }}">Restablecer Contraseña</a>
            <p>Este enlace para restablecer la contraseña expirará en 60 minutos.</p>
            <p>Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna acción adicional.</p>
        </div>

        <!-- Pie de página con instrucción alternativa -->
        <div class="footer">
            <p>Si tienes problemas para hacer clic en el botón "Restablecer Contraseña",</p>
            <p>copia y pega la URL a continuación en tu navegador web:</p>
            <a href="{{ $url }}">{{ $url }}</a>
        </div>
    </div>

</body>

</html>
