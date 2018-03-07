<?
$novotitulo=utf8_decode("Questões, simulados, testes e exercícios on-line para concursos, separados por matéria - ApostilasOpção");
$keywords_seo="questoes, testes, simulado, simulados, simulados online, simulado on-line, simulado online";
include ("inc/titulo.php");
include ("abreconexao.php");

?>

<script language="javascript" type="text/javascript">

var pegado = new Array(10);
var antigo = new Array(10);
var respostas = new Array(10);
var passa="";

for(t=1;t<=10;t++){
pegado[t]="";
antigo[t]="";	
respostas[t]="";	
}

function executateste(codigo)
{

var varetime3 = new Date();
focustemp=varetime3.getTime();

document.getElementById("piroco"+codigo).innerHTML="<div id='carrega"+codigo+"'></div>";

div="conteudoteste";		
divprogr="carrega"+codigo;


loadXMLDoc("executa-teste-ajax.php?subcategoria="+codigo+"&tempo="+focustemp);


//document.getElementById("carregasempre").style.visibility="visible";
//document.getElementById("carregasempre").style.display="block";

}

function corsim(ident,questao){
if (pegado[questao]!=ident){
document.getElementById(ident).bgColor="#DFF2FD";
}
}

function cornao(ident,questao){
if (pegado[questao]!=ident){
document.getElementById(ident).bgColor="#F4F5F7";
}
else{
document.getElementById(ident).bgColor="#FFFF00";
}
}


function entra(nome,coda,questao){
piroca=antigo[questao];
if (piroca!=""){document.getElementById(piroca).bgColor="#F4F5F7";}
document.getElementById(nome).checked=true;
respostas[questao]=document.getElementById(nome).value;
document.getElementById(coda).bgColor="#FFFF00";
pegado[questao]=coda;
antigo[questao]=coda;
}


function corrigir(codigo){
passa="";

for(t=1;t<=10;t++){
if (respostas[t]!=""){
passa=passa+respostas[t]+"_";
}
else{
co=document.getElementById("que"+t).value;
passa=passa+"q"+t+"z-"+co+"_";	
}
}

var varetime3 = new Date();
focustemp=varetime3.getTime();

document.getElementById("corrigeteste").innerHTML="<div id='carregacorrecao'></div>";

div="conteudoteste";		
divprogr="carregacorrecao";

//alert(codigo);

loadXMLDoc("executa-correcao-teste-ajax.php?chavedeseguranca="+passa+"&subcategoria="+codigo+"&tempo="+focustemp);



//document.getElementById("carregasempre").style.visibility="visible";
//document.getElementById("carregasempre").style.display="block";

}

function geraoutro(){

codigoteste=document.getElementById("outro").options[document.getElementById("outro").selectedIndex].value

var varetime3 = new Date();
focustemp=varetime3.getTime();

document.getElementById("sonabu").innerHTML="<div id='carrega'></div>";

//document.getElementById("conteudoteste").innerHTML="";

div="conteudoteste";		
divprogr="carrega";

loadXMLDoc("executa-teste-ajax.php?subcategoria="+codigoteste+"&tempo="+focustemp);


//document.getElementById("carregasempre").style.visibility="visible";
//document.getElementById("carregasempre").style.display="block";
	
}


