<?php
include_once("sessionverify.php");
// Conectar a la base de datos 
include_once("conexion.php");
// Verificar si se ha enviado un código de barras
if (isset($_POST['barcode'])) {
    // Obtener el código de barras enviado desde el cliente
    $barcode = $_POST['barcode'];
    // Realizar la consulta SQL para contar las veces que se repite el código de barras
    $query = "SELECT COUNT(*) AS repetitions FROM products WHERE EAN = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $barcode);
    $stmt->execute();
    $result = $stmt->get_result();

    // Obtener el resultado de la consulta
    $row = $result->fetch_assoc();
    $repetitions = $row['repetitions'];

    // Devolver la cantidad de veces que se repite el código de barras como respuesta
    echo $repetitions;
    
    // Cerrar la conexión a la base de datos
    $conn->close();
} 
?>
