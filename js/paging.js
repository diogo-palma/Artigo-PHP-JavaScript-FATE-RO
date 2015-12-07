function GetXMLHttp() {

        var xmlHttp;
                try {
                        xmlHttp = new XMLHttpRequest();
                }
                catch(ee) {
                        try {
                                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                        }
                        catch(e) {
                                try {
                                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                catch(e) {
                                        xmlHttp = false;
                                }
                        }
                }
                return xmlHttp;
}

var xmlHttp = GetXMLHttp();

//
// FUNÇÃO PARA PEGAR O LINK E ABRIR A PAGINA NA DIV CONTEUDO.
function abrirPag(valor){
        var url = valor;
         
        xmlRequest.open("GET",url,true);
        xmlRequest.onreadystatechange = mudancaEstado;
        xmlRequest.send(null); 
        
        if (xmlRequest.readyState == 1) {
                document.getElementById("conteudo").innerHTML = "Abrindo pagina. Aguarde.";
        }
        
        return url;
}


function mudancaEstado(){
        if (xmlRequest.readyState == 4){
                document.getElementById("conteudo").innerHTML = xmlRequest.responseText;
        }
        
}