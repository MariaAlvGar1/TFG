<?php
// Incluir archivo de conexión a la base de datos
include_once("conexion.php");

// Iniciar la sesión
session_start();

// Conectarse a la base de datos 
//esto es un comentario
$con = conectar();

// Construir consulta para verificar si el producto ya está en los productos del usuario
$query = "SELECT uspr.product_id FROM user_products uspr WHERE uspr.user_id = " . $_SESSION['logeado'] . " AND uspr.product_id=" . $_GET['productid'];
$result = $con->query($query);

// Si hay resultados, significa que el producto ya está en la lista del usuario
if ($result && $result->num_rows > 0) {
    // Obtener la cantidad actual del producto
    $row = $result->fetch_row();
    $amount = $row[0];

    // Actualizar la cantidad del producto incrementándola en 1
    $query = "UPDATE user_products SET amount = amount + 1 WHERE user_id = " . $_SESSION['logeado'] . " AND product_id = " . $_GET['productid'];
    $con->query($query);
} else {
    // Si el producto no está en la lista del usuario, insertar un nuevo registro con cantidad 1
    $query = "INSERT INTO user_products (user_id, product_id, amount) VALUES (" . $_SESSION['logeado'] . ", " . $_GET['productid'] . ", 1)";
    $con->query($query);
}
?>
