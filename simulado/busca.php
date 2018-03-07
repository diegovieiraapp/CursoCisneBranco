<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD>
<META content="text/html; charset=utf-8" http-equiv="Content-Type">
<META content="pt-br" http-equiv="Content-Language">
<META content="no-cache, no-store" http-equiv="Cache-Control">
<META content="no-cache, no-store" http-equiv="Pragma">
<META name="author" content="Questões de Concursos Públicos">
<META name="robots" content="Index,Follow">
<META name="rails-controller" content="pesquisar">
<META name="rails-action" content="index"><LINK title="RSS" rel="alternate" 
type="application/rss+xml" 
href="http://www.simuladosdeconcursos.com.br/site/rss"><TITLE>Questões de 
Concursos Públicos - Questões de concursos públicos da disciplina de Direito 
Administrativo.</TITLE><LINK rel="shortcut icon" type="image/x-icon" href="/images/ico-qc.ico"><LINK 
rel="stylesheet" type="text/css" href="arquivos/base_packaged.css" 
media="screen">
<SCRIPT type="text/javascript" src="arquivos/base_packaged.js"></SCRIPT>

<SCRIPT type="text/javascript" src="arquivos/money.js"></SCRIPT>

<SCRIPT type="text/javascript" src="arquivos/jquery.maskedinput.js"></SCRIPT>

<SCRIPT type="text/javascript" src="arquivos/jquery.cpf-validate.js"></SCRIPT>

<SCRIPT type="text/javascript" src="arquivos/jquery.form.js"></SCRIPT>

<SCRIPT type="text/javascript" src="arquivos/ckeditor.js"></SCRIPT>

<SCRIPT type="text/javascript" src="arquivos/jquery.js"></SCRIPT>

<META name="GENERATOR" content="MSHTML 9.00.8112.16443"></HEAD>
<BODY><!-- Menu Superior -->
<!-- Div Principal -->
<DIV id="principal"><!-- Cabeçalho -->
<DIV id="cabecalho"><!--Coluna 1 -->
<DIV id="logo"><!--Logo --><A title="Página principal do site." href="http://www.simuladosdeconcursos.com.br/">
<IMG alt="Questões de Concursos" src="arquivos/sc-logo.jpg" width="269" height="101"></A></DIV>
<!--Coluna 2 -->
<DIV id="busca">
<DIV style="margin-bottom: 15px; float: right;"></DIV>
<DIV class="clear"></DIV>
<FORM id="frm-pesquisar" method="post" action="/home/pesquisar"><INPUT style="width: 255px;" id="keyword" name="keyword" maxLength="45" value="Digite o que você procura ..." 
type="text">
<DIV style="float: left;">
  <SELECT style="width: 155px;" id="opcao" name="opcao">
  <OPTION value="3">» Por Alternativa</OPTION>
  <OPTION selected="selected" value="1">» Por Questão</OPTION></SELECT>
</DIV>
<DIV style="float: left;"><INPUT id="btn-pesquisar" class="botao-cinza botao" name="btn-pesquisar" value="Pesquisar" type="submit"></DIV></FORM>
<DIV class="clear"></DIV><!--Menu de Entidades -->
<DIV style="text-align: center; margin-left: -10px;" id="menu-principal">
<UL>
  <LI class="menu"><A title="Questões" href="http://www.simuladosdeconcursos.com.br/questoes">QUESTÕES</A></LI>
  <LI class="menu"><A title="Disciplinas" href="http://www.simuladosdeconcursos.com.br/disciplinas">DISCIPLINAS</A></LI>
  <LI class="menu"><A title="Provas" href="http://www.simuladosdeconcursos.com.br/provas">PROVAS</A></LI>
  <LI class="menu"><A title="Concursos Públicos" href="http://www.simuladosdeconcursos.com.br/concursos">CONCURSOS</A></LI></UL></DIV>
<DIV class="clear"></DIV></DIV>
<DIV class="clear"></DIV></DIV><!-- Barra de Titulo -->
<DIV id="barra-titulo">
<DIV id="titulo-conteudo" class="border">
<H2>Últimas questões de Direito Administrativo adicionas em 
2012-04-10</H2></DIV>
<DIV class="controle-fonte"><A class="increase" href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Aumentar letra" src="arquivos/icon_font_increase.png"></A><A 
class="decrease" href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Diminuir letra" src="arquivos/icon_font_decrease.png"></A></DIV></DIV><!--Início (Conteúdo) -->
<DIV id="conteudo">
<P>
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

<DIV style="position: relative;" class="secundario"><!-- Barra de Filtro -->

<DIV class="separador"></DIV>
<DIV class="barra-ferramentas">
<DIV class="texto-resultado-pesquisa"> Exibindo <SPAN style="color: rgb(37, 125, 1); font-weight: bold;">1&nbsp;de&nbsp;5</SPAN> 
de <SPAN style="color: rgb(37, 125, 1); font-weight: bold;">10</SPAN> no total.  
  </DIV>
<DIV style="font-size: 0.9em; margin-right: 5px; float: right;">      Questões 
por página:      <SELECT style="border: 1px solid rgb(183, 183, 183); color: rgb(130, 130, 130);" 
id="qpp" onChange="document.getElementById('pp').value = this.options[this.selectedIndex].value; document.getElementById('frm-filtrar-questoes').submit();" 
name="qpp"><OPTION selected="selected" value="5">5</OPTION><OPTION 
  value="10">10</OPTION><OPTION value="15">15</OPTION><OPTION 
  value="20">20</OPTION></SELECT></DIV>
<DIV class="clear"></DIV></DIV>
<DIV class="separador"></DIV><!-- área da questão -->
<DIV id="questoes"><!-- cabeçalho contendo código e indíce da questão -->
<DIV class="cabecalho-questao"><SPAN style="font-weight: bold; margin-right: 5px;">1</SPAN>• 
       <A style="font-weight: bold;" href="http://www.simuladosdeconcursos.com.br/questoes/f27ecf75-82">Q231440
	    </A><IMG style="display: none;" id="ico-que-res-231440" alt="Questão resolvida por você." 
