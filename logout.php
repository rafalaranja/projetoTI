

<!--Destroi e sai da sessão e redereciona para o index -->
<?php
session_start();
session_unset();
session_destroy();

header('Location: index.php');

?>
<!doctype html>
<html lang="pt">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo-login.css">
    <link rel="icon" href="imagens/logo.png">
    <title>LOGOUT!</title>
</head>

<body>

</body>

</html>