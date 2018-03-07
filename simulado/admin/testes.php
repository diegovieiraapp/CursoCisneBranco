<? 
session_start(); 

$acao='<a href="sele.php" class="outside3" >Retornar</a>';
$local="- Administra&ccedil;&atilde;o de Testes";

$resetar=$_GET["resetar"];

if (isset($_SESSION["usuario"])==0)
{
?>
<script language="javascript">
document.location="index.php";
</script>
<?
exit;
}

include 'abre.php';

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

$focus2="busca";
$buscapor=0;
$erro="";
$resetar=$_GET["resetar"];
$pesquisa=$_GET["pesquisa"];
$localizarpor=$_POST["localizarpor"];
$busca=$_POST["busca"];
$grava3=$_POST["grava3"];
$grava2=$_POST["grava2"];
$salva=$_POST["salva"];
$exc=$_GET["exc"];
$exc_cate=$_GET["exc_cate"];
$grava=$_GET["grava"];
$adiciona=$_POST["adiciona"];
$adicionasub=$_POST["adicionasub"];
$nomecate=trim($_POST["nomecate"]);
$nomesub=trim($_POST["nomesub"]);
$categoria_select=$_POST["categoria_select"];

if ($resetar==1 || $pesquisa==1){
unset($_SESSION["sqlb"]);
unset($_SESSION["sqlb_palavra"]);
unset($_SESSION["sqlb_tipo"]);
unset($_SESSION["superbuscapor"]);	
unset($_SESSION["superbuscacriterio"]);
}

if(isset($_SESSION["superbuscapor"])!=0){
$pesquisa=1;
$busca=$_SESSION["superbuscacriterio"];
$localizarpor=$_SESSION["superbuscapor"];
}

if ($pesquisa==1){
if ($localizarpor==0){$sq7="select count(*) as total from testes_questoes as que where que.questao like '%$busca%'";}
if ($localizarpor==1){$sq7="select que.codigo from testes_questoes as que right join testes_alternativas as alt on que.codigo=alt.codquestao where alt.nome like '%$busca%' group by que.codigo";}
if ($localizarpor==2){$sq7="select count(*) as total from testes_questoes as que where que.codigo='$busca'";}
$re7=mysql_query($sq7) or die(mysql_error());
$fi=mysql_fetch_array($re7);

if ($localizarpor==1){
$nume=mysql_num_rows($re7);
}
else{
$nume=$fi["total"];
}

if ($localizarpor==0){
if ($nume>0){
$supersql="and que.questao like '%$busca%'";
$buscapor=1;  // quando 1 buscará por nome da questão
$tipo_busca="QUESTÃO";
}
}

if ($localizarpor==1){
if ($nume>0){
$supersql="and alt.nome like '%$busca%'";
$buscapor=2;  // quando 1 buscará pela alternativa
$tipo_busca="ALTERNATIVA";
}
}

if ($localizarpor==2){
if ($nume>0){
$supersql="and que.codigo='$busca'";
$buscapor=3;  // quando 1 buscará pelo código da questão
$tipo_busca="CÓD. QUESTÃO";
}
}


//Resultado da busca por <font color="#FF0000"><?=$tipo_busca</font>, retornou <font color="#FF0000"><b><?=$nume</b></font> questões utilizando o critério: <font color="#FF0000"><b><?=$busca</b></font> pesquisado em um total de <font color="#FF0000"><b>$numemaster</b></font> questões. -> <a href="questoes.php?resetar=1">Clique Aqui para cancelar os crit&eacute;rios de busca</a></td>
if ($nume>0){
$_SESSION["superbuscapor"]=$localizarpor;
$_SESSION["superbuscacriterio"]=$busca;

$sq7="select count(*) as total from testes_questoes";
$re7=mysql_query($sq7) or die(mysql_error());
$fi=mysql_fetch_array($re7);
$numemaster=$fi["total"];
}

if ($nume==0){$erro="NENHUMA OCORRÊNCIA ENCONTRADA, UTILIZANDO O CRITÉRIO: <B>$busca</B>";}


}


