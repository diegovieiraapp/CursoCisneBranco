<?
$wamp=$_SERVER['REQUEST_URI'];

if ($wamp=="/" || $wamp=="/index.php"){
$facebook_img="http://www.vagasparaconcursos.com.br/simulados/admin/images/logonovo.jpg";
}

$conc=strip_tags($_GET["conc"]);

if (is_numeric($conc)) {
$sql2="select concurso from conc where codigo='$conc'";
} else {
$conc="";
}

if ($conc!=""){

$reado=mysql_query($sql2) or die(mysql_error());
$li=mysql_fetch_array($reado);
$concurso559=$li["concurso"];
$sql2="select codigo from concursos where descricao='$concurso559'";
$reado=mysql_query($sql2) or die(mysql_error());
$li=mysql_fetch_array($reado);
$codigocon3=$li["codigo"];

$sql3="select codigo,descricao from categorias where codcon='$codigocon3' order by ordem,descricao";
$reado3=mysql_query($sql3) or die(mysql_error());
$pi=mysql_fetch_array($reado3);
$apostila_c2=$pi["descricao"];

$apostila_c2=str_replace(chr(13),"",$apostila_c2);
$apostila_c2=str_replace(chr(10),"",$apostila_c2);

$concurso559=str_replace(chr(13),"",$concurso559);
$concurso559=str_replace(chr(10),"",$concurso559);

$titulo_pagina="$apostila_c2 - Concurso $concurso559 - Apostilas para Concursos Públicos Opção";

$meta_des="$apostila_c2";
}
else{
$titulo_pagina="Apostilas e informa&ccedil;&otilde;es para Concursos P&uacute;blicos - Apostilas Op&ccedil;&atilde;o";		
$apostila_c2="";
}

if ($novotitulo!=""){
$titulo_pagina="$novotitulo";
$apostila_c2="$titulo_pagina";
$concurso559="$keywords_seo";
}

if ($seo_titulo!=""){
$titulo_pagina=$seo_titulo;
$apostila_c2=$seo_descricao;
$concurso559=$seo_palavras;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?=$titulo_pagina?></title>
<META NAME="RESOURCE-TYPE" CONTENT="DOCUMENT">
<META NAME="DISTRIBUTION" CONTENT="GLOBAL">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Content-Language" content="pt-br">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="description" content="<?=$apostila_c2?>">
<meta name="keywords" content="apostilas,concursos,<?=$apostila_c2?>,<?=$concurso559?>">
<meta name="Robots" content="Index,Follow">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta property="og:image" content="<?=$facebook_img?>" />
</head>
<script language="javascript">
coco=1;
function janel(arquivo,topo,esquerda,pequeno,wilber){
coco++;
window.open(arquivo, coco,'toolbar=0,location=0,directories=0,status=yes,menubar=0,scrollbars=yes,resizable=0,width=' + pequeno + ',height=' + wilber + ',top=' + topo + ',left=' + esquerda + ',status=no');
}

function prepara(co,categoria,apostila,preco,peso,conti,codapo,tipo){
if (tipo!=1){
q=eval('document.form1.qtd'+co+'.options[document.form1.qtd'+co+'.selectedIndex].value');
qtd=q;
}
else{
qtd=1;	
}

location.href="carrinho.php?qtd="+ qtd +"&categoria="+ categoria +"&apostila="+ apostila +"&preco="+ preco +"&peso=" + peso +"&continu=" + conti +"&codapo=" + codapo +"&tipo="+tipo;
}

function MM_findObj(n, d) { //v4.0
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
  d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function MM_showHideLayers() { //v3.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
  if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
  obj.visibility=v; }
} 

function position (top,left)
{
document.getElementById("MENUDOWN").style.top=top;
document.getElementById("MENUDOWN").style.left=left;
}

function position_servicos (top,left)
{
document.getElementById("MENUDOWN_servicos").style.top=top;
document.getElementById("MENUDOWN_servicos").style.left=left;
}

function buscar(){
var texto=document.getElementById("busca").value;
texto=texto.replace(/^\s+/g, '').replace(/\s+$/g, '');
conta = texto.length;
if (conta<=2){window.alert("Minimo para busca 3 Dígitos");}
else{location.href="busca.php?busca=" + texto + "&bus=1";}
}

function limpacampo(strcampo){
		if (strcampo == 'Digite aqui...'){
		document.formbusca.busca.value = '';		
		return true;
	}
}

</script>

<style>
a {
   text-decoration:none;
   }
   
#loade {
  position:absolute; 
  top:50%; 
  left:0; 
  width:100%; 
  margin-top:-120px; 
  text-align:center; 
}

body {
	background-color: #C7E2FE;
}
   
</style>

<body id="corpo" bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" alink="#000000" vlink="#000000" link="#000000">
<form action="javascript:buscar();" method="post" name="formbusca" id="formbusca">
<link rel="stylesheet" type="text/css" href="css/css.css">