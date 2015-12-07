// carrega a pбgina inicial da pag
window.onload = function(){
	Pag('inicio', 0);
}

// envia a requisiзгo ao servidor, de acordo com a aзгo do usuбrio
function Pag(secao, parametro){
    Aviso(1);
	var url="php/pag.php?"+secao+"="+encodeURIComponent(parametro);
	requisicaoHTTP("GET",url,true);
}

// exibe a resposta do servidor
function trataDados(){
	var info = ajax.responseText;
	var saida = document.getElementById("conteudo");
	saida.innerHTML = info;
    Aviso(0);

}
// exibe msg de espera

function Aviso(exibir){
    var saida = document.getElementById("avisos");
    if(exibir){
        saida.className = "aviso";
        saida.innerHTML = "<div class='card blue-grey darken-1 center'><div class='card-content white-text'><span class='card-title'>Aguarde, trabalhando...</span>";
    }
    else{
        saida.className = "";   
        saida.innerHTML = "";
    }
    
    
}
