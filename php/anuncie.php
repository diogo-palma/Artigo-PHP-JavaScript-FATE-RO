<?php 
	ob_start();
	session_start();  
	
	if (!isset($_SESSION['login']) and isset($_SESSION['login']) != true){
		session_unset();
		session_destroy();		
	

		echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Para anunciar é necessário ter cadastro ou logar-se!!!</span></div></div>";
		include "login.php";
		
		
	}else{
		
		
		?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	
	<div class="container white" align="left">
		<h3 align="center">Publicar Imóvel</h3>
		<hr>
		<p class="blue-text"><strong>Informe os dados do Imóvel:</strong></p>
		<label id="lista" class="red-text" style="font-size: 16px">POR FAVOR SELECIONE O ENDEREÇO NA LISTA!</label>
		<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados('form/imovel.php'); return false;" enctype="multipart/form-data">
		<div class="row">
		
			<div class="input-field col s8">
				<input type="text" id="txtautocomplete" class="validate" name="endereco" onfocus="return initialize();" onkeypress="return searchKeyPress(event);"	<?php if(isset($endereco)) echo "value=\"$endereco\"";?> />
			
				<label for="txtautocomplete" id="endereco"<?php if(isset($endereco)) echo "class=\"active\"";?>><b>Endereço (Rua, número, Cidade)</b></label>
				
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
			
			<div class="input-field col s12">
			&nbsp;&nbsp;&nbsp;&nbsp;<label id="resultado" class="blue-text">	<?php if(isset($endereco)) echo "<div class=\"input-field col s6 \"><b>Endereço Completo: </b> $endereco <br/></div>"; ?><?php if(isset($lat))  echo "<div class=\"input-field col s3\"><input id=\"lat\" name=\"lat\" disabled type=\"text\" value=\"$lat\"></div>";?> <?php if(isset($lat)) echo "<div class=\"input-field col s3\"><input id=\"lng\" name=\"lng\" disabled type=\"text\" value=\"$lng\"></div>";?> </label>
				<br/><br/><br/>
			</div>
			
		</div>
			<br/>
			<div class="row" >

			<br/><br/>
			<div class="input-field col s4" style="margin-top: -65px;">
				<label><b>Negócio:</b></label><br/><br/>
				<select name="negocio"  class="browser-default" onchange="javascript:document.getElementById('conteudo').removeAttribute('style');">
						<option value="" disabled selected>Escolha uma opção:</option>
						<option <?php if (isset($negocio) && $negocio == "Aluguel") echo "selected";?> value="Aluguel">Aluguel</option>
						<option <?php if (isset($negocio) && $negocio == "Venda") echo "selected";?> value="Venda">Venda</option>

				</select>
			</div>
			<div class="input-field col s8" style="margin-top: -30px;">
				
				<input name="valor" type="text" id="valor" name="valor" onkeyup="mascara(this, mvalor);" <?php if(isset($valor)) echo "value=\"$valor\"";?>/>
				<label for="valor"<?php if(isset($valor)) echo "class=\"active\"";?>>Valor (R$)</label>
			</div>
		
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
			<br/><br/><br/>
		
			<div class="row">
			<div class="col s12 center" style="margin-top: -42px;">
				<button class="btn-large waves-effect waves-light blue" type="submit" name="action" style="margin-top:-10px" onclick="javascript:document.body.scrollTop = 0; document.documentElement.scrollTop = 0;">Publicar
    			
  				</button>
								
			</div>
			
			</div>
		<br/>
				
		
		</form>
	
</body>
<?php
		
		
	}

?>