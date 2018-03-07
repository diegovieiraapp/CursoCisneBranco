<? 
session_start(); 

if (isset($_SESSION["usuario"])==0)
{
?>
<script language="javascript">
document.location="index.php";
</script>
<?
exit;
}


/*
$arquivo = fopen('bot-boletos-online-teste.txt','r');
if ($arquivo == false) die('Não foi possível abrir o arquivo.');
$numerado = fgets($arquivo);
fclose($arquivo);

echo $numerado;
*/
$desconsiderar=$_GET["desconsiderar"];

// ============================================= Conta Mysql Injection

$desconsiderar=str_replace("'","",$desconsiderar);

// ============================================= Fim Injection

$sq="select tp_acesso,fc_acesso_edita,est_acesso,cfg_acesso,afi_acesso,afi_sq_acesso,afi_cxt_acesso,cc_acesso,capo_acesso,cpro_acesso,csu_acesso
 ,leg_acesso,cerr_acesso,ra_acesso,foru_acesso,lista_acesso,notifica_acesso,rese_acesso,test_acesso,noticia_acesso,usu_acesso,lanc_acesso
 from usuarios where codigo='$codusu2'";
include 'abre.php';
$resultado=mysql_query($sq) or die(mysql_error()); 
mysql_close($conectar);
$li33=mysql_fetch_array($resultado);

$tp_acesso=$li33["tp_acesso"];
$fc_acesso_edita=$li33["fc_acesso_edita"];
$est_acesso=$li33["est_acesso"];
$cfg_acesso=$li33["cfg_acesso"];
$afi_acesso=$li33["afi_acesso"];
$afi_sq_acesso=$li33["afi_sq_acesso"];
$afi_cxt_acesso=$li33["afi_cxt_acesso"];
$cc_acesso=$li33["cc_acesso"];
$capo_acesso=$li33["capo_acesso"];
$cpro_acesso=$li33["cpro_acesso"];
$csu_acesso=$li33["csu_acesso"];
$leg_acesso=$li33["leg_acesso"];
$cerr_acesso=$li33["cerr_acesso"];
$ra_acesso=$li33["ra_acesso"];
$foru_acesso=$li33["foru_acesso"];
$lista_acesso=$li33["lista_acesso"];
$notifica_acesso=$li33["notifica_acesso"];
$rese_acesso=$li33["rese_acesso"];
$test_acesso=$li33["test_acesso"];
$noticia_acesso=$li33["noticia_acesso"];
$usu_acesso=$li33["usu_acesso"];
$lanc_acesso=$li33["lanc_acesso"];

$bot_acesso_dis="";
$bot_acesso_link="bot-boletos.php";

$xml_acesso_dis="";
$xml_acesso_link="bot-xml-externo.php";

$categorias_acesso_dis="";
$categorias_acesso_link="adm-categorias.php";

if ($lanc_acesso==0){
$lanc_acesso_dis="disabled";
$lanc_acesso_link="#";
}
else{
$lanc_acesso_dis="";
$lanc_acesso_link="lancamentos.php";
}


if ($usu_acesso==0){
$usu_acesso_dis="disabled";
$usu_acesso_link="#";
}
else{
$usu_acesso_dis="";
$usu_acesso_link="usuarios.php";
}

if ($foru_acesso==0){
$foru_acesso_dis="disabled";
$foru_acesso_link="#";
}
else{
$foru_acesso_dis="";
$foru_acesso_link="forum.php";
}

if ($noticia_acesso==0){
$noticia_acesso_dis="disabled";
$noticia_acesso_link="#";
}
else{
$noticia_acesso_dis="";
$noticia_acesso_link="news.php?todop=1";
}

if ($test_acesso==0){
$test_acesso_dis="disabled";
$test_acesso_link="#";
}
else{
$test_acesso_dis="";
$test_acesso_link="testes.php";
}


if ($rese_acesso==0){
$rese_acesso_dis="disabled";
$rese_acesso_link="#";
}
else{
$rese_acesso_dis="";
$rese_acesso_link="reserva_apostilas.php";
}

if ($notifica_acesso==0){
$notifica_acesso_dis="disabled";
$notifica_acesso_link="#";
}
else{
$notifica_acesso_dis="";
$notifica_acesso_link="notificapaga.php";
}

if ($lista_acesso==0){
$lista_acesso_dis="disabled";
$lista_acesso_link="#";
}
else{
$lista_acesso_dis="";
$lista_acesso_link="lista.php";
}

if ($ra_acesso==0){
$ra_acesso_dis="disabled";
$ra_acesso_link="#";
}
else{
$ra_acesso_dis="";
$ra_acesso_link="rastrea.php";
}


if ($cerr_acesso==0){
$cerr_acesso_dis="disabled";
$cerr_acesso_link="#";
}
else{
$cerr_acesso_dis="";
$cerr_acesso_link="erratas.php";
}


