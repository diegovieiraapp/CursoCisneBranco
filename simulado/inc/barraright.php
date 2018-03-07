<?
//===========================================
//NUMERO DE REGISTROS NO BANCO
 /*$SQL = "select count(A.codigo) as total
 		 from categorias A
		 INNER JOIN concursos B ON (A.codcon = B.codigo)";
 $resultado = mysql_query($SQL);
 $linhas 	= mysql_num_rows($resultado);
 $total		= mysql_result($resultado,0,"total");*/
//===========================================
//===========================================
//PEGA ALGUMAS APOSTILAS ALEATORIAMENTE
//$cont = 0;
//while ($cont < 5 && $cont < $total)
//{
	/*$random = mt_rand(0,$total-1);
	$SQL = "select A.*,B.descricao as titulo
			 from categorias A
			 INNER JOIN concursos B ON (A.codcon = B.codigo)
			 WHERE A.codigo <> '' $and
			 limit $random,1";
	 $resultado = mysql_query($SQL);
	 $linhas = mysql_num_rows($resultado);*/
	 /*if ($linhas > 0)
	 {
	 	$and .= " and A.codigo <> ". mysql_result($resultado,0,"codigo");*/
		$url[]			=	"http://www.vagasparaconcursos.com.br/simulados/apostilas/2034/banco-do-brasil/banco-do-brasil.php";
		$descri2[]		=	"Banco do Brasil";
		$descri[]		=	"Escriturário";
		$preco[]		=	"<strong>Apostila Impressa e Digital</strong>";
		$img[]			= 	"1043";
		$url[]			=	"http://www.vagasparaconcursos.com.br/simulados/apostilas/2113/policia-civil-do-rio-de-janeiro/inspetor-de-policia.php";
		$descri2[]		=	"PC-RJ";
		$descri[]		=	"Inspetor de Polícia";
		$preco[]		=	"<strong>Apostila Digital</strong>";
		$img[]			= 	"1283";
		$url[]			=	"http://www.vagasparaconcursos.com.br/simulados/apostilas/2105/educacao-sp/agente-de-organizacao-escolar.php";
		$descri2[]		=	"Educação - SP";
		$descri[]		=	"Agente de Organização Escolar";
		$preco[]		=	"<strong>Apostila Impressa e Digital</strong>";
		$img[]			= 	"1272";
		$url[]			=	"http://www.vagasparaconcursos.com.br/simulados/apostilas/2093/ministerio-da-agricultura-pecuaria-e-abastecimento/agente-de-inspecao.php";
		$descri2[]		=	"MAPA";
		$descri[]		=	"Agente de Inspeção";
		$preco[]		=	"<strong>Apostila Impressa e Digital</strong>";
		$img[]			= 	"1250";
		$url[]			=	"http://www.vagasparaconcursos.com.br/simulados/apostilas/1923/caixa-economica-federal/tecnico-bancario-novo.php";
		$descri2[]		=	"Caixa Econômica Federal";
		$descri[]		=	"Técnico Bancário";
		$preco[]		=	"<strong>Apostila Impressa e Digital</strong>";
		$img[]			= 	"1252";
		/*$descritivos[]	=	mysql_result($resultado,0,"descritivos");
		$link[]			=	mysql_result($resultado,0,"link");
		$codcon[]		=	mysql_result($resultado,0,"codcon");
		$medidas[]		=	mysql_result($resultado,0,"medidas");
		$descrilink[]	=	mysql_result($resultado,0,"descrilink");
		$visuindice[]	=	mysql_result($resultado,0,"visuindice");
		$linkarq[]		=	mysql_result($resultado,0,"linkarq");
		$verc[]			=	mysql_result($resultado,0,"verconteudo");
		$datamake[]		=	mysql_result($resultado,0,"datamake");*/
		//$cont++;
	 //}
//}
//===========================================
?>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:49px;
	top:376px;
	width:178px;
	height:41px;
	z-index:1;
}

