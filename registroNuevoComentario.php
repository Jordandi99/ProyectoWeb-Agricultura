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
                    <a class="nav-link" href="datosLector.php">Información</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registroComentarios.php">Registro de comentarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="include/salir.php">Cerrar Sesión</a>
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
                        <th scope="col">Categoria</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Nombre del articulo</th>
                        <th scope="col">Ver Articulo</th>
                        <th scope="col">Agregar nuevo comentario</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    date_default_timezone_set('America/Mexico_City');
                    $fecha = date("Y-m-d");
                    ?>

                    <?php

                    //consulta para visualizar articulo

                    ////////////////////     1            2             3        4      5        6        7
                    $articulo = "SELECT A.id_articulo,L.id_usuario,A.categoria,A.nom, A.cuerpo,E.nombre,E.apeP
                    FROM lector L JOIN usuarios U
                    ON (L.id_usuario=U.id_usuario)
                    JOIN comentarios C
                    ON (U.id_usuario=C.id_usuario)
                    JOIN articulo A
                    ON (C.id_articulo=A.id_articulo)
                    JOIN escritor E
                    ON(A.id_escritor=E.id_escritor)";

                    $resultado = mysqli_query($conexion, $articulo);
                    while ($mostrar = mysqli_fetch_row($resultado)) {
                        $datos = $mostrar[0] . "||" . $mostrar[1] . "||" . $mostrar[2] . "||" . $mostrar[3]
                            . "||" . $mostrar[4] . "||" . $mostrar[5] . "||" . $mostrar[6];

                    ?>
                        <tr>

                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[6] . " " . $mostrar[7] ?></td>
                            <td><?php echo $mostrar[4] ?></td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#Mver" onclick="agregaFormv('<?php echo $datos ?>')">Visualizar</button>
                            </td>
                            <td>
                                <button class="btn btn-primary">Agregar nuevo comentario</button>
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

    <!-- Guardar nuevo comentario-->
    <div class="modal fade" id="NuevoComen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contenido del comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <input type="text" hidden="" id="idAuto" name="idAuto">
                <input type="text" hidden="" id="idUsuario" name="idUsuario">
                <div class="modal-body">
                    <textarea class="form-control" id="Txtarea" name="Txtarea" rows="5" readonly></textarea>
                </div>
                <div class="form-group">
                    <label for="ejemploArea">Fecha</label>
                    <input type="text" class="form-control item" id="fechaC" name="fechaC" disabled>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="Ncomen">
                        Publicar comentario
                    </button>
                </div>


            </div>
        </div>
    </div>

</body>

</html>

<script>
    $("#btnguardar").click(function(e) {
        e.preventDefault();
        console.log($("#idAuto").val());
        console.log($("#idUsuario").val());
        console.log($("#Txtarea").val());

        agregardatos();
    });


    function agregardatos() {
        cadena = "id_articulo=" + $("#idAuto").val() + "&id_usuario=" + $("#idUsuario").val() + "&comentario=" + $("#Txtarea").val() + "&fecha=" + $("#fechaC").val();
        $.ajax({
            type: "POST",
            url: "include/agregarComentario.php",
            data: cadena,
            success: function(r) {
                if (r == 1) {
                    alertify.success("Datos agregados con exito");
                    location.reload();

                } else {
                    alertify.success("Fallo el servidor");

                }
            }

        });
    }


    function agregaFormv(datos) {
        <?php
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d");
        ?>
        d = datos.split('||');
        $('#idAuto').val(d[0]);
        $('#idUsuario').val(d[1]);
        $('#Txtarea').val(d[5]);
        $('#fechaC').val($fecha);
    }
</script>