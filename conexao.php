<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "mc2";

   

    if( $conn = mysqli_connect($server,$user, $pass, $bd) ) {
     ;
    } else echo "Erro!";

    function mensagem ($texto, $tipo) {
        echo  "<div class='alert alert-$tipo' role='alert'>
            $texto
    </div>";
    }


?>