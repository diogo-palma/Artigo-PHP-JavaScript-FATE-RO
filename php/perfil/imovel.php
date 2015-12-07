<?php 
	include "../banco/db.php";
	include "../banco/nivel.php";

	$id 		= $_GET["imovel"];
	

	$res		= mysqli_query($con, "SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers INNER JOIN usuarios ON imoveis.idUsuario=usuarios.id WHERE markers.id='$id'");

if(mysqli_num_rows($res)>0){
	 for ($i=0; $i<mysqli_num_rows($res); $i++){
		 $dados = mysqli_fetch_row($res);
		 //print_r ($dados);
		 $datas = strtotime($dados[9]);
		 
		 $data 			= date ("d/m/y", $datas);
		 $idusu			= $dados[18];
		 $endereco		= $dados[2];
		 $tipo			= $dados[1];
		 $negocio		= $dados[5];
		 $valor			= $dados[17];
		 $quartos		= $dados[11];
		 $salas			= $dados[12];
		 $cozinhas		= $dados[13];
		 $banheiros		= $dados[14];
		 $suites			= $dados[15];
		 $info			= $dados[16];
		 $nome			= $dados[19];
		 $tel				= $dados[20];
		 $email			= $dados[22];
		 $markers		= $dados[0];
		
	 }

?>

<html>
<head>
<meta charset="utf-8">	
	
</head>
<body>

<div class="container white">
	<?php 
	
	if ($nivel == 1){
	echo '<p><a href="javascript:Pag(\'deletar\',\''.$markers.'\');" title="Remover" onclick="return confirm(\'Remover a publicação?\')" class="btn-floating right"><i class="material-icons red">delete</i></a>';
	echo '<a href="javascript:Pag(\'editar\',\''.$markers.'\');" title="Editar" class="btn-floating right"><i class="material-icons grey">edit</i></a></p>';
	}
	
?>
	<div class="row" > <!--style="margin-top:-75px>"-->
		<h5 class="blue-text" align="center">Dados do Imóvel:</h5>
		
		<div class="col s7 grey-text">
			<span><b>Endereço:</b> <?php echo "<span style='font-size:18px'>$endereco</span>";?></span><br/>
			<span><b>Categoria:</b> <?php echo "<span style='font-size:18px'>$tipo</span>";?></span>
			<span><b>Tipo de negócio:</b> <?php echo "<span style='font-size:18px'>$negocio</span>";?></span><br/>
			<span><b>Valor:</b> <?php if ($valor != "") echo $valor; else echo " - "?></span>
			<span class='right'><b>Data da publicação:</b> <?php echo "<span style='font-size:18px'>$data</span>";?></span>
			<br/> 
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
	<div class="row">
		<div class="col s5">
			<div class='card blue-grey light-1 center' >
				<div class='card-content white-text' style="margin-top:-30px">
					<span class='card-title orange-text'>Publicado por:</span>
					<p>
						<b>
							<?php  
								if ($nivel == 1){
									echo "<a title='Editar Usuário' href=\"javascript:Pag('atualizar','$idusu');\" class='white-text'><i class=\"tiny blue-grey  material-icons white-text\">edit</i><u>$nome</u></a> - $tel <i class='orange-text'>e-mail: </i>$email <a title='Remover Usuário' href=\"javascript:Pag('excluir','$idusu');\" onclick=\"return confirm('Remover usuário?')\" class='white-text'><i class=\"tiny blue-grey  material-icons white-text\">delete</i>";
								}else{
									echo "$nome - $tel <i class='orange-text'>e-mail: </i>$email";
								}
							?>
						
						</b>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>

	
	
</body>
</html>

<?php






}else{
	echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Nenhuma informação!!!</span></div></div>";
}

	


?>