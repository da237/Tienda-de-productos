<?php

include_once "../conexion/bdconexion.php";

// $codigo=$_GET['codigo'];

// var_dump($codigo);
// die();

if(isset($_GET['codigo'])){
    $codigo=$_GET['codigo'];
    try {
        $query = $conn->prepare("DELETE FROM articulos WHERE codigo = ?");
        $query->execute([$codigo]);
        echo "Producto eliminado correctamente";
        header("location: ../vistas/home.php");
        exit();
    } catch (\Throwable $th) {
        error_log("Error al eliminar el producto". $th->getMessage());
        echo "Error al eliminar el producto";
        die();
    }
}

?>