<?php
    include("conne.php");
    $dataC = mysqli_real_escape_string($conne, $_POST["data"]);
    $diaS = mysqli_real_escape_string($conne, $_POST["dia"]);
    $horasC = mysqli_real_escape_string($conne, $_POST["horas"]);

    $nomeM = mysqli_real_escape_string($conne, $_POST["nomeM"]);
    $especM = mysqli_real_escape_string($conne, $_POST["especM"]);
    $local = mysqli_real_escape_string($conne, $_POST["local"]);
    
    $sql = "INSERT INTO horarios (dia,horario,semanaD,nomeM,especialidade, lugar) VALUES ('{$dataC}','{$horasC}','{$diaS}','{$nomeM}','{$especM}','{$local}')";

    $executar = mysqli_query($conne, $sql);
    header("Location: dias.php");
?>