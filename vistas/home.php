<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<?php
include_once "../conexion/bdconexion.php";

try {
    $query = $conn->query("SELECT a.*, c.nombre AS categoria
    FROM articulos a
    LEFT JOIN categoria c ON a.categoria = c.id");
    $articulos = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo "Error al obtener los articulos" . $th->getMessage();
    error_log("Error al obtener los articulos" . $th->getMessage());
    echo "Error al obtener los articulos";
    die();
}

?>

<body>
    <button><a href="ingresar.php">Ingresar Producto</a></button>

    <h2>Lista de Productos</h2>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articulos as $articulo): ?>
                <tr>
                    <td><?= $articulo['codigo'] ?></td>
                    <td><?= $articulo['nombre'] ?></td>
                    <td><?= $articulo['categoria'] ?></td>
                    <td><?= $articulo['descripcion'] ?></td>
                    <td><?= $articulo['cantidad'] ?></td>
                    <td><a href="../php/eliminar.php?codigo=<?=$articulo['codigo']?>"onclick="return confirm('Esta seguro de eliminar el producto')">Eliminar</a></td>
                    <td><a href="">Editar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>