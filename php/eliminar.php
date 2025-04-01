<?php

include_once "../conexion/bdconexion.php";


if(isset($_GET['codigo'])){
    $codigo=$_GET['codigo'];
    try {
        $query = $conn->prepare("DELETE FROM articulos WHERE codigo = ?");
        $query->execute([$codigo]);
        echo "<script>
                alert('Producto eliminado correctamente');
                window.location.href = '../vistas/home.php';
              </script>";
        exit();
    } catch (\Throwable $th) {
        error_log("Error al eliminar el producto". $th->getMessage());
        echo "<script>
                alert('Error al eliminar el producto');
                window.location.href = '../vistas/home.php';
              </script>";
        die();
    }
}

?>