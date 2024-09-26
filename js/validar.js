// Expresiones regulares para validar email y contraseña
var password_regex = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$");
var email_regex = new RegExp("^\\w[\\w\\.\\-]+@[a-zA-Z\\d\\.-]+\\.[a-zA-Z]{2,}$");

// Variables para rastrear la validez de los campos
var valemail = 0;
var valpassword = 0;
var valcheck = 0;

// Función para verificar la validez del email
function validaremail() { 
    let email = document.getElementById("validationCustom02");
    let feedback = document.getElementById("feedback");

    if (email_regex.test(email.value)){
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        feedback.style.display = "none";
        valemail = 1; // Campo válido
    } else {
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
        feedback.style.display = "inline";
        valemail = 0; // Campo inválido
    }
    console.log(valemail);
}

// Función para verificar la validez de la contraseña
function validarpassword() { 
    let password = document.getElementById("validationCustom05");
    let feedback = document.getElementById("feedback2");

    if (password_regex.test(password.value)){
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        feedback.style.display = "none";
        valpassword = 1; // Campo válido
    } else {
        password.classList.remove('is-valid');
        password.classList.add('is-invalid');
        feedback.style.display = "inline";
        valpassword = 0; // Campo inválido
    }
    console.log(valpassword);
}

// Función para verificar si se ha marcado el checkbox
function check() {
    let check = document.getElementById("invalidCheck");

    if(check.checked) {
        valcheck = 1;
    } else {
        valcheck = 0;
    }
    console.log(valcheck);
}

// Función para habilitar/deshabilitar el botón de envío según la validez de los campos
function button() {
    let boton = document.getElementById("boton");
    if(valemail * valpassword * valcheck != 0){
        // Activamos el botón si todos los campos son válidos
        boton.disabled = false;
    } else {
        // Desactivamos el botón si algún campo es inválido
        boton.disabled = true;
    }
}

// Función para redireccionar a la página de inicio de sesión
function login() {
    window.location.href = "login.php";
}

// Intervalo para verificar constantemente el estado de los campos y habilitar/deshabilitar el botón
var intervalID = setInterval(button, 500);
