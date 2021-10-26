<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="erros.css">
    <style>
        .nmarc{
            margin-top: 10px;
            background-color: rgb(211, 85, 85);

            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 10px 10px 10px ;

        }
        .nmarc p{
            color: black;
            font-size: 30px;

        }
    </style>
    <title>Dentista</title>
</head>
<body>
    <div class="container">
        <div class="menu">
            <nav>
                
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Quem somos</a></li>
                    <li><a href="#">Contato</a></li>
                    <li><a href="marcar.php">Agendamento</a></li>

                </ul>
            </nav>
        </div>
        <section class = "body">
            <?php
                if(isset($_SESSION['vazio'])):
                    
            ?>  
                <div class = "vazio_p">
                    <p class = "vazio">E-mail, telefone ou nome não estão preenchidos!</p>
                </div>
            <?php
                endif;
                unset($_SESSION['vazio']);

            ?>
            <?php
                if(isset($_SESSION['confirm'])):
            ?>
                <div class = "pree">
                    <p class = "pree_p">Consulta marcada com sucesso!</p>
                </div>
            <?php
                endif;
                unset($_SESSION['confirm']);
            ?>
            <?php
                if(isset($_SESSION['n_marcar'])):
            ?>
                <div class="nmarc">
                    <p class="nmarc_p">Consulta com esse CPF já marcado</p>
                </div>
            <?php
                endif;
                unset($_SESSION['n_marcar'])
            ?>
            <div class="forms">
                <form action="cadastro.php" method="POST">
                    <h3>Cadastro para Consulta</h3>
                    <input id = "color" type="text" name="email" placeholder="Seu e-mail" require>
                    <input id = "nome" type="text" name="nome" placeholder="Seu nome" require>

                    <input id = "telefone" type="text" name="telefone" placeholder="Seu telefone para contato" require>
                    <input id = "cpf" type="text" name="cpf" placeholder="Seu CPF">
                    <!--Checklist-->

                    <label for="datas" id = "datas__label">Escolha o dia da consulta</label>
                    <select name="valores" id="datas">
                        <?php 
                            include_once "conne.php";
                            $sql = "SELECT * FROM horarios";
                            $exe = $conne->query($sql);
                            while($row = $exe->fetch_assoc()):
                        ?>
                        <option value="<?php echo "Dr(a): " , $row['nomeM'], " | Local: ", $row['lugar'], " | Horário: ", $row['horario'] , " | Dia: ", $row['dia'] , " | Especialidade: " , $row['especialidade']; ?>"><?php echo "Dr(a): " , $row['nomeM'], " | Local: ", $row['lugar'], " | Horário: ", $row['horario'] , " | Dia: ", $row['dia'] , " | Especialidade: " , $row['especialidade']; ?></option>
                   
                        <?php
                            endwhile;
                        ?>
                    </select>

                    <label for="planos" id = "planos__label">Escolha o plano de saúde</label>
                    <select name="planos" id="planos">
                        <option value="Unimed">Unimed</option>
                        <option value="SulAmerica">Sul America</option>
                        <option value="Intermédica">Intermédica</option>
                        <option value="PortoSeguro">Porto Seguro</option>
                        <option value="SeguroDeBanco">Seguro de banco</option>
                        <option value="Outros">Outros</option>

                    </select>

                   
                    

                    <input type="submit" name="acao" value="Enviar">
                </form>
                
                <script>
                    var color = document.getElementById('color');
                    var nome = document.getElementById('nome');
                    var telefone = document.getElementById('telefone');
                    var cpf = document.getElementById('cpf');

                    function cores(listener){
                            listener.addEventListener('focus', ()=>{
                                listener.style.borderColor = "rgb(133, 223, 173)";
                            });
                            listener.addEventListener('blur', ()=>{
                                listener.style.borderColor = "rgb(0,0,0)";
                            });
                    }
                    cores(color)
                    cores(nome)
                    cores(telefone)
                    cores(cpf)
                </script>
            </div>
            
        </section>
        <div class="info">
                <p>Nossos atendimentos acontecem de Segunda a Sexta - Não possuímos Emergência.
                Faça uma marcação de consulta por vez <br>  Consulta por ordem de chegada.</p>
        </div>
        <footer>
            <p>Consultório dentário</p>
            <p>Todos os direitos reservados 2021</p>
        </footer>
    </div>
</body>
<!--FORMS - Para limitar o número de pessoas trabalha com ID - comparar com determinado valor-->
</html>