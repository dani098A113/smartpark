<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JohnDoe landing page.">
    <meta name="author" content="Devcrud">
    <title>Smart Park/Pago</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/johndoe.css">
    <link rel="stylesheet" href="">
    <link rel="icon" href="images/preview (1).webp" type="image/x-icon">
    <style>
        body {
            
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            
            
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
    </style>
</head>
<body>
    <div class="container">
        <img src="images/cred2.png" width="560px" height="300px">
        <h2><strong>Asocie su tarjeta de credito o debito</strong></h2>
        <form id="loginForm" action="login.php" method="POST">
            <label for="username">Numero</label><br>
            <input type="number" id="username" name="username" required><br><br>
            <label for="username">Nombre y apellido</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="username">Vencimiento</label>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ<label for="username">Codigo de seguridad</label><br>
            <input type="date" id="username" name="username" required>ㅤㅤㅤㅤㅤㅤㅤㅤㅤ<input type="number" id="username" name="username" required>
            <br><br><center>
            <a class="btn btn-primary btn-rounded w-lg" href="recibo.php">Pagar</a></center>
            
</form>
    </div>

</body>
</html>