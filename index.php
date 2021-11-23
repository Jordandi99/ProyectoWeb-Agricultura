<?php require_once 'include/head.php';?>
<title>Proyecto Agricultura</title>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="#">ARTICLES</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <form class="form-inline" action="/action_page.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar Articulo">
            <button class="btn btn-success" type="submit">Buscar</button>
        </form>
    </nav>

    <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Iniciar sesión</a>
            </li>
        </ul>
    </div>
</nav>

</body>
</html>