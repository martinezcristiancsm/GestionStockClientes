<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

include "modelos/conexion.php";

// Eliminar producto
if (isset($_GET['eliminar'])) {
    $id_producto = $_GET['eliminar'];
    $sql = $conexion->query("DELETE FROM productos WHERE id_producto = $id_producto");
    if ($sql) {
        echo "<p class='alert alert-success text-center'>Producto eliminado correctamente.</p>";
    } else {
        echo "<p class='alert alert-danger text-center'>Error al eliminar el producto.</p>";
    }
}

// Editar producto
if (isset($_GET['editar'])) {
    $id_producto = $_GET['editar'];
    $sql = $conexion->query("SELECT * FROM productos WHERE id_producto = $id_producto");
    $producto = $sql->fetch_object();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f8ff; /* Light Blue */
            font-family: 'Roboto', sans-serif;
        }

        .navbar {
            background-color: #2196f3; /* Light Blue */
        }

        .navbar a {
            color: white;
        }

        .navbar a:hover {
            opacity: 0.8;
        }

        .container {
            margin-top: 50px;
        }

        h1 {
            color: #2196f3; /* Light Blue */
            text-align: center;
            margin-bottom: 30px;
        }

       

        .table {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
        }

        th {
            background-color: #f0f8ff;
        }

        td {
            padding: 15px;
        }

        .btn-primary {
            background-color: #2196f3; /* Light Blue */
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-warning {
            background-color: #ff9800; /* Amber */
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-danger {
            background-color: #f44336; /* Red */
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #1976d2;
        }

        .btn-warning:hover {
            background-color: #f57c00;
        }

        .btn-danger:hover {
            background-color: #d32f2f;
        }

        .alert {
            border-radius: 25px;
            padding: 15px;
            margin-top: 15px;
        }

        .alert-success {
            background-color: #4caf50;
            color: white;
        }

        .alert-danger {
            background-color: #f44336;
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
    <h1 class="text-center mt-4">Stock de Productos</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Fecha de Ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = $conexion->query("SELECT * FROM productos");
            while ($producto = $sql->fetch_object()) { ?>
                <tr>
                    <td><?php echo $producto->id_producto; ?></td>
                    <td><?php echo $producto->nombre; ?></td>
                    <td><?php echo $producto->descripcion; ?></td>
                    <td><?php echo "$" . number_format($producto->precio, 2); ?></td>
                    <td><?php echo $producto->stock; ?></td>
                    <td><?php echo $producto->fecha_ingreso; ?></td>
                    <td>
                        <!-- Botón de editar -->
                        <a href="?editar=<?php echo $producto->id_producto; ?>" class="btn btn-warning btn-sm">
                            <i class="mdi mdi-pencil"></i> Editar
                        </a>
                        <!-- Botón de eliminar -->
                        <a href="?eliminar=<?php echo $producto->id_producto; ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                            <i class="mdi mdi-delete"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
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