src="arquivos/icon-check.png"><A 
title="&nbsp;&nbsp;" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#">&nbsp;&nbsp;</A><!-- Helper que exibe imagem indicando se o usuário acertou ou errou a questão --><!-- classificação -->
<DIV style="margin: 5px 20px; text-align: justify; font-size: 0.85em;">
<DIV class="separador"></DIV>
<SCRIPT>
  function revisada(question_id) {
    if ($('#revisada' + question_id).is(':checked')) {
      $.ajax( {
                url: '/revisar/'+ question_id +'/1',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    } else {
      $.ajax( {
                url: '/revisar/'+ question_id +'/0',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    }
  }
</SCRIPT>
  Prova:                  <A href="http://www.simuladosdeconcursos.com.br/provas/fcc-2012-trf-2a-regiao-analista-judiciario-area-administrativa">FCC 
- 2012 - TRF - 2ª REGIÃO - Analista Judiciário - Área Administrativa</A>
<DIV style="margin-top: 5px;" id="barra_classificacao231440">      Disciplina:   
               <A href="http://www.simuladosdeconcursos.com.br/pesquisar/disciplina/direito-administrativo">Direito 
Administrativo</A>                                                               
                                           |      Assuntos:                      
<A title="Veja mais questões em Lei nº 8.112-1990 - Regime Jurídico dos Servidores Públicos Federais." 
href="http://www.simuladosdeconcursos.com.br/pesquisar?ss=9&amp;di=2">Lei nº 
8.112-1990 - Regime Jurídico dos Servidores Públicos Federais</A>;&nbsp;         
                                                           <IMG style="vertical-align: baseline; display: none;" 
id="add-classificacao-231440" alt="Carregando ..." src="arquivos/ajax-loader.gif">
</DIV>
<DIV style="margin-top: 10px;" id="classificacao_atualizada231440"></DIV>
<DIV style="margin-top: 10px;" id="inline231440"></DIV>
<DIV class="separador"></DIV></DIV></DIV>
<FORM id="frm-resolver-questao-231440" onSubmit="jQuery.ajax({beforeSend:function(request){$('#img-loading-ajax-questoes-231440').show();}, complete:function(request){$('#img-loading-ajax-questoes-231440').hide(), $('#area-links').show()}, data:jQuery.param(jQuery(this).serializeArray()) + '&amp;authenticity_token=' + encodeURIComponent('e094913da44e846b6a6b362b9a6d5f3aae7f269e'), success:function(request){jQuery('#resposta-231440').html(request);}, type:'post', url:'/questoes/resolver/f27ecf75-82'}); return false;" 
method="post" action="/questoes/resolver/f27ecf75-82" autocomplete="off">
<DIV style="margin: 0px; padding: 0px;"><INPUT name="authenticity_token" value="e094913da44e846b6a6b362b9a6d5f3aae7f269e" 
type="hidden"></DIV><!-- texto relacionado, enunciado e alternativas -->
<P>  O servidor responde civil, penal e administrativamente  pelo exercício 
irregular de suas atribuições, sendo a responsabilidade  <BR></P>
<DIV id="area-resolucao">
<P>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="A" 
  type="radio">            a) civil, penal e administrativa autônomas, e a 
  absolvição em uma dessas áreas não exclui a responsabilidade em qualquer 
  outra.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="B" 
  type="radio">            b) civil e administrativa afastadas, dependendo da 
  amplitude da absolvição criminal decorrente de insuficiência de provas.        
      </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="C" 
  type="radio">            c) civil afastada na hipótese de ocorrer a absolvição 
   administrativa em face da inexistência do fato e de  sua autoria.            
  </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="D" 
  type="radio">            d) criminal afastada no caso de absolvição civil e 
  administrativa decorrente de insuficiência de provas.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="E" 
  type="radio">            e)  administrativa afastada no caso de absolvição 
  criminal que negue a existência do fato ou sua autoria.           </LI></UL>
<P></P></DIV><INPUT style="margin: 0px 20px 15px; width: 80px; height: 30px;" class="botao-cinza botao" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" value="Resolver" type="button"></FORM>
<DIV class="clear"></DIV>
<DIV id="resposta-231440"><IMG style="display: none;" id="img-loading-ajax-questoes-231440" 
alt="Carregando ..." src="arquivos/ajax-loader-2.gif">
<DIV id="box-comentarios-231440"></DIV>
<DIV id="box-ajax-231440"></DIV><!-- Area de links --><BR>
<DIV style="font-size: 0.95em;" id="area-links"><!-- ADICIONAR COMENTÁRIO --><A 
title=" Adicionar Comentário" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-add-comentario-p.png"> 
Adicionar Comentário</A>      &nbsp;&nbsp;  <!-- VISUALIZAR COMENTÁRIOS --><A 
title=" Comentarios (6)" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-comentarios-p.png"> 
Comentarios (6)</A>        &nbsp;&nbsp;                              <A title=" Estatisticas" 
onclick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Estatística" src="arquivos/icon-estatisticas-p.png"> 
Estatisticas</A><A title=" Cadernos" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Cadernos de Questões" src="arquivos/icon-cadernos-p.png"> 
Cadernos</A>    &nbsp;&nbsp;  <A title="Adicione marcadores à esta questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f27ecf75-82?tab=3"><IMG 
style="vertical-align: middle;" alt="Ícone dos marcadores" src="arquivos/icon-tags-p.png"> 
   Marcadores  </A>&nbsp;&nbsp;  <A title="Faça suas anotações sobre essa questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f27ecf75-82?tab=4"><IMG 
style="vertical-align: middle;" alt="Ícone anotações" src="arquivos/icon-anotacoes-p.png"> 
   Anotações  </A>&nbsp;&nbsp;  </DIV></DIV>
<DIV class="clear"></DIV><BR>
<DIV class="separador"></DIV><BR><!-- contador de questões --><!-- cabeçalho contendo código e indíce da questão -->
<DIV class="cabecalho-questao"><SPAN style="font-weight: bold; margin-right: 5px;">2</SPAN>• 
       <A style="font-weight: bold;" href="http://www.simuladosdeconcursos.com.br/questoes/f4174f71-82">Q231441
	    </A><IMG style="display: none;" id="ico-que-res-231441" alt="Questão resolvida por você." 
