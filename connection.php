<?php      
    $host = "localhost";  
    $user = "root";  
    $password = ''; // CASO UTILIZE UniServer COLOQUE $password = 'root' ou insira a password que utilizar (caso tenha alterado);  
    $db_name = "smartstorage_db";  
      
    //Conexão à base de dados
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  