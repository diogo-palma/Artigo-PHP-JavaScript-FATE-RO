
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
<?php 
	ob_start();
	session_start();   
	
	if (!isset($_SESSION['login']) and isset($_SESSION['login']) != true){
		session_unset();
		session_destroy();
	
	}
?>
<div class="container white" align="center">
	<h3>Login</h3>
	<hr>
	<p>Informe seus dados</p>
	<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados('form/login.php'); return false;">
		<div class="login" >
	 		<div class="input-field col s6">
				<i class="material-icons prefix">email</i>
				<input id="icon_prefix" name="login" type="email" class="validate black-text" <?php if(isset($email)) echo "value=\"$email\"";?>>
				<label for="icon_prefix" <?php if(isset($email)) echo "class=\"active\"";?>>E-mail:</label>
				
        	</div>
		 	<div class="input-field col s6">
				<i class="material-icons prefix">vpn_key</i>
				<input id="icon_telephone" name="senha" type="password" class="validate black-text" <?php if(isset($senha)) echo "value=\"$senha\"";?>>
				<label for="icon_telephone"<?php if(isset($senha)) echo "class=\"active\"";?>>Senha:</label>
			</div>
			<button class="waves-effect waves-light btn blue" type="submit" >Entrar</button>
			
		</div>
		<hr>
		
		<p class="right">
		N&atilde;o possui cadastro?<br/>
		<a href="javascript:Pag('cadastro')" class="waves-effect waves-light grey darken-4 btn right" <?php if(isset($senha)) echo "id=\"esconder\"";?>>Cadastre-se</a>
		</p>
		<p></p>
		<br/>
		<br/>
		<br/>
		
	</form>
	
</div>

	
	
	</body>
	</html>