.riverside {COLOR: #006995; TEXT-DECORATION: none;font-size:11px;FONT-FAMILY:arial,helvetica;FONT-WEIGHT: bold;}
.riverside:hover {COLOR: #F00; TEXT-DECORATION: none;font-size:11px;FONT-FAMILY:arial,helvetica;FONT-WEIGHT: bold;}
.riverside:active {COLOR: #000099; TEXT-DECORATION: underline;font-size:11px;FONT-FAMILY:arial,helvetica;FONT-WEIGHT: bold;}

-->
</style>
<!-- ============================================================ -->
<!-- ============================================================ -->
<?
$sq99="SELECT login_id FROM chatoperators where login_id!=''";
$re3=mysql_query($sq99) or die(mysql_error());
$taliza=mysql_num_rows($re3);
if ($taliza!=0){
?>
<? include "inc/tabela_up_rewrite.php"; ?>

<font size="1" face="verdana" color="#336699" style="font-size:85%">
<strong><font size="2">Alguma Dúvida ?</font></strong></font>
<? include "inc/tabela_middle_rewrite.php"; ?>
<div align="center">
<a href="javascript:void(window.open('http://www.vagasparaconcursos.com.br/simulados/chat/chat.php','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))"><img src="http://www.vagasparaconcursos.com.br/simulados/images/atendimento_online_apostilasopcao.png" width="123" height="109" border="0" alt="Clique Aqui para Teclar Agora com um de nossos Atendentes" title="Clique Aqui para Teclar Agora com um de nossos Atendentes" /></a>
<br /><br />
<a href="javascript:void(window.open('http://www.vagasparaconcursos.com.br/simulados/chat/chat.php','','width=590,height=610,left=0,top=0,resizable=yes,menubar=no,location=no,status=yes,scrollbars=yes'))" class="riverside">Estamos <font color="#FF0000">On-Line</font> Agora, Clique Aqui para tirar suas <font color="#FF0000">DÚVIDAS</font> em um Atendimento por <font color="#FF0000">CHAT</font></a>
<br />
</div>
<? include "inc/tabela_down_rewrite.php"; ?>
<? } ?>
<? include "inc/tabela_up_rewrite.php"; ?>

<font size="1" face="verdana" color="#336699" style="font-size:85%">
<strong><font size="2">Destaques</font></strong></font>
<? include "inc/tabela_middle_rewrite.php"; ?>
<table cellpadding="0" cellspacing="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:xx-small">
<? for ($a=0; $a < sizeof($url); $a++){ ?>
<tr>
 <td>
 	<table style="font-family:tahoma; font-size:xx-small; cursor:pointer; cursor:hand;”," onclick="window.location.href='<?=$url[$a];?>'">
	 <tr><td rowspan="5"><img src="<?=$url_master?>/fotos/<?=$img[$a];?>.jpg" width="70" /></td></tr>
	 <tr><td><strong><?=$descri2[$a];?></strong></td></tr>
	 <tr><td>
	 <?
	 $var = explode(" ",$descri[$a]);
	 for ($b=0; $b<sizeof($var); $b++)
	 {
		 if (strlen($var[$b])>12)
		 {
		 	echo substr($var[$b],0,11) . "-<br>" . substr($var[$b],11,100) ." ";
		 }else{
		 	echo $var[$b] ." ";
		 }
	 }
	 ?>
	 </td></tr>
	 <tr><td><?=$preco[$a];?></td></tr>
	</table>
<? if ($a < (sizeof($codigo)-1)){ ?>
<tr><td background="<?=$url_master?>/images/fundo_pontilhado2.jpg" style="background-repeat:repeat-x; height:10"></td></tr>
<? }; ?>
 </td>
</tr>
<? }; ?>
</table>
<p>
  <input name="link" type="button" id="link" value="Outras apostilas" target="_self" onclick="window.location='<?=$url_master?>/destaques.php'">
  <? include "inc/tabela_down_rewrite.php"; ?>
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->
  <!-- ============================================================ -->
</p>
<p>


</p>
<p>
  <? include "inc/tabela_up_rewrite.php"; ?>
  <strong><font color="#336699" size="2"  align="center" face="verdana">Correios</font></strong>
  <? include "inc/tabela_middle_rewrite.php"; ?>
</p>
<table cellpadding="0" cellspacing="5" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:xx-small" align="center">
 <tr>
 	<td align="center"><a href="http://www.correios.com.br/precosPrazos/default.cfm" target="_blank"><img src="<?=$url_master?>/images/banner_correios.jpg" width="88" height="149" border="0" title="Correios" /></a></td>
 </tr>
</table>
  <? include "inc/tabela_down_rewrite.php"; ?>
<p>
  <? include "inc/tabela_up_rewrite.php"; ?>
  <strong><font color="#336699" size="1"  align="center" face="verdana">Responsabilidade Ambiental</font></strong>
  <? include "inc/tabela_middle_rewrite.php"; ?>
</p>
<table cellpadding="0" cellspacing="5" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:xx-small" align="center">
 <tr>
 	<td align="center"><img src="<?=$url_master?>/img/reciclado3.png" width="127" height="72" ></td>
 </tr>
</table>
  <? include "inc/tabela_down_rewrite.php"; ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