src="arquivos/icon-check.png"><A 
title="&nbsp;&nbsp;" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#">&nbsp;&nbsp;<IMG 
alt="Imprimir" src="arquivos/icon-printer.png"></A><!-- Helper que exibe imagem indicando se o usuário acertou ou errou a questão --><!-- classificação -->
<DIV style="margin: 5px 20px; text-align: justify; font-size: 0.85em;">
<DIV class="separador"></DIV>
<SCRIPT>
  function revisada(question_id) {
    if ($('#revisada' + question_id).is(':checked')) {
      $.ajax( {
                url: '/revisar/'+ question_id +'/1',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    } else {
      $.ajax( {
                url: '/revisar/'+ question_id +'/0',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    }
  }
</SCRIPT>
  Prova:                        <A href="http://www.simuladosdeconcursos.com.br/provas/fcc-2012-trf-2a-regiao-analista-judiciario-area-administrativa">FCC 
- 2012 - TRF - 2ª REGIÃO - Analista Judiciário - Área Administrativa</A>
<DIV style="margin-top: 5px;" id="barra_classificacao231441">      Disciplina:   
               <A href="http://www.simuladosdeconcursos.com.br/pesquisar/disciplina/direito-administrativo">Direito 
Administrativo</A>                                                               
                                                         |      Assuntos:        
                        <A title="Veja mais questões em Lei nº 8.112-1990 - Regime Jurídico dos Servidores Públicos Federais." 
href="http://www.simuladosdeconcursos.com.br/pesquisar?ss=9&amp;di=2">Lei nº 
8.112-1990 - Regime Jurídico dos Servidores Públicos Federais</A>;&nbsp;         
               <A title="Veja mais questões em Processo Administrativo Federal." 
href="http://www.simuladosdeconcursos.com.br/pesquisar?ss=12&amp;di=2">Processo 
Administrativo Federal</A>;&nbsp;                                                
<IMG style="vertical-align: baseline; display: none;" id="add-classificacao-231441" 
alt="Carregando ..." src="arquivos/ajax-loader.gif">
</DIV>
<DIV style="margin-top: 10px;" id="classificacao_atualizada231441"></DIV>
<DIV style="margin-top: 10px;" id="inline231441"></DIV>
<DIV class="separador"></DIV></DIV></DIV>
<FORM id="frm-resolver-questao-231441" onSubmit="jQuery.ajax({beforeSend:function(request){$('#img-loading-ajax-questoes-231441').show();}, complete:function(request){$('#img-loading-ajax-questoes-231441').hide(), $('#area-links').show()}, data:jQuery.param(jQuery(this).serializeArray()) + '&amp;authenticity_token=' + encodeURIComponent('e094913da44e846b6a6b362b9a6d5f3aae7f269e'), success:function(request){jQuery('#resposta-231441').html(request);}, type:'post', url:'/questoes/resolver/f4174f71-82'}); return false;" 
method="post" action="/questoes/resolver/f4174f71-82" autocomplete="off">
<DIV style="margin: 0px; padding: 0px;"><INPUT name="authenticity_token" value="e094913da44e846b6a6b362b9a6d5f3aae7f269e" 
type="hidden"></DIV><!-- texto relacionado, enunciado e alternativas -->
<P>   Em conformidade com os preceitos legais pertinentes ao  processo 
disciplinar e sua revisão, analise: <BR><BR>I.  Julgada procedente a revisão, 
será declarada sem  efeito a penalidade aplicada, exceto em relação à  
destituição do cargo em comissão, que será convertida em exoneração.  
<BR><BR>II.  Sendo procedente a decisão proferida na revisão,  todos os direitos 
do servidor poderão ser restabelecidos, exceto em relação à exoneração do cargo  
efetivo, que será convertida em transposição.  <BR><BR>III.  A decisão favorável 
proferida na revisão ensejará a  anulação da penalidade aplicada, salvo a 
exoneração do cargo de carreira, que será convertida em  readmissão.<BR><BR> Nas 
situações acima descritas, está correto o que consta  APENAS em <BR></P>
<DIV id="area-resolucao">
<P>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="A" 
  type="radio">            a) II.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="B" 
  type="radio">            b) III.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="C" 
  type="radio">            c) I e III.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="D" 
  type="radio">            d) I.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="E" 
  type="radio">            e) II e III.           </LI></UL>
<P></P></DIV><INPUT style="margin: 0px 20px 15px; width: 80px; height: 30px;" class="botao-cinza botao" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" value="Resolver" type="button"></FORM>
<DIV class="clear"></DIV>
<DIV id="resposta-231441"><IMG style="display: none;" id="img-loading-ajax-questoes-231441" 
alt="Carregando ..." src="arquivos/ajax-loader-2.gif">
<DIV id="box-comentarios-231441"></DIV>
<DIV id="box-ajax-231441"></DIV><!-- Area de links --><BR>
<DIV style="font-size: 0.95em;" id="area-links"><!-- ADICIONAR COMENTÁRIO --><A 
title=" Adicionar Comentário" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-add-comentario-p.png"> 
Adicionar Comentário</A>      &nbsp;&nbsp;  <!-- VISUALIZAR COMENTÁRIOS --><A 
title=" Comentarios (4)" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-comentarios-p.png"> 
Comentarios (4)</A>        &nbsp;&nbsp;                              <A title=" Estatisticas" 
onclick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Estatística" src="arquivos/icon-estatisticas-p.png"> 
Estatisticas</A><A title=" Cadernos" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Cadernos de Questões" src="arquivos/icon-cadernos-p.png"> 
Cadernos</A>    &nbsp;&nbsp;  <A title="Adicione marcadores à esta questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f4174f71-82?tab=3"><IMG 
style="vertical-align: middle;" alt="Ícone dos marcadores" src="arquivos/icon-tags-p.png"> 
   Marcadores  </A>&nbsp;&nbsp;  <A title="Faça suas anotações sobre essa questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f4174f71-82?tab=4"><IMG 
