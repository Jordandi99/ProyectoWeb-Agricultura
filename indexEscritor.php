<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- csss -->
    <link rel="stylesheet" href="CSS/style.css">

    <title>Registro para Escritores</title>
</head>
<body>
    <h1 class="header-ed">
        Nuevo Registro para Escritores
    </h1>
    <!-- 1er Contenedor -->
    <div class="art-bothside">
        <!-- 2do Contenedor -->
        <div class="mid-cls">
            <!-- 3er Contenedor -->
            <div class="art-right-ed">
                <h2>Ingrese sus datos</h2>
                <!-- Area del formulario -->
                <form class="registroE" action="" method="post">
                    <!-- Llenado del formular -->
                    <div class="main">
                        <div class="form-left-to-em">
                            <input type="text" name="nombre" placeholder="Nombre(s)..." required="" />
                        </div>
                        <br>
                        <div class="form-right-ed">
                            <input type="text" name="apel_p" placeholder="Apellido Paterno..." required="" />
                        </div>
                        <br>
                        <div class="form-left-to-em">
                            <input type="text" name="apel_m" placeholder="Apellido Materno..." required="" />
                        </div>
                        <br>
                        <div class="form-right-ed">
                            <input type="text" name="rfc" placeholder="RFC..." required="" />
                        </div>
                        <br>
                        <div class="form-left-to-em">
                            <input type="number" name="edad" placeholder="Edad..." required="" />
                        </div>
                        <br>
                        <div class="form-right-ed">
                            <input type="text" name="direccion" placeholder="Dirección..." required="" />
                        </div>
                        <br>
                        <div class="form-left-to-em">
                            <input type="text" name="telefono" placeholder="Teléfono..." required="" />
                        </div>
                        <br>
                    </div>
                    <!-- Fin Llenado del formular -->

                    <!-- Area de texto -->
                    <div class="main">
                        <h4>Referencia de articulos escritos:</h4>
                        <div class="form-left-to-em">
                            <textarea name="Referencias" rows="8" cols="40" placeholder="Escribe tus referecias..."></textarea>
                        </div>
                        <br>
                    </div>
                    <!-- Fin Area de texto -->

                    <!-- Area de interes -->
                    <div class="main">
                        <fieldset>
                            <legend>Seleccione un tópico de interés...</legend>
                            <label>
                                <input type="checkbox" name="topico" value="Economía" /> Economía. </label>
                            <label>
                                <input type="checkbox" name="topico" value="Cultivos"/> Cultivos. </label>
                            <label>
                                <input type="checkbox" name="topico" value="Jornadas"/> Jornadas. </label>
                            <label>
                                <input type="checkbox" name="topico" value="Blogs"/> Blogs. </label>
                        </fieldset>
                        <br>
                    </div>
                    <!-- Fin Area de interes -->
                    
                    <!-- Botones -->
                    <div class="btnn">
                        <button type="submit" value="registar">Registrarse</button>
                        <button type="button" value="cancelar">Cancelar</button>
                    </div>
                    <!-- Fin Botones -->
                </form>
                <!-- Fin Area del formulario -->
            </div>
            <!-- Fin 3er Contenedor -->
            
            <!-- Imagen -->
            <div class="art-left-ed">
                <img src="img/img_escritor.jpg" alt="">
            </div>
            <!-- Fin Imagen -->
        </div>
        <!-- Fin 2do Contenedor -->
        <!-- Leyenda -->
        <div class="footer">
            <p>
                &Agricultura_U5
            </p>
        </div>
        <!-- Fin Leyenda -->
    </div>
    <!-- Fin 1er Contenedor -->
</body>
</html>