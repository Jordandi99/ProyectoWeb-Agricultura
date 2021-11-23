<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
     
<body>

    <div class="container-fluid">
        <div class="jumbotron-fluid" style="background-color:#006c17; padding-bottom: 20px;">
         <font color="white">
            <h1 class="text-center">Mi blog</h1>
        </font>

        </div>
        <nav class="navbar navbar-dark bg-dark" style="background-color: #006c17;">
            <nav class="nav nav-tabs nav-pills nav-fill navbar navbar-dark bg-dark">
           
            <a href="#" class="nav-item dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i> Categorias</a>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Categoria 1</a>
                <a href="#" class="dropdown-item">Categoria 2</a>
                <a href="#" class="dropdown-item">Categoria 3</a>
                <a href="#" class="dropdown-item">Categoria 4</a>
            </div>
            <a href="#" class="nav-item nav-link"><i class="fa fa-user"></i> Iniciar Sesion</a>
            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#myModal"><i class="fa fa-address-book"></i> Registrarse </a>
            <a href="#" class="nav-item nav-link"> <i class="fa fa-home"></i> Inicio</a>
        </nav>
            <form class="form-inline">
                <input class="form-control mr-sm-auto" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </nav>

    </div>

    <div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
                <h5>Reegistrarse como Escritor</h5>
                <p>Si deseas registrarte como un escritor en nuestro blog has clic en el siguiente enlace -> 
                    <a href="registroEscritores.html" role="button" class="btn btn-success popover-test" title="Da clic aquí para registrarte" data-content="Popover body content is set in this attribute.">Registrarse</a></p>
                <hr>
                <h5>Registrarse como Lector</h5>
                <p>Si deseas registrarte como un lector en nuestro blog has clic en el siguiente enlace -> 
                    <a href="registroLectores.html" role="button" class="btn btn-success popover-test" title="Da clic aquí para registrarte" data-content="Popover body content is set in this attribute.">Registrarse</a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

    
    
</body>
</html>