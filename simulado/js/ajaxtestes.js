// JavaScript Document
var req;
var div;
var divprogr;
//////////////////////////////////////////////////////////////////
function loadXMLDoc(url){
 	req = null;
	if (divprogr!=""){mostrar_mensagem()};
	if (window.XMLHttpRequest) {
		req = new XMLHttpRequest();
		req.onreadystatechange = processReqChange;
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
 	req.onreadystatechange = processReqChange;
	req.open("GET", url, true);
	req.send();
}
}
}
//////////////////////////////////////////////////////////////////
function mostrar_mensagem()
{
	var foto;
	var mens1;
	foto  = '<img src="img/aguarde.gif" align="absmiddle"  border="0"/>&nbsp;';	
	mens1 = '<span style="font-family:arial;font-size:11px;">Carregando...</span>';
	document.getElementById(divprogr).innerHTML = foto + mens1;		
}
//////////////////////////////////////////////////////////////////
function processReqChange(){
if (req.readyState == 4) {
	if (req.status == 200) {
		document.getElementById(div).innerHTML = ' ';	
		document.getElementById(div).innerHTML = req.responseText;

passa="";

for(t=1;t<=10;t++){
pegado[t]="";
antigo[t]="";	
respostas[t]="";	
}
scroll(0,0);

//		document.getElementById(divprogr).innerHTML = ' ';
	} else {
		document.getElementById(div).innerHTML = ' ';
		document.getElementById(divprogr).innerHTML = ' ';
	alert("Houve um problema ao obter os dados:\n" + req.statusText);
	}
 }
}
//////////////////////////////////////////////////////////////////