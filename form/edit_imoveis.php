<?php

	include "../banco/db.php";

	$id 		= $_GET["editar"];

	
	
	$sql = "SELECT w.*,s.* FROM markers w INNER JOIN imoveis s ON w.id=s.idMarkers WHERE w.id='$id' AND s.idMarkers='$id'";

	$res = mysqli_query($con,$sql);

if(mysqli_num_rows($res)>0){
	
	for ($i=0; $i<mysqli_num_rows($res); $i++){
		 $dados = mysqli_fetch_row($res);
		
		$datas = strtotime($dados[9]);
		 
		 $data 			= date ("d/m/y", $datas);
			$idu				= $dados[0]; 
			$endereco		= $dados[2];
			$tipo				= $dados[1];
			$negocio			= $dados[5];
			$valor			= $dados[17];
			$quartos			= $dados[11];
			$salas			= $dados[12];
			$cozinhas		= $dados[13];
			$banheiros		= $dados[14];
			$suites			= $dados[15];
			$info				= $dados[16];
			
	}
}
?>

<div class="container white">
	<div class="row">
	<h4 class="center"> Editar Imóvel</h4>
		<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados('form/atualizar.php'); return false;">
	<div class="col s8">
		<span><b>Endereço:</b> <?= $endereco ?> </span>
	
	</div>
			<input name='id' value='<?php echo $idu?>' style='display:none'>
	<div class="input-field col s4" style="margin-top:-30px" >
		<label><b>Negócio:</b></label><br/><br/>
				<select name="negocio"  class="browser-default" onchange="javascript:document.getElementById('conteudo').removeAttribute('style');">
						<option value="" disabled selected>Escolha uma opção:</option>
						<option <?php if (isset($negocio) && $negocio == "Aluguel") echo "selected";?> value="Aluguel">Aluguel</option>
						<option <?php if (isset($negocio) && $negocio == "Venda") echo "selected";?> value="Venda">Venda</option>

				</select>
	
	</div>
	<div name="tipo" class="input-field col s4" style="margin-top:-30px" >
				<label><b>Tipo:</b></label><br/><br/>
				<select name="tipo" class="browser-default" onchange="javascript:document.getElementById('conteudo').removeAttribute('style');" <?php if(isset($tipo)) echo "value=\"$tipo\"";?>>
						<option value="" disabled selected>Escolha a categoria do imóvel:</option>
						<option <?php if (isset($tipo) && $tipo == "Apartamento") echo "selected";?> value="Apartamento">Apartamento</option>
						<option <?php if (isset($tipo) && $tipo == "Casa") echo "selected";?> value="Casa">Casa</option>
						<option <?php if (isset($tipo) && $tipo == "Chácara") echo "selected";?> value="Chácara">Chácara</option>
						<option <?php if (isset($tipo) && $tipo == "Cobertura") echo "selected";?> value="Cobertura">Cobertura</option>
						<option <?php if (isset($tipo) && $tipo == "Condomínio Fechado") echo "selected";?> value="Condomínio Fechado">Condomínio Fechado</option>
						<option <?php if (isset($tipo) && $tipo == "Sobrado") echo "selected";?> value="Sobrado">Sobrado</option>
						

				</select>
	</div>
		
		
	
		
		<div class="input-field col s8" >
				
				<input name="valor" type="text" id="valor" name="valor" onkeyup="mascara(this, mvalor);" <?php if(isset($valor)) echo "value=\"$valor\"";?>/>
				<label for="valor"<?php if(isset($valor)) echo "class=\"active\"";?>>Valor (R$)</label>
		</div>
		
		
		
		
		<div class="row">
			<div class="input-field col s3">
				<!--http://stackoverflow.com/questions/2246227/keep-values-selected-after-form-submission-->
				<label>Quartos:</label><br/><br/>
				 <select name="quartos" class="browser-default" >
					<option value="" disabled selected>Qntd. de Quartos:</option>
					<option <?php if (isset($quartos) && $quartos == "1") echo "selected";?> value="1">1</option>
					<option <?php if (isset($quartos) && $quartos == "2") echo "selected";?> value="2">2</option>
					<option <?php if (isset($quartos) && $quartos == "3") echo "selected";?> value="3">3 ou mais</option>
				 </select>
			</div>
			<div class="input-field col s3">
				<label>Salas:</label><br/><br/>
				 <select name="salas" class="browser-default" <?php if(isset($salas)) echo "value=\"$salas\"";?>>
					<option value="" disabled selected>Qntd. de Salas:</option>
					<option <?php if (isset($salas) && $salas == "1") echo "selected";?> value="1">1</option>
					<option <?php if (isset($salas) && $salas == "2") echo "selected";?> value="2">2</option>
					<option <?php if (isset($salas) && $salas == "3") echo "selected";?> value="3">3 ou mais</option>
				 </select>
			</div>
			<div class="input-field col s3">
				<label>Cozinhas:</label><br/><br/>
				 <select name="cozinhas" class="browser-default" <?php if(isset($cozinhas)) echo "value=\"$cozinhas\"";?>>
					<option value="" disabled selected>Qntd. de Cozinhas:</option>
					<option <?php if (isset($cozinhas) && $cozinhas == "1") echo "selected";?> value="1">1</option>
					<option <?php if (isset($cozinhas) && $cozinhas == "2") echo "selected";?> value="2">2</option>
					<option <?php if (isset($cozinhas) && $cozinhas == "3") echo "selected";?> value="3">3 ou mais</option>
				 </select>
			</div>
			<div class="input-field col s3">
				<label>Banheiros:</label><br/><br/>
				 <select name="banheiros" class="browser-default">
					<option value="" disabled selected>Qntd. de Banheiros:</option>
					<option <?php if (isset($banheiros) && $banheiros == "1") echo "selected";?> value="1">1</option>
					<option <?php if (isset($banheiros) && $banheiros == "2") echo "selected";?> value="2">2</option>
					<option <?php if (isset($banheiros) && $banheiros == "3") echo "selected";?> value="3">3 ou mais</option>
				 </select>
			</div>
			<div class="input-field col s3">
				<label>Suites:</label><br/><br/>
				 <select name="suites" class="browser-default">
					<option value="" disabled selected>Qntd. de Suites:</option>
					<option <?php if (isset($suites) && $suites == "1") echo "selected";?> value="1">1</option>
					<option <?php if (isset($suites) && $suites == "2") echo "selected";?> value="2">2</option>
					<option <?php if (isset($suites) && $suites == "3") echo "selected";?> value="3">3 ou mais</option>
				 </select>
			</div>
			<div class="input-field col s9">
            <textarea id="textarea" name="info"   class="materialize-textarea" length="120"><?php if(isset($info)) echo $info;?></textarea>
            <label for="textarea"<?php if(isset($info)) echo "class=\"active\"";?>>Outras informações do imóvel:</label>
		 </div>
		</div>
		
	
	<div class="input-field col s3" >
				<button type="submit" class="btn blue">Atualizar </button>
	</div>
	
	</form>
	</div>
</div>
