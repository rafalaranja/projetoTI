<?php

header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    #Define o formato da data (que vai passar para o historico.txt na API)
    $hora = date('Y/m/d H:i:s');
    
    #Ao receber um GET vai registar o valor,hora e historico no ficheiro correspondentes ao sensor recebido
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