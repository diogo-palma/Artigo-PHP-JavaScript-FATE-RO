<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<div class="container white" align="center">
	<h3 >Cadastro</h3>
	<hr>
	<p>Informe seus dados</p>
	<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados('form/cadastro.php'); return false;">
		<div class="row">
			<div class="input-field col s5">
				<i class="material-icons prefix">account_circle</i>
				<input id="nome" name="nome" type="text" class="validate" <?php if(isset($nome)) echo "value=\"$nome\"";?>>
				<label for="nome"<?php if(isset($nome)) echo "class=\"active\"";?>>Nome:</label>

			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix">domain</i>
				<input id="endereco" name="endereco" type="text" class="validate"<?php if(isset($endereco)) echo "value=\"$endereco\"";?>>
				<label for="endereco"<?php if(isset($endereco)) echo "class=\"active\"";?>>Endereço Completo:</label>

			</div>	
			<div class="input-field col s4">
				<i class="material-icons prefix">phone</i>
				<input id="telefone" name="telefone" type="text" class="validate"<?php if(isset($telefone)) echo "value=\"$telefone\"";?>>
				<label for="telefone"<?php if(isset($telefone)) echo "class=\"active\"";?>>Telefone:</label>

			</div>
			<div class="input-field col s5">
				<i class="material-icons prefix">mail</i>
				<input id="email" name="email" type="email" class="validate"<?php if(isset($email)) echo "value=\"$email\"";?>>
				<label for="email"<?php if(isset($email)) echo "class=\"active\"";?>>E-mail:</label>

			</div>
		</div>
		<div class="row">
			
			<div class="input-field col s3">
				<i class="material-icons prefix">vpn_key</i>
				<input id="senha" name="senha" type="password" class="validate"<?php if(isset($senha)) echo "value=\"$senha\"";?>>
				<label for="senha"<?php if(isset($senha)) echo "class=\"active\"";?> >Senha:</label>
			</div>
			<div class="input-field col s3">
				<i class="material-icons prefix">info_outline</i>
				<input id="confirma" name="confirma" type="password" class="validate"<?php if(isset($confirma)) echo "value=\"$confirma\"";?>>
				<label for="confirma"<?php if(isset($confirma)) echo "class=\"active\"";?>>Confirme a senha:</label>
			</div>
			<div class="col s6">
				<button class="waves-effect waves-light btn black" type="submit" style="margin-top:20px" >Cadastrar</button>
			</div>
		</div>
		
			
	
	</form>
		
	</div>
</body>
</html>