<?php
	
	include "../banco/db.php";
	$id			= $_POST['id'];
	$nome 		= $_POST['nome'];
	$telefone 	= $_POST['telefone'];
	$endereco	= $_POST['endereco'];
	$email		= $_POST['email'];
	$senha		= $_POST['senha'];
	
	if ($senha == ""){
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		$query = mysqli_query($con, $sql);
		if (mysqli_num_rows($query) > 0){
			$res = mysqli_query($con, "UPDATE usuarios SET nome='$nome',telefone='$telefone',endereco='$endereco',email='$email' WHERE id='$id'");
		}
		
		echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Alteração com sucesso!!!</div></div>";	
		
		
	}else{
		$sql = "SELECT * FROM usuarios WHERE id='$id'";
		$query = mysqli_query($con, $sql);
		if (mysqli_num_rows($query) > 0){
			$res = mysqli_query($con, "UPDATE usuarios SET nome='$nome',telefone='$telefone',endereco='$endereco',email='$email',senha='$senha' WHERE id='$id'");
		}	
		
		echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Alteração com sucesso!!!</div></div>";	
		
	}

	
?>
<html>
<head>
<meta charset="utf-8">	
	
</head>
<body>
	
<div class="container white">
	
	<div class="row" > <!--style="margin-top:-75px>"-->
		
		<div id="perfil" class="col s12 grey-text center">
		
		

			<span><b>Nome:</b> <?php echo "<span style='font-size:18px'>$nome</span>";?></span>
			<span><b>Telefone:</b> <?php echo "<span style='font-size:18px'>$telefone</span>";?></span><br/>
			<span><b>Endereço:</b> <?php echo $endereco;?></span><br/>
			<span><b>Email:</b> <?php echo $email;?></span><br/>
		
		</div>
			