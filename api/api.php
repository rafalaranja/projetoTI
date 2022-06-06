<?php
header('Content-Type: text/html; charset=utf-8');
$request = $_SERVER['REQUEST_METHOD'];


/*guarda os valores na api*/
if ($request == "POST") {
    if (!isset($_POST["nome"]) || !isset($_POST["valor"]) || !isset($_POST["hora"])) {
        echo ("os valores nao existem");
    } else {
        $nome = ($_POST["nome"]);
        $valor = ($_POST["valor"]);
        $hora = ($_POST["hora"]);
        file_put_contents("files/" . $nome . "/nome.txt", $nome);
        file_put_contents("files/" . $nome . "/valor.txt", $valor);
        file_put_contents("files/" . $nome . "/hora.txt", $hora);
        $array = array($hora, ";", $valor, ";", PHP_EOL);
        file_put_contents("files/" . $nome . "/historico.txt", $array, FILE_APPEND);
    }
    /*caso seja pedido um valor por get, ele vai busca-lo ao ficheiro e devolve-o*/
} elseif ($request == "GET") {
    if (isset($_GET["nome"])) {
        echo file_get_contents("files/" . $_GET["nome"] . "/valor.txt");
    } else {
        http_response_code(400);
    }
} else {
    http_response_code(403);
}
