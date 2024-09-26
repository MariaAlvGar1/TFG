<?php
include_once("sessionverify.php");
include_once("conexion.php");

// Conexión a la base de datos
$con = conectar();

// Validar el ID de usuario
$userId = (int)$_SESSION['logeado'];

// Consulta para obtener los productos del usuario
$query = "SELECT pr.product_id, pr.name, pr.brand, uspr.amount FROM products pr 
          INNER JOIN user_products uspr ON uspr.product_id = pr.product_id 
          WHERE uspr.user_id = ? AND pr.type_id = ?  AND uspr.amount > 0";

$stmt = $con->prepare($query);
$typeId = 1; // Tipo específico de producto
$stmt->bind_param("ii", $userId, $typeId);
$stmt->execute();
$result = $stmt->get_result();

// Función para generar tarjetas HTML
function generateProductCard($row) {
    $img = "img/productos/{$row['product_id']}.jpg";
    $productId = $row['product_id'];

    return <<<HTML
    <div class='col col-lg-3' style='margin-top:34px;'>
        <div class='card' style='width: 18rem;'>
            <img src='$img' class='card-img-top' alt=''>
            <div class='card-body'>
                <h4 class='card-title' style='margin-top:15px'>{$row['brand']}</h4>
                <p class='card-text'>{$row['name']}</p>
                <p class='card-text amount'>Tienes: {$row['amount']} unidad(es)
                    <button style='margin-left:10px; border:none;background-color:white;'  onclick='quitar($productId)'><i class='bi bi-dash-square' style='font-size:25px;'></i></button>
                    <button style='border:none; background-color:white;' onclick='anadir($productId)'><i class='bi bi-plus-square ' style='font-size:25px;'></i></button>
                </p>
            </div>
        </div>
    </div>
    HTML;
}

// Cerrar la consulta
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="./js/js.js"></script>

    <title>HIGIENE</title>
</head>

<body>
    <?php include_once("header.php"); ?>

    <main class="container">
        <div class="row">
            <?php
            while ($row = $result->fetch_assoc()) {
                // Generar la tarjeta para cada producto
                echo generateProductCard($row);
            }
            ?>
        </div>
    </main>

    <?php include_once("footer.php"); ?>
</body>

<?php include_once("scripts.php"); ?>

</html>
