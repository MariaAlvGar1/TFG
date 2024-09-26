<?php 
// Incluir archivo para verificar la sesión del usuario
include_once("sessionverify.php");

// Incluir archivo para la conexión a la base de datos
include_once("conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />

    <!-- Incluir hojas de estilo adicionales -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <!-- Incluir el encabezado de la página -->
    <?php include_once("header.php"); ?>

    <div class="container text-center">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-12 center">
                <!-- Elemento de video para mostrar la cámara -->
                <video id="theVideo" autoplay muted></video>
                <!-- Elemento de canvas para capturar la imagen de la cámara -->
                <canvas id="theCanvas"></canvas>
            </div>

            <div class="d-grid gap-2 d-md-block">
                <!-- Botón para iniciar la cámara -->
                <button class="btn btn-secondary btn-lg" id="btnStartCamera">
                    Iniciar camara
                </button>
            </div>
        </div>
    </div>

    <!-- Incluir librerías JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js" integrity="sha512-bCsBoYoW6zE0aja5xcIyoCDPfT27+cGr7AOCqelttLVRGay6EKGQbR6wm6SUcUGOMGXJpj+jrIpMS6i80+kZPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/scanner.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Incluir el pie de página de la página -->
    <?php include_once("footer.php"); ?>
</body>

<!-- Incluir scripts comunes -->
<?php include_once("scripts.php"); ?>

</html>
