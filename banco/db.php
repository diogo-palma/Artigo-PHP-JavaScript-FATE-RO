<?php 
    $serv = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'mono';
    
    $con = mysqli_connect($serv, $user, $pass, $db) or die(mysql_error());

?>