<?php
require_once 'include/head.php';
require_once 'include/conexion.php';
$conexion
?>
<link rel="stylesheet" href="css/estilos_home.css">
<title>Agregar Articulos</title>
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
    <div class="card-footer text-muted" style="max-width: 700px;">
        <div class="card-body text-center">
            <font color="white">
            <h5 class="card-title">Escriba su articulo</h5>
            </font>
            <form id="Maquinas">
                <?php
                date_default_timezone_set('America/Mexico_City');
                $fecha = date("Y-m-d");
                ?>

              <center>
                <div class="form-group" style="max-width: 700px;">
                    <select class="form-control item" id="cateArt" style="border-color: black; border-width:2px; border-radius: 10px">
                        <option selected>Seleccione una categoria</option>
                        <option value="Maquinaria">Maquinaria</option>
                        <option value="Productos">Productos</option>
                        <option value="Plagas">Plagas</option>
                        <option value="Cultivo">Cultivo</option>
                    </select>
                </div>
                </center>
                <center>
                <div class="form-group" style="max-width: 700px;" >
                <font color="white">
                    <label for="ejemploArea">Fecha</label>
                </font>
                    <input type="text" style="border-color: black; border-width:2px; border-radius: 10px" class="form-control item" id="fechaArt" name="fechaArt" value=" <?php echo $fecha ?>" disabled>
                </div>
                </center>
                <center>
                <div class="form-group" style="max-width: 700px;">
                <font color="white">
                    <label for="ejemploArea">Nombre del articulo</label>
                </font>
                    <input type="text" style="border-color: black; border-width:2px; border-radius: 10px" class="form-control item" id="nombreArt" name="nombreArt" placeholder="" required>
                </div>
                </center>
                <center>
                <div class="form-group" style="max-width: 700px;">
                <font color="white">
                    <label for="ejemploArea">Ingrese su articulo</label>
                </font>
                    <textarea class="form-control item" style="border-color: black; border-width:2px; border-radius: 10px" id="contArt" rows="5" required></textarea>
                </div>
                </center>
                <center>
                <div class="form-group" style="max-width: 700px;">
                    <select class="form-control item" style="border-color: black; border-width:2px; border-radius: 10px" id="statusArt">
                        <option value="0" selected>Seleccione el estado del articulo</option>
                        <option value="Publicado">Publicar</option>
                        <option value="No publicado">No publicar</option>
                        >
                    </select>
                </div>
                </center>


                
            
                    <center>
                       <button id="btnguardar" name="btnguardar" class="btn btn-success">Crear</button>
                       </center>
                    
                


            </form>
        </div>

    </div>
    </center>

</body>
<script>
    $("#btnguardar").click(function(e) {
        e.preventDefault();
        console.log($("#cateArt").val());
        console.log($("#nombreArt").val());
        console.log($("#contArt").val());
        console.log($("#fechaArt").val());
        console.log($("#statusArt").val());
        agregardatos();
    });


    function agregardatos() {
        cadena = "categoria=" + $("#cateArt").val() + "&nom=" + $("#nombreArt").val() + "&cuerpo=" + $("#contArt").val() + "&fecha=" + $("#fechaArt").val() + "&estatus=" + $("#statusArt").val();
        $.ajax({
            type: "POST",
            url: "include/agregarArticulo.php",
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
</script>

</html>