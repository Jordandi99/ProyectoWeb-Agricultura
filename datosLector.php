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
        <a class="navbar-brand" href="indexLector.php"><?php echo "Bienvenido $userN" ?> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="datosLector.php"> <i class="fas fa-info"></i> Información</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registroComentarios.php"><i class="fas fa-list"></i> Registro de comentarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="include/salir.php"> <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card text-center">
        <div class="card-header">
            Mis datos
        </div>
        <div class="card-body">

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nombre del lector</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Categoria de interes</th>
                        <th scope="col">Editar</th>

                    </tr>
                </thead>
                <tbody>
                    <!--Tabla usuarios,Tabla escritor-->
                    <?php

                    //consulta para visualizar articulo
                    $articulo = "SELECT L.id_lector, L.nombre,L.apeP,U.correo,L.edad,L.genero,L.tema_interes_cat
                FROM usuarios U JOIN lector L
                ON (U.id_usuario=L.id_usuario)
                WHERE U.username='$userN'";

                    $resultado = mysqli_query($conexion, $articulo);
                    while ($mostrar = mysqli_fetch_row($resultado)) {
                        $datos = $mostrar[0] . "||" . $mostrar[1] . "||" . $mostrar[2] . "||" . $mostrar[3]
                            . "||" . $mostrar[4] . "||" . $mostrar[5] . "||" . $mostrar[6];

                    ?>
                        <tr>

                            <td><?php echo $mostrar[1] ?></td>
                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[4] ?></td>
                            <td><?php echo $mostrar[5] ?></td>
                            <td><?php echo $mostrar[6] ?></td>

                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#Meditar" onclick="agregaForm('<?php echo $datos ?>')">Editar</button>
                            </td>
                        </tr>
                    <?php
                    }

                    ?>
                </tbody>
            </table>

        </div>
        <div class="card-footer text-muted">
            Datos del usuario
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
                        <select class="form-control item" id="categoriaEdit">
                            <option value="0">Seleccione una opción</option>
                            <option value="Maquinaria">Maquinaria</option>
                            <option value="Productos">Productos</option>
                            <option value="Plagas">Plagas</option>
                            <option value="Cultivos">Cultivos</option>
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

</body>


</html>
<script>
    $('#Edita').click(function() {
        actualizaDatos();
    });

    function agregaForm(datos) {
        d = datos.split('||');
        $('#idAuto').val(d[0]);
        $('#categoriaEdit').val(d[6]);
    }

    function actualizaDatos() {
        id = $('#idAuto').val();
        categoria = $('#categoriaEdit').val();
        cadena = "id=" + id + "&categoria=" + categoria;
        $.ajax({
            type: "POST",
            url: "include/actualizarDatosLec.php",
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
</script>

</body>


</html>