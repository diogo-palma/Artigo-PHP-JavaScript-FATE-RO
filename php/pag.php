<?php
	
	if ((isset($_GET["inicio"])) || isset($_GET["busca"]))
        	include "mapa.php";
	elseif (isset($_GET["login"]))
			include "../php/login.php";
	elseif (isset($_GET["logout"]))
			include "../form/logout.php";
	elseif (isset($_GET["anuncie"]))
			include "../php/anuncie.php";
	elseif (isset($_GET["imovel"]))
			include "../php/perfil/imovel.php";
	elseif (isset($_GET["cadastro"]))
			include "../php/cadastro.php";

//contato
	elseif (isset($_GET["contato"]))
			include "../php/contato.php";

//perfil
	elseif (isset($_GET["perfil"]))
			include "../php/perfil/perfil.php";
	elseif (isset($_GET["todos"]))
			include "../php/perfil/todos.php";
	elseif (isset($_GET["deletar"]))
			include "../form/deletatodos.php";
//admin
	elseif (isset($_GET["usuarios"]) || isset($_GET["buscau"]))
			include "../php/admin/usuarios.php";
	elseif (isset($_GET["anuncios"]) || isset($_GET["buscap"]))
			include "../php/admin/anuncios.php";
//admin cliente
	elseif (isset($_GET["excluir"]))
			include "../php/admin/form/del_usuario.php";
	elseif (isset($_GET["atualizar"]))
			include "../php/admin/form/edit_usuario.php";


//editar imoveis	
	elseif (isset($_GET["editar"]))
			include "../form/edit_imoveis.php";
	

	

?>