if ($grava==1){

if ($adicionasub==1){

$sq="select codigo,nome from testes_categorias where nome='$nomesub'";
$re=mysql_query($sq) or die(mysql_error());
$contou=mysql_num_rows($re);

if ($contou==1){
$erro="Não foi possível adicionar!!!, essa Sub-Categoria ja existe no banco de dados";	
}

if ($erro==""){
$sq="insert into testes_subcategorias (nome,codcate) values('$nomesub','$categoria_select')";
$re=mysql_query($sq) or die(mysql_error());
$adicionado=mysql_insert_id();
$nomesub="";
}



} // Fecha Adiciona Sub-Categoria = 1 


if ($adiciona==1){

$nomecate=$nomecate;

$sq="select codigo,nome from testes_categorias where nome='$nomecate'";
$re=mysql_query($sq) or die(mysql_error());
$contou=mysql_num_rows($re);

if ($contou==1){
$erro="Não foi possível adicionar!!!, essa categoria ja existe no banco de dados";	
}

if ($erro==""){
$sq="insert into testes_categorias (nome) values('$nomecate')";
$re=mysql_query($sq) or die(mysql_error());
$adicionado=mysql_insert_id();
$nomecate="";
}
	
} // Fecha Adiciona = 1 


if ($grava2>0){

$sql22="update testes_subcategorias set nome='$salva' where codigo='$grava2'";
$resu32=mysql_query($sql22) or die(mysql_error());
$adicionado=$grava2;

//$ctu2=mysql_fetch_array($resu32);

}

if ($grava3>0){

$sql22="update testes_categorias set nome='$salva' where codigo='$grava3'";
$resu32=mysql_query($sql22) or die(mysql_error());
$adicionado2=$grava3;

//$ctu2=mysql_fetch_array($resu32);

}
	
}  // fecha gravar


if (isset($exc)!=0){

$exclua=1;
$msgerro="";

$sql22="select nome from testes_subcategorias where codigo='$exc'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu2=mysql_fetch_array($resu32);

$nomecate2=$ctu2["nome"];

$sql22="select codigo from testes_questoes where subcate='$exc'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu=mysql_num_rows($resu32);
if ($ctu!=0){$msgerro.="<b>Questões</b> <br>";$exclua=0;}

if ($exclua==1){
$sql22="delete from testes_subcategorias where codigo='$exc'";
$resultado32=mysql_query($sql22) or die(mysql_error());
}
else{
$erro="Não é possível excluir a Sub-Categoria: <b>$nomecate2</b>, existem entradas nos seguintes módulos: <br>".$msgerro."Exclua primeiramente os registros nesses módulos";	
$adicionado=$exc;
}
	
	
}


