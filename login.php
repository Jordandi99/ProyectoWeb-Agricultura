<?php require_once 'include/head.php';?>
<title>Login</title>
<link rel="stylesheet" href="css/estilos_login.css">
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

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="box" method="post" action="include/log.php">
                    <h1>Login</h1>
                    <p class="text-muted"> Ingresa tu nombre de usuario y contraseña</p> 
                    <input type="text" name="nombre" placeholder="Usuario"> 
                    <input type="password" name="contraseña" placeholder="Contraseña"> 
                    <a class="forgot text-muted" href="#">¿Has olvidado tu contraseña?</a>
                    <br><br>
                    <a class="forgot text-muted" href="registroPrincipal.php">Registrate</a>
                    <input type="submit" name="" value="Ingresar" href="#">
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>