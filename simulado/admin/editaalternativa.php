<?
session_start();
if (isset($_SESSION["usuario"])==0)
{
header("location:index.php");
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
echo "Voc� n�o tem permiss�o para acessar esse m�dulo";
exit;
}

if ($test_edita==0){
echo "Voc� n�o tem permiss�o para edi��o";
exit;
}


$errado="";
$focus="nome";
$add=$_GET["add"];
$inicia=$_GET["inicia"];
$finaliza=$_GET["finaliza"];

if ($add==1){
$codquestao=$_GET["codquestao"];	
	
}

$codarea=$_GET["codalter"];

if ($add!=1){
$vert="select codcate,codquestao,letra from testes_alternativas where codigo='$codarea'";
$resulta=mysql_query($vert) or die(mysql_error()); 
$sa2=mysql_fetch_array($resulta);
$codquestao=$sa2["codquestao"];
$codcate=$sa2["codcate"];
$letra=$sa2["letra"];
}

$vert="select questao,codcate from testes_questoes where codigo='$codquestao'";
$resulta=mysql_query($vert) or die(mysql_error()); 
$sa3=mysql_fetch_array($resulta);

$questao=$sa3["questao"];
$codcate=$sa3["codcate"];


$grava=$_GET["grava"];

$nome=$_POST["nome"];
$nome4=$nome;
//$nome= htmlspecialchars($nome, ENT_QUOTES);

if ($add==1){$situacao="Adicionando nova Alternativa";}else{$situacao="Editando a Alternativa <font color='#FF0000'><b>$letra</b></font> da quest�o de C�digo: <font color='#999999'>$codquestao</font>";}

if (isset($grava)!=1 && isset($add)!=1){
$vert="select nome from testes_alternativas where codigo='$codarea'";
$resulta=mysql_query($vert) or die(mysql_error()); 
$sa=mysql_fetch_array($resulta);
$nome=$sa["nome"];
//echo "catou<br>$nome";
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
$codsub=$_SESSION["codigosub"];
$codcate=$_SESSION["codigocate"];	

$vert="select letra from testes_alternativas where codquestao='$codquestao' order by letra";
$resulta=mysql_query($vert) or die(mysql_error()); 
$todos=mysql_num_rows($resulta);
$achou=0;
$po=1;
$pere="@abcdefghijklmnopqrst";

while($sa5=mysql_fetch_array($resulta)){
$oi=$sa5["letra"];
if(substr($pere,$po,1)!=$oi){
$achou=1;$letra=substr($pere,$po,1);
break;
}
$po++;
}
if ($achou==0){
$todos++;
$letra=substr($pere,$todos,1);
}


$vert23="insert into testes_alternativas (nome,codquestao,codcate,letra,subcate) values ('$nome','$codquestao','$codcate','$letra','$codsub')";
}
else{
//$nome=str_replace("\"","&#8221;",$nome);
$vert23="update testes_alternativas set nome='$nome' where codigo='$codarea'";
}

$resulta=mysql_query($vert23) or die(mysql_error()); 
if ($add==1){
$ultimo=mysql_insert_id();
$_SESSION["sqlb"]="and que.codigo='$codquestao'";
$_SESSION["sqlb_palavra"]="$codquestao";
$_SESSION["sqlb_tipo"]="C�DIGO";
}

if ($codarea==""){$codarea=mysql_insert_id();}

$editaok="Dados atualizados com �xito";
unset($focus);
}
}


//$nome=htmlspecialchars($nome);

//echo "Caipira<br><br> $nome";

$focus="nome";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<title>Simulados de Concursos - Edi��o de Alternativas</title>
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
<LINK href="admin/site_css.css" type=text/css rel=StyleSheet>
<script type="text/javascript" src="js/tiny_mce.js"></script>
<script language="JavaScript">

	tinyMCE.init({
		// General options
force_p_newlines : false,
force_br_newlines : true,
  auto_focus : "nome",
    	mode : "exact",
	elements : "nome",
theme : "advanced", 
theme_advanced_buttons3_add_before : "tablecontrols,separator",
plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template", 
theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});

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

</script>
<body>
<table align="center" width="619" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="619" valign="top">
<? if ($editaok==""){ ?>
       <form id="form2" name="form2" method="post" action="?grava=1&codalter=<?=$codarea?>&add=<?=$add?>&codquestao=<?=$codquestao?>&inicia=<?=$inicia?>&finaliza=<?=$finaliza?>">
   <table width="712" border="0" cellspacing="6" cellpadding="0" align="center">
              <tr>
                <td colspan="2" bgcolor="#F0F4FF" class="titcaixa" style="padding-bottom:3px;"><img src="images/fagulha.gif" width="35" height="18" /> <?=$situacao?></td>
              </tr>
              <tr>
                <td colspan="2" align="left" bgcolor="#F3F3F3"><?=$questao?></td>
              </tr>
              <tr>
                <td colspan="2" align="left" bgcolor="#F3F3F3" class="fonte2"><input name="nome" type="text" class="flate3" id="nome" style="height:400px;" value="<?=$nome?>" size="67" maxlength="200" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center">&nbsp;</td>
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



$chupa="<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td bgcolor='#cccccc' width=\"3%\"><b>$letra)</b> </td><td width=\"99%\">$nome4 <br></td></tr></table>";

$chupa=str_replace(chr(13),"",$chupa);
$chupa=str_replace(chr(10),"",$chupa);
$chupa=str_replace("\"","\\\"",$chupa);
//$chupa=json_encode($chupa);

//$chupa=htmlspecialchars($chupa, ENT_QUOTES);
?>
<script language="javascript" type="text/javascript">
codigo="<?=$codarea?>";

<?
if ($add==1){
?>
peres="<?=$codquestao?>";
window.opener.document.getElementById("conte5"+peres).bgColor="#ffff00";
window.opener.document.getElementById("conte5"+peres).innerHTML="<img src='img/aguarde.gif'> Gravando... Aguarde...";
window.opener.document.location="questoes.php?pulando=<?=$codquestao?>&alternado=<?=$ultimo?>";
window.close();
<?
}
if ($add!=1){
?>
if (window.opener != null && !window.opener.closed){
aa=window.opener.document.getElementById("conte3"+codigo);
if (aa!=null){
window.opener.document.getElementById("conte3"+codigo).innerHTML="<?=$chupa?>";
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