style="vertical-align: middle;" alt="Ícone anotações" src="arquivos/icon-anotacoes-p.png"> 
   Anotações  </A>&nbsp;&nbsp;  </DIV></DIV>
<DIV class="clear"></DIV><BR>
<DIV class="separador"></DIV><BR><!-- contador de questões --><!-- cabeçalho contendo código e indíce da questão -->
<DIV class="cabecalho-questao"><SPAN style="font-weight: bold; margin-right: 5px;">3</SPAN>• 
       <A style="font-weight: bold;" href="http://www.simuladosdeconcursos.com.br/questoes/f5a8a711-82">Q231442
	    </A><IMG style="display: none;" id="ico-que-res-231442" alt="Questão resolvida por você." 
src="arquivos/icon-check.png"><A 
title="&nbsp;&nbsp;" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#">&nbsp;&nbsp;<IMG 
alt="Imprimir" src="arquivos/icon-printer.png"></A><!-- Helper que exibe imagem indicando se o usuário acertou ou errou a questão --><!-- classificação -->
<DIV style="margin: 5px 20px; text-align: justify; font-size: 0.85em;">
<DIV class="separador"></DIV>
<SCRIPT>
  function revisada(question_id) {
    if ($('#revisada' + question_id).is(':checked')) {
      $.ajax( {
                url: '/revisar/'+ question_id +'/1',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    } else {
      $.ajax( {
                url: '/revisar/'+ question_id +'/0',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    }
  }
</SCRIPT>
  Prova:                              <A href="http://www.simuladosdeconcursos.com.br/provas/fcc-2012-trf-2a-regiao-analista-judiciario-area-administrativa">FCC 
- 2012 - TRF - 2ª REGIÃO - Analista Judiciário - Área Administrativa</A>
<DIV style="margin-top: 5px;" id="barra_classificacao231442">      Disciplina:   
               <A href="http://www.simuladosdeconcursos.com.br/pesquisar/disciplina/direito-administrativo">Direito 
Administrativo</A>                                                               
                                           |      Assuntos:                      
                              <A title="Veja mais questões em Atos Administrativos." 
href="http://www.simuladosdeconcursos.com.br/pesquisar?ss=5&amp;di=2">Atos 
Administrativos</A>;&nbsp;                                      <IMG style="vertical-align: baseline; display: none;" 
id="add-classificacao-231442" alt="Carregando ..." src="arquivos/ajax-loader.gif">
</DIV>
<DIV style="margin-top: 10px;" id="classificacao_atualizada231442"></DIV>
<DIV style="margin-top: 10px;" id="inline231442"></DIV>
<DIV class="separador"></DIV></DIV></DIV>
<FORM id="frm-resolver-questao-231442" onSubmit="jQuery.ajax({beforeSend:function(request){$('#img-loading-ajax-questoes-231442').show();}, complete:function(request){$('#img-loading-ajax-questoes-231442').hide(), $('#area-links').show()}, data:jQuery.param(jQuery(this).serializeArray()) + '&amp;authenticity_token=' + encodeURIComponent('e094913da44e846b6a6b362b9a6d5f3aae7f269e'), success:function(request){jQuery('#resposta-231442').html(request);}, type:'post', url:'/questoes/resolver/f5a8a711-82'}); return false;" 
method="post" action="/questoes/resolver/f5a8a711-82" autocomplete="off">
<DIV style="margin: 0px; padding: 0px;"><INPUT name="authenticity_token" value="e094913da44e846b6a6b362b9a6d5f3aae7f269e" 
type="hidden"></DIV><!-- texto relacionado, enunciado e alternativas -->
<P>  Sob o tema da classificação dos atos administrativos,  apesar de serem 
todos resultantes da manifestação unilateral da vontade da Administração 
Pública, o denominado  "ato administrativo composto" difere dos demais, por ser  
<BR></P>
<DIV id="area-resolucao">
<P>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="A" 
  type="radio">            a) o que necessita, para a sua formação, da 
  manifestação de vontade de dois ou mais diferentes  órgãos ou autoridades para 
  gerar efeitos.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="B" 
  type="radio">            b) aquele cujo conteúdo resulta da manifestação de um 
   só órgão, mas a sua edição ou a produção de seus  efeitos depende de outro 
  ato que o aprove.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="C" 
  type="radio">            c) o ato que decorre da manifestação de vontade de  
  apenas um órgão, unipessoal ou colegiado, não  dependendo de manifestação de 
  outro órgão para  produzir efeitos.           </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="D" 
  type="radio">            d) o que tem a sua origem na manifestação de vontade  
  de pelo menos dois órgãos, porém, para produzir os  seus efeitos, deve ter a 
  aprovação por órgão hierarquicamente superior.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="E" 
  type="radio">            e)  originário da manifestação de vontade de pelo 
  menos duas autoridades superiores da Administração Pública, mas seus efeitos 
  ficam condicionados à aprovação por decreto de execução ou regulamentar.       
      </LI></UL>
<P></P></DIV><INPUT style="margin: 0px 20px 15px; width: 80px; height: 30px;" class="botao-cinza botao" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" value="Resolver" type="button"></FORM>
<DIV class="clear"></DIV>
<DIV id="resposta-231442"><IMG style="display: none;" id="img-loading-ajax-questoes-231442" 
alt="Carregando ..." src="arquivos/ajax-loader-2.gif">
<DIV id="box-comentarios-231442"></DIV>
<DIV id="box-ajax-231442"></DIV><!-- Area de links --><BR>
<DIV style="font-size: 0.95em;" id="area-links"><!-- ADICIONAR COMENTÁRIO --><A 
title=" Adicionar Comentário" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-add-comentario-p.png"> 
Adicionar Comentário</A>      &nbsp;&nbsp;  <!-- VISUALIZAR COMENTÁRIOS --><A 
title=" Comentarios (8)" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-comentarios-p.png"> 
Comentarios (8)</A>        &nbsp;&nbsp;                              <A title=" Estatisticas" 
onclick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Estatística" src="arquivos/icon-estatisticas-p.png"> 
Estatisticas</A><A title=" Cadernos" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Cadernos de Questões" src="arquivos/icon-cadernos-p.png"> 
Cadernos</A>    &nbsp;&nbsp;  <A title="Adicione marcadores à esta questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f5a8a711-82?tab=3"><IMG 
style="vertical-align: middle;" alt="Ícone dos marcadores" src="arquivos/icon-tags-p.png"> 
   Marcadores  </A>&nbsp;&nbsp;  <A title="Faça suas anotações sobre essa questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f5a8a711-82?tab=4"><IMG 
