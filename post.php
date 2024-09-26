<?php
# Incluimos el archivo de conexión a la base de datos
include_once("conexion.php");

# Conectamos a la base de datos
$con = conectar();

# Expresiones regulares para validar contraseña y email
$password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
$email_regex = "/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/";

# Comprobamos si se ha pulsado el botón "guardar"
if (isset($_POST["guardar"])) {
    # Verificamos que todos los campos están completos
    if (
        strlen($_POST["user"]) > 1 &&
        strlen($_POST["password"]) > 1 &&
        strlen($_POST["repeat_password"]) > 1 &&
        strlen($_POST["email"]) > 1
    ) {
        # Verificamos si el email tiene un formato válido
        if (preg_match($email_regex, $_POST["email"])) {
            # Verificamos si las contraseñas coinciden
            if ($_POST['password'] == $_POST['repeat_password']) {
                # Verificamos si la contraseña cumple con el regex
                if (preg_match($password_regex, $_POST["password"])) {
                    # Extraemos y limpiamos los valores de los campos del formulario
                    $user = trim($_POST['user']);
                    $password = trim($_POST['password']);
                    $email = trim($_POST['email']);
                    # Encriptamos la contraseña
                    $cifrado = password_hash($password, PASSWORD_DEFAULT, array("cost" => 12));
                    # Realizamos la consulta para insertar el nuevo usuario en la base de datos
                    $consulta = "INSERT INTO user( name, password, email) VALUES ('$user','$cifrado' , '$email')";
                    $resultado = mysqli_query($con, $consulta);
                    # Redireccionamos al usuario a la página de inicio de sesión
                    header("Location: login.php");
                    exit; // Detenemos la ejecución después de redirigir para evitar que el código siguiente se ejecute
                } else {
                    # Mostramos una alerta si la contraseña no cumple con el formato requerido
                    echo "<script>alert('La contraseña debe tener al menos 8 caracteres, incluir al menos una letra mayúscula, una letra minúscula, un número y un carácter especial');</script>";
                }
            } else {
                # Mostramos una alerta si las contraseñas no coinciden
                echo "<script>alert('Las contraseñas no coinciden');</script>";
            }
        } else {
            # Mostramos una alerta si el email no tiene un formato válido
            echo "<script>alert('Por favor, introduce una dirección de correo electrónico válida');</script>";
        }
    } else {
        # Mostramos una alerta si no se completaron todos los campos del formulario
        echo "<script>alert('Por favor, completa todos los campos');</script>";
    }
}
?>
