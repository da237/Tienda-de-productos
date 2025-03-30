<?php
include_once "../conexion/bdconexion.php";


try {
    $query = $conn->query("SELECT * from categoria");
    $categorias = $query->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($categorias);
    // die();
} catch (\Throwable $th) {
    error_log("Error al obtener las categorias" . $th->getMessage());
    echo "Error al obtener las categorias";
    die();
}

// echo "<pre>";
// print_r($categorias);
// echo "</pre>";
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ingresar Producto</h1>
    <form action="../php/addProducto.php" method="POST">
        <label>codigo</label>
        <input type="text" name="codigo" id="codigo" required placeholder="Ingrese el codigo"><br><br>
        <label>Nombre</label>
        <input type="text" name="name" id="name" required placeholder="Ingrese el Nombre"><br><br>
        <label>Categoria</label>
        <select name="categoria" id="categoria" required>
            <option value="">Seleccione una categoria</option>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= ($categoria['id']) ?>">
                    <?= ($categoria['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>


        <button>Ingresar</button>
    </form>

</body>

</html>