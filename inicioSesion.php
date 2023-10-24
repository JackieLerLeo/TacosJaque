<?php
include_once 'includes/controladorSesion.php';
include_once 'includes/sesion.php';

$userSession = new $userSession();
$user = new User();

if(isset($_SESSION['usuario'])){
    echo "Hay sesion";
} else if(isset($_POSt['usuario']) && isset($_POST['contraseña'])){
   // echo "Validacion de Login"

   $userForm = $_POST['usuario'];
   $passForm = $_POST['contraseña'];

   if($user->userExists($userForm, $passForm)){
    echo "Usario Validado";
   }else{
    echo "Incorrecto";
   }
}else{
    //echo "Login";
   include_once 'vistas/Login.php';
}
 ?>
