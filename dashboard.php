<?php
/*Caso haja a tentativa de entrar sem inicio de sessão efetuado, aparece uma mensagem de erro e redereciona para o index*/
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito");
}

/*Atribuir às variáveis os valores, nomes e horas dos ficheiros*/


$valor_temperatura = file_get_contents("api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("api/files/temperatura/hora.txt");
$nome_temperatura = file_get_contents("api/files/temperatura/nome.txt");

$valor_luminosidade = file_get_contents("api/files/luminosidade/valor.txt");
$hora_luminosidade = file_get_contents("api/files/luminosidade/hora.txt");
$nome_luminosidade = file_get_contents("api/files/luminosidade/nome.txt");

$valor_portoes = file_get_contents("api/files/portoes/valor.txt");
$hora_portoes = file_get_contents("api/files/portoes/hora.txt");
$nome_portoes = file_get_contents("api/files/portoes/nome.txt");

$valor_fumo = file_get_contents("api/files/fumo/valor.txt");
$hora_fumo = file_get_contents("api/files/fumo/hora.txt");
$nome_fumo = file_get_contents("api/files/fumo/nome.txt");

$valor_humidade = file_get_contents("api/files/humidade/valor.txt");
$hora_humidade = file_get_contents("api/files/humidade/hora.txt");
$nome_humidade = file_get_contents("api/files/humidade/nome.txt");

$valor_balanca = file_get_contents("api/files/balanca/valor.txt");
$hora_balanca = file_get_contents("api/files/balanca/hora.txt");
$nome_balanca = file_get_contents("api/files/balanca/nome.txt");

$valor_movimento = file_get_contents("api/files/movimento/valor.txt");
$hora_movimento = file_get_contents("api/files/movimento/hora.txt");
$nome_movimento = file_get_contents("api/files/movimento/nome.txt");

$valor_luzes = file_get_contents("api/files/luzes/valor.txt");
$hora_luzes = file_get_contents("api/files/luzes/hora.txt");
$nome_luzes = file_get_contents("api/files/luzes/nome.txt");

$valor_ac = file_get_contents("api/files/ac/valor.txt");
$hora_ac = file_get_contents("api/files/ac/hora.txt");
$nome_ac = file_get_contents("api/files/ac/nome.txt");

$valor_rociador = file_get_contents("api/files/rociador/valor.txt");
$hora_rociador = file_get_contents("api/files/rociador/hora.txt");
$nome_rociador = file_get_contents("api/files/rociador/nome.txt");

$valor_alarme = file_get_contents("api/files/alarme/valor.txt");
$hora_alarme = file_get_contents("api/files/alarme/hora.txt");
$nome_alarme = file_get_contents("api/files/alarme/nome.txt");

$valor_coluna = file_get_contents("api/files/coluna/valor.txt");
$hora_coluna = file_get_contents("api/files/coluna/hora.txt");
$nome_coluna = file_get_contents("api/files/coluna/nome.txt");
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
<meta http-equiv="refresh" content="5">

<body>

    <!--Barra de navegação lateral com opção histórico e dashboard-->

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sidenav">
        <span class="fs-4 titulo">SmartStorage</span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link active">
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
        <!--cartões com informações atuais do sensor-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 cartao">
                    <div class="card ">
                        <div class="card-header">
                            <div class="text-center">

                                <p><b>Balança: <?php if ($valor_balanca > 50000 || $valor_balanca < 30000) {
                                                    echo "Problema na balança!";
                                                } else {
                                                    echo $valor_balanca . "kg";
                                                }
                                                ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="icone" src="imagens/balanca.svg" alt="balanca">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_balanca ?></b> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Temperatura:
                                        <?php if ($valor_temperatura > 60 || $valor_temperatura < -30) {
                                            echo "Problema no sensor";
                                        } else {
                                            echo $valor_temperatura . "ºC";
                                        }
                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="icone" src="imagens/temperatura.svg" alt="temperatura">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_temperatura ?></b> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Portão: <?php if ($valor_portoes == "0") {
                                                            echo "Fechado";
                                                        }else if($valor_portoes == "1"){
                                                            echo "Aberto";
                                                        } 
                                                        else {
                                                            echo "Problema no sensor";
                                                        }
                                                ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            <?php if ($valor_portoes == "1") {
                                    echo '<img class="icone" src="imagens/portao_aberto.svg" alt="portao_aberto">';
                                 }else{
                                    echo '<img class="icone" src="imagens/portao_fechado.svg" alt="portao_fechado">';}
                             ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_portoes ?></b> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Luminosidade: <?php if ($valor_luminosidade == "0") {
                                                            echo "Noite";
                                                        }else if($valor_luminosidade == "1"){
                                                            echo "Dia";
                                                        } 
                                                        else {
                                                            echo "Problema no sensor";
                                                        }
                                                    ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="icone" src="imagens/luminosidade.svg" alt="luminosidade">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_luminosidade ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Humidade: <?php if ($valor_humidade > 100 || $valor_humidade < 0) {
                                                    echo "Problema no sensor";
                                                } else {
                                                    echo $valor_humidade . "%";
                                                } ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="icone" src="imagens/humidade.svg" alt="humidade">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_humidade ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Detetor de Fumo: <?php if ($valor_fumo > 100 || $valor_fumo < 0) {
                                                    echo "Problema no sensor";
                                                } else {
                                                    echo $valor_fumo . "%";
                                                } ?>
                                </b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="icone" src="imagens/fumo.svg" alt="fumo">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_fumo ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Movimento: <?php if ($valor_movimento == "0") {
                                                            echo "Sem Movimento";
                                                        }else if($valor_movimento == "1"){
                                                            echo "Movimento Detetado";
                                                        } 
                                                        else {
                                                            echo "Problema no sensor";
                                                        }
                                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            <?php if ($valor_movimento == "1") {
                                                            echo '<img class="icone" src="imagens/com_movimento.svg" alt="movimento_detetado">';
                                                        }else{
                                                            echo '<img class="icone" src="imagens/sem_movimento.svg" alt="sem_movimento">';}
                             ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_movimento ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Luzes: <?php if ($valor_luzes == "0") {
                                                            echo "desligadas";
                                                        }else if($valor_luzes == "1"){
                                                            echo "ligadas";
                                                        } 
                                                        else {
                                                            echo "Problema nas luzes";
                                                        }
                                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                             <img class="icone" src="imagens/led.svg" alt="led">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_luzes ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Ar condicionado: <?php if ($valor_ac == "0") {
                                                            echo "desligado";
                                                        }else if($valor_ac == "1"){
                                                            echo "ligado";
                                                        } 
                                                        else {
                                                            echo "Problema no AC";
                                                        }
                                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                             <img class="icone" src="imagens/ac.svg" alt="fan">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_ac ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Rociador de Incêndios: <?php if ($valor_rociador == "0") {
                                                            echo "desligado";
                                                        }else if($valor_rociador == "1"){
                                                            echo "ligado";
                                                        } 
                                                        else {
                                                            echo "Problema no rociador";
                                                        }
                                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <img class="icone" src="imagens/rociador.svg" alt="rociador">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_rociador ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Alarme: <?php if ($valor_alarme == "0") {
                                                            echo "desligado";
                                                        }else if($valor_alarme == "1"){
                                                            echo "ligado";
                                                        } 
                                                        else {
                                                            echo "Problema no alarme";
                                                        }
                                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            <?php if ($valor_alarme == "1") {
                                                            echo '<img class="icone" src="imagens/alarme_on.svg" alt="alarme_ligado">';
                                                        }else{
                                                            echo '<img class="icone" src="imagens/alarme_off.svg" alt="alarme_desligado">';}
                             ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_alarme ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Coluna: <?php if ($valor_coluna == "0") {
                                                            echo "desligado";
                                                        }else if($valor_coluna == "1"){
                                                            echo "ligado";
                                                        } 
                                                        else {
                                                            echo "Problema na coluna";
                                                        }
                                                        ?></b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            <?php if ($valor_coluna == "1") {
                                                            echo '<img class="icone" src="imagens/coluna_on.svg" alt="col_ligado">';
                                                        }else{
                                                            echo '<img class="icone" src="imagens/coluna_off.svg" alt="col_desligado">';}
                             ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b>Atualização: <?php echo $hora_coluna ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Cartão com foto mais recente da Webcam -->                                    

            <div class="row justify-content-center">
                <div class="col-sm-6 cartao">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <p><b>Webcam</b></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                            <img class="webcam" src="api/files/webcam/recente/foto_recente.jpg" alt="webcam">
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <p><b><?php echo "Atualização: ".date("F d Y H:i:s.", filemtime("api/files/webcam/recente/foto_recente.jpg")); ?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
         <!-- Painel de Controlo com botões -->                                                   

        <div class="row justify-content-center">
            <div class="col-sm-6 cartao">
                <div class="card">
                    <div class="card-header">
                        <p><b>Painel de Controlo</b></p>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Porta</th>
                                <th scope="col">Música de Fundo</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <a href="eventos.php?sensor=portoes&valor=1">
                                    <button type="submit" class="btn btn-success">Abrir</button>
                                    </a>
                                    <a href="eventos.php?sensor=portoes&valor=0">
                                    <button type="button" class="btn btn-danger">Fechar</button>
                                    </a>
                                    </td>
                                    <td>
                                    <a href="eventos.php?sensor=musica&valor=1">
                                    <button type="button" class="btn btn-success">Ligar</button>
                                    </a>
                                    <a href="eventos.php?sensor=musica&valor=0">
                                    <button type="button" class="btn btn-danger">Desligar</button>
                                    </a>
                                    </td>
                                </tr>
                            </tbody>
                    </table>                                              
                </div> 
            </div>                                                   
        </div>                                                    


        <!--Tabela com informações atuais dos sensores e respetivo estado-->
        <br>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <p><b>Tabela de Sensores</b></p>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Tipos de Dispositivo IoT</th>
                                <th scope="col">Valor</th>
                                <th scope="col"> Data de Atualização</th>
                                <th scope="col">Estado / Alertas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Balança</td>
                                <td><?php if ($valor_balanca > 50000 || $valor_balanca < 30000) {
                                        echo "Problema na balança!";
                                    } else {
                                        echo $valor_balanca . "kg";
                                    } ?></td>
                                <td><?php echo $hora_balanca ?></td>
                                <td><?php if ($valor_balanca > 50000 || $valor_balanca < 30000) {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    } else {
                                        echo '<span class="badge rounded-pill bg-success">ATIVA</span>';
                                    }

                                    ?></td>

                            </tr>
                            <tr>
                                <td>Temperatura</td>
                                <td> <?php if ($valor_temperatura > 60 || $valor_temperatura < -30) {
                                            echo "Problema no sensor de temperatura";
                                        } else {
                                            echo $valor_temperatura . "ºC";
                                        }
                                        ?></td>
                                <td> <?php echo $hora_temperatura ?></td>
                                <td><?php if ($valor_temperatura > 60 || $valor_balanca < -30) {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    } else {
                                        echo '<span class="badge rounded-pill bg-success">ATIVO</span>';
                                    }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Portão</td>
                                <td><?php if ($valor_portoes == "1") {
                                        echo "aberto";
                                    } elseif($valor_portoes == "0")
                                    {
                                        echo "fechado";
                                    } 
                                    else {
                                        echo "Problema no sensor de movimento";
                                    }
                                    ?></td>
                                <td><?php echo $hora_portoes ?></td>
                                <td><?php if ($valor_portoes ==  "1" || $valor_portoes == "0") {
                                        if ($valor_portoes == "1") {
                                            echo '<span class="badge rounded-pill bg-success">ABERTO</span>';
                                        } else {
                                            echo '<span class="badge rounded-pill bg-danger">FECHADO</span>';
                                        }
                                    } else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Luminosidade</td>
                                <td><?php if ($valor_luminosidade == "1") {
                                        echo "dia";
                                    } elseif($valor_luminosidade == "0")
                                    {
                                        echo "noite";
                                    } 
                                    else {
                                        echo "Problema no sensor de luminosidade";
                                    }
                                    ?></td>
                                <td><?php echo $hora_luminosidade ?></td>
                                <td><?php if ($valor_luminosidade ==  "1" || $valor_luminosidade == "0") {
                                        if ($valor_luminosidade == "1") {
                                            echo '<span class="badge rounded-pill bg-info">DIA</span>';
                                        } else {
                                            echo '<span class="badge rounded-pill bg-dark">NOITE</span>';
                                        }
                                    } else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Humidade</td>
                                <td><?php if ($valor_humidade > 100 || $valor_humidade < 0) {
                                        echo "Problema no sensor de humidade!";
                                    } else {
                                        echo $valor_humidade . "%";
                                    } ?></td>
                                <td><?php echo $hora_humidade ?></td>
                                <td><?php if ($valor_humidade > 100 || $valor_humidade < 0) {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    } else {
                                        echo '<span class="badge rounded-pill bg-success">ATIVO</span>';
                                    }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Detetor de Fumo</td>
                                <td><?php if ($valor_fumo > 100 || $valor_fumo < 0) {
                                        echo "Problema no sensor de fumo!";
                                    } else {
                                        echo $valor_fumo . "%";
                                    } ?></td>
                                <td><?php echo $hora_fumo ?></td>
                                <td><?php if ($valor_fumo > 100 || $valor_fumo < 0) {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    } else {
                                        echo '<span class="badge rounded-pill bg-success">ATIVO</span>';
                                    }

                                    ?></td>
                            </tr>
                            <tr>
                                <td>Detetor de Movimento</td>
                                <td><?php if ($valor_movimento == "1") {
                                        echo "movimento detetado";
                                    } elseif($valor_movimento == "0")
                                    {
                                        echo "sem movimento";
                                    } 
                                    else {
                                        echo "Problema no sensor de movimento";
                                    }
                                    ?></td>
                                </td>
                                <td><?php echo $hora_movimento ?></td>
                                <td><?php if ($valor_movimento == "1") {
                                            echo '<span class="badge rounded-pill bg-success">DETETADO</span>';
                                        } elseif($valor_movimento == "0") {
                                            echo '<span class="badge rounded-pill bg-danger">NAO DETETADO</span>';
                                        }
                                            else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Luzes</td>
                                <td><?php if ($valor_luzes == "1") {
                                        echo "ligadas";
                                    } elseif($valor_luzes == "0")
                                    {
                                        echo "desligadas";
                                    } 
                                    else {
                                        echo "Problema nas luzes";
                                    }
                                    ?></td>
                                </td>
                                <td><?php echo $hora_luzes ?></td>
                                <td><?php if ($valor_luzes == "1") {
                                            echo '<span class="badge rounded-pill bg-success">LIGADO</span>';
                                        } elseif($valor_luzes == "0") {
                                            echo '<span class="badge rounded-pill bg-danger">DESLIGADO</span>';
                                        }
                                            else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>A/C</td>
                                <td><?php if ($valor_ac == "1") {
                                        echo "ligado";
                                    } elseif($valor_ac == "0")
                                    {
                                        echo "desligado";
                                    } 
                                    else {
                                        echo "Problema no a/c";
                                    }
                                    ?></td>
                                </td>
                                <td><?php echo $hora_ac ?></td>
                                <td><?php if ($valor_ac == "1") {
                                            echo '<span class="badge rounded-pill bg-success">LIGADO</span>';
                                        } elseif($valor_ac == "0") {
                                            echo '<span class="badge rounded-pill bg-danger">DESLIGADO</span>';
                                        }
                                            else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Rociador</td>
                                <td><?php if ($valor_rociador == "1") {
                                        echo "ligado";
                                    } elseif($valor_rociador == "0")
                                    {
                                        echo "desligado";
                                    } 
                                    else {
                                        echo "Problema no rociador";
                                    }
                                    ?></td>
                                </td>
                                <td><?php echo $hora_rociador ?></td>
                                <td><?php if ($valor_rociador == "1") {
                                            echo '<span class="badge rounded-pill bg-success">LIGADO</span>';
                                        } elseif($valor_rociador == "0") {
                                            echo '<span class="badge rounded-pill bg-danger">DESLIGADO</span>';
                                        }
                                            else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Alarme</td>
                                <td><?php if ($valor_alarme == "1") {
                                        echo "ligado";
                                    } elseif($valor_alarme == "0")
                                    {
                                        echo "desligado";
                                    } 
                                    else {
                                        echo "Problema no alarme";
                                    }
                                    ?></td>
                                </td>
                                <td><?php echo $hora_alarme ?></td>
                                <td><?php if ($valor_alarme == "1") {
                                            echo '<span class="badge rounded-pill bg-success">LIGADO</span>';
                                        } elseif($valor_alarme == "0") {
                                            echo '<span class="badge rounded-pill bg-danger">DESLIGADO</span>';
                                        }
                                            else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                            <tr>
                                <td>Coluna</td>
                                <td><?php if ($valor_coluna == "1") {
                                        echo "ligado";
                                    } elseif($valor_coluna == "0")
                                    {
                                        echo "desligado";
                                    } 
                                    else {
                                        echo "Problema na coluna";
                                    }
                                    ?></td>
                                </td>
                                <td><?php echo $hora_coluna ?></td>
                                <td><?php if ($valor_coluna == "1") {
                                            echo '<span class="badge rounded-pill bg-success">LIGADO</span>';
                                        } elseif($valor_coluna == "0") {
                                            echo '<span class="badge rounded-pill bg-danger">DESLIGADO</span>';
                                        }
                                            else {
                                        echo '<span class="badge rounded-pill bg-warning">ERRO</span>';
                                    }
                                    ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>