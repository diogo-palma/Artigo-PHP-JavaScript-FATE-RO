<?php
	 
	 error_reporting(0);
    ob_start();
    session_start();   
    if (!isset($_SESSION['login']) and $_SESSION['login'] != true){
        session_unset();
        session_destroy();
        //header('location:index.php');
    }
    else
        $secao = $_SESSION['login'];
           


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	
<script>
	function exibe(){
		var editar = document.getElementById("esconder");
		var perfil = document.getElementById("perfil");
		perfil.style.display = "none";
		editar.style.display = "block";
		
	}
	window.onerror = function(){
   return true;
}
	
	
</script>
	
	
	
<script type="text/javascript">
"use strict";

function ajaxSuccess () {
  var div = document.getElementById('div');
	//alert(this.responseText);
	div.innerHTML = this.responseText;
	document.getElementById("remover").innerHTML = "";
	document.getElementById('submit').innerHTML = "";
	
}

function AJAXSubmit (oFormElement) {
  if (!oFormElement.action) { return; }
  var oReq = new XMLHttpRequest();
  oReq.onload = ajaxSuccess;
  if (oFormElement.method.toLowerCase() === "post") {
    oReq.open("post", oFormElement.action, true);
    oReq.send(new FormData(oFormElement));
  } 
}
</script>
	
	

	
	<!-- google maps -->
	
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	
	<!-- anuncie e corta nome -->
	<script>
	function anuncie() {
		document.getElementById('anuncie').style.display = "none";
		var login = document.getElementById('login');
		var nome  = login.innerText.split(' ')[0];
		login.innerHTML = nome;
		
	}
	</script>

	
	
<!-- Máscaras ER http://wbruno.com.br/expressao-regular/diversas-mascaras-com-er/ -->
	<script>
	function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function mvalor(v){
    v=v.replace(/\D/g,"");//Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{8})$/,"$1.$2");//coloca o ponto dos milhões
    v=v.replace(/(\d)(\d{5})$/,"$1.$2");//coloca o ponto dos milhares
 
    v=v.replace(/(\d)(\d{2})$/,"$1,$2");//coloca a virgula antes dos 2 últimos dígitos
    return "R$ " +v;
}
	
	
	</script>


	
	<!-- mapa google -->
	
	 
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      Aluguel: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
      },
      Venda: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("conteudo"), {
        center: new google.maps.LatLng(-8.76543, -63.87974739),
        zoom: 13,			
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;
		 document.getElementById('anuncie').style.display = "inline-block";

      // Change this depending on the name of your PHP file
      downloadUrl("php/maps.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var imovel = markers[i].getAttribute("imovel");
          var endereco = markers[i].getAttribute("endereco");
			 var end = endereco.split(',')[0];
			 var end2 = endereco.split(',')[1];
			// var ampliar = map.setZoom(15); 
			 
			 var id =  markers[i].getAttribute("id");
          var tipo = markers[i].getAttribute("tipo");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + imovel + " - </b>(" + tipo + ") <br/>" + "<i>" + end + "<br/>" + end2 + "</i>";
			     html += "<p><a href=\"javascript:Pag('imovel','"+id+"');\">Mais detalhes</a></p>"; 
			   

          var icon = customIcons[tipo] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

	</script>
	
	
	<!-- script livro -->
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/controle.js"></script>
    <script type="text/javascript" src="js/sugestoes.js"></script>

	
	
	<script>
		function red(){
			document.getElementById("endereco").classList.add("red-text");
		}
	</script>
</head>
	
	
	
	
	
	
<?php 

		if (!isset($secao) and $secao != true){
				
?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<body class="grey lighten-2" onload="load()">
<?php 
		}else{
			
?>
<!-- localidade google https://www.youtube.com/watch?v=_kHz9snOS-U -->	
<body class="grey lighten-2" onload="Pag('anuncie',3); initialize(); anuncie(); ">	
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=places"></script>
<script type="text/javascript">
		
		function initialize(){
			var autotxt = document.getElementById('txtautocomplete');
			if (autotxt != null){
			var autocomplete = new google.maps.places.Autocomplete(autotxt);	
				google.maps.event.addListener(autocomplete, 'place_changed', function(){
					var place 			= autocomplete.getPlace();
					
					
					var 	location		= "<div class=\"input-field col s6 \"><b>Endereço Completo: </b>" + place.formatted_address + "<br/></div>";
						location		+= "<div class=\"input-field col s3\"><input id=\"lat\" name=\"lat\" disabled type=\"text\" value=" + place.geometry.location.lat() + "></div>";
					 	location		+= "<div class=\"input-field col s3\"><input id=\"lng\" name=\"lng\" disabled type=\"text\" value=" + place.geometry.location.lng() + "></div><br/>";
						document.getElementById('resultado').innerHTML = location;
						document.getElementById("conteudo").removeAttribute("style");
						document.getElementById("lista").innerHTML = "";
						
				
				});
			
			};
		};
	

</script>

	
	<script>
    function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        e = e || window.event;
        if (e.keyCode == 13)
        {
            primeiroresultado();
				
            return false;
        }
		  var sair = document.getElementById("txtautocomplete");
		 	
		  sair.addEventListener("focusout", primeiroresultado);
			
				
				 
        return true;
		 function primeiroresultado(){
			document.getElementById('txtautocomplete').click();
			  	var texto = document.getElementsByClassName("pac-item")[0].innerText;
			   var geocoder = new google.maps.Geocoder();
			  	geocoder.geocode({"address":texto }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var lat = results[0].geometry.location.lat(),
                    lng = results[0].geometry.location.lng(),
                    placeName = results[0].address_components[0].long_name,
                    latlng = new google.maps.LatLng(lat, lng);
					  	var location 		= "<div class=\"input-field col s6 \"><b>Endereço Completo: </b>" + texto  + "<br/></div>";
						location		+= "<div class=\"input-field col s3\"><input id=\"lat\" name=\"lat\" disabled type=\"text\" value=" + lat + "></div>";
						location		+= "<div class=\"input-field col s3\"><input id=\"lng\" name=\"lng\" disabled type=\"text\" value=" + lng + "></div><br/>";
							document.getElementById('resultado').innerHTML = location;
							document.getElementById('txtautocomplete').value = texto;
				}
				}); 
		 }
    }
    </script>
	

	

