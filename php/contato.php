<?php 
//http://www.123contactform.com/simple-php-contact-form-2.htm
error_reporting(0);
$action= ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formAjax'])); 
if ($action == "")    /* display the contact form */ 
    { 
    ?> 
<form id="formAjax" method="post" action="javascript:void%200" onSubmit="enviaDados('php/contato.php'); return false;">
<div class="container">
	<div class="row white ">
		<h4 class="center"> Contato</h4>
		<div class="input-field col s7">
			<i class="material-icons prefix">account_circle</i>
			<input id="nome" name="nome" type="text" class="validate">
			<label for="nome" class="">Nome:</label>

		</div>
		<div class="input-field col s5">
				<i class="material-icons prefix ">email</i>
				<input id="email" name="email" type="email" class="validate black-text">
				<label for="email" >E-mail:</label>
		</div>
		<div class="input-field col s5">
				<i class="material-icons prefix ">bookmark</i>
				<input id="assunto" name="assunto" type="text" class="validate black-text">
				<label for="assunto" >Assunto:</label>
		</div>
		<div class="input-field col s12">
			<i class="material-icons prefix active">speaker_notes</i>
            <textarea id="textarea" name="info" name="texto" class="materialize-textarea" length="120"></textarea>
            <label for="textarea" >Texto:</label>
	 	</div>
		
		
		<div class="input-field col s12 center">
			<button class="btn blue">Enviar</button>
		</div>

	
		</div>
</div>
</form>
<?php 
    }  
else                /* send the submitted data */ 
    { 
	
    $name=$_REQUEST['nome']; 
    $email=$_REQUEST['email']; 
    $assunto=$_REQUEST['assunto']; 
    $message=$_REQUEST['texto']; 
    if (($name=="")||($email=="")||($message=="")) 
        { 
        echo "Campos Vazios!!"; 
        } 
    else{         
        $from="From: $name<$email>\r\nReturn-path: $email"; 
        $subject="Message sent using your contact form"; 
        mail("diogopalma@live.com", $subject, $message, $from); 
        echo "Email sent!"; 
        } 
    }   
?> 