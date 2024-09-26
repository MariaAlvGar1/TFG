<?php
// Incluir archivo para verificar la sesión del usuario
include_once("sessionverify.php");

// Incluir archivo para la conexión a la base de datos
include_once("conexion.php");

// Conexión a la base de datos
$con = conectar();

// Validar el ID de usuario
$userId = (int)$_SESSION['logeado'];

// Consulta para obtener los productos del usuario con cantidad menor a 2
$query = "SELECT pr.product_id, pr.name, pr.brand, uspr.amount FROM products pr 
          INNER JOIN user_products uspr ON uspr.product_id = pr.product_id 
          WHERE uspr.user_id = ? AND uspr.amount < 2";

$stmt = $con->prepare($query);
$stmt->bind_param("i", $userId);  // Vincular el parámetro user_id
$stmt->execute();
$result = $stmt->get_result();

// Función para generar elementos de lista HTML
function generateProduct($row) {
    // Ruta de la imagen del producto
    $img = "img/productos/{$row['product_id']}.jpg";
    $productId = $row['product_id'];

    // Devolver el código HTML para un producto
    return <<<HTML
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4 p-2">
        <li class="list-group-item d-flex justify-content-start align-items-center">
            <div style="width: 100px;">
                <img src="$img" class="mr-3" alt="" style="width: 64px; height: 64px;">
            </div>
            <div class="ml-3" style="width: 200px;">
                <h5>{$row['brand']}</h5>
                <p>{$row['name']}</p>
                <p>Tienes: {$row['amount']} unidad(es)</p>
            </div>
            <div class="ml-auto">
                <i class="bi bi-check2-square checkbox-icon" onclick="checkbox(this)" style="font-size: 25px;"></i>
            </div>
        </li>
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
            // Recorrer los resultados y generar el HTML para cada producto
            while ($row = $result->fetch_assoc()) {
                echo generateProduct($row);
            }
            ?>
        </div>
    </main>

    <?php include_once("footer.php"); ?>
</body>
<?php include_once("scripts.php"); ?>

</html>
