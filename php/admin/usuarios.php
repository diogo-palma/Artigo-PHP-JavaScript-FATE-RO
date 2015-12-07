<?php 
	
	error_reporting(0);

	include "../banco/db.php";
include "../banco/nivel.php";


if ($nivel == 1){
	$pagina 	= (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1; 

	$sql		= "SELECT * FROM usuarios ORDER BY datacad";

	$res  = mysqli_query($con,$sql);
	
	$total = mysqli_num_rows($res);

	$registros = 4;
	
	$numPaginas = ceil($total/$registros);

	$inicio = ($registros*$pagina)-$registros;


	$order = $_GET["usuarios"];
if ($order == "")
	$order = "datacad";
	
	$palavras = $_GET["buscau"];
	$sql1		= "SELECT * FROM usuarios WHERE nome LIKE '%$palavras%' OR email LIKE '%$palavras%'  ORDER BY ".$order." DESC LIMIT ".$inicio.",".$registros."";

	$res1  = mysqli_query($con,$sql1);
	$total1 = mysqli_num_rows($res1);
	
if ($order !=""){
	
	$datacad = $order == 'datacad' ? 'keyboard_arrow_up' : 'keyboard_arrow_down';
	$nome = $order == 'nome' ? 'keyboard_arrow_up' : 'keyboard_arrow_down';
	$mail = $order == 'email' ? 'keyboard_arrow_up' : 'keyboard_arrow_down';
}

if ($palavras != ""){
echo '
	<div class="container">
		<div class="row white">
		
		<br >
<form align="center" action="javascript:void%200" onSubmit="Pag(\'buscau\',this.buscau.value); return false;">
			<input style="padding:7px" size="30" id="buscau" name="buscau" placeholder="Nome / E-mail">
			
			<button class="btn blue lighten-4" type="submit"><i class="material-icons">search</i></button>
			
<form>
	<table class="collection ">
			<thead>
				<tr>
					
					<th width="15%">Cadastro </th>
					<th >Nome </th>
					<th >Email</th>
					<th >Qntd. Imóveis</th>
				</tr>
			</thead>
					';
	
}else{
	echo'
		<div class="container">
		<div class="row white">
		<br >
		
		<form align="center" action="javascript:void%200" onSubmit="Pag(\'buscau\',this.buscau.value); return false;">
			<input style="padding:7px" size="30" id="buscau" name="buscau" placeholder="Nome / E-mail">
			
			<button class="btn blue lighten-4" type="submit"><i class="material-icons">search</i></button>
			
		<form>
	<table class="collection ">
			<thead>
				<tr>
					<th width="15%">
						<a style="color:black" href="#" onclick="javascript:Pag(\'usuarios\',\'datacad\')">
							Cadastro
							<i style="color:grey"  class="material-icons right">'.$datacad.'</i>
						 </a>
					</th>
					<th >
					<a style="color:black"  href="#" onclick="javascript:Pag(\'usuarios\',\'nome\')">
							Nome
							<i style="color:grey"  class="material-icons right">'.$nome.'</i>
					 </a>
					
					</th>
					<th >
					<a style="color:black" href="#" onclick="javascript:Pag(\'usuarios\',\'email\')">
							E-mail
							<i style="color:grey" class="material-icons right">'.$mail.'</i>
						 </a>
					
					</th>
					<th >Qntd. Imóveis</th>
				</tr>
				
		  </thead>
			
			';
	

}
			
while ($dados = mysqli_fetch_array($res1)) {
	
	$datas = strtotime($dados[7]);
	
	$data 			= date ("d/m/y", $datas);
	$id				= $dados[0];
	$usuario			= $dados[1];
	$email			= $dados[4];
	
	$sql_imoveis	= "SELECT idUsuario FROM imoveis WHERE idUsuario='$id'";
	$query_imoveis = mysqli_query($con,$sql_imoveis);
	$total_imoveis =  mysqli_num_rows($query_imoveis);
	
	
		echo'		
				<tbody class="collection-item avatar">
					<tr >
						<td>'.$data.'</td>
						<td>'.$usuario.'</td>
						<td>'.$email.'</td>
						<td>'.$total_imoveis.'
						<span class="right"><a href="javascript:Pag(\'excluir\',\''.$id.'\');" title="Remover" onclick="return confirm(\'Remover usuário?\')" class="btn-floating right"><i class="material-icons red">delete</i></a>
						<a href="javascript:Pag(\'atualizar\',\''.$id.'\');" title="Editar" class="btn-floating right"><i class="material-icons grey">edit</i></a>
						
						</td>
					</tr>

				</tbody>
				';
	
	}
				
				
				
echo'			</table>

		</div>
	</div>
	
	';


if ($pagina > 1)
	 
	 $anterior = "<li class='white'><a  href='#' onclick=Pag('usuarios=$id&pagina=".($pagina - 1)."')><i class=\"material-icons\">chevron_left</i></</a> </li>";

if ($pagina < $numPaginas)
	$proximo = "<li class='white'><a  href='#' onclick=Pag('usuarios=$id&pagina=".($pagina + 1)."')><i class=\"material-icons\">chevron_right</i></</a> </li>";
	
	
for($i = 1; $i < $numPaginas + 1; $i++) {
		$active = $i == $pagina ? 'class="active"' : 'class="white"';
	
	  $numero .= "	
				 		<li $active ><a   class='black-text' href='#'  onclick=Pag('usuarios=$id&pagina=$i')>$i</a>
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
	echo '<div align="center"><a  class="white" href="#" onclick=Pag(\'usuarios\',\'datacad\') >Exibir todos</a>';
}
}else{
	echo 'Permissão negada';
}

	?>

