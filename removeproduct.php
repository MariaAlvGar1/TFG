<?php
// Incluimos el archivo de conexión a la base de datos
include_once("conexion.php");

// Iniciamos la sesión
session_start();

// Conectamos a la base de datos
$con = conectar();

// Consulta para verificar si el producto existe para el usuario actual
$query = "SELECT uspr.product_id FROM user_products uspr WHERE uspr.user_id = " . $_SESSION['logeado'] . " AND uspr.product_id=" . $_GET['productid'];
$result = $con->query($query);

// Si hay resultados y el número de filas es mayor que 0, significa que el producto existe para el usuario
if ($result && $result->num_rows > 0) {
    // Obtenemos la cantidad actual del producto para el usuario
    $query = "SELECT uspr.amount FROM user_products uspr WHERE uspr.user_id = " . $_SESSION['logeado'] . " AND uspr.product_id=" . $_GET['productid'];
    $row = $result->fetch_row();
    $amount = $row[0];
    
    // Actualizamos la cantidad restando 1
    $query = "UPDATE user_products SET amount = amount - 1 WHERE user_id = " . $_SESSION['logeado'] . " AND product_id = " . $_GET['productid'];
    $con->query($query);
}
?>
