<?php
/*Caso haja a tentativa de entrar sem inicio de sessão efetuado, aparece uma mensagem de erro e redereciona para o index*/
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito");
}


/*Inicia o histórico com o sensor de luminosidade, e caso receba mais algum POST com outro sensor, atualiza e muda os dados para o sensor recebido*/
if (isset($_POST["sensores"])) {
    $nomesensor = $_POST["sensores"];

    $ficheiro = file_get_contents("./api/files/" . $_POST["sensores"] . "/historico.txt");
} else {
    $_POST["sensores"] = "luminosidade";
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
<!--Refresh automático a cada 5 segundos-->
<!--<meta http-equiv="refresh" content="5">-->

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
    
    
    <!--Seletor de sensor para visualização do respetivo histórico-->
    <form class="form-historico" action="graficos.php" method="post">
            <div class="text-center">
                <label for="sensores">
                    <h1>Selecione um sensor</h1>
                </label>
                <br><br>
                <select class="selecionar form-select" name="sensores" id="sensores">
                    <option value="balanca">Balança</option>
                    <option value="temperatura">Temperatura</option>
                    <option value="luminosidade" selected>Luminosidade</option>
                    <option value="humidade">Humidade</option>
                </select>
                <br><br>
                <input class="botao" type="submit" value="Submit">
            </div>
        </form>



    <!-- GRÁFICO -->



    <?php 
    
        switch($_POST["sensores"]){
            case "humidade":
                echo '
                <canvas class="line-chart graficos"></canvas>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
            
                <script>
                    var ctx = document.getElementsByClassName("line-chart");
            
                 // parametros sao : type, data e options
                 var chartGraph = new Chart(ctx, {
                     type: "line",
                     data:{
                         labels: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez",],
                         datasets: [{
                             label:"HUMIDADE",
                             data: [20,30,10,35,4,82,99,23,80,70,90,23],
                             borderWidth: 4,
                             borderColor: "#0d6efd",
                             backgroundColor: "transparent"
                         }]
                     },
                     options: {
                         title: {
                             display: true,
                             fontSize: 30,
                             text: "Humidade média mensal"
                         },
                         labels: {
                             fontStyle: "bold"
                         }
                     }
                 });
            
                </script>';
                break;
            case "temperatura":
                echo '
                <canvas class="line-chart graficos"></canvas>
            
                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
            
                <script>
                    var ctx = document.getElementsByClassName("line-chart");
            
                 // parametros sao : type, data e options
                 var chartGraph = new Chart(ctx, {
                     type: "line",
                     data:{
                         labels: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez",],
                         datasets: [{
                             label:"TEMPERATURA",
                             data: [5,12,23,35,3,32,29,43,20,10,8,1],
                             borderWidth: 4,
                             borderColor: "#0d6efd",
                             backgroundColor: "transparent"
                         }]
                     },
                     options: {
                         title: {
                             display: true,
                             fontSize: 30,
                             text: "Temperatura média mensal"
                         },
                         labels: {
                             fontStyle: "bold"
                         }
                     }
                 });
            
                </script>';
                break;
                case "balanca":
                    echo '
                    <canvas class="line-chart graficos"></canvas>
                
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
                
                    <script>
                        var ctx = document.getElementsByClassName("line-chart");
                
                     // parametros sao : type, data e options
                     var chartGraph = new Chart(ctx, {
                         type: "line",
                         data:{
                             labels: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez",],
                             datasets: [{
                                 label:"BALANÇA",
                                 data: [4000,5000,10000,2000,1000,20000,10000,43000,20000,10000,8000,10000],
                                 borderWidth: 4,
                                 borderColor: "#0d6efd",
                                 backgroundColor: "transparent"
                             }]
                         },
                         options: {
                             title: {
                                 display: true,
                                 fontSize: 30,
                                 text: "Peso médio mensal"
                             },
                             labels: {
                                 fontStyle: "bold"
                             }
                         }
                     });
                
                    </script>';
                    break;
                    case "luminosidade":
                        echo '
                        <canvas class="line-chart graficos"></canvas>
                    
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
                    
                        <script>
                            var ctx = document.getElementsByClassName("line-chart");
                    
                         // parametros sao : type, data e options
                         var chartGraph = new Chart(ctx, {
                             type: "line",
                             data:{
                                 labels: ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez",],
                                 datasets: [{
                                     label:"LUMINOSIDADE",
                                     data: [30,20,23,35,3,32,99,93,80,20,28,1],
                                     borderWidth: 4,
                                     borderColor: "#0d6efd",
                                     backgroundColor: "transparent"
                                 }]
                             },
                             options: {
                                 title: {
                                     display: true,
                                     fontSize: 30,
                                     text: "Luminosidade média mensal"
                                 },
                                 labels: {
                                     fontStyle: "bold"
                                 }
                             }
                         });
                    
                        </script>';
                        break;
        }

    
    ?>


    


    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>