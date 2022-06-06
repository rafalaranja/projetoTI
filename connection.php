<?php      
    $host = "localhost";  
    $user = "root";  
    $password = 'root'; // CASO UTILIZE XAMPP COLOQUE $password = '' ou insira a password que utilizar (caso tenha alterado);  
    $db_name = "smartstorage_db";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  