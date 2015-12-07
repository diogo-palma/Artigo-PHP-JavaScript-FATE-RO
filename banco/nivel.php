<?php
	error_reporting(0);
	ob_start();
    session_start();   
    if (!isset($_SESSION['login']) and $_SESSION['login'] != true){
        session_unset();
        session_destroy();
        //header('location:index.php');
    }
    else
        $secao = $_SESSION['login'];

	if (!isset($secao) and $secao != true){
			
	}else{
		include "banco/db.php";
								$res = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$secao'");
								
								 if (mysqli_num_rows($res)>0){
        							$dados = mysqli_fetch_row($res);
									 $nome               = $dados[1];
									 $id               = $dados[0];
									 $nivel				= $dados[9];
		
	}
	}
?>