style="vertical-align: middle;" alt="Ícone anotações" src="arquivos/icon-anotacoes-p.png"> 
   Anotações  </A>&nbsp;&nbsp;  </DIV></DIV>
<DIV class="clear"></DIV><BR>
<DIV class="separador"></DIV><BR><!-- contador de questões --><!-- cabeçalho contendo código e indíce da questão -->
<DIV class="cabecalho-questao"><SPAN style="font-weight: bold; margin-right: 5px;">4</SPAN>• 
       <A style="font-weight: bold;" href="http://www.simuladosdeconcursos.com.br/questoes/f7414700-82">Q231443
	    </A><IMG style="display: none;" id="ico-que-res-231443" alt="Questão resolvida por você." 
src="arquivos/icon-check.png"><A 
title="&nbsp;&nbsp;" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#">&nbsp;&nbsp;<IMG 
alt="Imprimir" src="arquivos/icon-printer.png"></A><!-- Helper que exibe imagem indicando se o usuário acertou ou errou a questão --><!-- classificação -->
<DIV style="margin: 5px 20px; text-align: justify; font-size: 0.85em;">
<DIV class="separador"></DIV>
<SCRIPT>
  function revisada(question_id) {
    if ($('#revisada' + question_id).is(':checked')) {
      $.ajax( {
                url: '/revisar/'+ question_id +'/1',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    } else {
      $.ajax( {
                url: '/revisar/'+ question_id +'/0',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    }
  }
</SCRIPT>
  Prova:                                    <A href="http://www.simuladosdeconcursos.com.br/provas/fcc-2012-trf-2a-regiao-analista-judiciario-area-administrativa">FCC 
- 2012 - TRF - 2ª REGIÃO - Analista Judiciário - Área Administrativa</A>
<DIV style="margin-top: 5px;" id="barra_classificacao231443">      Disciplina:   
               <A href="http://www.simuladosdeconcursos.com.br/pesquisar/disciplina/direito-administrativo">Direito 
Administrativo</A>                                                               
                                           |      Assuntos:                      
                                        <A title="Veja mais questões em Atos Administrativos." 
href="http://www.simuladosdeconcursos.com.br/pesquisar?ss=5&amp;di=2">Atos 
Administrativos</A>;&nbsp;                            <IMG style="vertical-align: baseline; display: none;" 
id="add-classificacao-231443" alt="Carregando ..." src="arquivos/ajax-loader.gif">
</DIV>
<DIV style="margin-top: 10px;" id="classificacao_atualizada231443"></DIV>
<DIV style="margin-top: 10px;" id="inline231443"></DIV>
<DIV class="separador"></DIV></DIV></DIV>
<FORM id="frm-resolver-questao-231443" onSubmit="jQuery.ajax({beforeSend:function(request){$('#img-loading-ajax-questoes-231443').show();}, complete:function(request){$('#img-loading-ajax-questoes-231443').hide(), $('#area-links').show()}, data:jQuery.param(jQuery(this).serializeArray()) + '&amp;authenticity_token=' + encodeURIComponent('e094913da44e846b6a6b362b9a6d5f3aae7f269e'), success:function(request){jQuery('#resposta-231443').html(request);}, type:'post', url:'/questoes/resolver/f7414700-82'}); return false;" 
method="post" action="/questoes/resolver/f7414700-82" autocomplete="off">
<DIV style="margin: 0px; padding: 0px;"><INPUT name="authenticity_token" value="e094913da44e846b6a6b362b9a6d5f3aae7f269e" 
type="hidden"></DIV><!-- texto relacionado, enunciado e alternativas -->
<P>  A respeito da revogação e anulação dos atos administrativos, analise: 
<BR><BR>I.  A revogação é aplicável apenas em relação aos  atos discricionários, 
podendo ser praticada somente  pelo Poder Executivo em relação aos seus próprios 
 atos, em decorrência do ato tornar-se inconveniente  e inoportuno, não podendo 
ser revogados pelo  Poder Judiciário, em sua função típica.  <BR><BR>II.  Os 
atos discricionários praticados na esfera do  Poder Executivo poderão ser objeto 
de anulação no  âmbito desse mesmo Poder, em decorrência de  vício insanável, 
portanto de ilegalidade, mas caberá  também ao Poder Judiciário, em sua função 
típica,   a anulação, desde que provocado.  <BR><BR>III.  Os atos vinculados 
praticados na esfera do Poder  Executivo, aqueles que devem total observância ao 
 respectivo texto legal, não poderão, por esta mesma razão, serem alvo de 
anulação por esse Poder,  mas tão somente pelo Poder Judiciário, em sua  função 
típica. <BR><BR>Nas hipóteses acima descritas, está correto o que consta  APENAS 
em <BR></P>
<DIV id="area-resolucao">
<P>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="A" 
  type="radio">            a) III.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="B" 
  type="radio">            b) I e III.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="C" 
  type="radio">            c) I e II.           </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="D" 
  type="radio">            d) I.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="E" 
  type="radio">            e) II e III.           </LI></UL>
