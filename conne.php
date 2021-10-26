<?php
    define('HOST', '127.0.0.1');
    define('USER' , 'root');
    define('SENHA', '123456');
    define('DB', 'dentario');
    $conne = mysqli_connect(HOST, USER, SENHA, DB) or die ("ERRO!");
    if($conne){
        echo 'Conectado!';
    }

?>