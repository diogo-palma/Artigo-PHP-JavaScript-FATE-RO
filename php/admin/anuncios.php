<?php

	error_reporting(0);
	include "../banco/db.php";
	include "../banco/nivel.php";


if ($nivel == 1){
	$pagina 	= (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1; 

	$sql		= "SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers INNER JOIN usuarios ON imoveis.idUsuario=usuarios.id ORDER BY imoveis.datacad DESC ";

	$res  = mysqli_query($con,$sql);
	
	
	
	$total = mysqli_num_rows($res);

	$registros = 4;
	
	$numPaginas = ceil($total/$registros);

	$inicio = ($registros*$pagina)-$registros;

	 
	$palavras = $_GET["buscap"];

	$sql1		= "SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers INNER JOIN usuarios ON imoveis.idUsuario=usuarios.id WHERE usuarios.nome LIKE '%$palavras%' OR markers.endereco LIKE '%$palavras%' OR imoveis.valor LIKE '%$palavras%'  ORDER BY imoveis.datacad DESC LIMIT ".$inicio.",".$registros."";

	$res1  = mysqli_query($con,$sql1);
	$total1 = mysqli_num_rows($res1);

	
		
	echo '<div class="container">
		<div class="row white">
		<br >
		
		<form align="center" action="javascript:void%200" onSubmit="Pag(\'buscap\',this.buscap.value); return false;">
					<input style="padding:7px" size="30" id="buscap" name="buscap" placeholder="Nome / Endereço / Valor">

					<button class="btn blue lighten-4" type="submit"><i class="material-icons">search</i></button>
		<form>
	<table class="collection ">
			<thead>
				<tr>
					<th width="9%">Cadastro </th>
					<th width="9%">Alteração </th>
					<th width="20%">Nome </th>
					<th width="30%">Endereço </th>
					<th width="7%">Categoria </th>
					<th width="7%">Negócio </th>
					<th width="18%">Valor </th>
					
				
				</tr>
			</thead>
				';

while ($dados = mysqli_fetch_array($res1)) {
	
	
	$datacads	= strtotime($dados[9]);
	$dataalts	= strtotime($dados[10]);
	
	$datacad		= date("d/m/y", $datacads);
	
	$id			= $dados[0];
	$usuario		= $dados[19];
	$endereco	= $dados[2];
	$categoria	= $dados[1];
	$negocio		= $dados[5];
	$valor		= $dados[17];
	
	if ($dataalt == "")
		$dataalt = "-";
	else
		$dataalt		= date("d/m/y", $dataalts);
	
	echo '
			<tbody class="collection-item avatar">
					<tr >
						<td>'.$datacad.'</td>
						<td>'.$dataalt.'</td>
						<td>'.$usuario.'</td>
						<td><i style="font-size:12px">'.$endereco.'</i></td>
						<td>'.$categoria.'</td>
						<td>'.$negocio.'</td>
						<td>'.$valor.'
						<span class="right"><a href="javascript:Pag(\'deletar\',\''.$id.'\');" title="Remover" onclick="return confirm(\'Remover imóvel?\')" class="btn-floating right"><i class="material-icons red">delete</i></a>
						<a href="javascript:Pag(\'editar\',\''.$id.'\');" title="Editar" class="btn-floating right"><i class="material-icons grey">edit</i></a>
						
						
						</td>
						
					</tr>

				</tbody>
			
			';
	
	//print_r ($dados);
	
}
echo'			</table>

		</div>
	</div>
	
	';

if ($pagina > 1)
	 
	 $anterior = "<li class='white'><a  href='#' onclick=Pag('anuncios=$id&pagina=".($pagina - 1)."')><i class=\"material-icons\">chevron_left</i></</a> </li>";

if ($pagina < $numPaginas)
	$proximo = "<li class='white'><a  href='#' onclick=Pag('anuncios=$id&pagina=".($pagina + 1)."')><i class=\"material-icons\">chevron_right</i></</a> </li>";
	
	
for($i = 1; $i < $numPaginas + 1; $i++) {
		$active = $i == $pagina ? 'class="active"' : 'class="white"';
	
	  $numero .= "	
				 		<li $active ><a   class='black-text' href='#'  onclick=Pag('anuncios=$id&pagina=$i')>$i</a>
						</li>
					
					";
}	

if ($palavras == ""){

if ($total > 4){
	echo "<div class='container white'><ul class=\"pagination white\">";
	echo $anterior."";
	echo $numero;
	echo "".$proximo;
	echo "</ul></div>";
}
}else{
	echo '<div align="center"><a  class="white" href="#" onclick=Pag(\'anuncios\') >Exibir todos</a>';
}
	
}else{
echo 'Permissão negada';	
}