<?php 
		}
?>
<header id="subir" >

    <nav class="blue">
        <div class="container">
			  <div class="nav-wrapper">
				  <a href="javascript:load()"  onclick="document.getElementById('result').style.zIndex = '0'"class="left" style="font-size:27px;"><i class="material-icons">home</i>Imóveis</a>
 <ul class="right">
			  		<li>
						  <a href="javascript:Pag('contato')" class="right" onclick="document.getElementById('result').style.zIndex = '0'">
						  <i class="material-icons icon left">mail</i><span class="hide-on-med-and-down">Contato</span></a>
					</li>	
				 </ul>

				 <div id="usu" onclick="document.getElementById('result').style.zIndex = '0'"><?php include "php/usuario.php"; ?></div>
				
				  <ul class="right">
						<li>
							<form>
						  <div class="pesquisar input-field blue lighten-3">
								<input id="query" placeholder="Pesquisar..." type="search" autocomplete="off" onclick="document.getElementById('result').style.zIndex = '1'" onkeypress="search()"> 
								<label for="palavras" ><i class="material-icons">search</i></label>
							  	<div id='result'></div>
							</div>
								</form>
						</li>
				  </ul>
			  </div>
        </div>
		 
    </nav>
	
</header>
<!-- conteúdo -->

<div id="avisos" class="row center" ></div>	
<main onclick="document.getElementById('result').style.zIndex = '0'">
<div id="conteudo">
 	
	 
	 
</div>

</main>
<footer class="page-footer blue">
    <div class="container">
        <div class="row">
            <p class="anuncie" align="center">

	<a id="anuncie" href="javascript:Pag('anuncie',3)" class="waves-effect waves-light red btn " onclick="anuncie()">Publique aqui</a>

			  </p>
        </div>
    </div>
    <div class="footer-copyright">
		 
        <div class="container">
            2015 
            <a class="grey-text text-lighten-4 right" href="#!">design by <u>Materialize.css</u></a>
        </div>
    </div>
</footer>
    
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

	
<!-- imagens http://jsfiddle.net/lesson8/sLLR6/ -->
<script type='text/javascript'>//<![CDATA[

function selecioneimagem() {
    //Verifica se suporta o API
    if (window.File && window.FileList && window.FileReader) {
		var e = event || window.event;
		 var filesInput = document.getElementById("files");
        var files = e.target.files; //FileList object
        var output = document.getElementById("imagens");

        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            //Only pics
            if (!file.type.match('image')) continue;

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
					var picFile = event.target;
					var div = document.createElement("div");
					var conta = document.getElementById('files').files.length;
					
                div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" + "title='" + file.name + "'/>";
               var submit = document.getElementById("submit"); 					
					
					
					submit.innerHTML = "<br/><input class=\"btn-large waves-effect waves-light blue\"    type=\"submit\" value=\"Enviar\"  />";	
						
               
					output.insertBefore(div, null);
					document.getElementById("remover").innerHTML = "<a class=\"btn-floating btn waves-effect waves-light red\" onclick=\"return remover()\"><i class=\"material-icons\">delete</i></a>";
					// http://pt.stackoverflow.com/questions/73261/adicionando-v%C3%A1rias-imagens-javascript
					
					
                                    
					
            });
            //Read the image
            picReader.readAsDataURL(file);
			  	
        }
    } else {
        console.log("Seu navegador não suporta essa aplicação");
    }
	
}

function remover() {
	var imagens = document.getElementById('imagens')
				if (imagens != ""){
						document.getElementById("remover").innerHTML = "";
						imagens.innerHTML = "";		
						document.getElementById('files').value = "";	
						document.getElementById('submit').innerHTML = "";
						document.getElementById('div').innerHTML = "";
						
					}
				else
					return true;
					
}

	
		
//]]> 

</script>
	
	
</body>
</html>

<?php

ob_end_flush();

?>