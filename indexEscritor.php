
<?php require_once 'include/head.php'; ?>
<link rel="stylesheet" href="css/estilos_home.css">
<title>Inicio Escritor</title>
</head>
<?php
session_start();
$userN = $_SESSION['username'];
?>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="indexEscritor.php"><?php echo "Bienvenido $userN" ?> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline" action="/action_page.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar Articulo">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </nav>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="datosEscritor.php">Informacion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Articulos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="agregarEscritor.php">Agregar</a>
                        <a class="dropdown-item" href="publicadosEscritor.php">Publicados</a>
                        <a class="dropdown-item" href="nopublicadosEscritor.php">No publicados</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="include/salir.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container" id="con">
        <div class="card text-center">
            <div class="card-header">
                Galeria de imagenes
            </div>
            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/img1.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Maquinaria</h5>
                                <p>Contamos con excelenes articulos sobre maquinaria !!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/img2.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Productos</h5>
                                <p>Contamos con excelenes articulos sobre productos, para que tengas una cosecha inigualable !!</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/img3.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Agricultura</h5>
                                <p>Con nuestros articulos tendra conociminetos solidos sobre agricultura !!</p>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
                <div class="card-footer text-muted">
                    <div class="container2 form-group">
                        <h1>Articulos</h1>
                        <select class="form-control item" id="cateArt">
                            <option value="0" selected>Ver todo</option>
                            <option value="Maquinaria">Maquinaria</option>
                            <option value="Productos">Productos</option>
                            <option value="Plagas">Plagas</option>
                            <option value="Cultivo">Cultivo</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>