<P></P></DIV><INPUT style="margin: 0px 20px 15px; width: 80px; height: 30px;" class="botao-cinza botao" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" value="Resolver" type="button"></FORM>
<DIV class="clear"></DIV>
<DIV id="resposta-231443"><IMG style="display: none;" id="img-loading-ajax-questoes-231443" 
alt="Carregando ..." src="arquivos/ajax-loader-2.gif">
<DIV id="box-comentarios-231443"></DIV>
<DIV id="box-ajax-231443"></DIV><!-- Area de links --><BR>
<DIV style="font-size: 0.95em;" id="area-links"><!-- ADICIONAR COMENTÁRIO --><A 
title=" Adicionar Comentário" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-add-comentario-p.png"> 
Adicionar Comentário</A>      &nbsp;&nbsp;  <!-- VISUALIZAR COMENTÁRIOS --><A 
title=" Comentarios (8)" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-comentarios-p.png"> 
Comentarios (8)</A>        &nbsp;&nbsp;                              <A title=" Estatisticas" 
onclick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Estatística" src="arquivos/icon-estatisticas-p.png"> 
Estatisticas</A><A title=" Cadernos" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Cadernos de Questões" src="arquivos/icon-cadernos-p.png"> 
Cadernos</A>    &nbsp;&nbsp;  <A title="Adicione marcadores à esta questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f7414700-82?tab=3"><IMG 
style="vertical-align: middle;" alt="Ícone dos marcadores" src="arquivos/icon-tags-p.png"> 
   Marcadores  </A>&nbsp;&nbsp;  <A title="Faça suas anotações sobre essa questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f7414700-82?tab=4"><IMG 
style="vertical-align: middle;" alt="Ícone anotações" src="arquivos/icon-anotacoes-p.png"> 
   Anotações  </A>&nbsp;&nbsp;  </DIV></DIV>
<DIV class="clear"></DIV><BR>
<DIV class="separador"></DIV><BR><!-- contador de questões --><!-- cabeçalho contendo código e indíce da questão -->
<DIV class="cabecalho-questao"><SPAN style="font-weight: bold; margin-right: 5px;">5</SPAN>• 
       <A style="font-weight: bold;" href="http://www.simuladosdeconcursos.com.br/questoes/f8d6f55e-82">Q231444
	    </A><IMG style="display: none;" id="ico-que-res-231444" alt="Questão resolvida por você." 
src="arquivos/icon-check.png"><A 
title="&nbsp;&nbsp;" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#">&nbsp;&nbsp;<IMG 
alt="Imprimir" src="arquivos/icon-printer.png"></A><!-- Helper que exibe imagem indicando se o usuário acertou ou errou a questão --><!-- classificação -->
<DIV style="margin: 5px 20px; text-align: justify; font-size: 0.85em;">
<DIV class="separador"></DIV>
<SCRIPT>
  function revisada(question_id) {
    if ($('#revisada' + question_id).is(':checked')) {
      $.ajax( {
                url: '/revisar/'+ question_id +'/1',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    } else {
      $.ajax( {
                url: '/revisar/'+ question_id +'/0',
                beforeSend: function() { $('#loader-revisar'+question_id).show(); },
                complete: function() { $('#loader-revisar'+question_id).hide(); }
              }
            );
    }
  }
</SCRIPT>
  Prova:                                          <A href="http://www.simuladosdeconcursos.com.br/provas/fcc-2012-trf-2a-regiao-analista-judiciario-area-administrativa">FCC 
- 2012 - TRF - 2ª REGIÃO - Analista Judiciário - Área Administrativa</A>
<DIV style="margin-top: 5px;" id="barra_classificacao231444">      Disciplina:   
               <A href="http://www.simuladosdeconcursos.com.br/pesquisar/disciplina/direito-administrativo">Direito 
Administrativo</A>                                                               
                                           |      Assuntos:                      
                                                  <A title="Veja mais questões em Processo Administrativo Federal." 
href="http://www.simuladosdeconcursos.com.br/pesquisar?ss=12&amp;di=2">Processo 
Administrativo Federal</A>;&nbsp;                  <IMG style="vertical-align: baseline; display: none;" 
id="add-classificacao-231444" alt="Carregando ..." src="arquivos/ajax-loader.gif">
</DIV>
<DIV style="margin-top: 10px;" id="classificacao_atualizada231444"></DIV>
<DIV style="margin-top: 10px;" id="inline231444"></DIV>
<DIV class="separador"></DIV></DIV></DIV>
<FORM id="frm-resolver-questao-231444" onSubmit="jQuery.ajax({beforeSend:function(request){$('#img-loading-ajax-questoes-231444').show();}, complete:function(request){$('#img-loading-ajax-questoes-231444').hide(), $('#area-links').show()}, data:jQuery.param(jQuery(this).serializeArray()) + '&amp;authenticity_token=' + encodeURIComponent('e094913da44e846b6a6b362b9a6d5f3aae7f269e'), success:function(request){jQuery('#resposta-231444').html(request);}, type:'post', url:'/questoes/resolver/f8d6f55e-82'}); return false;" 
method="post" action="/questoes/resolver/f8d6f55e-82" autocomplete="off">
<DIV style="margin: 0px; padding: 0px;"><INPUT name="authenticity_token" value="e094913da44e846b6a6b362b9a6d5f3aae7f269e" 
type="hidden"></DIV><!-- texto relacionado, enunciado e alternativas -->
<P>  Nos processos administrativos no âmbito da Administração Pública Federal, o 
interessado poderá desistir do  pedido formulado,  <BR></P>
<DIV id="area-resolucao">
<P>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="A" 
  type="radio">            a) parcialmente apenas ou, ainda, renunciar a 
  quaisquer direitos, mediante manifestação escrita ou  verbal.           
</LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="B" 
  type="radio">            b)  total ou parcialmente, mediante manifestação 
  escrita, vedada a renúncia a direitos disponíveis.           </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="C" 
  type="radio">            c)  totalmente apenas ou, ainda, renunciar a direitos 
   indisponíveis, mediante manifestação escrita.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="D" 
  type="radio">            d) total ou parcialmente ou, ainda, renunciar a 
  direitos  disponíveis, mediante manifestação escrita.            </LI></UL>
<UL>
  <LI><INPUT style="visibility: visible;" id="resposta" name="resposta" value="E" 
  type="radio">            e)  totalmente ou, ainda, renunciar a direitos 
  indisponíveis, mediante manifestação escrita ou verbal.           </LI></UL>
