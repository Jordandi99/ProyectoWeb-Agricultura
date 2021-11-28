<?php
require_once 'include/head.php';
require_once 'include/conexion.php';
$conexion
?>
<?php require_once 'include/head.php'; ?>
<title>Inicio Lector</title>
<link rel="stylesheet" href="css/estilos_home.css">
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

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar Articulo">
                <button class="btn btn-success" type="submit">Buscar</button>
            </form>
        </nav>

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="datosLector.php"><i class="fas fa-info"></i> Información</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registroComentarios.php"><i class="fas fa-list"></i> Registro de comentarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="include/salir.php"> <i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
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
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d");
        ?>
        <?php

        $articulo = "SELECT A.id_articulo,A.categoria,A.nom,A.cuerpo, E.nombre,E.apeP,A.fecha
         FROM usuarios U JOIN escritor E
         ON (U.id_usuario=E.id_usuario)
         JOIN articulo A
         ON (E.id_escritor=A.id_escritor)
         WHERE  A.estatus='publicado' ";


        $resultado = mysqli_query($conexion, $articulo);
        while ($mostrar = mysqli_fetch_row($resultado)) {
            $datos = $mostrar[0] . "||" . $mostrar[1] . "||" . $mostrar[2] . "||" . $mostrar[3]
                . "||" . $mostrar[4] . "||" . $mostrar[5] . "||" . $mostrar[6]

        ?>
            <div class="card text-center" style="margin-top: 50px;">
                <div class="card-header">
                    <strong style="color: white;"> Autor: <?php echo $mostrar[4] . " " . $mostrar[5] ?> </strong>
                </div>
                <div class="card-header">
                        <strong style="color: white;"> Categoria: <?php echo $mostrar[1] ?> </strong>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><Strong style="color: white;"> Titulo: <td><?php echo $mostrar[2] ?></td> </Strong></h5>
                    <p class="card-text" style="color: white;"> <?php echo $mostrar[3] ?></p>
                </div>
                <div class="card-footer text-muted">
                    Fecha de publicación: <?php echo $mostrar[6] ?>
                </div>
                <div class="card-footer text-muted">
                    <a href="#" id="btnHomeArt" class="btn btn-primary" data-toggle="modal" data-target="#NuevoComen" onclick="paraguardar('<?php echo $datos ?>')">Agregar Comentario</a>
                </div>
            </div>
        <?php
        }

        ?>

    </div>

    <!-- Guardar nuevo comentario-->
    <div class="modal fade" id="NuevoComen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: black;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contenido del comentario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="text" hidden="true" id="idAuto" name="idAuto">
                    <div class="form-group">
                        <label for="ejemploArea">Fecha</label>
                        <input type="text" class="form-control item" id="fechaC" name="fechaC" value=" <?php echo $fecha ?>" disabled>
                    </div>
                    <textarea class="form-control" id="Txtarea1" name="Txtarea1" rows="5"></textarea>

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
    $("#Ncomen").click(function(e) {
        e.preventDefault();
        console.log($("#idAuto").val());
        console.log($("#Txtarea1").val());
        console.log($("#fechaC").val());
        agregardatos();
        
    });


    function agregardatos() {
        cadena1 = "id_articulo=" + $("#idAuto").val() + "&comentario=" + $("#Txtarea1").val() + "&fecha=" + $("#fechaC").val();
        
        $.ajax({
            type: "POST",
            url: "include/agregarComentario.php",
            data: cadena1,
            success: function(r) {
             

                if (r == 1) {
                    alertify.success("Datos agregados con exito");
                    

                } else {
                    alertify.success("Fallo el servidor");

                }
            }

        });
    }


    function agregaFormv(datos) {
      
        d = datos.split('||');
        $('#Txtarea').val(d[3]);
       
    }

    function paraguardar(datos){
        <?php
        date_default_timezone_set('America/Mexico_City');
        date("Y-m-d");
        ?>
        d = datos.split('||');
        $('#idAuto').val(d[0]);
      
    }
</script>