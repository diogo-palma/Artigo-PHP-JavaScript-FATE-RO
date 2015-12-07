var ajax;
var dadosUsuario;

// ------- cria o objeto e faz a requisiзгo -------
function requisicaoHTTP(tipo,url,assinc){
	if(window.XMLHttpRequest){	  // Mozilla, Safari,...
		ajax = new XMLHttpRequest();
	} 
	else if (window.ActiveXObject){	// IE
		ajax = new ActiveXObject("Msxml2.XMLHTTP");
		if (!ajax) {
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}
    }      
    
	if(ajax)	// iniciou com sucesso
		iniciaRequisicao(tipo,url,assinc);
	else
		alert("Seu navegador não possui suporte a essa aplicação!");
}

// ------- Inicializa o objeto criado e envia os dados (se existirem) -------
function iniciaRequisicao(tipo,url,bool){
	ajax.onreadystatechange=trataResposta;
	ajax.open(tipo,url,bool);
	
	ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	
	//ajax.overrideMimeType("text/XML");   /* usado somente no Mozilla */
	ajax.send(dadosUsuario);
}


// ------- Inicia requisiзгo com envio de dados -------
function enviaDados(url){
	criaQueryString();
	requisicaoHTTP("POST",url,true);
}



// ------- Cria a string a ser enviada, formato campo1=valor1&campo2=valor2... -------
function criaQueryString(){
	dadosUsuario="";
//	var frm = document.forms[0];
	var frm = document.getElementById("formAjax");
	var numElementos =  frm.elements.length;
	for(var i = 0; i < numElementos; i++)  {
		if(i < numElementos-1)  {
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value)+"&";
		} else {
			dadosUsuario += frm.elements[i].name+"="+encodeURIComponent(frm.elements[i].value);
		}
	}
}

// ------- Trata a resposta do servidor -------
function trataResposta(){
	if(ajax.readyState == 4){
		if(ajax.status == 200){
			trataDados();  // criar essa funзгo no seu programa
		} else {
			alert("Problema na comunicaзгo com o objeto XMLHttpRequest.");
		}
	}
}
// exibe msg de espera

function Aviso(exibir){
    var saida = document.getElementById("avisos");
    if(exibir){
        saida.className = "aviso";
        saida.innerHTML = '<p class="msg z-depth-3 grey lighten-2">Aguarde Carregando!</p>';
    }
    else{
        saida.className = "aviso";   
        saida.innerHTML = "";
    }
    
    
}


