<?php
    include("conne.php");
    session_start();
    $vazio = $_POST['nome'];
    if(empty($_POST['email']) || empty($_POST['nome']) || empty($_POST['telefone'])){
        $_SESSION['vazio'] = $vazio;
        header("Location: marcar.php");
        exit;
    }
    $nome = mysqli_real_escape_string($conne, $_POST['nome']);
    $email = mysqli_real_escape_string($conne, $_POST['email']);
    $telefone = mysqli_real_escape_string($conne, $_POST['telefone']);
    $data = mysqli_real_escape_string($conne, $_POST['valores']);
    $planos = mysqli_real_escape_string($conne, $_POST['planos']);
    $cpf = mysqli_real_escape_string($conne, $_POST['cpf']);
    
    /**COUNT ID */
    /*$consulta = mysqli_query("SELECT COUNT(id) AS total FROM consulta");
    $row = mysqli_fetch_assoc($consulta);
    $count = $row['total'];*/

    /*Verificando a existência no db*/
    $consulta = "SELECT cpf FROM consulta WHERE cpf = '{$cpf}'";
    $asoc = mysqli_query($conne,$consulta);
    $rows = mysqli_num_rows($asoc);
    if($rows > 0){
        header("Location: marcar.php");
        $nome = $_POST['nome'];
        $_SESSION['n_marcar'] = $nome; 
        exit;
    }else{
        $sql = "INSERT INTO consulta (email, nome, telefone, dia, cpf, plano) values ('{$email}', '{$nome}', '{$telefone}', '{$data}', '{$cpf}', '{$planos}')";
        $executar = mysqli_query($conne, $sql);
        $_SESSION['confirm'] = $sql;
        header("Location: marcar.php");
        
    }
    


?>