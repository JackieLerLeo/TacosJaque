<?php

require_once '../modelos/conexion.php';
require_once '../modelos/status.php';

$mostrar = new status();

    $status= $mostrar->mostrarStatus();