if ($leg_acesso==0){
$leg_acesso_dis="disabled";
$leg_acesso_link="#";
}
else{
$leg_acesso_dis="";
$leg_acesso_link="legislacao.php";
}

if ($csu_acesso==0){
$csu_acesso_dis="disabled";
$csu_acesso_link="#";
}
else{
$csu_acesso_dis="";
$csu_acesso_link="uteis.php";
}

if ($cpro_acesso==0){
$cpro_acesso_dis="disabled";
$cpro_acesso_link="#";
}
else{
$cpro_acesso_dis="";
$cpro_acesso_link="provas.php";
}


if ($capo_acesso==0){
$capo_acesso_dis="disabled";
$capo_acesso_link="#";
}
else{
$capo_acesso_dis="";
$capo_acesso_link="adm.php";
}



if ($cc_acesso==0){
$cc_acesso_dis="disabled";
$cc_acesso_link="#";
}
else{
$cc_acesso_dis="";
$cc_acesso_link="adiconcur.php";
}


if ($afi_cxt_acesso==0){
$afi_cxt_acesso_dis="disabled";
$afi_cxt_acesso_link="#";
}
else{
$afi_cxt_acesso_dis="";
$afi_cxt_acesso_link="afiliados_cliques.php";
}


if ($afi_sq_acesso==0){
$afi_sq_acesso_dis="disabled";
$afi_sq_acesso_link="#";
}
else{
$afi_sq_acesso_dis="";
$afi_sq_acesso_link="afiliados_solicitacoes.php";
}


if ($afi_acesso==0){
$afi_acesso_dis="disabled";
$afi_acesso_link="#";
}
else{
$afi_acesso_dis="";
$afi_acesso_link="afiliados_cadastrados.php";
}


if ($cfg_acesso==0){
$cfg_acesso_dis="disabled";
$cfg_acesso_link="#";
}
else{
$cfg_acesso_dis="";
$cfg_acesso_link="configuracoes.php";
}

if ($est_acesso==0){
$est_acesso_dis="disabled";
$est_acesso_link="#";
}
else{
$est_acesso_dis="";
$est_acesso_link="estoquelogicas.php";
}

if ($tp_acesso==0){
$tp_acesso_dis="disabled";
$tp_acesso_link="#";
}
else{
$tp_acesso_dis="";
$tp_acesso_link="todospedidos.php";
}

if ($fc_acesso_edita==0){
$fc_acesso_edita_dis="disabled";
$fc_acesso_edita_link1="#";
$fc_acesso_edita_link2="#";
$fc_acesso_edita_link3="#";
$fc_acesso_edita_link4="#";
}
else{
$fc_acesso_edita_dis="";
$fc_acesso_edita_link1="pedidospagos.php";
$fc_acesso_edita_link2="pedidosseparados.php";
$fc_acesso_edita_link3="pedidosnomalote.php";
$fc_acesso_edita_link4="pedidosconcluidos.php";
}


function subtrair($date,$days) {
     $thisyear = substr ( $date, 6, 4 );
     $thismonth = substr ( $date, 3, 2 );
     $thisday =  substr ( $date, 0, 2 );
     $nextdate = mktime ( 0, 0, 0, $thismonth, $thisday - $days, $thisyear );
     return strftime("%d/%m/%Y", $nextdate);
}

function convdata($dataentra,$tipo){ 
  if ($tipo == "mtn") { 
    $datasentra = explode("-",$dataentra); 
    $indice=2; 
    while($indice != -1){ 
     $datass[$indice] = $datasentra[$indice]; 
     $indice--; 
    } 
   $datasaida=implode("/",$datass); 
  } elseif ($tipo == "ntm") { 
    $datasentra = explode("/",$dataentra); 
    $indice=2; 
    while($indice != -1){ 
      $datass[$indice] = $datasentra[$indice]; 
      $indice--; 
    } 
    $datasaida = implode("-",$datass); 
  } else {  
    $datasaida = "erro"; 
  } 
  return $datasaida; 
}


unset($_SESSION["superbuscapor_2"]);
unset($_SESSION["superbuscacriterio_2"]);
unset($_SESSION["ura"]);

$acao='<a href="http://www.simuladosdeconcursos.com.br" class="outside3" >Site - Home</a>';

$resetar=$_GET["resetar"];
$porra=$_POST["porra"];

//=========================================PARA OS EIXOS TODOS OS PEDIDOS

if (!isset($_SESSION["lanca_sess"])){

$_SESSION["lanca_sess"]=0;

$dias=3;

$datahoje=date("d/m/Y");
$antes=subtrair($datahoje,$dias);
$inicial=$antes;
$final=$datahoje;
$comeco=convdata($antes,"ntm");
$fim=convdata($final,"ntm");

$_SESSION["sesdata1"]=$comeco;
$_SESSION["sesdata2"]=$fim;

}

