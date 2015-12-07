<?php




	include "../banco/db.php";

	$id		= $_GET["atualizar"];

	$sql 		= "SELECT * FROM usuarios WHERE id='$id'";

	$query	= mysqli_query($con,$sql);




	if (mysqli_num_rows($query)>0){
		
		$dados 		= mysqli_fetch_array($query);
		$id1			= $dados[0];
		$nome			= $dados[1];
		$telefone	= $dados[2];
		$email		= $dados[4];
		$endereco	= $dados[3];
		$senha		= $dados[6];
		$nivel		= $dados[9];
		
		if ($nivel == 0){
			$admin 	= "";
			$usuario = "selected";	
		}else{
			$admin 	= "selected";
			$usuario = "";	
		}
		
		
		
		
echo'

<div class="container">
	<div class="row white">
		<h4 align="center"> Editar Usuário</h4>	

	<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados(\'php/admin/form/atualizar.php\')">
		<div class="col s5">
			<label for="nome" class="">Nome:</label>
			<input name="id" type="text" value="'.$id1.'" style="display:none">
			<input name="nome" type="text" value="'.$nome.'">
		</div>
		<div class="col s3">
			<label for="telefone" class="">Telefone:</label>
			<input name="telefone" type="text" value="'.$telefone.'">
		</div>
		<div class="col s4">
			<label for="endereco" class="">Endereço:</label>
			<input name="endereco" type="text" value="'.$endereco.'">
		</div>
		<div class="col s4">
			<label for="email" class="">E-mail:</label>
			<input name="email" type="email" value="'.$email.'">
		</div>
		
		<div class="col s4">
			<label for="senha" class="">Senha:</label>
			<input name="senha" type="password" >
		</div>
		<div class="col s4">
			<label><b>Tipo:</b></label>
			<select name="tipo" class="browser-default">
				<option value="" disabled="" selected="">Nivel:</option>
				<option '.$usuario.' value="0">Usuário</option>
				<option  '.$admin.' value="1">Administrador</option>
			</select>
		</div>
		
		<div class="col s12">
		<button class="btn blue" type="submit">Atualizar</button>
		<br><p>
		</div>
	</form>
		
	</div>
	
</div>

';
		
	}






