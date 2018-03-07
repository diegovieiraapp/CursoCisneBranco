<? 
session_start(); 

$acao='<a href="testes.php" class="outside3" >Retornar</a>';
$local="- Administra&ccedil;&atilde;o de Testes - Quest&otilde;es";

include 'abre.php';

if (isset($_SESSION["usuario"])==0)
{
?>
<script language="javascript">
document.location="index.php";
</script>
<?
exit;
}

$emausu2=$_SESSION["usuario"];
$codusu2=$_SESSION["idusu"];
$nomeusu2=$_SESSION["session_nomeusu"];

$sq="select test_acesso,test_edita,test_exclu from usuarios where codigo='$codusu2'";
$resultado=mysql_query($sq) or die(mysql_error()); 
$li33=mysql_fetch_array($resultado);

$test_acesso=$li33["test_acesso"];
$test_edita=$li33["test_edita"];
$test_exclu=$li33["test_exclu"];

if ($test_acesso==0){
echo "Você não tem permissão para acessar esse módulo";
exit;
}

$msgexclu="";
$strbusca="";
$alternado=$_GET["alternado"];
$exc=$_GET["exc"];
$exc_cate=$_GET["exc_cate"];
$organiza=$_GET["organiza"];
$resetar=$_GET["resetar"];
$codsub=$_GET["codsub"];
$codques=$_GET["codques"];
$pulando=$_GET["pulando"];



if (isset($exc)!=0){

$exclua=1;
$msgerro="";

$sql22="select nome,letra from testes_alternativas where codigo='$exc'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu2=mysql_fetch_array($resu32);

$nomecate2=$ctu2["nome"];
$letra5=strtoupper($ctu2["letra"]);

$sql22="delete from testes_alternativas where codigo='$exc'";
$resultado32=mysql_query($sql22) or die(mysql_error());
$msgexclu="A alternativa <b>$letra5)</b> da questão de código: <b>$codques</b> foi excluída com sucesso";
}

if (isset($exc_cate)!=0){

$exclua=1;
$msgerro="";

$sql22="select questao from testes_questoes where codigo='$exc_cate'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu2=mysql_fetch_array($resu32);

$nomecate2=$ctu2["questao"];

$sql22="select codigo from testes_alternativas where codquestao='$exc_cate'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu=mysql_num_rows($resu32);
if ($ctu!=0){$msgerro.="<b>Alternativas</b> <br>";$exclua=0;}

if ($exclua==1){
$sql22="delete from testes_questoes where codigo='$exc_cate'";
$resultado32=mysql_query($sql22) or die(mysql_error());
$msgexclu="A Questão de código: <b>$exc_cate</b>, foi excluída com êxito";	
}
else{
$msgexclu="Não é possível excluir a Questão de código: <b>$exc_cate</b>, existem alternatias ligadas à ela, exclua primeiramente as alternativas";	
}
} // fecha $exc_cate

if ($resetar==1){
$_SESSION["sqlb"]="";
$_SESSION["sqlb_palavra"]="";
$_SESSION["sqlb_tipo"]="";
$codsub=$_SESSION["codigosub"];
unset($_SESSION["superbuscapor"]);	
unset($_SESSION["superbuscacriterio"]);
}

if ($codsub>0){
$_SESSION["sqlb"]="";
}

$consulta=$_SESSION["sqlb"];

if (strlen($consulta)>5){
$ocorre=1;
$strbusca=$_SESSION["sqlb"];	
}
else{
$strbusca="";
$ocorre=0;
}


$buscando=$_GET["buscando"];
$organizarpor=$_POST["organizarpor"];
$busca=$_POST["busca"];
$localizarpor=$_POST["localizarpor"];

if ($buscando==1){
unset($_SESSION["superbuscapor"]);	
unset($_SESSION["superbuscacriterio"]);
}

if (isset($_SESSION["superbuscapor"])!=0){   // Caso exista uma busca Geral na pagina testes.php, aqui pegara os criterios da mesma
$localizarpor=$_SESSION["superbuscapor"];	
$buscando=1;
$busca=$_SESSION["superbuscacriterio"];
}


if ($alternado>0){
$localizarpor=2;	
$buscando=1;
$busca="$pulando";
}


