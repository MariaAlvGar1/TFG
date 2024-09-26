<?php include_once("sessionverify.php");
include_once("conexion.php");
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
  <div class="container mt-5">
    <!-- Usamos una fila de Bootstrap -->
    <div class="row">
      <!-- Primera tarjeta -->
      <div class=" col col-lg-2">
        <a href="comida.php" class="titles">
          <div class="card">
            <img class="card-img-top" src="img/comida.jpg" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Comida</h4>
            </div>
          </div>
        </a>
      </div>
      
      <!-- Segunda tarjeta -->
      <div class=" col col-lg-2">
        <a href="limpieza.php" class="titles">
          <div class="card">
            <img class="card-img-top" src="img/limpieza.png" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Limpieza</h4>
            </div>
          </div>
        </a>
      </div>

      <!-- Tercera tarjeta -->
      <div class=" col col-lg-2 ">
        <a href="higiene.php" class="titles">
          <div class="card mr-2">
            <img class="card-img-top" src="img/higiene.png" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Higiene</h4>
            </div>
          </div>
        </a>
      </div>

      <!-- Cuarta tarjeta -->
      <div class="col col-lg-2">
        <a href="listComp.php" class="titles">
          <div class="card">
            <img class="card-img-top" src="img/listas.png" alt="Card image">
            <div class="card-body">
              <h4 class="card-title">Listas de la compra</h4>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
  
  <?php include_once("footer.php"); ?>
</body>
<?php include_once("scripts.php"); ?>
</html>
