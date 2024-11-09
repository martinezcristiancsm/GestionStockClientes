<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f0f8ff;
        /* Light Blue */
        font-family: 'Roboto', sans-serif;
    }

    .navbar {
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar .btn-danger {
        background-color: #f44336;
        /* Red button */
        color: white;
        border-radius: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .container {
        margin-top: 50px;
    }

    h1 {
        color: #2196f3;
        /* Light Blue */
    }

    .btn {
        border-radius: 25px;
        padding: 10px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #2196f3;
        /* Light Blue */
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #1976d2;
    }

    .btn-secondary {
        background-color: #ffffff;
        color: #2196f3;
        border: 1px solid #2196f3;
    }

    .btn-secondary:hover {
        background-color: #f0f8ff;
    }

    .btn:focus {
        box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
    }

    /* Asegurar que todos los botones tengan el mismo tamaño */
    .btn-group a {
        width: 100%;
    }
    </style>
</head>

<body>
    <nav class="navbar">
        <form class="container-fluid justify-content-end">
            <a href="logout.php" class="btn btn-danger me-2" type="button">
                <span class="mdi mdi-logout-variant"></span> Cerrar sesión
            </a>
        </form>
    </nav>

    <div class="container text-center">
        <h1>Sistema de gestión de clientes y stock</h1>
        <p>Seleccione una de las opciones para continuar:</p>
        <div class="btn-group-vertical w-100">

            <a href="registro.php" class="btn btn-primary mb-2">
                <span class="mdi mdi-account-plus"></span> Registro de clientes
            </a>
            <a href="registro_producto.php" class="btn btn-primary mb-2">
                <span class="mdi mdi-plus-circle-outline"></span> Registro de productos
            </a>

        </div>
    </div>

    <div class="container text-center mt-4">
        <div class="btn-group-vertical w-100">
            
        <a href="listado.php" class="btn btn-secondary mb-2">
                <span class="mdi mdi-view-list"></span> Ver listado de clientes
            </a>
        
        <a href="listado_stock.php" class="btn btn-secondary mb-2">
                <span class="mdi mdi-view-list"></span> Ver listado de productos
            </a>
            
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>