<?php require_once 'include/head.php';?>
<title>Registro Escritor</title>
<link rel="stylesheet" href="css/estilos_registro.css">
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

    <div class="registration-form">
        <form>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="nombre" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="apellido" placeholder="Apellido(s)">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="rfc" placeholder="RFC">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="edad" placeholder="Edad">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="direccion" placeholder="Dirección">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="telefono" placeholder="Telefono">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="referencias" placeholder="Referencias">
            </div>
            <div class="form-group">
                <select class="form-control item">
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
                <button type="button" class="btn btn-block create-user">Terminar Registro</button>
            </div>
        </form>
    </div>
    
</body>
</html>