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
    <center>
    <div class="card text-center" style="max-width: 1100px;">
        <div class="card-header">
            <h2>Información de la cuenta</h2>
        </div>
        <div class="card-body">

            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">Nombre del escritor</th>
                        <th scope="col">Apellido paterno</th>
                        <th scope="col">Correo del escritor</th>
                        <th scope="col">RFC</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Genero</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Referencias</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Tabla usuarios,Tabla escritor-->
                    <?php

                    //consulta para visualizar articulo
                    $articulo = "SELECT E.id_escritor, E.nombre,E.apeP,U.correo,E.rfc,E.edad,E.genero,E.direccion,E.telefono,E.referencias,E.tema_interes_cat
                FROM usuarios U JOIN escritor E
                ON (U.id_usuario=E.id_usuario)
                WHERE U.username='$userN'";


                    $resultado = mysqli_query($conexion, $articulo);
                    while ($mostrar = mysqli_fetch_row($resultado)) {
                        $datos = $mostrar[0] . "||" . $mostrar[1] . "||" . $mostrar[2] . "||" . $mostrar[3]
                            . "||" . $mostrar[4] . "||" . $mostrar[5] . "||" . $mostrar[6] . "||" . $mostrar[7]
                            . "||" . $mostrar[8] . "||" . $mostrar[9] . "||" . $mostrar[10];

                    ?>
                        <tr>

                            <td><?php echo $mostrar[1] ?></td>
                            <td><?php echo $mostrar[2] ?></td>
                            <td><?php echo $mostrar[3] ?></td>
                            <td><?php echo $mostrar[4] ?></td>
                            <td><?php echo $mostrar[5] ?></td>
                            <td><?php echo $mostrar[6] ?></td>
                            <td><?php echo $mostrar[7] ?></td>
                            <td><?php echo $mostrar[8] ?></td>
                            <td><?php echo $mostrar[9] ?></td>
                            <td><?php echo $mostrar[10] ?></td>

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
            Datos del escritor
        
        </div>
    </div>
    </center>
    <!-- Editar -->
    <div class="modal fade" id="Meditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="background: #2E2E2E;">
                <div class="modal-header">
                    <font color= "#FFFFFF">
                    <h5 class="modal-title" id="exampleModalLabel">Editar informacion</h5>
                    </font>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden="" id="idAuto" name="">
                    <font color= "#FFFFFF">
                    <label for="marca">Dirección:</label>
                    </font>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="DireccionEdit" placeholder="Dirección">
                    </div>
                    <font color= "#FFFFFF">
                    <label for="marca">Telefono:</label>
                    </font>
                    <div class="form-group">
                        <input type="text" class="form-control item" id="telEdit" placeholder="Telefono">
                    </div>
                    <font color= "#FFFFFF">
                    <label for="marca">Categoria</label>
                    </font>
                    <div class="form-group">
                        <select class="form-control item" id="categoriaEdit">
                            <option value="0" select>Seleccione una opción</option>
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
        $('#DireccionEdit').val(d[7]);
        $('#telEdit').val(d[8]);
        $('#categoriaEdit').val(d[10]);
    }

    function actualizaDatos() {
        id = $('#idAuto').val();
        direccion = $('#DireccionEdit').val();
        telefono = $('#telEdit').val();
        categoria = $('#categoriaEdit').val();
        cadena = "id=" + id + "&direccion=" + direccion + "&telefono=" + telefono + "&categoria=" + categoria;
        $.ajax({
            type: "POST",
            url: "include/actualizaDatos.php",
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