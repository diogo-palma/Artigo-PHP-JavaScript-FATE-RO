<?php
	include "../banco/db.php";

	$nome			= $_POST["nome"];
	$endereco	= $_POST["endereco"];
	$telefone	= $_POST["telefone"];
	$email		= $_POST["email"];
	$senha		= $_POST["senha"];
	$confirma	= $_POST["confirma"];


	if ($nome != "" and $endereco != "" and $telefone != "" and $email != "" and $senha != "" and $confirma != ""){
		if ($senha == $confirma){
			
			$sql = "SELECT * FROM usuarios WHERE email='$email'";
			$query = mysqli_query($con, $sql);
			if (mysqli_num_rows($query) == 0){
				$res = mysqli_query($con, "INSERT INTO usuarios(nome,telefone,endereco,email,senha) VALUES('$nome','$telefone','$endereco','$email','$senha')");

				echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Cadastro efetuado com sucesso!!!<span class='orange-text'> Entre no sistema</span></span>";	
			
				include "../php/login.php";
			}else{
				echo  "<div style='margin-top:-10px;' class='card red darken-1 center'><div class='card-content white-text'><span class='card-title'>E-mail já cadastrado!!!</span>";
				include "../php/login.php";
			}
		
		}else{
			
			echo  "<div style='margin-top:-10px;' class='card red darken-1 center'><div class='card-content white-text'><span class='card-title'>Senha não confere!!!</span></div></div>";
			include_once "../php/cadastro.php";	
		}
		
	}else{
		echo  "<div style='margin-top:-10px;' class='card grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Por favor preencha todos os campos!!!</span></div></div>";
		include_once "../php/cadastro.php";
	}
?>
