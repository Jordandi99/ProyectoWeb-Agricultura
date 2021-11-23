<?php require_once 'include/head.php';?>
<title>Registro Principal</title>
<link rel="stylesheet" href="css/estilos_registro.css">
<script src="js/funciones.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">ARTICLES</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link center" href="index.php">Regresar</a>
            </li>
        </ul>
    </div>
</nav>

    <div class="registration-form" id="principal">
        <form>
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
                <button type="button" id="formRegPrin" class="btn btn-block create-user">Siguiente</button>
            </div>
        </form>
    </div>

    <div class="registration-form" id="lector">
        <form>
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
                <select class="form-control item" id="categoriaLec">
                    <option select>Seleccione una opción</option>
                    <option value="1">Maquinaria</option>
                    <option value="2">Productos</option>
                    <option value="3">Plagas</option>
                    <option value="4">Cultivos</option>
                </select>
            </div>
            <div class="form-group form-check text-center">
                <input type="checkbox" class="form-check-input" id="terminosLec">
                <label class="form-check-label" for="terminos">Aceptar los <a class="" href="tycLector.php">Terminos y Condiciones</a></label>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-block create-user">Terminar Registro</button>
            </div>
        </form>
    </div>

    <div class="registration-form" id="escritor">
        <form>
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
                    <option select>Seleccione una opción</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                    <option value="3">No deseo especificar</option>
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
                    <option select>Seleccione una opción</option>
                    <option value="1">Maquinaria</option>
                    <option value="2">Productos</option>
                    <option value="3">Plagas</option>
                    <option value="4">Cultivos</option>
                </select>
            </div>
            <div class="form-group form-check text-center">
                <input type="checkbox" class="form-check-input" id="terminos">
                <label class="form-check-label" for="terminos">Aceptar los <a class="" href="tycEscritor.php">Terminos y Condiciones</a></label>
            </div>

            <div class="form-group">
                <button type="button" id="btnEscritor" class="btn btn-block create-user">Terminar Registro</button>
            </div>
        </form>
    </div>
    
</body>
</html>