if ($buscando==1){
$ocorre=1;
if ($localizarpor==0){
$tipo_busca="QUESTÃO";
$strbusca="and que.questao like '%$busca%'";
}
if ($localizarpor==1){
$tipo_busca="ALTERNATIVA";
$strbusca="and alt.nome like '%$busca%'";
}
if ($localizarpor==2){
$tipo_busca="CÓDIGO";
$strbusca="and que.codigo='$busca'";
}

$_SESSION["sqlb_palavra"]=$busca;
$_SESSION["sqlb_tipo"]=$tipo_busca;
$_SESSION["sqlb"]=$strbusca;
}


if ($minhaordem==""){$minhaordem=$_SESSION["sqlb_org"];}
if ($organizarpor==""){$organizarpor=$_SESSION["sqlb_orgp"];}

if ($organiza=="1"){

if ($organizarpor==0){
$minhaordem="order by que.questao";	
}
else{
$minhaordem="order by que.codigo";	
}

$_SESSION["sqlb_org"]=$minhaordem;
$_SESSION["sqlb_orgp"]=$organizarpor;
}


if ($localizarpor==""){
$localizarpor=0;
}

if ($codsub==""){
$codsub=$_SESSION["codigosub"];
$codcate=$_SESSION["codigocate"];	
//$codcate
}
else{
$sq="select codcate from testes_subcategorias where codigo='$codsub'";
$resultad=mysql_query($sq) or die(mysql_error()); 
$li22=mysql_fetch_array($resultad);
$codcate=$li22["codcate"];
$_SESSION["codigosub"]=$codsub;
$_SESSION["codigocate"]=$codcate;
}

$sq="select cate.nome as categoria,sub.nome as subcategoria from testes_categorias as cate left join testes_subcategorias as sub on cate.codigo=sub.codcate where sub.codigo='$codsub'";
$resultad=mysql_query($sq) or die(mysql_error()); 
$li22=mysql_fetch_array($resultad);
$categoria=$li22["categoria"];
$subcategoria=$li22["subcategoria"];


$entrafim=$_GET["entrafim"];
$saraco=$_GET["saraco"];
$deuce=$_GET["deuce"];
$inicia=$_GET["inicia"];
$finaliza=$_GET["finaliza"];


if ($deuce!=1){
$inicia=0;
$finaliza=50;
}

$proximo_ini=$finaliza;
$proximo_fim=$finaliza+50;

$anterior_ini=$finaliza-100;
$anterior_fim=$finaliza-50;

$sq2="select count(*) as total from testes_questoes as que where que.subcate='$codsub'";
$re2=mysql_query($sq2) or die(mysql_error());
$pira=mysql_fetch_array($re2);
$numemaster=$pira["total"];

$sq2="select que.codigo from testes_questoes as que left join testes_alternativas as alt on que.codigo=alt.codquestao where que.subcate='$codsub' $strbusca group by que.codigo";
$re2=mysql_query($sq2) or die(mysql_error());
$nume=mysql_num_rows($re2);

$finalpart=$nume % 50;

if ($entrafim==1){
if ($finalpart==0){$finalpart=50;}
$inicia=$nume-$finalpart;	
$anterior_ini=$nume-100-$finalpart;
$anterior_fim=$nume-50-$finalpart;
$anterior_fim+=50;
}

$mostrafim=$finaliza;
$naomais=0;
if ($finaliza >= $nume){$mostrafim=$nume;$naomais=1;}


