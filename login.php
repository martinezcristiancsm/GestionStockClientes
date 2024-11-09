<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Light Blue */
            font-family: 'Roboto', sans-serif;
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

        h2 {
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

<div class="container">
    <div class="card col-md-4 offset-md-4">
        <div class="card-header">
            <h2>Login de Empleados</h2>
        </div>
        <form action="login.php" method="POST">
            <div class="mb-3 mt-4">
                <label for="username" class="form-label">Nombre de usuario</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="btnlogin" class="btn btn-primary w-100">Ingresar</button>
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

<?php
session_start();
include "modelos/conexion.php";

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // usuario
    $sql = $conexion->query("SELECT * FROM usuarios WHERE username = '$username'");
    if ($sql->num_rows > 0) {
        $usuario = $sql->fetch_object();

        // pw
        if (password_verify($password, $usuario->password)) {
            $_SESSION['usuario'] = $usuario->username;
            header("Location: index.php");
        } else {
            echo "<div class='alert alert-danger text-center'>Contraseña incorrecta.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Usuario no encontrado.</div>";
    }
}
?>
