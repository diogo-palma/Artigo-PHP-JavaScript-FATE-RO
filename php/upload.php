<?php

  /* register.php */

  header("Content-type: text/plain");


  /*echo "\n\n:: Files received ::\n\n";
  print_r($_FILES);*/
	
	$file = $_FILES['photos'];

	var_dump($file);

?>