if ($ocorre==1){
if ($busca==""){$busca=$_SESSION["sqlb_palavra"];}
if ($tipo_busca==""){$tipo_busca=$_SESSION["sqlb_tipo"];}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<title>Simulados de Concursos - Setor Administrativo</title>
</head>
<script language="javascript" type="text/javascript">

image1 = new Image();
image1.src = "img/aguarde.gif";
image2 = new Image();
image2.src = "../Bolinha.gif";
 

var varetime3 = new Date();

function combo(arquivo,pequeno,focusjanela){
grande=parseInt(screen.availHeight)-350;
leftVal = parseInt((screen.availWidth/2) - (pequeno/2));
topVal = 100;
focustemp=varetime3.getTime()+focusjanela;
var minha = window.open(arquivo, focustemp,'toolbar=0,location=0,directories=0,status=no,menubar=0,scrollbars=yes,resizable=0,width=' + pequeno + ',height=' + grande + ',top=' + topVal + ',left=' + leftVal + ',status=no');
minha.blur();
minha.focus();
}


function valida(){

opcao=document.getElementById("localizarpor").options[document.getElementById("localizarpor").selectedIndex].value;
foi=0;
	
texto=document.getElementById("busca").value;
texto=texto.replace(/^\s+/g, '').replace(/\s+$/g, '');
conta = texto.length;

if (conta<=2 && opcao!=2){
window.alert("Minimo para busca 3 Dígitos");
foi=1;
}
else{
document.getElementById("some").style.display="none";
document.getElementById("mata").innerHTML="<img src='img/aguarde.gif'>&nbsp;Executando Pesquisa... Aguarde."
document.teste1.submit();
foi=1;
}

if (opcao!=2 && foi==0){
document.getElementById("some").style.display="none";
document.getElementById("mata").innerHTML="<img src='img/aguarde.gif'>&nbsp;Executando Pesquisa... Aguarde."
document.teste1.submit();
}
	
}

function organiza(){


document.getElementById("teste1").action="?organiza=1&deuce=1&inicia=<?=$inicia?>&finaliza=<?=$finaliza?>";
document.teste1.submit();

	
}

function exc(codigo,nome,codques)
{
	if (codigo)
	{
nome=nome.toUpperCase();
		if(confirm("Tem certeza que deseja excluir a alternativa: "+ nome +") da questao de código: "+codques))
		{
        window.location.href="?exc="+ codigo + "&codques="+codques+"&alternado=1&pulando="+codques;
		}
	}
}


function exc_cate(codigo)
{
	if (codigo)
	{
		if(confirm("Tem certeza que deseja excluir a Questão de código: "+ codigo + " ?"))
		{
        window.location.href="?exc_cate="+codigo+"&codques="+codigo+"&alternado=1&pulando="+codigo;
		}
	}
}

</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<LINK href="geral-novo.css" type=text/css rel=StyleSheet>

<body>
<form id="teste1" name="teste1" method="post" action="?buscando=1" onSubmit="return valida(this);">

<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="8"></td></tr></table>
<? include "topo.php"; ?>
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="4"></td></tr></table>
<table align="center" width="999" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td valign="top" align="center"><table width="100%" height="44" border="0" cellpadding="0" cellspacing="2">
  <tr>
    <td width="12%" align="right" bgcolor="#F5F5F5"><b>Categoria:</b>&nbsp;</td>
    <td width="79%" align="left" bgcolor="#ECEFFF" style="padding-left:5px"><?=$categoria?></td>
    <td width="9%" bgcolor="#ECEFFF" style="padding-left:5px">&nbsp;</td>
    </tr>
  <tr>
    <td align="right" bgcolor="#F5F5F5"><b>Sub Categoria:</b>&nbsp;</td>
    <td align="left" bgcolor="#ECEFFF" style="padding-left:5px"><?=$subcategoria?></td>
    <td bgcolor="#ECEFFF" style="padding-left:5px" align="center"><?=$acao?></td>
    </tr>
</table>
<?
if ($ocorre==1){
?>
  <br />
  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">Resultado da busca por <font color="#FF0000"><?=$tipo_busca?></font>, retornou <font color="#FF0000"><b><?=$nume?></b></font> questões utilizando o critério: <font color="#FF0000"><b><?=$busca?></b></font> pesquisado em um total de <font color="#FF0000"><b><?=$numemaster?></b></font> questões. -> <a href="questoes.php?resetar=1">Clique Aqui para cancelar os crit&eacute;rios de busca</a></td>
    </tr>
  </table>
<?
}
?>  
  <table width="900" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="329">  
      <?
if ($mostrafim==0){$sipione=0;}else{$sipione=$inicia+1;}
?>
<div id="origemdetudo">
<div align="left">
<br />
Visualizando de <b><font color='#ff0000'><?=$sipione?></font></b> &agrave; <b><font color='#ff0000'><?=$mostrafim?></font></b> em <font color="#FF0000"><b><?=$nume?></b></font> Registros<table width="30" border="0" cellspacing="0" cellpadding="0"><tr><td height="4"></td></tr></table>
</div>
<table width="177" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td width="84" align="center"><? if ($inicia!=0){ ?><a href="?deuce=1&inicia=0&finaliza=50"><img src="images/seta_p.jpg" width="30" height="31" border="0" title="PRIMEIRA" /></a><? }else{ echo '<img src="images/seta_p_off.jpg" width="30" height="31" border="0" title="PRIMEIRA" />'; } ?></td>
    <td width="93" align="center"><? if ($inicia!=0){ ?><a href="?deuce=1&inicia=<?=$anterior_ini?>&finaliza=<?=$anterior_fim?>"><img src="images/seta_e.jpg" width="31" height="30" border="0" title="ANTERIOR" /></a><? }else{ echo '<img src="images/seta_e_off.jpg" width="31" height="30" border="0" title="ANTERIOR" />'; } ?></td>
    <td width="84" align="center"><? if ($naomais==0){ ?><a href="?deuce=1&inicia=<?=$proximo_ini?>&finaliza=<?=$proximo_fim?>"><img src="images/seta_d.jpg" width="31" height="30" border="0" title="PRÓXIMA" /></a><? }else{ echo '<img src="images/seta_d_off.jpg" width="31" height="30" border="0" title="PRÓXIMA" />'; } ?></td>
    <td width="84" align="center"><? if ($naomais==0){ ?><a href="?deuce=1&inicia=<?=$nume-$finalpart?>&finaliza=<?=$nume?>&entrafim=1"><img src="images/seta_u.jpg" width="30" height="31" border="0" title="ÚLTIMA" /></a><? }else{ echo '<img src="images/seta_u_off.jpg" width="30" height="31" border="0" title="ÚLTIMA" />'; }?></td>
  </tr>
</table>
</div>
<br />
      </td>
      <td width="10">&nbsp;</td>
      <td width="238" align="left"><br />Buscar por:
<select name="localizarpor" id="localizarpor">
<?
$leco[0]="Questão";
$leco[1]="Alternativa";
$leco[2]="Cod. Questão";

foreach($leco as $lixo => $valor){
if ($lixo==$localizarpor){$sele="selected";}else{$sele="";}

?>
<option value="<? echo $lixo; ?>" <?=$sele?>><? echo $valor; ?>&nbsp;&nbsp;</option>
<?
}
?>
</select>
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td height="3"></td></tr></table>
<input type="text" name="busca" id="busca" class="flate22" value="<?=$busca?>" />
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td height="3"></td></tr></table>
<a id="some" class="botao" href="javascript:valida();"><span>Localizar</span></a><div id="mata"></div>
</td>
<td width="144" align="left" style="padding-top:23px;">Organizar Por:
<table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td height="3"></td></tr></table>
<select name="organizarpor" id="organizarpor">
<?
$leco2[0]="Questão";
$leco2[1]="Cod. Questão";
foreach($leco2 as $lixo => $valor){
if ($lixo==$organizarpor){$sele="selected";}else{$sele="";}
?>
<option value="<? echo $lixo; ?>" <?=$sele?>><? echo $valor; ?>&nbsp;&nbsp;</option>
<?
}
?>
			  </select>
             <table width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td height="3"></td></tr></table>
<a id="some2" class="botao" href="javascript:organiza();"><span>Organizar</span></a><div id="mata2"></div>              
      </td>
      <td width="179" align="right" valign="bottom"><? if($test_edita==1){ ?><a class="botao" href="javascript:combo('editaquestao.php?add=1',800,154);"><span>Adicionar Nova Questão</span></a><? } ?></td>
    </tr>
</table>
  <br />
<? if ($msgexclu!=""){
?>
  <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td align="center"><font color="#FF0000"><?=$msgexclu?></font></td>
    </tr>
  </table>
  <? } ?>
  <table width="900" border="0" cellpadding="4" cellspacing="2" bordercolor="#999999">
  
<?

$sq="select que.codpci,que.codigo,que.questao,que.correta,count(alt.codigo) as tot from testes_questoes as que left join testes_alternativas as alt on que.codigo=alt.codquestao where que.subcate='$codsub' $strbusca group by que.codigo $minhaordem limit $inicia,50 ";
//$_SESSION["curriculos"]=$sqwhere;
$re4=mysql_query($sq) or die(mysql_error());

while($li4=mysql_fetch_array($re4)){

$codquestao=$li4["codigo"];
$tot=$li4["tot"];
$nome=$li4["questao"];
$codpci=$li4["codpci"];
//$nome=str_replace("\"","&#8221;",$nome);
$correta=$li4["correta"];

if ($correta=="z" || $correta==""){$correta="<font color='#FF0000'><b>N/A</b></font>";}

if ($codigo==$adicionado2){
$cor2="#ffff00";	
}
else{
$cor2="#C1D8FD";	
}

$nomeex=strip_tags($nome);
$nomeex=str_replace("\"","",$nomeex);

if ($tot==0){
$crope="javascript:alert('Para selecionar a alternativa correta, adicione pelo menos uma alternativa');";	
}
else{
$crope="javascript:combo('editacorreta.php?codquestao=$codquestao',800,154);";	
}

?>
<tr bgcolor="#FEFDE9">
  <td colspan="2" align="left" style="cursor:pointer; cursor:hand;padding-bottom:0px;" <? if($test_edita==1){ ?> onClick="javascript:combo('editaquestao.php?codquestao=<?=$codquestao?>',800,154);"<? } ?> valign="bottom"><font color="#999999">Código da Questão: <?=$codquestao?></font></td>
  <td width="15">&nbsp;</td>
</tr>
<tr bgcolor="#C1D8FD">
<td title="Clique aqui para editar esta questão" width="732" align="left" id="conte2<?=$codquestao?>" style="cursor:pointer; cursor:hand" <? if($test_edita==1){ ?> onClick="javascript:combo('editaquestao.php?codquestao=<?=$codquestao?>',800,154);"<? } ?>><?=$nome?></td>
<td id="corre<?=$codquestao?>" width="121" title="Clique aqui para setar a alternativa correta" align="left" style="cursor:pointer; cursor:hand" <? if($test_edita==1){ ?> onClick="<?=$crope?>" <? } ?>>Correta: <b><?=$correta?></b></td>
<td class="gra3"><? if($test_exclu==1){ ?><a href="javascript:exc_cate(<?=$codquestao?>);"><img src="images/lixo.gif" title="EXCLUIR QUESTÃO" width="15" height="15" border="0"></a><? } ?></td>
</tr>
<? 

$sq="select codigo,nome,letra from testes_alternativas where codquestao='$codquestao' order by letra";
//$_SESSION["curriculos"]=$sqwhere;
$re=mysql_query($sq) or die(mysql_error());

while($li=mysql_fetch_array($re)){

$codigo=$li["codigo"];
$nome=$li["nome"];
$letra=$li["letra"];

if ($letra==$correta){
$cor="#B6FBA2";	
}
else{
$cor="#EFEFEF";	
}

if ($codigo==$alternado){
$cor="#ffff00";	
}

?>
<tr bgcolor="<?=$cor?>" id="maxi<?=$codigo?>">
<td colspan="2" align="left" id="conte3<?=$codigo?>"  style="cursor:pointer; cursor:hand" <? if($test_edita==1){ ?> onClick="javascript:combo('editaalternativa.php?codalter=<?=$codigo?>',800,54);" <? } ?>>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="3%"><b><?=$letra?>)</b></td>
    <td width="99%"><?=$nome?></td>
  </tr>
</table>
</td>
<td align="center" class="style17"><? if($test_exclu==1){ ?><a href="javascript:exc(<?=$codigo?>,'<?=$letra?>',<?=$codquestao?>);"><img src="images/lixo.gif" title="EXCLUIR ALTERNATIVA" width="15" height="15" border="0"></a><? } ?></td>
</tr>
<?
}
?>
<tr bgcolor="#FDEDCE">
  <td colspan="2" align="left" id="conte5<?=$codquestao?>" ><? if($test_edita==1){ ?><a href="javascript:combo('editaalternativa.php?add=1&codquestao=<?=$codquestao?>&inicia=<?=$inicia?>&finaliza=<?=$finaliza?>',800,54);"><img src="images/adicionar.png" width="14" height="14" title="Adicionar uma nova alternativa" border="0" /></a><? } ?></td>
  <td align="center" class="style17">&nbsp;</td>
</tr>
<?
}
?>
<tr bgcolor="#FFFFFF" >
<td id="carapacadeaco" colspan="2" align="left" >&nbsp;</td>
<td align="center" class="style17">&nbsp;</td>
</tr>
</table>  
<br>
<br />
<?
if ($ocorre==1){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td width="38%"></td>
<td width="62%" align="center"><a class="botao" href="questoes.php?resetar=1"><span>Resetar os critérios de busca</span></a></td>
</tr>
</table>
<? } ?>
<br />
<br />
<br />
<br />
</td>    
</tr>
<tr>
<td>
<? include 'baixo.php'; ?>
</td>
</tr>
</table>
<?
if ($errou!=""){
?>
<script language="javascript" type="text/javascript">
alert("<?=$errou?>");
</script>
<?
}
if ($focus2!=""){
?>
<script language="javascript" type="text/javascript">
document.getElementById("login").focus(); 
</script>
<?
}
?>
<script language="javascript" type="text/javascript">
document.getElementById("carapacadeaco").innerHTML=document.getElementById("origemdetudo").innerHTML;
</script>
</form>
</body>


</html>

