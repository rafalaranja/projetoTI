<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("refresh:5;url=index.php");
    die("Acesso restrito");
}


header('Content-Type: text/html; charset=utf-8');
$request = $_SERVER['REQUEST_METHOD'];

/* Consoante o tipo de conta logado atualiza a foto de perfil dessa respetiva conta*/
function guardador_imagem($file) {
    if ($_SESSION['type'] == 1){
        if(move_uploaded_file($file,'imagens/user-foto/funcionario.png')){
        echo "Movido com sucesso";
        }else{
        echo "Não Movido";
        }}
    elseif($_SESSION['type'] == 2){
        if(move_uploaded_file($file,'imagens/user-foto/admin.png')){
            echo "Movido com sucesso";
        }else{
            echo "Não Movido";
        }
    }
    elseif($_SESSION['type'] == 0){
        if(move_uploaded_file($file,'imagens/user-foto/cliente.png')){
            echo "Movido com sucesso";
        }else{
            echo "Não Movido";
        }
    }
    else{
        echo 'ERRO';
    }
    
}

if ($request == "POST") {
        if($_FILES['imagem']){
        echo ("ficheiro recebido");
        echo ("<br>"."Nome da imagem: ".$_FILES["imagem"]["name"]);
        echo("<br>"."Tamanho: ".$_FILES["imagem"]["size"]);
        echo("<br>"."Pasta temporária: ".$_FILES["imagem"]["tmp_name"]."<br>");
        guardador_imagem($_FILES["imagem"]["tmp_name"]);

            // Redireciona para a página do perfil consoante o tipo de perfil logado
            if($_SESSION['type'] == 1){
                header('Location: website_funcionario/perfil_func.php');
            }
            elseif($_SESSION['type'] == 2){
                header('Location: perfil.php');
            }
            elseif($_SESSION['type'] == 0){
                header('Location: website_cliente/perfil_cliente.php');
            }
        
            }else{

            echo ("erro");
        }
    }
else{

echo ("ERROR");

}
?>