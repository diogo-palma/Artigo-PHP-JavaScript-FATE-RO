<?php
	session_start(); 
	session_unset();
	session_destroy();
echo  "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Logout com sucesso,você será redirecionado, caso esteja demorando <a class='orange-text' href='index.php'>clique aqui</span>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>