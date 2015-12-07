<?php
	error_reporting(0);
	include "../banco/db.php";
	ob_start();
	session_start();

	$lat 				= $_POST["lat"];
	$lng				= $_POST["lng"];
	$quartos			= $_POST["quartos"];
	$salas			= $_POST["salas"];
	$cozinhas		= $_POST["cozinhas"];
	$banheiros		= $_POST["banheiros"];
	$suites			= $_POST["suites"];
	$info				= $_POST["info"];
	$valor			= $_POST["valor"];
	$tipo				= $_POST["tipo"];
	$negocio			= $_POST["negocio"];
	$endereco		= $_POST["endereco"];
	$info				= $_POST["info"];
	

	

// pega id do usuario
	$login = $_SESSION['login'];
	
	$queryusu = mysqli_query($con, "SELECT id,nome,email FROM usuarios WHERE email='$login'");

	
	
	if (mysqli_num_rows($queryusu)>0){
		$dados = mysqli_fetch_row($queryusu);	
		$idUsuario	= $dados[0];
		$nome		 	= $dados[1];
	}
	
	
	if //($lat == ""){
		($lat != "" and $lng != "" and $tipo != "" and $negocio != ""){
		
//insere anuncio
		$sql = "SELECT * FROM markers WHERE lat='$lat' AND lng='$lng'";
		
		$querymark = mysqli_query($con, $sql);
		
		if (mysqli_num_rows($query) == 0){
			
			$res = mysqli_query($con, "INSERT INTO markers(imovel,endereco,lat,lng,tipo) VALUES ('$tipo','$endereco','$lat','$lng','$negocio')");
		
			$last_id = mysqli_insert_id($con);
			
			$sqlimo = "SELECT * FROM imoveis";
			
			$queryimo = mysqli_query($con, $sqlimo);
			
			$resimo = mysqli_query($con, "INSERT INTO imoveis(idMarkers,idUsuario,quartos,salas,cozinhas,banheiros,suites,outros,valor) VALUES ('$last_id','$idUsuario','$quartos','$salas','$cozinhas','$banheiros','$suites','$info','$valor')");
		}
		
?>

<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	
	<div class="container white" align="left">
		<h3 align="center">Publicação</h3>
		<hr>
		
	
	<div class="row">
		<h5 class="blue-text">Dados do Cadastro:</h5>
		
		<div class="col s7 grey-text">
			<span><b>Endereço:</b> <?php echo $endereco?></span><br/>
			<span><b>Categoria:</b> <?php echo $tipo?></span>
			<span><b>Tipo de negócio:</b> <?php echo $negocio?></span><br/>
			<span><b>Valor:</b> <?php if ($valor != "") echo $valor; else echo " - "?></span><br/>
		</div>
		<div class="col s5 grey-text">
			
			<span><b>Quartos:</b> 
				<?php 
					if ($quartos == "3")
						echo "3 ou mais quartos";
					elseif($quartos != "")
						echo $quartos;
					else 
						echo "-";
				?>
			</span>
			<span><b>Salas:</b> 
				<?php 
					if ($salas == "3"){
						echo "3 ou mais salas";
						echo $salas;
						}
					elseif($salas != "")
						echo $salas;
					else 
						echo "-";
				?>
			</span>
			<span><b>Cozinhas:</b> 
				<?php 
					if ($cozinhas == "3")
						echo "3 ou mais cozinhas";
					elseif($cozinhas != "")
						echo $cozinhas;
					else 
						echo "-";
				?>
			</span><br/>
			
			<span><b>Suites:</b> 
				<?php 
					if ($suites == "3")
						echo "3 ou mais banheiros";
					elseif($suites != "")
						echo $suites;
					else 
						echo "-";
				?>
			</span>
			<span><b>Banheiros:</b> 
				<?php 
					if ($banheiros == "3")
						echo "3 ou mais banheiros";
					elseif($banheiros != "")
						echo $banheiros;
					else 
						echo "-";
				?>
			</span>
			
						
		</div>
		<div class="grey-text col s12">
			<span><b>OBS:</b> <?php if ($info != "") echo $info; else echo " - "?></span><br/><br/>
		</div>

	</div>
		
	<!-- insere imagens -->	
	<form action="php/upload.php" method="post" enctype="multipart/form-data" onsubmit="AJAXSubmit(this); return false;">
	<div class="row">
		
	
		<div class="input-field col s4" >
				
			 <div class="file-field input-field">
				<input class="file-path validate" type="text"/>
				<div class="btn">
					<span>Inserir Imagens</span>
					<input id="files" name="photos[]"  type="file" onclick="return remover()" multiple onchange="selecioneimagem()" accept="image/gif, image/jpeg, image/png, image/bmp" />
					

				</div>
				 
			 </div>
			<br/>
			<p id="submit"> </p>
				
 

		</div>
		
		<div class="col s8" style="margin-top:40px">
				<div id="div"></div>	
			<span id="remover"></span><output id="imagens" class="col s8"></output>
			
		</div>
		
		<br/><br/><br/><br/>
		
	 
	
	</div>
		</form>
	</div>
		

<?php }else{
		echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Verifique os campos necessários! <span class='orange-text' style='font-size:18px; margin-top:-20px'><i>*Endereço *Tipo de imóvel *Forma de Negócio</i></span></span></div></div>";	
				include "../php/anuncie.php";
	
	}

?>


		
