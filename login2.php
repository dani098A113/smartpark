<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control_parqueo"; // Asegúrate de que el nombre sea correcto

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM clientes WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['cliente_id'] = $row['id'];
            header("Location: Nivel2/menunivelesl.php");
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró una cuenta con ese correo.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with JohnDoe landing page.">
    <meta name="author" content="Devcrud">
    <title>Smart Park/USUARIO</title>
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/johndoe.css">
    <link rel="stylesheet" href="">
    <link rel="icon" href="../images/preview (1).webp" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 180px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <form method="post">
        <h2><center><strong> USUARIO</strong></center></h2><center>
        <label for="correo">Correo o nombre:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        </center>
        <center>
        <button class="btn btn-primary btn-rounded w-lg" type="submit">Iniciar Sesión</button></center>
        <br>
        <div><h7><center>Si eres usuario nuevo REGISTRATE</center></h7>
        <br>
        <center><a href="../registro.php">Registro</a></center></div>
    </form>
</body>
</html>
