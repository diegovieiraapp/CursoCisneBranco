// JavaScript Document
var req;
var divprogr;
//////////////////////////////////////////////////////////////////
function loadXMLDoc2(url){
 	req = null;
	if (divprogr!=""){mostrar_mensagem2()};
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		req.onreadystatechange = processReqChange2;
		req.open("GET", url, true); 
		req.send(null);
	} else if (window.ActiveXObject) {
	try {
		req = new ActiveXObject("Msxml2.XMLHTTP.4.0");
	} catch(e) {
	try {
		req = new ActiveXObject("Msxml2.XMLHTTP.3.0");
	} catch(e) {
	try {
		req = new ActiveXObject("Msxml2.XMLHTTP");
	} catch(e) {
	try {
		req = new ActiveXObject("Microsoft.XMLHTTP");
	} catch(e) {
	req = false;
	}
	}
	}
}
//////////////////////////////////////////////////////////////////
if (req) {
 	req.onreadystatechange = processReqChange2;
	req.open("GET", url, true);
	req.send();
}
}
}
//////////////////////////////////////////////////////////////////
function mostrar_mensagem2()
{
	var foto;
	var mens1;
	foto  = '<img src="img/aguarde.gif" align="absmiddle"  border="0"/>&nbsp;';	
	mens1 = '<span style="font-family:arial;font-size:11px;">Carregando...</span>';
	document.getElementById(divprogr).innerHTML = foto + mens1;		
}
//////////////////////////////////////////////////////////////////
function processReqChange2(){
if (req.readyState == 4) {
	if (req.status == 200) {
        bola=req.responseText;
		document.getElementById(divprogr).innerHTML = '';
	    return bola;
	} else {
	document.getElementById(divprogr).innerHTML = '';
	alert("Houve um problema ao obter os dados:\n" + req.statusText);
	}
 }
}
//////////////////////////////////////////////////////////////////