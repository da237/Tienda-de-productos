<?php
include_once "../conexion/bdconexion.php";

$codigo = $_POST['codigo'];
$nombre = $_POST['name'];
$categoria = $_POST['categoria'];

try {
    $query =$conn->query("INSERT INTO articulos (codigo,nombre,categoria) 
    values($codigo,'$nombre','$categoria')");
    header("Location: ../vistas/home.php");
    exit();
} catch (\Throwable $th) {
    echo "Error al insertar el producto" . $th->getMessage();
    error_log("Error al insertar el producto" . $th->getMessage());
    echo "Error al insertar el producto";
    die();
}
?>