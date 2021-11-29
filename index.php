<?php require_once 'include/head.php'; ?>
<link rel="stylesheet" href="css/estilos_home.css">
<title>Proyecto Agricultura</title>
</head>
/*
testing righ
*/
<?php
require_once 'include/conexion.php';
$conexion;
session_start();
?>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php"><i class="fas fa-tractor"></i> ARTICLES</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline" method="post" action="categorias/busqueda.php">
                <input class="form-control mr-sm-2" name="busq" value="" type="text" placeholder="Buscar por nombre">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </nav>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-clipboard-list"></i> Categorias
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="categorias/maquinaria.php">Maquinaria</a>
                        <a class="dropdown-item" href="categorias/producto.php">Productos</a>
                        <a class="dropdown-item" href="categorias/plagas.php">Plagas</a>
                        <a class="dropdown-item" href="categorias/cultivo.php">Cultivos</a>
                        
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="container" id="con">
        <div class="card text-center">
            <div class="card-header" style="color: white;">
                <strong>Galeria de imagenes</strong>
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
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px;">
        <h1 class="text-center" style="color: white;"><strong> Articulos</strong></h1>

        <?php
        $articulo = "SELECT E.nombre,E.apeP,A.categoria,A.nom,A.cuerpo,A.fecha
                    FROM escritor E JOIN articulo A
                    ON (E.id_escritor=A.id_escritor)
                    JOIN usuarios U
                    ON(U.id_usuario=E.id_usuario)
                    WHERE A.estatus='Publicado'";


        $resultado = mysqli_query($conexion, $articulo);
        while ($mostrar = mysqli_fetch_row($resultado)) {
            $datos = $mostrar[4] . "||";

        ?>
            <div class="card text-center" style="margin-top: 50px;">
                <div class="card-header">
                    <strong style="color: white;"> Autor: <?php echo $mostrar[0] . " " . $mostrar[1] ?> </strong> 
                </div>
                <div class=" card-header">
                        <strong style="color: white;"> Categoria: <?php echo $mostrar[2] ?> </strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><Strong style="color: white;"> Titulo: <td><?php echo $mostrar[3] ?></td> </Strong></h5>
                    <p class="card-text" style="color: white;"> <?php echo $mostrar[4] ?></p>
                </div>
                <div class="card-footer text-muted">
                    Fecha de publicación: <?php echo $mostrar[5] ?>
                </div>
                <div class="card-footer text-muted">
                    <a href="#" id="btnHomeArt" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Agregar Comentario</a>
                </div>
            </div>
        <?php
        }

        ?>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: black;"><i class='fas fa-exclamation-triangle'> Inicio de sesión requerido</i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="color: black;">
                    Inicie sesión para poder agregar un comentario.
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCerrarM" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<script>
</script>