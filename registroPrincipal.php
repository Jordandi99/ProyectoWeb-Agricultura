<?php require_once 'include/head.php';?>
<title>Registro Principal</title>
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
                <input type="text" class="form-control item" id="correo" placeholder="Correo">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="user" placeholder="Usuario">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <select class="form-control item">
                    <option select>Seleccione una opción</option>
                    <option value="1">Lector</option>
                    <option value="2">Escritor</option>
                </select>
            </div>
            <a class="forgot text-muted" href="registroPrincipal.php">Registrate</a>
            <div class="form-group">
                <button type="button" class="btn btn-block create-user">Siguiente</button>
            </div>
        </form>
    </div>
    
</body>
</html>