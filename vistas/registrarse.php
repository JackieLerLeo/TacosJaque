<?php
include_once(dirname(__FILE__).'/../modelos/conexion.php');

session_start();

if(isset($_SESSION['usuarios_idUsuario'])){
    $user_id = $_SESSION['usuarios_idUsuario'];
}else{
    $user_id='';
}

    //Registrar usuario 
    if(isset($_POST['submit'])){
        $idUsuario = unique_id();
        $usuario = $_POST['usuario'];
        $usuario = filter_var($usuario, FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $telefono = $_POST['telefono'];
        $telefono = filter_var($telefono, FILTER_SANITIZE_STRING);
        $contraseña = $_POST['contraseña'];
        $contraseña = filter_var($contraseña, FILTER_SANITIZE_STRING);
        $confCont = $_POST['confCont'];
        $confCont = filter_var($confCont, FILTER_SANITIZE_STRING);

        $select_user = $conn->prepare("SELECT * FROM 'usuarios' WHERE email=?");
        $select_user->execute([$email]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
        
        if($select_user->rowCount() > 0){
            $message[] = 'correo ya exitse';
            echo 'Ya existe correo';
        }else{
            if($pass != $cpass){
                $message[] = 'Confirmar su contraseña';
                echo 'Confirmar su contraseña';
            }else{
                $insert_user = $conn->prepare("INSERT INTO 'usuarios'(idUsuario,usuario,email,telefono,contraseña,confCont) VALUES (?,?,?,?,?,?)");
                $insert_user->execute([$idUsuasio,$usuario,$email,$telefono,$contraseña,$confCont]);
                $select_user = $conn->prepare("SELECT * FROM 'usuarios' WHERE email=? AND contraseña=?");
                $select_user->execute([$email,$contraseña]);
                $row = $select_user->fetch(PDO::FETCH_ASSOC);
                if($select_user->rowCount()>0){
                    $_SESSION['usuarios_idUsuario'] = $row['idUsuario'];
                    $_SESSION['usuarios_usuario'] = $row['usuario'];
                    $_SESSION['usuarios_email'] = $row['email'];                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/registrarse.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><img src="../assets/imagenes/Tacos.jpg" height="100" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.html">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>


    <!--Registrar-->
    <div class="container">

        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Crea una cuenta</h4>
                <p>
                    <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Inicia Session con
                        Twitter</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Inicia Session
                        con
                        facebook</a>
                </p>
                <p class="divider-text text-center">
                    <span class="bg-light">OR</span>
                </p>
                <form>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="usuario" class="form-control" placeholder="Nombre de Usuario" type="text" 
                        oninput="this.values = this.value.replace(/ \s/g, '')">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="email" class="form-control" placeholder="Correo Electronico" type="email" 
                        oninput="this.values = this.value.replace(/ \s/g, '')">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <select class="custom-select" style="max-width: 120px;">
                            <option selected="">+52</option>
                            <option value="1">+800</option>
                        </select>
                        <input name="telefono" class="form-control" placeholder="Numero de Telefono" type="text" 
                        oninput="this.values = this.value.replace(/ \s/g, '')">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="contraseña" class="form-control" placeholder="Contraseña" type="password"
                        oninput="this.values = this.value.replace(/ \s/g, '')">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="confCont" class="form-control" placeholder="Confirma tu Contraseña" type="password"
                        oninput="this.values = this.value.replace(/ \s/g, '')">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block" value="registrarse"> Crear Cuenta </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Ya tienes una cuenta?
                    <a href="./Login.php" class="btn btn-outline-success">Inicia Sesion</a> </p>
                </form>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->

    <!--Footer-->
    <footer class="kilimanjaro_area">
        <!-- Top Footer Area Start -->
        <div class="foo_top_header_one section_padding_100_70">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>Sobre Nuestro Producto</h5>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione nemo rerum doloremque
                                dolor, illo libero maiores eum veritatis mollitia rem fugit voluptatem illum eos,
                                eligendi aperiam minus ipsum autem itaque! </p>
                            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi natus explicabo incidunt
                                beatae consequatur, dolorum iste odit in quae cupiditate maxime cum sapiente nemo earum
                                error, reiciendis assumenda soluta. Cumque?</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part m-top-15">
                            <h5>Contactar nos</h5>
                            <ul class="kilimanjaro_social_links">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest</a></li>
                                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i> YouTube</a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>
                                <li><a herf="#" href="./vistas/contactus.html">Queja/Correo/Sugerencia</a></li>
                                <!--Nos manda a la otra-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>Latest News</h5>
                            <div class="kilimanjaro_blog_area">
                                <div class="kilimanjaro_thumb">
                                    <img class="img-fluid" src="../assets/imagenes/BuenaAtencion.jpg" alt="">
                                </div>
                                <a href="#">Buena Attencion</a>
                                <p class="kilimanjaro_date">21 Jan 2018</p>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                            <div class="kilimanjaro_blog_area">
                                <div class="kilimanjaro_thumb">
                                    <img class="img-fluid" src="../assets/imagenes/BuenaCalidad.png" alt="">
                                </div>
                                <a href="#">Excelente Calidad</a>
                                <p class="kilimanjaro_date">21 Jan 2018</p>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                            <div class="kilimanjaro_blog_area">
                                <div class="kilimanjaro_thumb">
                                    <img class="img-fluid" src="../assets/imagenes/Ingredientes.jpg" alt="">
                                </div>
                                <a href="#">Calidad Ingredientes</a>
                                <p class="kilimanjaro_date">21 Jan 2018</p>
                                <p>Lorem ipsum dolor sit amet, consectetur</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="kilimanjaro_part">
                            <h5>Quick Contact</h5>
                            <div class="kilimanjaro_single_contact_info">
                                <h5>Phone:</h5>
                                <p>+52 461 879 3950 <br> +52 461 038 9323</p>
                            </div>
                            <div class="kilimanjaro_single_contact_info">
                                <h5>Email:</h5>
                                <p>support@tacosjaque.com <br> recursoshumanos@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom Area Start -->
        <div class=" kilimanjaro_bottom_header_one section_padding_50 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>© All Rights Reserved by <a href="#">Webublogoverflow.blogspot -(with all love)<i
                                    class="fa fa-love"></i></a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>