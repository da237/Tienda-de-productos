<?php
include_once "../conexion/bdconexion.php";

if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];
    try {
        $query = $conn->prepare("SELECT a.codigo, a.nombre, a.descripcion, a.cantidad, a.categoria AS categoria_id, c.nombre AS categoria_nombre
            FROM articulos a
            LEFT JOIN categoria c ON a.categoria = c.id
            WHERE a.codigo = ?");
        $query->execute([$codigo]);
        $articulo = $query->fetch(PDO::FETCH_ASSOC);
        if (!$articulo) {
            echo "Producto no encontrado.";
            exit();
        }
        // Consulta para obtener todas las categorías
        $queryCategorias = $conn->query("SELECT id, nombre FROM categoria");
        $categorias = $queryCategorias->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Throwable $th) {
        error_log("Error al obtener los productos" . $th->getmessage());
        echo "Error al obtener los productos";
        die();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Editar Producto</h1>
    <form action="../php/editar.php" method="POST">
        <label>codigo</label>
        <input type="text" name="codigo" id="codigo" value="<?= $articulo['codigo'] ?>" readonly><br><br>
        <label>Nombre</label>
        <input type="text" name="name" id="name" value="<?= $articulo['nombre'] ?>" required><br><br>
        <label>Categoria</label>
        <select name="categoria" id="categoria" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= $categoria['id'] ?>" <?= ($categoria['id'] == $articulo['categoria_id']) ? 'selected' : '' ?>>
                    <?= $categoria['nombre'] ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>


        <button>Editar</button>
    </form>

</body>

</html>