<?php
session_start();
include_once("conexion.php");

// Verificar si se reciben los datos del formulario correctamente
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    echo ("<script>console.log('PHP: " . $email . "');</script>");
    // Conexión a la base de datos
    $con = conectar();

    // Consulta SQL para obtener la contraseña asociada al correo electrónico
    $query = "SELECT password,user_id FROM user WHERE email='$email'";

    if ($result = $con->query($query)) {
        // Verificar si se obtienen resultados de la consulta
        if ($result->num_rows > 0) {
            // Obtener el array de resultados
            $row = $result->fetch_row();
            // Verificar si la contraseña coincide utilizando password_verify
            if (password_verify($password, $row[0])) {
                echo ("<script>console.log('HOLA');</script>");
                // Inicio de sesión correcto
                $_SESSION["logeado"] = $row[1];
                header("Location: index.php");
            } else {
                // Contraseña incorrecta
                unset($_SESSION["logeado"]);
                header("Location: login.php");
            }
        } else {
            // No se encontró ningún usuario con el correo electrónico proporcionado
            unset($_SESSION["logeado"]);
            header("Location: login.php");
        }
        // Liberar el resultado de la consulta
        $result->close();
    } else {
        // Error en la consulta SQL
        echo "Error en la consulta: " . $con->error;
    }

    // Cerrar la conexión a la base de datos
    $con->close();
} else {
    // Datos del formulario no recibidos correctamente
    echo "Datos del formulario no recibidos correctamente";
}
