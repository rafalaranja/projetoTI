<?php
/*Caso haja a tentativa de entrar sem inicio de sessão efetuado, aparece uma mensagem de erro e redereciona para o index*/
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito");
}
?>
<?php

/*Inicia o histórico com o sensor de luminosidade, e caso receba mais algum POST com outro sensor, atualiza e muda os dados para o sensor recebido*/
if (isset($_POST["sensores"])) {
    $nomesensor = $_POST["sensores"];

    $ficheiro = file_get_contents("./api/files/" . $_POST["sensores"] . "/historico.txt");
} else {
    $_POST["sensores"] = "luminosidade";
    $ficheiro = file_get_contents("./api/files/" . $_POST["sensores"] . "/historico.txt");
    $nomesensor = $_POST["sensores"];
    /*echo "ERRO!";*/
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
                <a href="historico.php" class="nav-link active">
                    Histórico
                </a>
            </li>
            <li class="nav-item">
                <a href="historico_imagens.php" class="nav-link text-white">
                    Imagens
                </a>
            </li>
            <li class="nav-item">
                <a href="graficos.php" class="nav-link text-white">
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
        <form class="form-historico" action="historico.php" method="post">
            <div class="text-center">
                <label for="sensores">
                    <h1>Selecione um sensor</h1>
                </label>
                <br><br>
                <select class="selecionar form-select" name="sensores" id="sensores">
                    <option value="balanca">Balança</option>
                    <option value="temperatura">Temperatura</option>
                    <option value="portoes">Portão</option>
                    <option value="luminosidade" selected>Luminosidade</option>
                    <option value="humidade">Humidade</option>
                    <option value="fumo">Detetor de Fumo</option>
                    <option value="movimento">Detetor de Movimento</option>
                    <option value="luzes">Luzes</option>
                    <option value="ac">A/C</option>
                    <option value="rociador">Rociador</option>
                    <option value="alarme">Alarme</option>
                    <option value="coluna">Coluna</option>
                </select>
                <br><br>
                <input class="botao" type="submit" value="Submit">
            </div>
        </form>

        <!--Tabela de histórico-->
        <div class="container centrar">
            <div class="card">
                <div class="card-header">
                    <p><b>
                            <h3>Histórico - <?php echo $_POST["sensores"] ?></h3>
                        </b></p>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> Data de Atualização</th>
                                <th scope="col">Valor</th>
                                <?php
                                if ($_POST["sensores"] == "portoes" || $_POST["sensores"] == "fumo") {
                                    echo '<th scope="col">Estado/Alertas</th>';
                                }

                                $dados = explode(";", $ficheiro, -1);

                                ?>


                            </tr>
                        </thead>
                        <tbody class="centrar">
                            <?php

                            for ($j = 0; $j < count($dados); $j++) {

                                if ($j % 2 == 0 || $j == 0) {
                                    echo "<tr>";
                                    echo "<td>" . $dados[$j] . "</td>";
                                } else {

                                    echo "<td>" . $dados[$j] . "</td>";
                                    /*Caso seja o sensor de fumo ou o portão aparece o estado dos mesmos*/
                                    if ($nomesensor == "fumo") {

                                        if ($dados[$j] == "desligado") {

                                            echo '<td><span class="badge rounded-pill bg-danger">Desligado</span></td>';
                                        } elseif($dados[$j] == "ligado") {
                                            echo '<td><span class="badge rounded-pill bg-success">Ligado</span></td>';
                                        }else{
                                            echo '<td><span class="badge rounded-pill bg-warning">Erro</span></td>';
                                        }
                                    }

                                    if ($nomesensor == 'portoes') {

                                        if ($dados[$j] == "0") {

                                            echo '<td><span class="badge rounded-pill bg-danger">Fechados</span></td>';
                                        } elseif($dados[$j] == "1") {
                                            echo '<td><span class="badge rounded-pill bg-success">Abertos</span></td>';
                                        } else{
                                            echo '<td><span class="badge rounded-pill bg-warning">Erro</span></td>';
                                        }
                                    }
                                    echo "</tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>