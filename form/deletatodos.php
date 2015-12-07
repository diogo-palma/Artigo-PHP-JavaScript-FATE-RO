<?php
	include "../banco/db.php";
	$id		= $_GET['deletar'];

	$sql = "DELETE w.*,s.* FROM markers w INNER JOIN imoveis s ON w.id=s.idMarkers WHERE w.id='$id' AND s.idMarkers='$id'";
	
	if (mysqli_query($con, $sql)) {
    echo "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Imóvel apagado!!!</span><a href=\"javascript:Pag('anuncie',3)\" class='card-title orange-text' onclick=\"anuncie()\"> Publique aqui</a></div></div>";
	} else {
		echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>