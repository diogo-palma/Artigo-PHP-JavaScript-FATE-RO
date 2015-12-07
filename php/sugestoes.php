<?php


include "../banco/db.php";

if (isset($_GET['search']) && $_GET['search'] != '') {
	$search = $_GET['search'];
	
	$result = mysqli_query($con,"SELECT * FROM markers INNER JOIN imoveis ON markers.id=imoveis.idMarkers WHERE markers.endereco LIKE ('%".$search."%') OR markers.tipo LIKE ('%".$search."%') OR markers.imovel LIKE ('%".$search."%')  ORDER BY imoveis.datacad DESC LIMIT 3");
	while($row = mysqli_fetch_array($result))
	{
		
		echo '<a onclick="document.getElementById(\'result\').style.zIndex = \'0\'" href="javascript:Pag(\'imovel\','.$row['7'].');" class="black-text"><h7 style="font-size: 10px;">' . $row['endereco'] .'</h7>';	
		
		if ($row['tipo'] == 'Venda'){
			echo '<p style="margin-top: -51px;"><span class="red-text">'.$row['tipo']. "</span> " ;
		}else{
			echo '<p style="margin-top: -51px;"><span class="blue-text">'.$row['tipo']. "</span> " ;
		}
		
		echo '-'.$row['imovel']. "</a>\n<hr>" ;
		
		
	}
}



?>

