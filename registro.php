<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include "modelos/conexion.php";

// Registrar un nuevo cliente
if (isset($_POST['btnregistrar'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $fecha = $_POST['fecha'];
    $correo = $_POST['correo'];

    // Insertar nuevo registro
    $sql = $conexion->query("INSERT INTO persona (nombre, apellido, dni, fecha_nacimiento, correo) 
                             VALUES ('$nombre', '$apellido', '$dni', '$fecha', '$correo')");
    if ($sql) {
        echo "<p class='alert alert-success text-center'>Cliente registrado correctamente.</p>";
    } else {
        echo "<p class='alert alert-danger text-center'>Error al registrar el cliente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Light Blue */
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .container {
            margin-top: 100px;
        }

        .card {
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }

        .card-header {
            background-color: #ffffff;
            text-align: center;
        }

        h3 {
            color: #2196f3; /* Light Blue */
        }

        .form-label {
            color: #333;
        }

        .form-control {
            border-radius: 25px;
            padding: 15px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #2196f3; /* Light Blue */
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #1976d2;
        }

        .alert {
            border-radius: 25px;
            padding: 15px;
            margin-top: 15px;
        }

        .alert-danger {
            background-color: #f44336;
            color: white;
        }

        .alert-success {
            background-color: #4caf50;
            color: white;
        }

        .alert-info {
            background-color: #2196f3;
            color: white;
        }

        .alert:focus {
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
        }
    </style>
</head>
<body>

<nav class="navbar">
    <form class="container-fluid justify-content-end">
        <a href="index.php" class="btn btn-primary me-2" type="button" name="btn-home">Inicio</a>
        <a href="logout.php" class="btn btn-primary bg-danger me-2" type="button">
            <span class="mdi mdi-logout-variant"></span> Cerrar sesión
        </a>
    </form>
</nav>

<div class="container">
    <div class="card col-md-6 mx-auto p-4">
        <div class="card-header">
            <h3>REGISTRO DE CLIENTES</h3>
        </div>
        <form method="POST">
            <div class="mb-3 mt-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" id="apellido" required>
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" id="dni" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha" id="fecha" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" id="correo" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="btnregistrar">Registrar Cliente</button>
        </form>
    </div>
</div>

<script>
    // Ocultar las alertas después de 4 segundos
    const alertas = document.querySelectorAll('.alert');
    alertas.forEach(alerta => {
        setTimeout(() => {
            alerta.style.display = 'none';
        }, 4000);
    });
</script>

</body>
</html>
