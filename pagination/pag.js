
function getHTTPObject(){
if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
else if (window.XMLHttpRequest) return new XMLHttpRequest();
else {
alert("Your browser does not support AJAX.");
return null;
}
}


function show_pagination(page_id){
if(page_id == '-'){
if(parseInt(document.getElementById('page_id').value) > 1){
page_id = parseInt(document.getElementById('page_id').value) - 1;
} else {
page_id = 1;
}
} else if(page_id == '+'){
if(parseInt(document.getElementById('page_id').value) < 3){
page_id = parseInt(document.getElementById('page_id').value) + 1;
} else {
page_id = 3;
}
}
document.getElementById('page_id').value = page_id;
httpObject_pagination = getHTTPObject();
if (httpObject_pagination != null) {
httpObject_pagination.open("GET", "pagination.php?page="
+page_id, true);
httpObject_pagination.send(null);
httpObject_pagination.onreadystatechange = setOutput_pagination;
}
}


function setOutput_pagination(){
if(httpObject_pagination.readyState == 4){
document.getElementById('show_page').innerHTML = httpObject_pagination.responseText;
}
}
var xmlHttp;

function GetXmlHttpObject(){
var xmlHttp=null;
try{
xmlHttp=new XMLHttpRequest();// Firefox, Opera 8.0+, Safari
}
catch (e){ // Internet Explorer
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}


catch (e){
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}
var httpObject = null;
