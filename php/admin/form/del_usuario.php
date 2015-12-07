<?php

	include "../banco/db.php";
	$id		= $_GET["excluir"];
	
$sql = "SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers INNER JOIN usuarios ON imoveis.idUsuario=usuarios.id WHERE usuarios.id='$id'";

$res = mysqli_query($con,$sql);





if (mysqli_num_rows($res)>0) {
	
	$query = "DELETE t1,t2,t3 FROM markers as t1 INNER JOIN imoveis as t2 ON t1.id=t2.idMarkers INNER JOIN usuarios as t3 ON t2.idUsuario=t3.id WHERE t3.id='$id'";
	if (mysqli_query($con,$query)){
    	echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Usuário apagado!!!</span><a href=\"javascript:Pag('usuarios','datacad')\" class='card-title orange-text' onclick=\"anuncie()\"> Voltar</a></div></div>";
	}else{
		echo "Error deleting record: " . mysqli_error($con);
	}
	
}else{
	$query = "DELETE FROM usuarios WHERE id='$id'";
	
	if (mysqli_query($con,$query)){
		echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Usuário apagado!!!</span><a href=\"javascript:Pag('usuarios','datacad')\" class='card-title orange-text' onclick=\"anuncie()\"> Voltar</a></div></div>";
	}else{
		echo "Error deleting record: " . mysqli_error($con);
	}
}