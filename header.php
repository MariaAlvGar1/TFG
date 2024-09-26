<header>
    <!--Navegación-->
    <nav class="navbar navbar-expand bg-body-tertiary">
        <div class="container-fluid">
            <!--LOGO-->
            <a class="nav-linkd-flex align-items-center " href="index.php" aria-expanded="false" style="margin-top:10px;">

                <img src="img/logo.png" height="65" alt="Logo" class="rounded-circle" loading="lazy" />
            </a>

            <div >
                <!--BOTON BUSCAR-->
                <button class="btn btn-outline-secondary boton " onclick='myModal()'><i class="bi bi-search"></i></button>

            </div>
            <!--BOTON DESPLEGABLE-->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-gear" style="font-size:35px;"></i>
                        </a>
                        <!--MENU DESPLEGABLE-->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="comida.php">Comida</a></li>
                            <li><a class="dropdown-item" href="higiene.php">Higiene</a></li>
                            <li><a class="dropdown-item" href="limpieza.php">Limpieza</a></li>
                            <li><a class="dropdown-item" href="listComp.php">Listas de la compra </a></li>
                            <li><a class="dropdown-item" href="#" onclick='borrarSesion()'>Salir</a></li>
                        </ul>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="resenas.html"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#eventos"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="gmail.html"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="privacidad.html"></a>
                    </li>
                </ul>
            </div>
   
      
        </div>

    </nav>


</header>
<!--MODALS-->
<div class="modal" tabindex="-1" role="dialog" id="add">
    <div class="modal-content position-absolute top-50 start-50 translate-middle">
        <i class="bi bi-x-square equis" onclick='closemodal()'></i>
        <div class=row>
            <button onclick="scanner()" class="btn col-12 col-md-6 btn-outline-secondary iconos"><i class="bi bi-upc-scan ic">
                    <h5><br>SCAN/EAN</h5>
                </i></button>

            <button class="btn btn-outline-secondary iconos  col-12 col-md-6" onclick="myModal1()"><i class="bi bi-search ic">
                    <h5><br>BUSCAR</h5>
                </i></button>

        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalsearch">
    <div class="modal-content card-group position-absolute top-50 start-50 translate-middle " style="width: 400px; height: 400px">
        <i class="bi bi-x-square equis" style="color:black; position: fixed; margin-left:350px; margin-top:20px;" onclick='closemodal1()'></i>
        <form action="searchproduct.php" method="post" style="margin:auto;">
            <div class="form-row">
                <div class="form-group  ">
                    <label class="form-label" for="productinput">Nombre del producto</label>
                    <input type="text" style="width:200px;" class="form-control inp" name="productinput" id="productinput">
                    <div class="form-group">
                        <label for="marcainput">Marca</label>
                        <input type="text" style="width:200px;" class="form-control" id="marcainput" name="marcainput">
                    </div>
                    <div class="form-group">
                        <label for="eaninput">EAN</label>
                        <input type="text" style="width:200px;" class="form-control" id="eaninput" name="eaninput">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputType">Tipo de producto</label>
                <select id="inputType" name="inputType" style="width:200px;" class="form-control">
                    <option selected value="">Elige ...</option>
                    <option value="2">Comida</option>
                    <option value="1">Higiene</option>
                    <option value="3">Limpieza</option>
                </select>
            </div>
            <div class="col-1" style=" height: 20px;"> </div><!--ESPACIO EN BLANCO-->
            <button class="btn btn-outline-secundary" style="width:200px;" type="submit" name="guardar" id="">Entrar</button>
        </form>
    </div>
</div>


</div>