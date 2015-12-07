<?php

if(isset($_POST['pn'])){
	$rpp = preg_replace('#[^0-9]#', '', $_POST['qntd']);
	$last = preg_replace('#[^0-9]#', '', $_POST['ultima']);
	$pn = preg_replace('#[^0-9]#', '', $_POST['pn']);
	// This makes sure the page number isn't below 1, or more than our $last page
	if ($pn < 1) { 
    	$pn = 1; 
	} else if ($pn > $last) { 
    	$pn = $last; 
	}
	// Connect to our database here
	include "../banco/db.php";
	// This sets the range of rows to query for the chosen $pn
	$limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
	// This is your query again, it is for grabbing just one page worth of rows by applying $limit
	$sql = "SELECT id,imovel,endereco FROM markers ORDER BY id DESC $limit";
	$query = mysqli_query($con, $sql);
	$dataString = '';
	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		$id = $row["id"];
		$firstname = $row["imovel"];
		$lastname = $row["endereco"];
		//$itemdate = strftime("%b %d, %Y", strtotime($row["datemade"]));
		$dataString .= $id.'|'.$firstname.'|'.$lastname.'|';
	}
	// Close your database connection
    mysqli_close($con);
	// Echo the results back to Ajax
	print_r($rpp);
	print_r($last);
	print_r($pn);
	echo $dataString;
	exit();
}
?>