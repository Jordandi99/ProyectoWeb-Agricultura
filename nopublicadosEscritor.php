<?php
require_once 'include/head.php';
require_once 'include/conexion.php';
$conexion
?>
<link rel="stylesheet" href="css/estilos_home.css">
<title>Información</title>
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

    <div class="card text-center">
        <div class="card-header">
            Articulos no publicados
        </div>
        <div class="card-body">

            <table class="table table-bordered table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Autor</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre del articulo</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Tabla usuarios,Tabla escritor-->
                    <?php

                    //consulta para visualizar articulo
                    $articulo = "SELECT A.id_articulo, E.nombre,E.apeP,A.categoria,A.nom,A.cuerpo,A.fecha,A.estatus
                    FROM usuarios U JOIN escritor E
                    ON (U.id_usuario=E.id_usuario)
                    JOIN articulo A
                    ON (E.id_escritor=A.id_escritor)
                    WHERE U.username='$userN' and A.estatus='No publicado'";


                    $resultado = mysqli_query($conexion, $articulo);
                    while ($mostrar = mysqli_fetch_row($resultado)) {
                        $datos = $mostrar[0] . "||" . $mostrar[1] . "||" . $mostrar[2] . "||" . $mostrar[3]
                            . "||" . $mostrar[4] . "||" . $mostrar[5] . "||" . $mostrar[6] . "||" . $mostrar[7];

                    ?>
                        <tr>
                            <td><?php echo $mostrar[1] . " " . $mostrar[2] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[4] ?></td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#Mver" onclick="agregaFormv('<?php echo $datos ?>')">Visualizar</button>
                            </td>
                            <td><?php echo $mostrar[6] ?></td>
                            <td><?php echo $mostrar[7] ?></td>
                            <td>
                                <button class="btn btn-info" data-toggle="modal" data-target="#Meditar" onclick="agregaForm('<?php echo $datos ?>')">Editar</button>
                            </td>
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
            Articulos guardados
        </div>
    </div>
    <!-- Editar -->
    <div class="modal fade" id="Meditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar informacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden="" id="idAuto" name="">
                    <label for="marca">Categoria</label>
                    <div class="form-group">
                        <select class="form-control item" id="categoriaArt">
                            <option value="0" select>Seleccione una opción</option>
                            <option value="Maquinaria">Maquinaria</option>
                            <option value="Productos">Productos</option>
                            <option value="Plagas">Plagas</option>
                            <option value="Cultivos">Cultivos</option>
                        </select>
                    </div>
                    <label for="marca">Nombre del articulo</label>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="nombreArt" placeholder="">
                    </div>
                    <label for="marca">Contenido del articulo</label>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="contenidoArt" placeholder="">
                    </div>
                    <label for="marca">Estado</label>
                    <div class="form-group">
                        <select class="form-control item" id="estadoArt">
                            <option value="0" select>Seleccione una opción</option>
                            <option value="Publicado">Publicar</option>
                            <option value="No publicado">No publicar</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="Edita">
                        Confimar Edicion
                    </button>
                </div>
            </div>
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


</html>
<script>
    $('#Edita').click(function() {
        actualizaDatos();
    });

    function agregaForm(datos) {
        d = datos.split('||');
        $('#idAuto').val(d[0]);
        $('#contenidoArt').val(d[5]);
        $('#nombreArt').val(d[4]);
        $('#categoriaArt').val(d[3]);
        $('#estadoArt').val(d[7]);
    }

    function agregaFormv(datos) {
        d = datos.split('||');
        $('#Txtarea').val(d[5]);
    }

    function actualizaDatos() {
        id = $('#idAuto').val();
        cont = $('#contenidoArt').val();
        nom = $('#nombreArt').val();
        cat = $('#categoriaArt').val();
        st = $('#estadoArt').val();
        cadena = "id=" + id + "&cont=" + cont + "&nom=" + nom + "&cat=" + cat + "&st=" + st;
        $.ajax({
            type: "POST",
            url: "include/actualizarArticulo.php",
            data: cadena,
            success: function(r) {
                if (r == 1) {
                    alertify.success("Datos actualizados");
                    location.reload();

                } else {
                    alertify.success("Error en actualizar datos");

                }
            }

        });
    }

    function pregunta(id) {
        alert(id);
        console.log(id);
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
            url: "include/eliminarArticulo.php",
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