<P></P></DIV><INPUT style="margin: 0px 20px 15px; width: 80px; height: 30px;" class="botao-cinza botao" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" value="Resolver" type="button"></FORM>
<DIV class="clear"></DIV>
<DIV id="resposta-231444"><IMG style="display: none;" id="img-loading-ajax-questoes-231444" 
alt="Carregando ..." src="arquivos/ajax-loader-2.gif">
<DIV id="box-comentarios-231444"></DIV>
<DIV id="box-ajax-231444"></DIV><!-- Area de links --><BR>
<DIV style="font-size: 0.95em;" id="area-links"><!-- ADICIONAR COMENTÁRIO --><A 
title=" Adicionar Comentário" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-add-comentario-p.png"> 
Adicionar Comentário</A>      &nbsp;&nbsp;  <!-- VISUALIZAR COMENTÁRIOS --><A 
title=" Comentarios (3)" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos comentários" src="arquivos/icon-comentarios-p.png"> 
Comentarios (3)</A>        &nbsp;&nbsp;                              <A title=" Estatisticas" 
onclick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Estatística" src="arquivos/icon-estatisticas-p.png"> 
Estatisticas</A><A title=" Cadernos" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="vertical-align: middle;" alt="Ícone dos Cadernos de Questões" src="arquivos/icon-cadernos-p.png"> 
Cadernos</A>    &nbsp;&nbsp;  <A title="Adicione marcadores à esta questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f8d6f55e-82?tab=3"><IMG 
style="vertical-align: middle;" alt="Ícone dos marcadores" src="arquivos/icon-tags-p.png"> 
   Marcadores  </A>&nbsp;&nbsp;  <A title="Faça suas anotações sobre essa questão." 
href="http://www.simuladosdeconcursos.com.br/questoes/f8d6f55e-82?tab=4"><IMG 
style="vertical-align: middle;" alt="Ícone anotações" src="arquivos/icon-anotacoes-p.png"> 
   Anotações  </A>&nbsp;&nbsp;  </DIV></DIV>
<DIV class="clear"></DIV><BR>
<DIV class="separador"></DIV><BR><!-- contador de questões --></DIV>
<DIV style="margin: 10px; text-align: center;"><A title="" onClick="alert('Para utilizar essa funcionalidade você precisa estar logado.<br />Faça o seu <a href=/login>login</a> ou <a href=/signup>crie uma conta de acesso agora mesmo</a>. <b>É grátis!</b>');" 
href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2#"><IMG 
style="padding: 0px 8px; vertical-align: middle;" alt="Imprimir" src="arquivos/icon-printer.png"></A></DIV>
<DIV id="paginate">
<DIV class="pagination" previus_label="Anterior"><SPAN class="disabled prev_page">« 
Previous</SPAN> <SPAN class="current">1</SPAN> <A href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2?di=2&amp;page=2&amp;pp=" 
rel="next">2</A> <A class="next_page" href="http://www.simuladosdeconcursos.com.br/pesquisar/data/2012-04-10/2?di=2&amp;page=2&amp;pp=" 
rel="next">Próximo</A></DIV></DIV></DIV>
<SCRIPT type="text/javascript">
  $(function(){
 
    $('#btn-resolver-questao-231440').click(function(){
      var boolValid = false;
      $('#frm-resolver-questao-231440 input:radio').each(function() {
        if ($(this).is(':checked') ) {
          boolValid = true;
        }
      });
      if (!boolValid) {
        alert('Selecione uma alternativa.');
        return false;'         '
      }
    });
 
    $('#btn-resolver-questao-231441').click(function(){
      var boolValid = false;
      $('#frm-resolver-questao-231441 input:radio').each(function() {
        if ($(this).is(':checked') ) {
          boolValid = true;
        }
      });
      if (!boolValid) {
        alert('Selecione uma alternativa.');
        return false;'         '
      }
    });
 
    $('#btn-resolver-questao-231442').click(function(){
      var boolValid = false;
      $('#frm-resolver-questao-231442 input:radio').each(function() {
        if ($(this).is(':checked') ) {
          boolValid = true;
        }
      });
      if (!boolValid) {
        alert('Selecione uma alternativa.');
        return false;'         '
      }
    });
 
    $('#btn-resolver-questao-231443').click(function(){
      var boolValid = false;
      $('#frm-resolver-questao-231443 input:radio').each(function() {
        if ($(this).is(':checked') ) {
          boolValid = true;
        }
      });
      if (!boolValid) {
        alert('Selecione uma alternativa.');
        return false;'         '
      }
    });
 
    $('#btn-resolver-questao-231444').click(function(){
      var boolValid = false;
      $('#frm-resolver-questao-231444 input:radio').each(function() {
        if ($(this).is(':checked') ) {
          boolValid = true;
        }
      });
      if (!boolValid) {
        alert('Selecione uma alternativa.');
        return false;'         '
      }
    });
});
</SCRIPT>

<SCRIPT type="text/javascript">
  $(function(){
    $('#bt').click(function() {
        $('#dt').val('');
    });
  });
</SCRIPT>

<SCRIPT type="text/javascript">
  $(function(){
    $('#qpp').attr("disabled", true);
  });
</SCRIPT>
<!--Início Div Rodapé -->
<DIV id="rodape">
<DIV class="rodape-coluna">
<H2>Questões de Concursos:</H2>
<UL>
  <LI><A title="Crie uma conta de acesso." href="http://www.simuladosdeconcursos.com.br/signup">Crie 
  sua conta!</A></LI>
  <LI><A title="Faça o seu login no site." href="http://www.simuladosdeconcursos.com.br/login">Login</A></LI>
  <LI><A title="Conheça o programa de pontos do QC." href="http://www.simuladosdeconcursos.com.br/pontos">QC 
  Pontos</A></LI>
  <LI><A title="Dúvidas frequentes sobre o site." href="http://www.simuladosdeconcursos.com.br/faq">Dúvidas 
  Frequentes</A></LI>
  <LI><A title="Termos de uso dos serviços do site." href="http://www.simuladosdeconcursos.com.br/termos">Termos 
  de Uso</A></LI>
  <LI><A title="Política de Privacidade do site." href="http://www.simuladosdeconcursos.com.br/privacidade">Política 
  de Privacidade</A></LI>
  <LI><A title="Invista nessa ideia e seja um colaborador." href="http://www.simuladosdeconcursos.com.br/invista"><SPAN 
  style="color: rgb(233, 11, 1);">Invista</SPAN></A></LI>
  <LI><A title="Elogios, dúvidas, críticas e sugestões." href="http://www.simuladosdeconcursos.com.br/tickets/info">Atendimento</A></LI></UL></DIV>
