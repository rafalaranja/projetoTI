
<?php


session_start();


//CONEXAO PELAS VARIAVEIS DA BASE DE DADOS
include('connection.php');  
   


?>
<!doctype html>
<html lang='pt'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo-login.css">
    <link rel="icon" href="imagens/logo.png">
    <title>Login</title>
</head>

<body>
    <!--formulário de início de sessão-->
    <form action = "login.php" method="POST">
        <div class="login-form">
            <h1 class="tit"> INICIAR SESSÃO </h1>
            <div class="form-group">
                <input type="text" name="username" class="dados" placeholder="Nome de Utilizador" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="dados" placeholder="Palavra-Passe" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary botao" value="login"> ENTRAR </button>

                <!--Verificação do utilizador e respetiva password e direcionamento para a dashboard caso estejam corretos-->
                <?php
                if (isset($_POST['username']) && isset($_POST['password'])) {

                    $username = $_POST['username'];  
                    $password = $_POST['password']; 

                    $sql = "select *from login where username = '$username' and password = '$password'";  
                    $result = mysqli_query($con, $sql);  
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
                    $count = mysqli_num_rows($result);  
                      
                    if($count == 1){
                        $_SESSION['username'] = $_POST['username'];
                        $_SESSION['type'] = $row['type'];
                        if($row['type'] == 0) {
                            header('location: website_cliente/dashboard_cliente.php');
                        } elseif($row['type'] == 1) {
                            header('location: website_funcionario/dashboard_func.php');
                        } else{
                            header('location: dashboard.php');
                        }
                    }  
                    else{  
                        echo '<h2 class="errou" >Credenciais Erradas</h2>';  
                    }  
                }
                ?>

            </div>
        </div>
    </form>
</body>

</html>