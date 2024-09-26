// Función para eliminar la sesión del usuario
function borrarSesion() {
  $.ajax({
    url: "deletesession.php",
    type: "GET",
    success: function (response) {
      // Redireccionar a la página de inicio de sesión después de eliminar la sesión
      window.location = "login.php";
    }
  });
}

// Función para mostrar el modal de añadir producto
function myModal() {
  let modal = document.getElementById("add");
  modal.style.display = "block";
}

// Función para cerrar el modal de añadir producto
function closemodal() {
  let modal = document.getElementById("add");
  modal.style.display = "none";
}

// Función para mostrar el modal de búsqueda
function myModal1() {
  closemodal(); // Cerrar cualquier modal abierto previamente
  let modal = document.getElementById("modalsearch");
  modal.style.display = "block";
}

// Función para cerrar el modal de búsqueda
function closemodal1() {
  let modal = document.getElementById("modalsearch");
  modal.style.display = "none";
}

// Función para redireccionar a la página de inicio
function index() {
  window.location = "index.php";
}

// Función para redireccionar a la página de escáner
function scanner() {
  window.location = "scanner.php";
}

// Función para añadir un producto 
function anadir(productid) {
  $.ajax({
    method: "GET",
    url: "addproduct.php?productid=" + productid
  })
  .done(function (response) {
    // Recargar la página después de añadir el producto
    location.reload();
  });
}

// Función para quitar un producto
function quitar(productid) {
  $.ajax({
    method: "GET",
    url: "removeproduct.php?productid=" + productid
  })
  .done(function (response) {
    // Recargar la página después de quitar el producto
    location.reload();
  });
}

// Función para buscar un producto
function search(productinput) {
  $.ajax({
    method: "GET",
    url: "searchproduct.php?productinput=" + productinput
  })
  .done(function (response) {
    // No hay acciones específicas después de la búsqueda
  });
}

// Función para aplicar o quitar una sombra verde a un icono al hacer clic en él
function checkbox(icon) {
  // Alternar la clase que aplica la sombra
  icon.classList.toggle('green-shadow');
}
