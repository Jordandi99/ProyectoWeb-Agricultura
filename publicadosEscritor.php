<?php
require_once 'include/head.php';
require_once 'include/conexion.php';
$conexion
?>
<link rel="stylesheet" href="css/estilos_home.css">
<title>Articulos publicados</title>
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

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="datosEscritor.php"><i class="fas fa-info"></i> Informacion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-plus"></i> Articulos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="agregarEscritor.php">Agregar</a>
                        <a class="dropdown-item" href="publicadosEscritor.php">Publicados</a>
                        <a class="dropdown-item" href="nopublicadosEscritor.php">No publicados</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="include/salir.php"> <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card text-center">
        <div class="card-header">
            Articulos Publicados
        </div>
        <div class="card-body">

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Autor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre del articulo</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Tabla usuarios,Tabla escritor-->
                    <?php

                    //consulta para visualizar articulo

                    $articulo = "SELECT E.nombre,E.apeP,A.categoria,A.nom,A.cuerpo,A.fecha,A.estatus
                    FROM usuarios U JOIN escritor E
                    ON (U.id_usuario=E.id_usuario)
                    JOIN articulo A
                    ON (E.id_escritor=A.id_escritor)
                    WHERE U.username='$userN' and A.estatus='Publicado'";


                    $resultado = mysqli_query($conexion, $articulo);
                    while ($mostrar = mysqli_fetch_row($resultado)) {
                        $datos = $mostrar[4] . "||";

                    ?>
                        <tr>
                            <td><?php echo $mostrar[0]. " ".$mostrar[1] ?></td>
                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#Mver" onclick="agregaFormv('<?php echo $datos ?>')">Visualizar</button>
                            </td>
                            <td><?php echo $mostrar[5] ?></td>
                            <td><?php echo $mostrar[6] ?></td>
                            
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>

        </div>
        <div class="card-footer text-muted">
            Publicados
        </div>
    </div>

     <!-- Visualizar fila-->
     <div class="modal fade" id="Mver" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contenido del articulo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <textarea class="form-control" id="Txtarea" rows="5" readonly></textarea>
                    </div>

                </div>
            </div>
        </div>

</body>
<script>

function agregaFormv(datos) {
    d = datos.split('||');
    $('#Txtarea').val(d[0]);

}

</script>
</html>