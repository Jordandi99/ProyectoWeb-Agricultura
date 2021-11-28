<?php
require_once 'include/head.php';
require_once 'include/conexion.php';
$conexion
?>
<link rel="stylesheet" href="css/estilos_home.css">
<title>Registro comentarios</title>
</head>
<?php
session_start();
$userN = $_SESSION['username'];
?>

<body>

    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="indexLector.php"><?php echo "Bienvenido $userN" ?> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="datosLector.php"><i class="fas fa-info"></i> Información</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registroComentarios.php">Registro de comentarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="include/salir.php"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card text-center">
        <div class="card-header">
            Información de la cuenta
        </div>
        <div class="card-body">

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Nombre del articulo</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Tabla usuarios,Tabla escritor-->
                    <?php

                    //consulta para visualizar articulo


                    $articulo = "SELECT C.id_comentario, C.comentario, C.fecha, A.nom,E.nombre,E.apeP
                    FROM lector L JOIN usuarios U
                    ON (L.id_usuario=U.id_usuario)
                    JOIN comentarios C
                    ON (U.id_usuario=C.id_usuario)
                    JOIN articulo A
                    ON (C.id_articulo=A.id_articulo)
                    JOIN escritor E
                    ON(A.id_escritor=E.id_escritor)
                    WHERE U.username = '$userN'
                    ORDER BY C.fecha DESC";

                    $resultado = mysqli_query($conexion, $articulo);
                    while ($mostrar = mysqli_fetch_row($resultado)) {
                        $datos = $mostrar[0] . "||" . $mostrar[1] . "||" . $mostrar[2] . "||" . $mostrar[3]
                            . "||" . $mostrar[4] . "||" . $mostrar[5];

                    ?>
                        <tr>

                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[4] . " " . $mostrar[5] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[1] ?></td>

                            <td>
                                <button class="btn btn-danger" onclick="pregunta('<?php echo $mostrar[0] ?>')">Eliminar</button>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>

        </div>
        <div class="card-footer text-muted">
            Comentarios
        </div>
    </div>

</body>

</html>

<script>

    function pregunta(id) {
        alertify.confirm('Eliminar', 'Desea eliminar esta informacion ?',
            function() {
                eliminarD(id)
            },
            function() {
                alertify.error('Operacion cancelada')
            });
    }

    function eliminarD(id) {
        cadena = "id=" + id;

        $.ajax({
            type: "POST",
            url: "include/eliminaComentarios.php",
            data: cadena,
            success: function(r) {
                if (r == 1) {
                    alertify.success("Los datos se han eliminado");
                    location.reload();

                } else {
                    alertify.success("Error en eliminar datos");

                }
            }

        });


    }
</script>