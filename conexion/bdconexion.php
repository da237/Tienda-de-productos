<?php
// VARIABLES DE CONEXION A LA BASE DE DATOS
$host = "localhost";
$user = "root";
$dbname = "base1";
$password = "";

// Crear la conexion
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Conexion exitosa";
} catch (\Throwable $th) {
    echo "Error de conexion:". $th->getMessage();
    die();
}

?>