<DIV class="rodape-coluna">
<H2>Questões por:</H2>
<UL>
  <LI><A title="Questões por área de formação: Direito, Letras, Engenharia, Administração etc." 
  href="http://www.simuladosdeconcursos.com.br/por/formacao">Área de 
  formação</A></LI>
  <LI><A title="Questões por área de atuação: Fiscal, Bancária, Militar, Judiciária, etc." 
  href="http://www.simuladosdeconcursos.com.br/por/atuacao">Área de 
  atuação</A></LI>
  <LI><A title="Questões por assunto: Crase, Direitos Sociais, Atos Administrativos etc." 
  href="http://www.simuladosdeconcursos.com.br/por/assunto">Assunto</A></LI>
  <LI><A title="Questões por banca: ESAF, CESPE, FCC, FEC, CESGRANRIO, etc." 
  href="http://www.simuladosdeconcursos.com.br/por/banca">Banca</A></LI>
  <LI><A title="Questões por cargo: Analista Judiciário, Perito Criminal, Analista de Controle Externo, Auditor Fiscal, etc." 
  href="http://www.simuladosdeconcursos.com.br/por/cargo">Cargo</A></LI>
  <LI><A title="Questões por disciplina: Português, Informática, Direito Constitucional, Administração Pública, etc." 
  href="http://www.simuladosdeconcursos.com.br/por/disciplina">Disciplina</A></LI>
  <LI><A title="Questões por instituições: Banco Central, Receita Federal, ANVISA, ANAC, TRF, TRT, etc." 
  href="http://www.simuladosdeconcursos.com.br/por/instituicao">Instituição</A></LI>
  <LI><A title="Questões por provas." href="http://www.simuladosdeconcursos.com.br/por/prova">Prova</A></LI>
  <LI><A title="Últimas questões adicionadas no site." href="http://www.simuladosdeconcursos.com.br/ultimas">Últimas 
  adicionadas</A></LI></UL></DIV>
<DIV class="rodape-coluna">
<H2>Canais:</H2>
<UL>
  <LI><A title="Concursos Públicos" href="http://www.simuladosdeconcursos.com.br/concursos">Concursos</A></LI>
  <LI><A title="Provas" 
  href="http://www.simuladosdeconcursos.com.br/provas">Provas</A></LI>
  <LI><A title="Questões" 
  href="http://www.simuladosdeconcursos.com.br/questoes">Questões</A></LI>
  <LI><A title="Disciplinas" href="http://www.simuladosdeconcursos.com.br/disciplinas">Disciplinas</A></LI>
  <LI><A title="Bancas/Organizadoras" href="http://www.simuladosdeconcursos.com.br/bancas">Bancas</A></LI>
  <LI><A title="Cargos Públicos" href="http://www.simuladosdeconcursos.com.br/cargos">Cargos</A></LI>
  <LI><A title="Área de Formação" href="http://www.simuladosdeconcursos.com.br/formacao">Áreas 
  de Formação</A></LI>
  <LI><A title="Órgãos/Instituições" href="http://www.simuladosdeconcursos.com.br/institutos">Instituições</A></LI>
  <LI><A title="Área de Atuação" href="http://www.simuladosdeconcursos.com.br/atuacao">Áreas 
  de Atuação</A></LI></UL></DIV>
<DIV class="rodape-coluna">
<H2>Mídias Sociais:</H2>
<UL>
  <LI><A title="Saiba mais sobre o QC no Facebook!" href="http://www.facebook.com/simuladosdeconcursos" 
  target="_blank">Facebook</A></LI>
  <LI><A title="Saiba mais sobre o QC no Twitter!" href="http://twitter.com/qconcursos" 
  target="_blank">Twitter (@qconcursos)</A></LI>
  <LI><A title="Saiba mais sobre o QC no Orkut!" href="http://www.orkut.com.br/Main#Community?cmm=45743886" 
  target="_blank">Orkut</A></LI>
  <LI><A title="Saiba mais sobre o QC na Mídia!" href="http://www.simuladosdeconcursos.com.br/midia">QC 
  na mídia</A></LI></UL></DIV>
<DIV class="rodape-coluna">
<H2>Outros:</H2>
<UL>
  <LI><A title="Fórum" 
  href="http://www.simuladosdeconcursos.com.br/forum">Fóruns</A></LI>
  <LI><A title="Conheça a Equipe do QC" href="http://www.simuladosdeconcursos.com.br/equipe">Equipe 
  QC</A></LI>
  <LI><A title="Conheça os Colaboradores Oficiais" href="http://www.simuladosdeconcursos.com.br/colaboradores">Colaboradores 
  Oficiais</A></LI>
  <LI><A title="Saiba como funciona o RSS" href="http://www.simuladosdeconcursos.com.br/rss/help">RSS 
  - O que é isso?</A></LI></UL></DIV>
<DIV class="clear"></DIV></DIV>
<P></P></DIV></DIV><!-- Creditos -->
<DIV id="creditos">
<DIV class="copyrigth">Copyright © 2007-2012 Questões de Concursos. Todos os 
direitos reservados.</DIV></DIV>
<SCRIPT type="text/javascript">
      var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
      document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
      </SCRIPT>

<SCRIPT type="text/javascript">
      try {
      var pageTracker = _gat._getTracker("UA-3257416-1");
      pageTracker._trackPageview();
      } catch(err) {}
    </SCRIPT>
</BODY></HTML>
