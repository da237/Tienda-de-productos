<?php
include_once "../conexion/bdconexion.php";

if(isset($_POST['codigo'])){
    $codigo=$_POST['codigo'];
    $nombre=$_POST['name'];
    $categoria=$_POST['categoria'];
    try {
        $query = $conn->prepare("UPDATE articulos SET nombre = ?, categoria = ? WHERE codigo = ?");
        $query->execute([$nombre, $categoria, $codigo]);
        echo "<script>
                alert('Producto editado correctamente');
                window.location.href = '../vistas/home.php';
              </script>";
        exit();
    } catch (\Throwable $th) {
        error_log("Error al editar el producto". $th->getMessage());
        echo "<script>
                alert('Error al editar el producto');
                window.location.href = '../vistas/home.php';
              </script>";
        die();
    }
}
?>