if (isset($exc_cate)!=0){

$exclua=1;
$msgerro="";

$sql22="select nome from testes_categorias where codigo='$exc_cate'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu2=mysql_fetch_array($resu32);

$nomecate2=$ctu2["nome"];

$sql22="select codigo from testes_subcategorias where codcate='$exc_cate'";
$resu32=mysql_query($sql22) or die(mysql_error());
$ctu=mysql_num_rows($resu32);
if ($ctu!=0){$msgerro.="<b>Sob-Categorias</b> <br>";$exclua=0;}

if ($exclua==1){
$sql22="delete from testes_categorias where codigo='$exc_cate'";
$resultado32=mysql_query($sql22) or die(mysql_error());
}
else{
$erro="Não é possível excluir a Categoria: <b>$nomecate2</b>, existem entradas nos seguintes módulos: <br>".$msgerro."Exclua primeiramente os registros nesses módulos";	
$adicionado2=$exc_cate;
}
	
	
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

function nulos(FormName,TextName,Msg1) {
   var Temp1 = document.forms[FormName].elements[TextName].value;
   var Temp2 = document.forms[FormName].elements[TextName];

 Temp1=Temp1.replace(/^\s+/g, '').replace(/\s+$/g, '');  // Tira os Espaços

   if (Temp1.length == 0) {
      window.alert(Msg1);
          Temp2.focus();
      return (false);
   } 
   else {
      return (true);
   }
}

function valida(lixo)
{
var vai=1;

if (!nulos('teste1','nomecate','O CAMPO NOME DEVE SER PREENCHIDO')){vai=0;}

if (vai==1){
document.getElementById("adiciona").value="1";	
document.teste1.submit()
};

if (lixo!=3){
if (vai==0){return false;}
}

}


function valida2(lixo)
{
var vai=1;

nadia=document.getElementById("categoria_select").options[document.getElementById("categoria_select").selectedIndex].value;

if (nadia=="0"){
alert("Para adicionar uma sub-categoria, selecione primeiramente uma categoria");
document.getElementById("categoria_select").focus();
vai=0;
}

if (vai==1){
if (!nulos('teste1','nomesub','O CAMPO NOME DA SUBCATEGORIA DEVE SER PREENCHIDO')){vai=0;}
}

if (vai==1){
document.getElementById("adicionasub").value="1";	
document.teste1.submit()
};

if (lixo!=3){
if (vai==0){return false;}
}

}

var textosalva="";
var corantiga="";
var salvando=0;

function corsim(ident){
corantiga=document.getElementById(ident).bgColor;
atual=document.getElementById(ident).bgColor;
if (atual!="#ffff00"){
document.getElementById(ident).bgColor="#DFF2FD";
}
}


function cornao(ident){
document.getElementById(ident).bgColor=corantiga;
}

function exc(codigo,nome)
{
	if (codigo)
	{
		if(confirm("Tem certeza que deseja excluir a Sub-Categoria?\n"+ nome))
		{
        window.location.href="?exc="+ codigo;
		}
	}
}

function exc_cate(codigo,nome)
{
	if (codigo)
	{
		if(confirm("Tem certeza que deseja excluir a Categoria?\n"+ nome))
		{
        window.location.href="?exc_cate="+ codigo;
		}
	}
}

var onclica="";

function altera(omega){
if (salvando==0){
texto=document.getElementById("fconte"+omega).innerHTML;	
onclica=document.getElementById("fconte"+omega).onclick;	
document.getElementById("fconte"+omega).onclick="";
//alert(onclica);
textosalva=texto;
document.getElementById("fconte"+omega).innerHTML="<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='210px;'><input type='text' name='salva' id='salva' class='flate22' value='"+texto+"'  /></td><td><a class='botao' href='javascript:grava_altera("+omega+");'><span>Salvar</span></a><a class='botao' href='javascript:cancela_altera("+omega+");'><span>Cancelar</span></a></td></tr></table>";
document.getElementById("salva").focus();
}
else{
alert("Primeiramente clique em Salvar ou Cancelar");
}

//alert(texto);

salvando=1;	
}

function altera_cate(omega){
if (salvando==0){
texto=document.getElementById("conte2"+omega).innerHTML;	
texto=texto.replace(/<[^>]*>/g, "");;
textosalva=texto;
document.getElementById("conte2"+omega).innerHTML="<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td width='210px;'><input type='text' name='salva' id='salva' class='flate22' value='"+texto+"'  /></td><td><a class='botao' href='javascript:grava_altera_cate("+omega+");'><span>Salvar</span></a><a class='botao' href='javascript:cancela_altera_cate("+omega+");'><span>Cancelar</span></a></td></tr></table>";
document.getElementById("salva").focus();
}
else{
alert("Primeiramente clique em Salvar ou Cancelar");
}

//alert(texto);

salvando=1;	
}

function cancela_altera(omega){
document.getElementById("fconte"+omega).onclick=onclica;
document.location="testes.php";
}



function cancela_altera_cate(omega){
document.getElementById("conte2"+omega).onclick=onclica;
document.location="testes.php";
}


function grava_altera(omega){
document.getElementById("adiciona").value="";
document.getElementById("grava2").value=omega;

var vai=1;

if (!nulos('teste1','salva','O CAMPO DEVE SER PREENCHIDO')){vai=0;}

if (vai==1){
document.getElementById("fconte"+omega).onclick=onclica;
document.teste1.submit();
}

}

function grava_altera_cate(omega){
document.getElementById("adiciona").value="";
document.getElementById("grava2").value="";
document.getElementById("grava3").value=omega;

var vai=1;

if (!nulos('teste1','salva','O CAMPO DEVE SER PREENCHIDO')){vai=0;}

if (vai==1){
document.teste1.submit();
}
}


function executa(){

opcao=document.getElementById("localizarpor").options[document.getElementById("localizarpor").selectedIndex].value;
foi=0;
	
texto=document.getElementById("busca").value;
texto=texto.replace(/^\s+/g, '').replace(/\s+$/g, '');
conta = texto.length;

if (conta<=2 && opcao!=2){
document.getElementById("busca").focus();
window.alert("Minimo para busca 3 Dígitos");
foi=1;
}
else{
document.getElementById("some").style.display="none";
document.getElementById("mata").innerHTML="<img src='img/aguarde.gif'>&nbsp;Executando Pesquisa... Aguarde."
document.getElementById("teste1").action="testes.php?pesquisa=1";
document.teste1.submit();
foi=1;
}

if (opcao!=2 && foi==0){
document.getElementById("some").style.display="none";
document.getElementById("mata").innerHTML="<img src='img/aguarde.gif'>&nbsp;Executando Pesquisa... Aguarde."
document.getElementById("teste1").action="testes.php?pesquisa=1";
document.teste1.submit();
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
<form id="teste1" name="teste1" method="post" action="testes.php?grava=1" onSubmit="return valida(this);">
<input type="hidden" name="adicionasub" id="adicionasub" />
<input type="hidden" name="adiciona" id="adiciona" />
<input type="hidden" name="grava2" id="grava2" />
<input type="hidden" name="grava3" id="grava3" />
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="8"></td></tr></table>
<? include "topo.php"; ?>
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="4"></td></tr></table>
<table align="center" width="999" border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="top">
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="5"></td></tr></table>
<table width="100%" height="31" border="0" cellpadding="0" cellspacing="2">
  <tr>
    <td width="12%" height="27" align="right" bgcolor="#F5F5F5"><b>Busca Geral:</b>&nbsp;</td>
    <td width="17%" align="right" bgcolor="#ECEFFF" style="padding-left:5px">Por:&nbsp;</td>
    <td width="35%" align="right" bgcolor="#ECEFFF" style="padding-right:18px;">
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
</select>&nbsp;&nbsp;<input type="text" name="busca" id="busca" class="flate22" value="<?=$busca?>" />
    </td>
    <td width="27%" align="left" bgcolor="#ECEFFF" style="padding-left:5px"><a id="some" class="botao" href="javascript:executa();"><span>Localizar</span></a><div id="mata"></div></td>
    <td width="9%" bgcolor="#ECEFFF" align="center"><?=$acao?></td>
    </tr>
</table>
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="10"></td></tr></table>
<?
if ($buscapor>0){
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="center">Resultado da busca por <font color="#FF0000"><?=$tipo_busca?></font>, retornou <font color="#FF0000"><b><?=$nume?></b></font> questões utilizando o critério: <font color="#FF0000"><b><?=$busca?></b></font> pesquisado em um total de <font color="#FF0000"><b><?=$numemaster?></b></font> questões.<br /><br /><a href="testes.php?resetar=1"><b>Clique Aqui para cancelar os crit&eacute;rios de busca</b></a><br /><br /></td>
</tr>
</table>
<?
}

if ($erro!=""){
?>
  <table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td align="center"><font color="#FF0000"><?=$erro?></font></td>
      </tr>
  </table>
  <br />
<?
}
?>  
  <table width="730" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="276" align="right">Nome:</td>
      <td width="232" style="padding-left:8px;"><label for="textfield"></label>
        <input type="text" name="nomecate" id="nomecate" class="flate22" value="<?=$nomecate?>"  /></td>
      <td width="222"><? if ($test_edita==1){ ?>  <a class="botao" href="javascript:valida(3);"><span>Adicionar Nova Categoria</span></a><? } ?></td>
    </tr>
</table>
  <br />
  <table width="730" border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td width="209" align="right">
<select name="categoria_select" id="categoria_select">
<option value="0">Selecione Uma Categoria</option>
<?

$sq="select codigo,nome from testes_categorias order by nome";
$resultad=mysql_query($sq) or die(mysql_error()); 
while ($li22=mysql_fetch_array($resultad))
{
$cod=$li22["codigo"];
$are=$li22["nome"];

if ($cod==$categoria_select){$sele="selected";}else{$sele="";}

?>
<option value="<? echo $cod; ?>" <?=$sele?>><? echo $are; ?>&nbsp;&nbsp;</option>
<?
}
?>
			  </select>
      </td>
      <td width="64" align="right">Nome:</td>
      <td width="231" style="padding-left:8px;"><label for="textfield2"></label>
        <input type="text" name="nomesub" id="nomesub" class="flate22" value="<?=$nomesub?>"  /></td>
      <td width="224"><? if($test_edita==1){ ?><a class="botao" href="javascript:valida2(3);"><span>Adicionar Nova Sub-Categoria</span></a><? } ?></td>
    </tr>
  </table>
<br />
<br />
<? if ($buscapor>0){ ?>
<table width="529" border="0" cellspacing="0" cellpadding="0" align="center">
<tr>
<td align="center"><font color="#0000ff">Os resultados abaixo são baseados nos atuais critérios de busca</font></td>
</tr>
</table> 
<br /><Br />
<? } ?>
<table width="529" border="0" align="center" cellpadding="4" cellspacing="2" bordercolor="#999999">
<?
//$busca_aqui="and que.questao like '%evamariasefue%'";
//$busca_aqui2=str_replace("and","",$busca_aqui);
$tudo=0;

if ($buscapor==3){ // Utilizando o critério código da questão
$sq="select cate.codigo,cate.nome from testes_categorias as cate left join testes_questoes as que on que.codcate=cate.codigo where que.codcate=cate.codigo $supersql group by cate.codigo order by cate.nome";
}

if ($buscapor==2){ // Utilizando o critério nome da alternativa
$sq="select cate.codigo,cate.nome from testes_categorias as cate left join testes_alternativas as alt on alt.codcate=cate.codigo where alt.codcate=cate.codigo $supersql group by cate.codigo order by cate.nome";
}

if ($buscapor==1){ // Utilizando o critério nome da questão
$sq="select cate.codigo,cate.nome from testes_categorias as cate left join testes_questoes as que on que.codcate=cate.codigo where que.codcate=cate.codigo $supersql group by cate.codigo order by cate.nome";
}

if ($buscapor==0){ // Sem nenhum critério de busca
$sq="select codigo,nome from testes_categorias order by nome";
}

//$_SESSION["curriculos"]=$sqwhere;
$re4=mysql_query($sq) or die(mysql_error());

while($li4=mysql_fetch_array($re4)){

$codigo=$li4["codigo"];
$nome=$li4["nome"];

if ($buscapor==3){ // Utilizando o critério código da questão
$sq7="select count(*) as total from testes_questoes as que where que.codcate='$codigo' $supersql";
}

if ($buscapor==2){ // Utilizando o critério nome da alternativa
$sq7="select que.codigo from testes_questoes as que left join testes_alternativas as alt on que.codigo=alt.codquestao where que.codcate='$codigo' $supersql group by que.codigo";
}

if ($buscapor==1){ // Utilizando o critério nome da questão
$sq7="select count(*) as total from testes_questoes as que where que.codcate='$codigo' $supersql";
}

if ($buscapor==0){ // Sem nenhum critério de busca
$sq7="select count(*) as total from testes_questoes where codcate='$codigo'";
}

$re8=mysql_query($sq7) or die(mysql_error());
$re7=mysql_fetch_array($re8);

if ($buscapor==2){
$total5=mysql_num_rows($re8);	
}
else{
$total5=$re7["total"];
}

if ($codigo==$adicionado2){
$cor2="#ffff00";	
}
else{
$cor2="#C1D8FD";	
}

?>
  <tr bgcolor="<?=$cor2?>">
  	<td width="75%" id="conte2<?=$codigo?>"><b><?=$nome?></b></td>
  	<td width="15%"><b><?=$total5?></b></td>
  	<td width="5%" ><? if($test_edita==1){ ?><a href="javascript:altera_cate(<?=$codigo?>);"><img src="images/note.png" width="16" height="16" border="0" title="ALTERAR CATEGORIA" /></a><? } ?></td>
    <td width="5%" class="gra3"><? if($test_exclu==1){ ?><a href="javascript:exc_cate(<?=$codigo?>,'<?=$nome?>');"><img src="images/lixo.gif" title="EXCLUIR CATEGORIA" width="15" height="15" border="0"></a><? } ?></td>
  </tr>
<? 

if ($buscapor==3){ // Utilizando o critério código da questão
$sq="select sub.codigo,sub.nome from testes_subcategorias as sub left join testes_questoes as que on que.subcate=sub.codigo where sub.codcate='$codigo' and que.subcate=sub.codigo $supersql group by sub.codigo order by sub.nome";
}

if ($buscapor==2){ // Utilizando o critério nome da alternativa
$sq="select sub.codigo,sub.nome from testes_subcategorias as sub left join testes_alternativas as alt on alt.subcate=sub.codigo where sub.codcate='$codigo' and alt.subcate=sub.codigo $supersql group by sub.codigo order by sub.nome";
}

if ($buscapor==1){ // Utilizando o critério nome da questão
$sq="select sub.codigo,sub.nome from testes_subcategorias as sub left join testes_questoes as que on que.subcate=sub.codigo where sub.codcate='$codigo' and que.subcate=sub.codigo $supersql group by sub.codigo order by sub.nome";
}

if ($buscapor==0){ // Sem nenhum critério de busca
$sq="select codigo,nome from testes_subcategorias where codcate='$codigo' order by nome";
}
//$_SESSION["curriculos"]=$sqwhere;
$re=mysql_query($sq) or die(mysql_error());

while($li=mysql_fetch_array($re)){

$codigo3=$li["codigo"];
$nome=$li["nome"];

if ($buscapor==3){ // Utilizando o critério codigo da questão
$sq6="select count(*) as total from testes_questoes as que where que.subcate='$codigo3' $supersql";
}

if ($buscapor==2){ // Utilizando o critério nome da alternativa
$sq6="select que.codigo from testes_questoes as que right join testes_alternativas as alt on que.codigo=alt.codquestao where que.subcate='$codigo3' $supersql group by que.codigo";
}

if ($buscapor==1){ // Utilizando o critério nome da questão
$sq6="select count(*) as total from testes_questoes as que where que.subcate='$codigo3' $supersql";
}

if ($buscapor==0){ // Sem nenhum critério de busca
$sq6="select count(*) as total from testes_questoes where subcate='$codigo3'";
}

$re62=mysql_query($sq6) or die(mysql_error());
$re6=mysql_fetch_array($re62);

if ($buscapor==2){
$total3=mysql_num_rows($re62);
}
else{
$total3=$re6["total"];
}

$tudo+=$total3;

if ($codigo3==$adicionado){
$cor="#ffff00";	
}
else{
$cor="#EFEFEF";	
}

?>
<tr bgcolor="<?=$cor?>" id="maxi<?=$codigo3?>" onMouseOver="javascript:corsim('maxi<?=$codigo3?>');" onMouseOut="javascript:cornao('maxi<?=$codigo3?>');">
<td id="fconte<?=$codigo3?>" style="cursor:pointer; cursor:hand" onClick="javascript:window.location.href='questoes.php?codsub=<?=$codigo3?>'"><?=$nome?></td>
<td><font color="#666666"><?=$total3?></font></td>
<td><? if($test_edita==1){ ?><a href="javascript:altera(<?=$codigo3?>);"><img src="images/note.png" width="16" height="16" border="0" title="ALTERAR SUB-CATEGORIA" /></a><? } ?></td>
<td align="center" class="style17"><? if($test_exclu==1){ ?><a href="javascript:exc(<?=$codigo3?>,'<?=$nome?>');"><img src="images/lixo.gif" title="EXCLUIR SUB-CATEGORIA" width="15" height="15" border="0"></a><? } ?></td>
</tr>
<?
}
}
?>
<tr >
  <td >&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center" class="style17">&nbsp;</td>
</tr>
<?
if ($buscapor>0){
$tudo=$numemaster;
}

$tudo=number_format($tudo, 0, ',', '.');
?>
<tr>
  <td><font color="#666666">Total de Quest&otilde;es na base de dados:</font>&nbsp;<?=$tudo?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td align="center" class="style17">&nbsp;</td>
</tr>
</table>
  <br>
  <br />

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
document.getElementById("<?=$focus2?>").focus(); 
</script>
<?
}
?>
</form>
</body>


</html>

