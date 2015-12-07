<!-- menu -->


 <ul class="right">

					<!-- Dropdown Trigger -->
				
					
					
						<?php
							if (!isset($secao) and $secao != true){
						?>
				  	
						<li>
								<a href="javascript:Pag('login',1)"><i class="material-icons icon left">portrait</i><span class="hide-on-med-and-down" >Login</span></a>
						</li>
					  	<?php 
							}else{
								include "banco/db.php";
								$res = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$secao'");
								
								 if (mysqli_num_rows($res)>0){
        							$dados = mysqli_fetch_row($res);
									 $nome               = $dados[1];
									 $id               = $dados[0];
									 $nivel				= $dados[9];
								 }
						?>
						
					  	<li>
						  <a class="dropdown-button right" href="#!" data-activates="dropdown1"><i class="material-icons icon   left">account_circle</i><span id="login" class="hide-on-med-and-down"><?php echo $nome; ?></span>
						  <i class="material-icons right">keyboard_arrow_down</i></a>
						</li>
					  <?php 
							}
						?>
				
					</ul>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="javascript:Pag('perfil','<?php echo $id?>');">Perfil</a></li>
        <li><a href="javascript:Pag('todos','<?php echo $id?>');" onclick="javascript:document.getElementById('conteudo').removeAttribute('style');">Imóveis</a></li>
        <li class="divider"></li>
		 <?php 
			if ($nivel == 1){
							
							?>
		
		 <li style="cursor: default;">Admin</li>
		 <hr style="border-top: 1px dashed #f00;">
		 <li><a href="javascript:Pag('usuarios','datacad')">  Usuários</a></li>
		 <li><a href="javascript:Pag('anuncios')">  Anúncios</a></li>
		  <hr style="border-top: 1px dashed #f00;">
		 
		 
		 	
				 <?php			
						}
			?>
        <li><a href="javascript:Pag('logout',2)" class="red-text">Sair</a></li>
    </ul>