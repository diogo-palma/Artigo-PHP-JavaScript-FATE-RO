
<?php
	error_reporting(0);
	include "../banco/db.php";

	$id		= $_GET['todos'];

  	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1; 
/* paginação http://www.sergiotoledo.com.br/tutoriais/programacao-php/paginacao-php
http://forum.wmonline.com.br/topic/231660-paginacao-dentro-de-uma-div/ */

//seleciona todos os itens da tabela
 	$sql = "SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers INNER JOIN usuarios ON imoveis.idUsuario=usuarios.id WHERE usuarios.id='$id' ORDER BY imoveis.datacad DESC";	
	$res  = mysqli_query($con,$sql);

// informa se tem anuncios
if (mysqli_num_rows($res)==0)
		echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Nenhum imóvel!!!</span><a href=\"javascript:Pag('anuncie',3)\" class='card-title orange-text' onclick=\"anuncie()\"> Publique aqui</a></div></div>";

//conta o total de itens
	$total = mysqli_num_rows($res);

//seta a quantidade de itens por página, neste caso, 2 itens
	$registros = 3;

//calcula o número de páginas arredondando o resultado para cima
	$numPaginas = ceil($total/$registros);

//variavel para calcular o início da visualização com base na página atual
	$inicio = ($registros*$pagina)-$registros;
 

//seleciona os itens por página
	$sql1 = "SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers INNER JOIN usuarios ON imoveis.idUsuario=usuarios.id WHERE usuarios.id='$id' ORDER BY imoveis.datacad DESC LIMIT ".$inicio.",".$registros."";
	$res1  = mysqli_query($con,$sql1);
	$total1 = mysqli_num_rows($res1);

echo '<table  id="tb1" class="collection grey lighten-2 " style="margin-right:5%">';


	while ($dados = mysqli_fetch_array($res1)) {
		
		$datas = strtotime($dados[9]);
		 
		$data 			= date ("d/m/y", $datas);
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
		$markers		= $dados[7];
		
		echo '			
			<tr>

			<td class="collection-item avatar">
				<i class="material-icons circle">home</i>
				
					<span class="title col s8"><i>'.$data .'</i></span><br>
					<span class="title col s8"><b>'.$tipo.'</b></span>&nbsp;&nbsp;&nbsp;- <span class="col s4">'.$negocio.'</span><br>
					
					<span class="title col s8"><b>'.$endereco.'</b></span>&nbsp;&nbsp;&nbsp;- <span class="col s4">'.$valor.'</span>
					
		
			<span class="right"><a href="javascript:Pag(\'deletar\',\''.$markers.'\');" title="Remover" onclick="return confirm(\'Remover a publicação?\')" class="btn-floating right"><i class="material-icons red">delete</i></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="javascript:Pag(\'editar\',\''.$markers.'\');" title="Editar" class="btn-floating right"><i class="material-icons grey">edit</i></a>
			
				</td>
				</tr>		
				
			';
		
		
	}
	echo '</table>	';
	
if ($pagina > 1)
	 
	 $anterior = "<li class='white'><a  href='#' onclick=Pag('todos=$id&pagina=".($pagina - 1)."')><i class=\"material-icons\">chevron_left</i></</a> </li>";

if ($pagina < $numPaginas)
	$proximo = "<li class='white'><a  href='#' onclick=Pag('todos=$id&pagina=".($pagina + 1)."')><i class=\"material-icons\">chevron_right</i></</a> </li>";
	
	
for($i = 1; $i < $numPaginas + 1; $i++) {
		$active = $i == $pagina ? 'class="active"' : 'class="white"';
	
	  $numero .= "	
				 		<li $active ><a   class='black-text' href='#'  onclick=Pag('todos=$id&pagina=$i')>$i</a>
						</li>
					
					";
}	


if ($total > 3){
	echo "<div class='container white'><ul class=\"pagination white\">";
	echo $anterior."";
	echo $numero;
	echo "".$proximo;
	echo "</ul></div>";
}
?>