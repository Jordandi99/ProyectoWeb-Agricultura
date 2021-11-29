<?php require_once '../include/head.php'; ?>
<link rel="stylesheet" href="../css/estilos_home.css">
<title>Cultivos</title>
</head>

<?php
require_once '../include/conexion.php';
$conexion;
session_start();
?>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="../index.php"><i class="fas fa-tractor"></i> ARTICLES</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline" action="/action_page.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar por nombre">
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
                        <a class="dropdown-item" href="maquinaria.php">Maquinaria</a>
                        <a class="dropdown-item" href="producto.php">Productos</a>
                        <a class="dropdown-item" href="plagas.php">Plagas</a>
                        <a class="dropdown-item" href="cultivo.php">Cultivos</a>
                        
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login.php"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="container" style="margin-top: 50px;">
        <h1 class="text-center" style="color: white;"><strong> Artículos de Cultivos</strong></h1>

        <?php
        $articulo = "SELECT E.nombre,E.apeP,A.categoria,A.nom,A.cuerpo,A.fecha,U.username
                    FROM escritor E JOIN articulo A
                    ON (E.id_escritor=A.id_escritor)
                    JOIN usuarios U
                    ON(U.id_usuario=E.id_usuario)
                    WHERE A.estatus='Publicado' and A.categoria='Cultivos'";


        $resultado = mysqli_query($conexion, $articulo);
        while ($mostrar = mysqli_fetch_row($resultado)) {
            $datos = $mostrar[4] . "||";

        ?>
            <div class="card text-center" style="margin-top: 50px;">
                <div class="card-header">
                    <strong style="color: white;"> Autor: <?php echo $mostrar[0] . " " . $mostrar[1] ?> </strong> 
                </div>
                <div class=" card-header">
                        <strong style="color: white;"> Categoría: <?php echo $mostrar[2] ?> </strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><Strong style="color: white;"> Título: <td><?php echo $mostrar[3] ?></td> </Strong></h5>
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