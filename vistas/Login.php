<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="../index.html"><img src="../assets/imagenes/Tacos.jpg" height="80" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Inicio<span class="sr-only">(current)</span></a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ingredientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Menu</a>
                    </li>
                    -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>

    <!--Login-->
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="../controladores/ctrllogin.php" method="post">
                            <h3 class="text-center text-info">Iniciar Sesion</h3>
                            <div class="form-group">
                                <label for="Usuario" class="text-info">Nombre de usuario*:</label><br>
                                <input type="email" name="correo" id="usuario" class="form-control" 
                                required placeholder="Ingresa tu usuario " maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="Contraseña" class="text-info">Contraseña*:</label><br>
                                <input type="password" name="password" id="contraseña" class="form-control" 
                                required placeholder="Ingresa tu contraseña " maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Recordarme</span> <span><input
                                id="recordarme" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="./registrarse.php" class="text-info">Registrar se aqui</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</body>


</html>