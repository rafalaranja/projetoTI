<?php
/*Caso haja a tentativa de entrar sem inicio de sessão efetuado, aparece uma mensagem de erro e redereciona para o index*/
session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito");
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
<meta http-equiv="refresh" content="5">

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
                <a href="historico_imagens.php" class="nav-link active">
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
    <div class="container">
            <div class="row">
                <!-- Código que gera cartão com fotos de 1 a 15 (o python tem um limitador que a partir da 15 foto começa a gravar por cima)-->
                <?php 
                    for ($i = 1; $i <= 15; $i++) {
                        echo "<div class='col-sm-4 cartao'>
                                <div class='card '>
                                    <div class='card-header'>
                                        <div class='text-center'>
                                            <p><b>Foto $i</b></p>
                                        </div>
                                    </div>
                                    <div class='card-body'>
                                      <div class='text-center'>
                                         <a target='_blank' href='api/files/webcam/historico/webcam$i.jpg'>
                                         <img class='galeria' src='api/files/webcam/historico/webcam$i.jpg' alt='foto1'>
                                         </a>
                                        </div>
                                    </div>
                                    <div class='card-footer'>
                                    <div class='text-center'>
                                        <p><b>"; 
                                        echo "Data: ".date("F d Y H:i:s.", filemtime("api/files/webcam/historico/webcam$i.jpg")); #Printa a data em que a foto foi tirada
                                    echo "</b> </p>
                                    </div>
                                </div>
                                </div>
                             </div>"; 
                    } 
                ?>
            <!-- --> 
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>