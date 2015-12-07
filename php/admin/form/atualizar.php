<?php

	include "../../../banco/db.php";

	$id			= $_POST["id"];
	$nome1		= $_POST["nome"];
	$telefone1	= $_POST["telefone"];
	$endereco1	= $_POST["endereco"];
	$email1		= $_POST["email"];
	$senha1		= $_POST["senha"];
	$tipo			= $_POST["tipo"];
	


	if ($senha1 == ""){
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		$query = mysqli_query($con, $sql);
		if (mysqli_num_rows($query) > 0){
			$res = mysqli_query($con, "UPDATE usuarios SET nome='$nome1',telefone='$telefone1',endereco='$endereco1',email='$email1' WHERE id='$id'");
		}
		
		echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Alteração com sucesso!!!</div></div>";
		
		}else{
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		$query = mysqli_query($con, $sql);
		if (mysqli_num_rows($query) > 0){
			$res = mysqli_query($con, "UPDATE usuarios SET nome='$nome1',telefone='$telefone1',endereco='$endereco1',email='$email1',senha='$senha1' WHERE id='$id'");
		}	
		
		echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Alteração com sucesso!!!</div></div>";	
		
	}

	
?>
	
