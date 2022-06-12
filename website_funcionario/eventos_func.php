<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $hora = date('Y/m/d H:i:s');
 
    if(isset($_GET['sensor']) && isset($_GET['valor']))
    {
        file_put_contents("../api/files/".$_GET['sensor']."/valor.txt",$_GET['valor']);
        file_put_contents("../api/files/".$_GET['sensor']."/hora.txt",$hora);
        $array = array($hora, ";", $_GET['valor'], ";", PHP_EOL);
        file_put_contents("../api/files/" . $_GET['sensor'] . "/historico.txt", $array, FILE_APPEND);
    }
}
    else {
        echo "ERRO";
    }
    
    header("location: dashboard_func.php")
?>