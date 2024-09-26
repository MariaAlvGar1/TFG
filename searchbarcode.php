<?php
include_once("sessionverify.php");
include_once("conexion.php");

// Conexión a la base de datos
$con = conectar();

// Obtener el código de barras de la URL
$barcode = $_GET['barcode'];

// Consulta para obtener productos filtrados por el código de barras
$query = "SELECT product_id, name, brand FROM products WHERE EAN LIKE '%$barcode%'";
$stmt = $con->prepare($query);
$stmt->execute();
$productResult = $stmt->get_result();

// Función para verificar si el usuario tiene un producto específico
function userHasProduct($userId, $productId, $con) {
    $query = "SELECT amount FROM user_products WHERE user_id = ? AND product_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si hay un resultado, el usuario tiene el producto
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['amount'];
    }
    return 0; // El usuario no tiene el producto, devuelve 0
}

// Datos del usuario
$userId = $_SESSION['logeado'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>My Pantry</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <div class="container  mt-5">
        <div class="row">
            <?php
            while ($product = $productResult->fetch_assoc()) {
                // Verifica si el usuario tiene este producto
                $amount = userHasProduct($userId, $product['product_id'], $con);
                // imagen del producto
                $img = "img/productos/{$product['product_id']}.jpg";
                // Generar la card
                echo "<div class='col col-lg-3' style='margin-top:15px;'>";
                echo "<div class='card' style='width: 18rem;'>";
                echo "<img src='$img' class='card-img-top' alt=''>";
                echo "<div class='card-body';'>";
                echo "<h4 class='card-title' style='margin-top:15px'>{$product['brand']}</h4>";
                echo "<p class='card-text'>{$product['name']}</p>";
                echo "<p class='card-text amount'>Tienes: $amount unidad(es)";
                echo "<button style='margin-left:10px; border:none;background-color:white;' onclick='quitar({$product['product_id']})'><i class='bi bi-dash-square' style='font-size:25px;'></i></button>";
                echo "<button style='border:none; background-color:white;' onclick='anadir({$product['product_id']})'><i class='bi bi-plus-square' style='font-size:25px;'></i></button></p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
            <div class='row-2' style='height: 50px;'></div>
        </div>
    </div>
    <?php include_once("footer.php"); ?>
</body>
<?php include_once("scripts.php"); ?>
</html>
