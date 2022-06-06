<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Link para Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- Link para o style.css -->
  <link rel="stylesheet" href="css/estilo-index.css">
  <link rel="icon" href="imagens/logo.png">
  <title> SmartStorage </title>
</head>

<body>


  <!--NavBar com Sobre e Inicio -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <img src="imagens/logo.png" alt="Logo" style="width:40px;" class="rounded-pill">
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="sobre.php">Sobre</a>
        </li>
      </ul>
      <form class="d-flex" action="login.php">
        <button class="btn btn-outline-primary botao" type="submit">Login</button>
      </form>
    </div>
  </nav>


  <!--Informações-->
  <h1 class="texto-sobre">WEBSITE DESENVOLVIDO POR:</h1>
  <h2 class="texto-sobre">RAFAEL SANTOS (2211020) E MANUEL EUSÉBIO (2211049)</h2>
  <h5 class="texto-sobre">NO ÂMBITO DA UNIDADE CURRICULAR DE TECNOLOGIAS DA INTERNET, DO CURSO DE ENGENHARIA INFORMÁTICA</h5>



  <!-- Script para Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>