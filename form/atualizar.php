<?php

	
	include "../banco/db.php";

	$id				= $_POST['id'];
	$tipo				= $_POST['tipo'];
	$negocio			= $_POST['negocio'];
	$valor			= $_POST['valor'];
	$quartos			= $_POST['quartos'];
	$salas			= $_POST['salas'];
	$cozinhas		= $_POST['cozinhas'];
	$banheiros		= $_POST['banheiros'];
	$suites			= $_POST['suites'];
	$info				= $_POST['info'];
	

	$sql = "SELECT w.*,s.* FROM markers w INNER JOIN imoveis s ON w.id=s.idMarkers WHERE w.id='$id' AND s.idMarkers='$id'";

	$query = mysqli_query($con, $sql);
	
if (mysqli_num_rows($query) > 0){
	$res = mysqli_query($con,"UPDATE markers as w INNER JOIN imoveis AS s SET w.imovel='$tipo',w.tipo='$negocio', s.valor='$valor', s.quartos='$quartos', s.salas='$salas', s.cozinhas='$cozinhas', s.banheiros='$banheiros', s.suites='$suites', s.outros	='$info' WHERE w.id='$id' and s.idMarkers='$id'");
	
	echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Alteração com sucesso!!!<a href=\"javascript:Pag('imovel','$id')\" class='orange-text'> Visualizar</a></div></div>";	
}
else{
	echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Erro!</div></div>";	
}