<?php
include ("abreconexao.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simulado para concursos responsivo</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
document.getElementById(ident).bgColor="#ffffff";
}
else{
document.getElementById(ident).bgColor="#FFFF00";
}
}


function entra(nome,coda,questao){
piroca=antigo[questao];
if (piroca!=""){document.getElementById(piroca).bgColor="#ffffff";}
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
</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Simulado</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Questões</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">Sobre</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


    <!-- Portfolio Grid Section -->
    <section id="portfolio">
	<SCRIPT>
	  function carregar() {
		  $('#ss').fadeOut();

		  disciplina_id = $('#di').val();      
		  $.getJSON('/disciplinas/assunto', "disciplina_id=" + disciplina_id, function(data) {
			var result = "<option value=''>assunto ...</option>";

			if (data.length == 0 && disciplina_id != "") {
			  result += "Não foram encontrados assuntos para essa disciplina.";
			} else {
			  for (var i = 0; i < data.length; i++) {
				  result += "<option value="+ data[i].assunto.id +">"+ data[i].assunto.nome + "</option>";
			  }
			}
			$('#ss').fadeIn();
			$('#ss').html(result);
		  });
	  }
	</SCRIPT>	
        <div class="container" id="conteudo">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Questões</h3>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 portfolio-item">
                    <span class="portfolio-link" >
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
<DIV style="position: relative;" class="secundario"><!-- Barra de Filtro -->
  <div id="conteudoteste">
          
          <?php
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
    <td><div align="left" ><h4>Escolha o tema abaixo:</h4></div></td>
    <td><h5>Total de Quest&otilde;es: <b><span style="color:#18BC9C;">(<?php echo $total6;?>)<span></b></font></td>
  </tr>
</table>

                
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="5" colspan="2" align="center" id="L<?php echo $codcon; ?>" style="border-top:none;padding-right:0;padding-left:0;"></td>
            </tr>
            <?php
while ($li=mysql_fetch_array($resultado))
{
$des=strtoupper($li["nome"]);
$des=utf8_encode($des);
$codcate=$li["codigo"];



$sq7="select count(*) as total from testes_questoes as que where que.codcate='$codcate'";
$re8=mysql_query($sq7) or die(mysql_error());
$re7=mysql_fetch_array($re8);
$total5=$re7["total"];
$total5=number_format($total5, 0, ',', '.');

?>
            <tr> 
              <td align="center" width="3%" id="L<?php echo $codcon; ?>" class="pergunta"><strong class="gra5"><img src="images/application_side_expand.png" width="16" height="16" id='im<?php echo $codcon; ?>'> 
                </strong></td>
              <td id="<?php echo $codcon; ?>" style="border-top:none;" class="pergunta"><strong>
                <?php echo $des; ?>&nbsp;&nbsp;<font color="#666666" size="2px"><b>(<?php echo $total5?>)</b></font>
                </strong></td>
            </tr>
            <?php
$sql2="select codigo,upper(nome) as nome from testes_subcategorias where codcate=". $codcate ." order by nome";
$resultado2=mysql_query($sql2) or die(mysql_error()); 

while ($li2=mysql_fetch_array($resultado2))
{
$cod2=$li2["codigo"];
$des2=strtoupper($li2["nome"]);
$des2=utf8_encode($des2);

$sq7="select count(*) as total from testes_questoes as que where que.subcate='$cod2'";
$re8=mysql_query($sq7) or die(mysql_error());
$re7=mysql_fetch_array($re8);
$total5=$re7["total"];
$total5=number_format($total5, 0, ',', '.');

?>
            <tr> 
              <td width="1%" bgcolor="#F2F2F2">&nbsp;</td>
              <td width="85%" bgcolor="#fbfbfb" id="piroco<?php echo $cod2?>" class="capeta"><a href="javascript:executateste('<?php echo $cod2?>');"> 
                <?php echo $des2; ?>&nbsp;&nbsp;<font color="#666666" size="1px"><b>(<?php echo $total5?>)</b></font></a>
                </td>
            </tr>
            <?php
}
}
?>
          </table>
          <?php
if (isset($meta)==1){
?>
          <table width="79" border="0" align="left">
            <tr> 
              <td height="36"> 
                <div align="center"><a href="javascript:history.go(-1);"><img src="voltar.jpg" border="0"></a></div>
              </td>
            </tr>
          </table>
          <?php
}
?>


</div></DIV>                    </a>
                </div>
               
               
               
               
               
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Sobre</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Simulado para concursos.</p>
                </div>


            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Contato</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" id="name" required data-validation-required-message="Digite seu nome.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Digite seu email.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Telefone</label>
                                <input type="tel" class="form-control" placeholder="Telefone" id="phone" data-validation-required-message="Digite o número de telefone para contato.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Mensagem</label>
                                <textarea rows="5" class="form-control" placeholder="Mensagem" id="message" required data-validation-required-message="Digite a sua mensagem."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Endereço</h3>
                        <p>Meu endereço
                            <br>Aqui</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Redes sociais</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Sobre</h3>
                        <p>Colocar aqui um texto sobre a sua <a href="http://conectstudio.com.br">empresa</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; <a href="http://conectstudio.com.br">Conect Studio</a> 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

  
    
    
  

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