</script>
<script language="javascript" src="js/ajaxtestes.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 12px;
	color: #003399;
}
.style2 {font-size: 11px}
.style3 {color: #003366}
.style5 {color: #003366; font-weight: bold; }
.style6 {color: #CCCCCC}
body {
	background-color: #EBF0FE;
}

.alterletra{
FONT-SIZE: 13px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color: #000099;
}

.alter{
FONT-SIZE: 12px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color:#676563;
}

.codques{
FONT-SIZE: 11px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color: #757A86;
}

.questao{
FONT-SIZE: 12px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color:#164276;
line-height:16px;
}


.numeroquestao{
FONT-SIZE: 14px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color:#164276;
line-height:16px;
font-weight:bold;
}

.disciplina{
FONT-SIZE: 14px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color: #757A86;
}

.tituloteste{
FONT-SIZE: 13px;
color:#000000 FONT-FAMILY: Verdana,  Arial, Helvetica;		color: #1A56B0;
font-weight:bold;
}

-->
</style>


<table cellpadding="0" cellspacing="0" align="center" width="999px" bgcolor="#FFFFFF">
<!-- =================================================== -->
<!-- =================================================== -->
<tr><td colspan="7"></td></tr>
<!-- =================================================== -->
<!-- =================================================== -->
<tr>
 <td>&nbsp;</td>
 <td bgcolor="#f5f5f5" align="left" valign="top" style="padding-right:4px;">
 <table><tr><td align="center"></td></tr></table>
 </td>
<!-- SOMBRA============================================= -->
<td bgcolor="#E1E1E1" width="1px"> </td>
<!-- SOMBRA============================================= -->
<td valign="top" style="padding-left:7px;padding-right:7px" width="610px" bgcolor="#ffffff">
<div id="conteudoteste">
          <table width="98%" border="0" cellpadding="3" cellspacing="2" bordercolor="#999999" style="border-bottom:none">
            <tr> 
              <td align="center"> 
             
              </td>
            </tr>
          </table>
          <table width="200" height="5" border="0">
            <tr> 
              <td></td>
            </tr>
          </table>
          <?
$sq7="select count(*) as total from testes_questoes as que ";
$re8=mysql_query($sq7) or die(mysql_error());
$re7=mysql_fetch_array($re8);
$total6=$re7["total"];
$total6=number_format($total6, 0, ',', '.');
		
$teste=strtoupper($busca);

$sql="select codigo,nome from testes_categorias order by nome";
$resultado=mysql_query($sql) or die(mysql_error()); 
$enc=mysql_num_rows($resultado);

if ($enc==1){$regver="REGISTRO ENCONTRADO";}else{$regver="REGISTROS ENCONTRADOS";}



?>
          <table align="center" width="98%" border="0" cellpadding="4" cellspacing="1" bgcolor="#c4d2da" >
            <tr> 
              <td colspan="2" bgcolor="#F5F5F5" style="border-top:none;padding-right:0;padding-left:0;padding-top:7;"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="left" class="tituloteste">&nbsp;&nbsp;Testes / Simulados / Quest&otilde;es / Exerc&iacute;cios</div></td>
    <td><font color="#666666" size="2px">Total de Quest&otilde;es: <b>(<?=$total6?>)</b></font></td>
  </tr>
</table>

                
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="5" colspan="2" align="center" id="L<? echo $codcon; ?>" style="border-top:none;padding-right:0;padding-left:0;"></td>
            </tr>
            <?
while ($li=mysql_fetch_array($resultado))
{
$des=strtoupper($li["nome"]);
$codcate=$li["codigo"];



$sq7="select count(*) as total from testes_questoes as que where que.codcate='$codcate'";
$re8=mysql_query($sq7) or die(mysql_error());
$re7=mysql_fetch_array($re8);
$total5=$re7["total"];
$total5=number_format($total5, 0, ',', '.');

?>
            <tr class="fal2"> 
              <td align="center" width="3%" style="border-top:none;padding-right:0;padding-left:0;" id="L<? echo $codcon; ?>"><strong class="gra5"><img src="setinha.gif" width="9" height="8" id='im<? echo $codcon; ?>'> 
                </strong></td>
              <td id="<? echo $codcon; ?>" style="border-top:none;"><strong class="gra5"><a name='<? echo $codcon; ?>'> 
                <? echo $des; ?>&nbsp;&nbsp;<font color="#666666" size="2px"><b>(<?=$total5?>)</b></font>
                </a></strong></td>
            </tr>
            <?
$sql2="select codigo,upper(nome) as nome from testes_subcategorias where codcate=". $codcate ." order by nome";
$resultado2=mysql_query($sql2) or die(mysql_error()); 

while ($li2=mysql_fetch_array($resultado2))
{
$cod2=$li2["codigo"];
$des2=strtoupper($li2["nome"]);

$sq7="select count(*) as total from testes_questoes as que where que.subcate='$cod2'";
$re8=mysql_query($sq7) or die(mysql_error());
$re7=mysql_fetch_array($re8);
$total5=$re7["total"];
$total5=number_format($total5, 0, ',', '.');

?>
            <tr> 
              <td width="1%" bgcolor="#F2F2F2">&nbsp;</td>
              <td width="85%" bgcolor="#fbfbfb" id="piroco<?=$cod2?>"><a href="javascript:executateste('<?=$cod2?>');" class="outside4"> 
                <? echo $des2; ?>&nbsp;&nbsp;<font color="#666666" size="1px"><b>(<?=$total5?>)</b></font></a>
                </td>
            </tr>
            <?
}
}
?>
          </table>
          <?
if (isset($meta)==1){
?>
          <table width="79" border="0" align="left">
            <tr> 
              <td height="36"> 
                <div align="center"><a href="javascript:history.go(-1);"><img src="voltar.jpg" border="0"></a></div>
              </td>
            </tr>
          </table>
          <?
}
?>


</div>
 </td>
<!-- =================================================== -->
<!-- SOMBRA============================================= -->
<td bgcolor="#E1E1E1" width="1px"> </td>
<!-- SOMBRA============================================= -->

<!-- BARRA DIREITA====================================== -->
 <td bgcolor="#f5f5f5" valign="top" style="padding-left:7px" width="175px">
  <table><tr><td align="left"> </td></tr></table>
 </td>
<!-- =================================================== -->
<!-- =================================================== -->
 <td width="5" style="width:5">&nbsp;</td>
</tr>
<tr><td colspan="7"></td></tr>
</table>



<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-1692741-1";
urchinTracker();
</script>

<? include "inc/fimpagina.php"; ?>



