<?php include_once("sessionverify.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/registro.css">

  <title>Maria</title>

</head>

<body class="login">

  <div class="card position-absolute top-50 start-50 translate-middle">
    <h2 class="card-title text-center">Registro</h2>
    <div class="row text-center">
      <form class="mb-1 needs-validation" action="post.php" method="post" novalidate>
        <div class="formu-body">
          <i class="bi bi-x-square equis" style="margin-left: 500px; text-decoration:none;" onclick="login()"> </i>
          <div class="col-12 py-2">
            <label for="validationCustom01" class="form-label">Nombre</label>
            <input type="text" class="form-control inp  mx-auto" name="user" id="validationCustom01" required>
          </div>
          <div class="col-12 py-2">
            <label for="validationCustom01" class="form-label">Correo electrónico</label>
            <input type="text" oninput="validaremail(this)" onpaste="validaremail(this)" class="form-control inp mx-auto" name="email" id="validationCustom02" required>
            <div class="invalid-feedback" id="feedback" style="display: none;">
              El correo electrónico no es válido.
            </div>
          </div>
          <!--Contraseñas-->
          <div class="col-12 py-2">
            <label for="validationCustom02" class="form-label">Contraseña</label>
            <input type="password" class="form-control inp  mx-auto" oninput="validarpassword(this)" name="password" id="validationCustom05" required>
            <div class="invalid-feedback" id="feedback2">
              La contraseña debe contener al menos 1 mayúscula, 1 minúscula, 1 número y un caracter especial. Además debe tener entre 8 y 15 caracteres.
            </div>
          </div>
          <div class="col-12 py-2">
            <label for="validationCustom03" class="form-label">Repite la contraseña</label>
            <input type="password" class="form-control inp mx-auto" name="repeat_password" id="validationCustom04" required>

            <div class="col-12 py-3">
              <!--Checkbox-->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" onclick="check()" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Acepto los términos y condiciones
                </label>
              </div>

            </div>
            <!--BOTON SUBMIT-->
            <div class="col-12">
              <button class="btn btn-primary" type="submit" name="guardar" id="boton">Registrarse</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--COPYRIGTH FOOTER-->
  <div class="text-center texto p-3 fixed-bottom">
    © 2024 Copyright:
    <a class="text-reset fw-bold" href="index.html">MyPantry.com</a>
  </div>
</body>
<script src="js/js.js"></script>
<script src="js/validar.js"></script>

</html>