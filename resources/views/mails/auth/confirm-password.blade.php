<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Dirección de Correo Electrónico</title>
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
            background-color: #f7952e;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .content a:hover {
            background-color: #e5831c;
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
            <img src="https://www.emagister.com/blog/wp-content/uploads/2022/05/GettyImages-1211154399.jpg" alt="Mecánicos trabajando en un auto">
        </div>
        
        <!-- Contenido principal -->
        <div class="content">
            <h1>BIENVENIDO A SEAVS</h1>
            <p>Haga clic en el botón a continuación para verificar su dirección de correo electrónico.</p>
            <a href="{{ $url }}">Click aquí</a>
        </div>
        
        <!-- Pie de página con instrucción alternativa -->
        <div class="footer">
            <p>Si tiene problemas para hacer clic en el botón "Verificar Dirección de Correo Electrónico",</p>
            <p>copie y pegue la URL a continuación en su navegador web:</p>
            <a href="{{ $url }}">{{ $url }}</a>
        </div>
    </div>

</body>
</html>
