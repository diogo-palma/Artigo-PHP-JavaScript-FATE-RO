<?php
	include "../banco/db.php";

	$id		= $_GET['perfil'];
	$res = mysqli_query($con, "SELECT * FROM usuarios WHERE id='$id'");
					
	if (mysqli_num_rows($res)>0){
   	$dados = mysqli_fetch_row($res);
		$nome               = $dados[1];
		$telefone           = $dados[2];
		$endereco           = $dados[3];
		$email	           = $dados[4];
		$senha	           = $dados[6];
		$data	  		        = strtotime($dados[7]);
		$datacad				  = date("d/m/y",$data);
		
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
		<h3 class="blue-text" align="center">Perfil</h3>
		
			<span><b>Data do cadastro:</b> <?php echo $datacad;?></span><br/>
			<span><b>Nome:</b> <?php echo "<span style='font-size:18px'>$nome</span>";?></span>
			<span><b>Telefone:</b> <?php echo "<span style='font-size:18px'>$telefone</span>";?></span><br/>
			<span><b>Endereço:</b> <?php echo $endereco;?></span><br/>
			<span><b>Email:</b> <?php echo $email;?></span><br/>
			<p></p><a href="javascript:exibe()" class="waves-effect waves-light grey lighten-0 btn center" >Editar</a>
		</div>
		
		<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados('form/editar.php')">
		<div id="esconder" class="col s12 grey-text center">
		<h3  class="black-text" align="center">Editar Perfil</h3>
			<input style="display:none" name="id" value="<?php echo $id;?>">
			<span><b>Nome:</b> <input name="nome" size="40" value="<?php echo $nome;?>"</span>
			<span><b>Telefone:</b> <input name="telefone" value="<?php echo $telefone;?>"</span><br/><p></p>
			<span><b>Endereço:</b> <input name="endereco" size="50" value="<?php echo $endereco;?>"</span><br/><p></p>
			<span><b>Email:</b> <input name="email" size="30"  value="<?php echo $email;?>"</span>
			<span><b>Senha:</b> <input name="senha" size="20"  placeholder="modifique sua senha"</span>	
			
			<p></p><input type="submit" href="#" class="waves-effect waves-light blue  btn center" value="Concluir">
		</div>
		</form>
	
