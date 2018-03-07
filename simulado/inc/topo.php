<div id="livezilla_tracking" style="display:none"></div>
<script type="text/javascript">
var script = document.createElement("script");script.type="text/javascript";
var src = "http://www.vagasparaconcursos.com.br/simulados/chat/server.php?request=track&output=jcrpt&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);

// Copyright 2006-2007 javascript-array.com

var timeout	= 400;
var closetimer	= 0;
var ddmenuitem	= 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 


function submeter(){
document.getElementById("formbusca").submit();	
}

</script>
<noscript>
<img src="http://www.vagasparaconcursos.com.br/simulados/chat/server.php?request=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="">
</noscript>
<style type="text/css">
.novoml{font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;font-size:10px ;TEXT-DECORATION: none ;}
.novoml:hover{font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;font-size:10px; TEXT-DECORATION: underline}
.novoml:active{font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;font-size:10px ;TEXT-DECORATION: none}
.novoml:visited{font-family:Arial, Helvetica, sans-serif;color:#FFFFFF;font-size:10px ;TEXT-DECORATION: none}

body {
	background-color: #C7E2FE;
}

#sddm
{	
text-align:center;
margin: 0;
padding:0;
padding-left:12px;
padding-bottom:16px;
z-index: 30;
}

#sddm li
{	margin: 0;
	padding: 0;
	list-style: none;
	float: left;

}

#sddm li a
{	display: block;
	color: #fff;
	text-align: center;
	text-decoration: none;
	}
	

#sddm li a:hover
{	background: #020017}

#sddm div
{	position: absolute;
	visibility: hidden;
	margin: 0;
	padding: 0;
    padding-top:8px;
	background: #E8ECFF;
	border: 1px dotted #5970B2;
			padding-bottom:5px;
	}

	#sddm div a
	{	position: relative;
		display: block;
		margin: 0;
		padding: 1px 10px;
		width: auto;
		white-space: nowrap;
		text-align: left;
		text-decoration: none;
		background: #E8ECFF;
		color: #000000;
		font: 11px arial}

	#sddm div a:hover
	{	background: #49A3FF;
		color: #FFF}



#sola
{	
text-align:center;
margin: 0;
padding:0;
padding-left:0px;
padding-bottom:16px;
z-index: 30;
}

#sola li
{	margin: 0;
	padding: 0;
	list-style: none;
	float: left;
    padding-left:10px;
	padding-bottom:2px;
}

#sola li a
{	display: block;
	color: #000000;
	text-align: center;
	text-decoration: none;
	font-family:Verdana, Geneva, sans-serif;
	font-size:10px;
}

#sola li a:hover
{


}

#sola div
{	position: absolute;
	visibility: hidden;
	margin: 0;
	padding: 0;
    padding-top:8px;
	background: #E8ECFF;
	border: 1px dotted #5970B2;
	padding-bottom:5px;
    
	
	}

	#sola div a
	{	position: relative;
		display: block;
		margin: 0;
		padding: 1px 10px;
		width: auto;
		white-space: nowrap;
		text-align: left;
		text-decoration: none;
		background: #E8ECFF;
		color: #000000;
		font: 11px arial;
	
	}

	#sola div a:hover
	{	background: #49A3FF;
		color: #FFF;
	
	}

.aquira{
color:#FFF;
font-size:10px;
}

</style><a name="testesapostilasopcao"></a>
<table id="Table_01" height="139" width="999px" border="0" cellpadding="0" cellspacing="0" align="center">

	<tr>

		<td background="images/topo_novo.jpg?t=3" width="736" height="103" title="Contato: (11) 2856-6066"></td>

		<td width="263" height="101" align="right" valign="top" background="images/topo_02.jpg" style="padding-bottom:2px;padding-right:4px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25px"></td>
  </tr>
</table>
<img src="../images/programa-de-afiliados.jpg?g=2" border="0" usemap="#Map2">
<map name="Map2">
<area shape="rect" coords="127,4,186,45" href="rastreamento.php">
<area shape="rect" coords="68,4,117,45" href="testes.php" title="Testes, Simulados, Questões, Exercícios" />
<area shape="rect" coords="194,4,230,45" href="contatos.php">
<area shape="rect" coords="237,4,277,46" href="carrinho.php">
<area shape="rect" coords="6,2,58,46" href="afiliados.php" title="Comece Agora a Ganhar Dinheiro com seu WebSite ou Blog" />
</map>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10px"></td>
  </tr>
</table>
<table width="205px" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>Pesquisar: </td>
    <td style="padding-bottom:2px;padding-left:3px;" align="right"><input type="text" name="busca" id="busca" style="font-family:verdana; font-size:xx-small;border-style:solid;border-color:#CCC;border-width:1px;" size="19" maxlength="50" value="Digite aqui..." onClick="javascript:limpacampo(busca.value);"></td>
    <td align="right" style="padding-right:4px;">&nbsp;<a href="javascript:submeter();"><img src="../images/ok_busca.jpg" width="26" height="17" style="alignment-baseline:central" border="0" /></a></td>
  </tr>
</table>
</td>
</tr>
<tr>
<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td ><img src="../images/topo_canto_esquerdo.jpg" width="10" height="36" /></td>
<td width="99%" background="../images/topo_centro.jpg" valign="bottom" style="padding-bottom:7px;padding-left:2px;" align="center" class="aquira">
<ul id="sddm">
<li><A class="novoml" href="index.php">HOME</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="concursos-publicos.php?menuarea=1" onmouseover="mopen('m2')" onmouseout="mclosetime()">CONCURSOS</A>
<div id="m2" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
<a href="concursos-publicos.php?menuarea=1">NACIONAL</a>
<a href="concursos-publicos.php?menuarea=5">NORTE</a>
<a href="concursos-publicos.php?menuarea=4">CENTRO OESTE</a>
<a href="concursos-publicos.php?menuarea=6">NORDESTE</a>
<a href="concursos-publicos.php?menuarea=2">SUDESTE</a>
<a href="concursos-publicos.php?menuarea=3">SUL</a></div>
</li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="#" onmouseover="mopen('m1')" onmouseout="mclosetime()">SERVIÇOS</A><div id="m1" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
<a href="inscricao.php">INSCRIÇÕES</a>
<a href="provas.php">PROVAS</a>
<a href="legis.php">LEGISLAÇÃO</a>
<a href="links.php">LINKS</a>
<a href="resultado.php">APROVADOS</a></div></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="contatos.php">CONTATO</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="rastreamento.php">RASTREIE SEU PEDIDO</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="provas.php">PROVAS</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="informacoes.php">INFORMATIVOS</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="empresa.php">QUEM SOMOS</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="duvidas.php">DÚVIDAS</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="apostilas.php">APOSTILAS</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="mapa.php">MAPA DO SITE</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="inscricao.php">INSCRIÇÕES</A></li>
<li>&nbsp;|&nbsp;</li>
<li><A class="novoml" href="testes.php">TESTES</A></li>
</ul>
</td>
<td ><img src="../images/topo_canto_direito.jpg" /></td>
</tr>
</table></td>
</tr>
</table>


