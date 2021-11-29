<?php require_once 'include/head.php';?>
<title>Registro Principal</title>
<link rel="stylesheet" href="css/estilos_registro.css">
<script src="js/funciones.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="index.php"><i class="fas fa-tractor"></i> ARTICLES</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link center" href="login.php"><i class="fas fa-sign-out-alt"></i> Iniciar sesión</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Terminos y Condiciones</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modal-body">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id = "btnModal" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>

    <!-- The Modal 2 -->
    <div class="modal fade" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modal-title2"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="modal-body2">
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id = "btnModal2" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

    <div class="registration-form" id="principal">
        <form>
            <div class="form-group text-center">
                <h5 style="color: #489EEA;">Registro principal</h5>
            </div>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="correo" placeholder="Correo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="user" placeholder="Usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <select class="form-control item" id="selectRol">
                    <option value="0" select>Seleccione una opción</option>
                    <option value="Lector">Lector</option>
                    <option value="Escritor">Escritor</option>
                </select>
            </div>
            <div class="form-group">
                <button type="button" id="formRegPrin" class="btn btn-block create-user" data-toggle="modal" data-target="#myModal2">Siguiente</button>
            </div>
        </form>
    </div>

    <div class="registration-form" id="lector">
        <form>
        <div class="form-group text-center">
                <h5 style="color: #489EEA;">Registro para lectores</h5>
            </div>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="nombreLec" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="apellidoLec" placeholder="Apellido(s)">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="edadLec" placeholder="Edad">
            </div>
            <div class="form-group">
                <select class="form-control item" id="generoLec">
                    <option value="0" select>Seleccione una opción</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="No deseo especificar">No deseo especificar</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control item" id="categoriaLec">
                    <option value="0" select>Seleccione una opción</option>
                    <option value="Maquinaria">Maquinaria</option>
                    <option value="Productos">Productos</option>
                    <option value="Plagas">Plagas</option>
                    <option value="Cultivos">Cultivos</option>
                </select>
            </div>
            <div class="form-group form-check text-center">
                <input type="checkbox" class="form-check-input" id="terminosLec">
                <label class="form-check-label" for="terminos">Aceptar los <a data-toggle="modal" data-target="#myModal" class="" id="tycLec" href="#">Terminos y Condiciones</a></label>
            </div>

            <div class="form-group">
                <button type="button" id="btnLector" class="btn btn-block create-user" data-toggle="modal" data-target="#myModal2">Terminar Registro</button>
            </div>
            <div class="form-group">
                <button type="button" id="btnLectorReg" class="btn btn-block create-user">Regresar</button>
            </div>
        </form>
    </div>

    <div class="registration-form" id="escritor">
        <form>
        <div class="form-group text-center">
                <h5 style="color: #489EEA;">Registro para escritores</h5>
            </div>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="nombreEsc" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="apellidoEsc" placeholder="Apellido(s)">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="rfcEsc" placeholder="RFC">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="edadEsc" placeholder="Edad">
            </div>
            <div class="form-group">
                <select class="form-control item" id="generoEsc">
                    <option value="0" select>Seleccione una opción</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="No deseo especificar">No deseo especificar</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="direccionEsc" placeholder="Dirección">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="telefonoEsc" placeholder="Telefono">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="referenciasEsc" placeholder="Referencias">
            </div>
            <div class="form-group">
                <select class="form-control item" id="categoriaEsc">
                    <option value="0" select>Seleccione una opción</option>
                    <option value="Maquinaria">Maquinaria</option>
                    <option value="Productos">Productos</option>
                    <option value="Plagas">Plagas</option>
                    <option value="Cultivos">Cultivos</option>
                </select>
            </div>
            <div class="form-group form-check text-center">
                <input type="checkbox" class="form-check-input" id="terminos">
                <label class="form-check-label" for="terminos">Aceptar los <a data-toggle="modal" data-target="#myModal" class="" id="tycEsc" href="#">Terminos y Condiciones</a></label>
            </div>

            <div class="form-group">
                <button type="button" id="btnEscritor" class="btn btn-block create-user" data-toggle="modal" data-target="#myModal2">Terminar Registro</button>
            </div>
            <div class="form-group">
                <button type="button" id="btnEscritorReg" class="btn btn-block create-user">Regresar</button>
            </div>
        </form>
    </div>
    
</body>
</html>