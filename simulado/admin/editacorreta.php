<?
session_start();
if (isset($_SESSION["usuario"])==0)
{
header("location:index.php");
exit;
}

include 'abre.php';

$errado="";
$focus="nome";

$codarea=$_GET["codquestao"];
$add=$_GET["add"];
$grava=$_GET["grava"];

$alter_select=$_POST["alter_select"];

$nome=$_POST["nome"];

$nome4=$nome;
//$nome= htmlspecialchars($nome, ENT_QUOTES);

if ($add==1){$situacao="Adicionando nova Questão";}else{$situacao="Editando a alternativa Correta";}

if (isset($grava)!=1 && isset($add)!=1){
$vert="select questao from testes_questoes where codigo='$codarea'";
$resulta=mysql_query($vert) or die(mysql_error()); 
$sa=mysql_fetch_array($resulta);

$nome=$sa["questao"];
}

if (isset($grava)==1){

if ($errado==""){

$nome=str_replace(chr(10),"",$nome);
$nome=str_replace(chr(13),"",$nome);
$nome=str_replace("'","&#8216;",$nome);

$pi=substr($nome,0,3);
if ($pi=="<p>"){
$nome=substr($nome,3,strlen($nome)-3);
}

$pi=substr($nome,strlen($nome)-4,4);
if ($pi=="</p>"){
$nome=substr($nome,0,strlen($nome)-4);
}

$nome=str_replace("<p>","",$nome);
$nome=str_replace("</p>","<br><br>",$nome);
$nome=str_replace("<P>","",$nome);
$nome=str_replace("</P>","<br><br>",$nome);


if ($add==1){
}
else{
$vert23="update testes_questoes set correta='$alter_select' where codigo='$codarea'";
}

$resulta=mysql_query($vert23) or die(mysql_error()); 
if ($add==1){
$ultimo=mysql_insert_id();
$_SESSION["sqlb"]="and que.codigo='$ultimo'";
$_SESSION["sqlb_palavra"]="$ultimo";
$_SESSION["sqlb_tipo"]="CÓDIGO";
}

if ($codarea==""){$codarea=mysql_insert_id();}

$editaok="Dados atualizados com êxito";
unset($focus);
}
}

$nome=htmlspecialchars($nome);

$focus="nome";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<title>Simulados de Concursos - Edita Alternativa Correta</title>
</head>
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
<LINK href="geral.css" type=text/css rel=StyleSheet>
<script language="JavaScript">


function nulos(FormName,TextName,Msg1) {
   var Temp1 = document.forms[FormName].elements[TextName].value;
   var Temp2 = document.forms[FormName].elements[TextName];

 Temp1=Temp1.replace(/^\s+/g, '').replace(/\s+$/g, '');  // Tira os Espaos

   if (Temp1.length == 0) {
      window.alert(Msg1);
          Temp2.focus();
      return (false);
   } 
   else {
      return (true);
   }
}



function valida()
{

}




</script>
<body>
<table align="center" width="619" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="619" valign="top">
<? if ($editaok==""){ ?>
       <form id="form2" name="form2" method="post" action="?grava=1&codquestao=<?=$codarea?>&add=<?=$add?>" onSubmit="return valida(this);">
   <table width="712" border="0" cellspacing="6" cellpadding="0" align="center">
              <tr>
                <td colspan="2" bgcolor="#F0F4FF" class="el2" style="padding-bottom:3px;"><img src="images/fagulha.gif" width="35" height="18" /> <?=$situacao?></td>
              </tr>
              <tr>
                <td colspan="2" align="left" bgcolor="#F3F3F3" class="fonte2">
<table width="100%" border="0" cellpadding="4" cellspacing="2" bordercolor="#999999">
  
<?

$sq="select que.codigo,que.questao,que.correta from testes_questoes as que left join testes_alternativas as alt on que.codigo=alt.codquestao where que.codigo='$codarea' group by que.codigo ";
//$_SESSION["curriculos"]=$sqwhere;
$re4=mysql_query($sq) or die(mysql_error());

while($li4=mysql_fetch_array($re4)){

$codquestao=$li4["codigo"];
$nome=$li4["questao"];
//$nome=str_replace("\"","&#8221;",$nome);
$correta=$li4["correta"];


if ($codigo==$adicionado2){
$cor2="#ffff00";	
}
else{
$cor2="#C1D8FD";	
}

$nomeex=strip_tags($nome);
$nomeex=str_replace("\"","",$nomeex);

?>
<tr bgcolor="#FEFDE9">
  <td align="left" valign="bottom"><font color="#999999">Código da Questão: <?=$codquestao?></font></td>
  </tr>
<tr bgcolor="#C1D8FD">
<td align="left" id="conte2<?=$codquestao?>"><?=$nome?></td>
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
<td align="left" id="conte3<?=$codigo?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="3%" class="gra3"><b><?=$letra?>)</b> </td>
      <td width="95%" class="gra3"><?=$nome?></td>
      </tr>
  </table>
</td>
</tr>
<?
}
?>

<?
}
?>

</table>                
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center" class="el2"><br />Selecione a alternativa correta<br />
                <br />
<select name="alter_select" id="alter_select">
<?
$sq="select codigo,letra from testes_alternativas where codquestao='$codquestao' order by letra";
$resultad=mysql_query($sq) or die(mysql_error()); 
while ($li22=mysql_fetch_array($resultad))
{
$cod=$li22["codigo"];
$are=$li22["letra"];

if ($are==$correta){$sele="selected";}else{$sele="";}

?>
<option value="<?=$are?>" <?=$sele?>><? echo $are; ?>&nbsp;&nbsp;</option>
<?
}
?>
</select>
<br />
<br /></td>
              </tr>
              <tr>
              <td width="145" align="center"><a href="javascript:window.close();"><img src="images/cancelar.jpg" width="121" height="33" border="0" /></a></td>
              <td width="404" align="left"><input type="image" name="imageField" id="imageField" src="images/gravar.jpg" /></td>
              </tr>
            </table>
            
</form>
<? } ?>
</td>
  </tr>
</table>
<?
if ($editaok!=""){

$lete=0;

$pi=substr($nome4,0,3);
if ($pi=="<p>"){
$nome4=substr($nome4,3,strlen($nome4)-3);
}

$pi=substr($nome4,strlen($nome4)-4,4);
if ($pi=="</p>"){
$nome4=substr($nome4,0,strlen($nome4)-4);
}

$chupa="";
$chupa.=$nome4;

$chupa=str_replace(chr(13),"",$chupa);
$chupa=str_replace(chr(10),"",$chupa);
$chupa=str_replace("\"","\\\"",$chupa);
//$chupa=json_encode($chupa);


//$chupa=htmlspecialchars($chupa, ENT_QUOTES);
?>
<script language="javascript" type="text/javascript">
codigo="<?=$codarea?>";
<?
if ($add!=1){
?>
if (window.opener != null && !window.opener.closed){
aa=window.opener.document.getElementById("corre"+codigo);
if (aa!=null){
window.opener.document.getElementById("corre"+codigo).bgColor="#ffff00";
window.opener.document.getElementById("corre"+codigo).innerHTML="<img src='img/aguarde.gif'> Gravando... Aguarde...";
window.opener.document.location="questoes.php?pulando=<?=$codarea?>&alternado=1";
}
}
window.close();
<?
}
?>
</script>
<?
}
?>

<?
if ($errado!=""){
?>
<script language="javascript" type="text/javascript">
alert("<?=$errado?>");
</script>
<?
}
?>

</body>
</html>