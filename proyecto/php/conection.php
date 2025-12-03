<?php

    $servidor="localhost";
    $nombreBd="go_shopping";
    $usuario="root";
    $pass="alejandro";
    $con = new mysqli($servidor,$usuario,$pass,$nombreBd);
    if($con -> connect_error ){
        die("No se pudo conectar");
    }

    

?>