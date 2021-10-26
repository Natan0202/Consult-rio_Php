<?php
   include("conne.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estiloD.css">
    <link rel="stylesheet" href="estiloIndex.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="menu">
            <nav>
                
                <ul>
                    <li><a href="index.html">Home</a></li>
                    
                    <li><a href="marcar.php">Agendamento</a></li>

                </ul>
            </nav>
        </div>
        <div class="form">
            <form method="POST" action="incluirH.php">
                <h1>NÃO DEIXAR CAMPOS VAZIOS</h1>
                <br>
                <label for="data">DATA DA CONSULTA</label><br>
                <input type="text" name = "data" required="data"><br>

                <label for="semana">DIA DA SEMANA</label><br>
                <input type="text" name = "dia" required="semana"><br>

                <label for="horas">HORÁRIO DA CONSULTA</label><br>
                <input type="text" name = "horas" required="horas"><br>

                <label for="nomeM">NOME DO MÉDICO</label><br>
                <input type="text" name = "nomeM" required="nomeM"><br>

                <label for="especM">ESPECIALIDADE</label><br>
                <input type="text" name = "especM" required="especM"><br>

                <label for="local">LOCAL</label><br>
                <input type="text" name = "local" required="local"><br>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <table border = 1>
            <tr >
                <td>Nome do Médico</td>
                <td>Data</td>
                <td>Horário</td>
                <td>Dia da semana</td>
                <td>Especialidade</td>
                <td>Local</td>
            </tr>
            <?php 

                $sql = "SELECT * FROM horarios";
                $comando = $conne -> query($sql);
                while($row = $comando->fetch_assoc()):
            ?>
                    <tr>
                        <td><?php echo $row['nomeM']; ?></td>
                        <td><?php echo $row['dia']; ?></td>
                        <td><?php echo $row['horario']; ?></td>
                        <td><?php echo $row['semanaD']; ?></td>
                        <td><?php echo $row['especialidade']; ?></td>
                        <td><?php echo $row['lugar']; ?></td>
                    </tr>
            <?php 
                endwhile;
            ?>
        </table>
        <div class="espaco"></div>
    </div>
</body>
</html>