//==========================================================

$_SESSION["lanca_sess_afiliados"]=7;

$dias=720;

$datahoje=date("d/m/Y");
$antes=subtrair($datahoje,$dias);
$inicial=$antes;
$final=$datahoje;
$comeco=convdata($antes,"ntm");
$fim=convdata($final,"ntm");

$_SESSION["sesdata1_afiliados"]=$comeco;
$_SESSION["sesdata2_afiliados"]=$fim;

//====================================================================

$_SESSION["lanca_sess_sol"]=2;

$dias=30;

$datahoje=date("d/m/Y");
$antes=subtrair($datahoje,$dias);
$inicial=$antes;
$final=$datahoje;
$comeco=convdata($antes,"ntm");
$fim=convdata($final,"ntm");

$_SESSION["sesdata1_sol"]=$comeco;
$_SESSION["sesdata2_sol"]=$fim;


//=====================- Para o Módulo Relatório de Cliques -==============================

if (!isset($_SESSION["lanca_sess_cli"])){

$_SESSION["lanca_sess_cli"]=0;

$dias=3;

$datahoje=date("d/m/Y");
$antes=subtrair($datahoje,$dias);
$inicial=$antes;
$final=$datahoje;
$comeco=convdata($antes,"ntm");
$fim=convdata($final,"ntm");

$_SESSION["sesdata1_cli"]=$comeco;
$_SESSION["sesdata2_cli"]=$fim;

}

//====================================================================



if (isset($resetar)=="1"){
session_destroy();
?>

<script language="JavaScript">

location.href="../index.php";

</script>

<?

}



$errado="";
$bg1="#000000";
$bg1_2="#0000FF";

$bg2="#000000";
$bg2_2="#0000FF";

$bg3="#000000";
$bg3_2="#0000FF";


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML lang="pt-BR">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Simulados de Concursos - Setor Administrativo</title>
</head>
<SCRIPT type="text/javascript" src="../arquivos/jquery-1.6.2.min.js"></SCRIPT>
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
<link rel="stylesheet" href="alertas.css" type="text/css" />
<LINK href="geral-novo.css" type=text/css rel=StyleSheet>
<link rel="stylesheet" href="botoes/botoes.css?l=3" type="text/css" />
<body>
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="8"></td></tr></table>
<? include "topo.php"; ?>
<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="4"></td></tr></table>
<table align="center" width="999" border="0" cellspacing="0" cellpadding="0">
  <tr>
<td valign="top" align="center">
  <table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="21"></td></tr></table>
<? if ($errado!=""){ ?>
<table width="895" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><p class='mensagem-alerta'><?=$errado?></p></td>
  </tr>
</table>
<? }else{ ?>
  <br /> <? } ?>

<? if ($errado2!=""){ ?>
<table width="895" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><p class='mensagem-alerta'><?=$errado2?></p></td>
  </tr>
</table>
<? }else{ ?>
  <br /> <? } ?>

<? if ($errado3!=""){ ?>
<table width="895" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td><p class='mensagem-alerta'><?=$errado3?></p></td>
  </tr>
</table>
<? } ?>

  <br />
  <table width="80%" height="31" border="0" cellpadding="0" cellspacing="2">
      <tr>
        <td width="33%" align="center"></td>
        <td width="17%" align="center">&nbsp;</td>
        <td width="25%" align="center">&nbsp;</td>
        <td width="25%" align="left" style="padding-left:2px;">&nbsp;</td>
      </tr>
</table>
  <table width="80%" height="31" border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td width="27%" align="left">&nbsp;</td>
      <td width="16%" align="left">&nbsp;</td>
      <td width="53%" align="center"></td>
      <td width="2%" align="center"></td>
      <td width="2%" align="left" style="padding-left:2px;"></td>
    </tr>
    <tr>
      <td colspan="5" align="left"></td>
    </tr>
    <tr>
      <td colspan="5" align="left"></td>
    </tr>
  </table>
  <table width="80%" height="31" border="0" cellpadding="0" cellspacing="2">
    <tr>
      <td width="100%" align="left"><fieldset class="contato">
        <legend>Fluxo de Conte&uacute;do:</legend>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
           <td>
<table width="100" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="6px"></td>
</tr>
</table>
<A class="sexybutton" href="testes.php" title="Testes"><span><span><span class="testes">Cadastro de Questões e Alternativas</span></span></span></a>
            </td>
            </tr>
          </table>
        </fieldset>
     </td>
    </tr>
    <tr>
      <td align="left"></td>
    </tr>
    <tr>
      <td align="left"></td>
    </tr>
</table>
<br />
<p><br>
  <br>
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
</p></td>    
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
</body>


</html>

