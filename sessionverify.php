<?php
session_start();

// Comprobamos si la sesión está iniciada
if(isset($_SESSION["logeado"])){
    // Si el usuario está loggeado, mostramos un mensaje de registro en la consola
    echo("<script>console.log('PHP: " . "ya estás loggeado" . "');</script>");
    
    // Verificamos si la URL actual contiene 'login.php' o 'registro.php' para evitar redireccionamientos innecesarios
    if (str_contains($_SERVER['REQUEST_URI'], 'login.php') || str_contains($_SERVER['REQUEST_URI'], 'registro.php')) {
        // Si la URL contiene 'login.php' o 'registro.php', redirigimos al usuario a la página de inicio
        header("Location: index.php");
        // Nota: Este echo no tendrá efecto ya que la página se redirige antes de llegar a este punto
        echo "Checking the existence of the empty string will always return true";
    }
} else{
    // Si el usuario no está loggeado, mostramos un mensaje en la consola
    echo("<script>console.log('PHP: " . "no estás loggeado" . "');</script>");
    
    // Verificamos si la URL actual contiene 'login.php' o 'registro.php'
    if (str_contains($_SERVER['REQUEST_URI'], 'login.php') || str_contains($_SERVER['REQUEST_URI'], 'registro.php')) {
        // Si la URL contiene 'login.php' o 'registro.php', no hacemos ninguna acción

    } else {
        // Si la URL no contiene 'login.php' o 'registro.php', redirigimos al usuario a la página de inicio de sesión
        header("Location: login.php");
    }
}
?>
