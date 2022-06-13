<?php
/*Caso haja a tentativa de entrar sem inicio de sessão efetuado, aparece uma mensagem de erro e redereciona para o index*/
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito");
}


/*Inicia o grafico com as luzes, e caso receba mais algum POST com outro sensor, atualiza e muda os dados para o sensor recebido*/
if (isset($_POST["sensores"])) {
    $nomesensor = $_POST["sensores"];

    $ficheiro = file_get_contents("./api/files/" . $_POST["sensores"] . "/historico.txt");
} else {
    $_POST["sensores"] = "luzes";
    $ficheiro = file_get_contents("./api/files/" . $_POST["sensores"] . "/historico.txt");
    $nomesensor = $_POST["sensores"];
    echo "ERRO!";
}

?>



<!DOCTYPE html>
<html lang="pt">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo-dashboard.css">
    <link rel="icon" href="imagens/logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartStorage</title>
</head>


<body>

    <!--Barra de navegação lateral com opção histórico e dashboard-->

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidenav">
        <span class="fs-4 titulo">SmartStorage</span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link text-white">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="historico.php" class="nav-link text-white">
                    Histórico
                </a>
            </li>
            <li class="nav-item">
                <a href="historico_imagens.php" class="nav-link text-white">
                    Imagens
                </a>
            </li>
            <li class="nav-item">
                <a href="graficos.php" class="nav-link active">
                    Gráficos
                </a>
            </li>
        </ul>
        <hr>
        <!--Janela flutuante para sair da conta-->
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="imagens/user-foto/admin.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong> <?php echo $_SESSION["username"] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="perfil.php">Ver Perfil</a></li>
                <li><a class="dropdown-item" href="logout.php">Sair da Conta</a></li>
            </ul>
        </div>
    </div>




    <div class="main">
    
    
    <!--Seletor de sensor para visualização do respetivo gráfico-->
    <form class="form-historico" action="graficos.php" method="post">
            <div class="text-center">
                <label for="sensores">
                    <h1>Selecione um sensor</h1>
                </label>
                <br><br>
                <select class="selecionar form-select" name="sensores" id="sensores">
                    <option value="portoes">Portão</option>
                    <option value="movimento">Movimento</option>
                    <option value="luzes" selected>luzes</option>
                </select>
                <br><br>
                <input class="botao" type="submit" value="Submit">
            </div>
        </form>





    <!-- Código JavaScript para geração do Gráfico -->
    <!-- Utilizamos uma library de javascript chamada chart.js --> 

    <?php 
    
        switch($_POST["sensores"]){
            case "portoes":
                $off = 0; #Quantidade de vezes que o portão esteve fechado
                $on = 0; #Quantidade de vezes que o portão esteve aberto

                $dados = explode(";", $ficheiro, -1);
                
                for ($j = 0; $j < count($dados); $j++) {
                    if($dados[$j] == 0){
                        $off = $off + 1;
                    }
                    elseif($dados[$j] == 1){
                        $on = $on + 1;
                    }
                }

                echo "

                <div class='resize-grafico'>
                <canvas class='pie-chart graficos'></canvas>
                </div>

                <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js'></script>
            
                <script>
                    var ctx = document.getElementsByClassName('pie-chart');
            
                 // parametros sao : type, data e options
                 var chartGraph = new Chart(ctx, {
                     type: 'pie',
                     data:{
                         labels: ['Aberto','Fechado',],
                         datasets: [{
                             label:'PORTÃO',
                             data: [$on,$off],
                             backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 205, 86)'
                              ],
                         }]
                     },
                     options: {
                        maintainAspectRatio: false,
                         title: {
                             display: true,
                             fontSize: 30,
                             text: 'Portão'
                         },
                         labels: {
                             fontStyle: 'bold'
                         }
                     }
                 });
            
                </script>";
                break;
            case "movimento":
                $off = 0; #Quantidade de vezes que o sensor detetou movimento
                $on = 0; #Quantidade de vezes que o sesnsor não detetou movimento

                $dados = explode(";", $ficheiro, -1);
                
                for ($j = 0; $j < count($dados); $j++) {
                    if($dados[$j] == 0){
                        $off = $off + 1;
                    }
                    elseif($dados[$j] == 1){
                        $on = $on + 1;
                    }
                }

                echo "

                <div class='resize-grafico'>
                <canvas class='pie-chart graficos'></canvas>
                </div>

                <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js'></script>
            
                <script>
                    var ctx = document.getElementsByClassName('pie-chart');
            
                 // parametros sao : type, data e options
                 var chartGraph = new Chart(ctx, {
                     type: 'pie',
                     data:{
                         labels: ['Movimento Detetado','Sem Movimento',],
                         datasets: [{
                             label:'MOVIMENTO',
                             data: [$on,$off],
                             backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 205, 86)'
                              ],
                         }]
                     },
                     options: {
                        maintainAspectRatio: false,
                         title: {
                             display: true,
                             fontSize: 30,
                             text: 'Sensor de Movimento'
                         },
                         labels: {
                             fontStyle: 'bold'
                         }
                     }
                 });
            
                </script>";
                break;
                case "luzes":
                $off = 0; #Quantidade de vezes que as luzes estiveram desligadas
                $on = 0; #Quantidade de vezes que as luzes estiveram ligadas

                $dados = explode(";", $ficheiro, -1);
                
                for ($j = 0; $j < count($dados); $j++) {
                    if($dados[$j] == 0){
                        $off = $off + 1;
                    }
                    elseif($dados[$j] == 1){
                        $on = $on + 1;
                    }
                }

                echo "

                <div class='resize-grafico'>
                <canvas class='pie-chart graficos'></canvas>
                </div>

                <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js'></script>
            
                <script>
                    var ctx = document.getElementsByClassName('pie-chart');
            
                 // parametros sao : type, data e options
                 var chartGraph = new Chart(ctx, {
                     type: 'pie',
                     data:{
                         labels: ['Ligadas','Desligadas',],
                         datasets: [{
                             label:'LUZES',
                             data: [$on,$off],
                             backgroundColor: [
                                'rgb(54, 162, 235)',
                                'rgb(255, 99, 132)',
                                'rgb(255, 205, 86)'
                              ],
                         }]
                     },
                     options: {
                        maintainAspectRatio: false,
                         title: {
                             display: true,
                             fontSize: 30,
                             text: 'Luzes'
                         },
                         labels: {
                             fontStyle: 'bold'
                         }
                     }
                 });
            
                </script>";
                    break;
        }

    
    ?>


    


    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>