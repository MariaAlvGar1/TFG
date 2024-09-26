<?php include_once("sessionverify.php") ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/registro.css">

  <title>LOG IN</title>

</head>

<body class="login">
  <div class="card position-absolute top-50 start-50 translate-middle text-center">

    <h2 class="card-title text-center">Iniciar sesión</h2>

    <div class="row py-5" id="formulario">
      <div class="col-12">
        <form class="mb-3" action="loginverify.php" method="post">
          <div class="row">
            <div class="col-12">
              <label class="form-label" for="validationCustom02">Correo electrónico</label>
              <input type="text" class="form-control inp mx-auto" name="email" id="validationCustom02" required>
            </div>
            <div class="col-12 py-4">
              <label class="form-label" for="validationCustom05">Contraseña</label>
              <input type="password" class="form-control inp mx-auto" name="password" id="validationCustom05" required>
            </div>
            <div class="col-12 py-3">
              <button class="btn btn-primary" type="submit" name="guardar" id="boton">Entrar</button>
            </div>
            <div class="col-12">
              <input type="checkbox" class="form-check-input" id="checkbox">
              <label class="form-label" for="checkbox">Recordar contraseña</label>
            </div>
          </div>
        </form>
        <div class="col-12">
          <p class="mb-0 texto">¿No tienes una cuenta? <a href="registro.php" class="text-black-50 fw-bold ">Regístrate</a></p>
        </div>
      </div>
    </div>





  </div>
  </div>
  </form>
  </div>
  <!--COPYRIGTH FOOTER-->
  <div class="text-center texto p-3 fixed-bottom">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="index.html">MyPantry.com</a>
  </div>
</body>
<script src="js/js.js"></script>

</html>