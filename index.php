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
          <a class="nav-link active" href="index.php">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
      </ul>
      <form class="d-flex" action="login.php">
        <button class="btn btn-outline-primary botao" type="submit">Login</button>
      </form>
    </div>
  </nav>

  <!-- Fundo azul com logotipo -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <img class="masthead-avatar mb-5 mt-5 rounded-circle" src="imagens/logo.png" alt="logo">
      <h1 class="masthead-heading text-uppercase mb-0">Smart Storage</h1>
      <p class="masthead-subheading mb-0">The Future is Smart</p>
    </div>
  </header>

  <br><br>


  <!-- 3 Colunas com informações -->

  <div class="row">
    <div class="col-md-4">
      <div class="card mb-4 shadow">
        <img class="card-img-top imagem" src="imagens/armazenamento.svg" alt="logo">
        <div class="card-body">
          <h5 class="card-title">Armazenamento</h5>
          <p class="card-text texto">Contamos com um armazém que garante o armazenamento de todos os nossos produtos.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow">
        <img class="card-img-top imagem" src="imagens/entregas.svg" alt="logo">
        <div class="card-body">
          <h5 class="card-title">Entregas</h5>
          <p class="card-text texto">Fazemos entregas em Portugal Continental e Açores.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card mb-4 shadow">
        <img class="card-img-top imagem" src="imagens/logistica.svg" alt="logo">
        <div class="card-body">
          <h5 class="card-title center">Logistica</h5>
          <p class="card-text texto">Através da Dashboard os nossos clientes podem consultar informações sobre encomendas.</p>
        </div>
      </div>
    </div>
  </div>
  <br>

  <!-- Rodapé com o nome da empresa -->
  <footer class="bg-dark rodape">
    <br>
    <p>SmartStorage © 2022</p>
  </footer>


  <!-- Script para Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



</body>

</html>