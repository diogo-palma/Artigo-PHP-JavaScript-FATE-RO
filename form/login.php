<?php
	
	include "../banco/db.php";
	ob_start();
  	session_start();
  	$login = $_POST['login'];
  	$senha = $_POST['senha'];
	
	
	
  	if ($login != '' and $senha != '') {
		 	$sql = "SELECT email,senha FROM usuarios WHERE email='$login' AND senha='$senha'";
		 	$res = mysqli_query($con,$sql);
		if (mysqli_num_rows($res)>0)
	 		{
				$_SESSION['login'] = $_POST['login'];
				
				echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Login efetuado com sucesso, você será redirecionado, caso esteja demorando <a class='orange-text' href='index.php'>clique aqui</span>";	
				
				echo ('<meta http-equiv="refresh" content="3;url='. $_SERVER['HTTP_REFERER'] .'">');

				
			}else{
				echo  "<div class='card red darken-1 center'><div class='card-content white-text'><span class='card-title'>Falha ao logar!!!</span>";	
				echo  "<div class=\"card-action\"><a href=\"javascript:Pag('login',1)\">Voltar</a>";
			}
		
	}else{
			echo  "<div class='card grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Campos Vazios!!!</span>";	
		echo  "<div class=\"card-action\"><a href=\"javascript:Pag('login',1)\">Voltar</a>";
	}
	
?>
<?php

ob_end_flush();

?>