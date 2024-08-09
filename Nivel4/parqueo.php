<?php
session_start();

if (!isset($_SESSION['cliente_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "control_parqueo"; // Asegúrate de que el nombre sea correcto

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Registrar entrada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entrada'])) {
    $placa = $_POST['placa'];
    $tipo_vehiculo = $_POST['tipo_vehiculo'];
    $hora_entrada = date("Y-m-d H:i:s");

    $sql = "INSERT INTO parqueos (cliente_id, placa, tipo_vehiculo, hora_entrada) VALUES ('{$_SESSION['cliente_id']}', '$placa', '$tipo_vehiculo', '$hora_entrada')";

    if ($conn->query($sql) === TRUE) {
        echo "Parqueo registrado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Registrar salida y calcular costo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salida'])) {
    $placa = $_POST['placa'];
    $hora_salida = date("Y-m-d H:i:s");

    // Obtener la hora de entrada
    $sql = "SELECT hora_entrada FROM parqueos WHERE placa = '$placa' AND hora_salida IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hora_entrada = $row['hora_entrada'];

        // Calcular el costo (ejemplo: $1 por hora)
        $entrada = new DateTime($hora_entrada);
        $salida = new DateTime($hora_salida);
        $interval = $entrada->diff($salida);
        $horas = $interval->h + ($interval->days * 24);
        $costo = $horas * 1; // Suponiendo $1 por hora

        // Actualizar la hora de salida y el costo
        $sql = "UPDATE parqueos SET hora_salida = '$hora_salida', costo = '$costo' WHERE placa = '$placa' AND hora_salida IS NULL";

        if ($conn->query($sql) === TRUE) {
            echo "Salida registrada. Costo: $" . $costo;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "No se encontró un parqueo en curso para esta placa.";
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
    <title>Smart Park/Placas</title>
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
        form {
            background-color: #fff;
            padding: 180px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<center> <form method="post">
        <h2><strong>Registro de Vehiculos</strong></h2>
        <label for="placa">Número de Placa:</label><br>
        <input type="text" id="placa" name="placa" required><br><br>
        <label for="tipo_vehiculo">Tipo de Vehículo:</label><br>
        <input type="text" id="tipo_vehiculo" name="tipo_vehiculo" required><br><br>
        <button type="submit" name="entrada" class="btn btn-primary btn-rounded w-lg">Registrar</button>
        <br><br>
        <center><a href="formapago.php"><h1></h1>Siguiente</a></center>
    </form></center>
   
</body>
</html>
