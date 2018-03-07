<?
$corre=$_GET["chavedeseguranca"];
$sub=$_GET["subcategoria"];

if (strlen($corre)>131){
echo "Mysql e PhpInjection não são permitidos, este site está protegido";	
exit();
}

if (!is_numeric($sub)){
echo "Mysql e PhpInjection não são permitidos, este site está protegido";	
exit();
}

$corre=substr($corre,0,strlen($corre)-1);
$pedaco=explode("_",$corre);

function remodupli($str){
$word_array = preg_split('/[\s?:;,.]+/', $str, -1, PREG_SPLIT_NO_EMPTY);
$unique_word_array = array_unique($word_array);
$unique_str = implode(' ',$unique_word_array);
return $unique_str;
}

//echo $sub;
//exit();

include ("abreconexao.php");

$acertou=0;

$sq="select cate.nome as categoria,sub.nome as subcategoria from testes_categorias as cate left join testes_subcategorias as sub on cate.codigo=sub.codcate where sub.codigo='$sub'";
$resultad=mysql_query($sq) or die(mysql_error()); 
$li22=mysql_fetch_array($resultad);
$categoria=utf8_encode($li22["categoria"]);
$subcategoria=utf8_encode($li22["subcategoria"]);

$titulocima=remodupli("$categoria - $subcategoria");

?>
<table width="100%" cellspacing="1" cellpadding="2">
  <tr bgcolor="#F8F8F8">
    <td colspan="3" class="disciplina"><b><?=$titulocima?></b></td>
  </tr>
</table>
<?
$naovai="";

foreach($pedaco as $name => $valor) {
$cuica=explode("-",$valor);
$codquestao=$cuica[1];
$escolhida=substr($cuica[0],strlen($cuica[0])-1,1);
$numero_questao=preg_replace("/[^0-9]/", "", $cuica[0]);

$resultado.= $name . '=' . $valor . '<br>';

$que=$numero_questao;

$sq="select codigo,questao,correta from testes_questoes where codigo='$codquestao'";
$resultad=mysql_query($sq) or die(mysql_error()); 

$li22=mysql_fetch_array($resultad);

$codques=$li22["codigo"];
$acorreta=$li22["correta"];
$questao=utf8_encode($li22["questao"]);

$status=0;  // Se for 0=errou,   1=acertou,    2=naorespondeu
$imagem="errou.png";
$titulo="Que pena você errou esta questão";

if ($escolhida=="z"){
$imagem="naorespondeu.png";
$titulo="Você não respondeu esta questão, na dúvida sempre use o chute";
$status=2;
}

if ($escolhida==$acorreta){
$imagem="correta.png";
$status=1;
$titulo="Parabéns você acertou esta questão";
}


?>
<table width="100%" cellspacing="1" cellpadding="2">
  <tr bgcolor="#F8F8F8">
    <td colspan="3" class="codques">&nbsp;Código da Questão: <?=$codques?></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td height="5px" colspan="3" align="right" valign="top"></td>
  </tr>
  <tr bgcolor="#E7DBFF">
    <td valign="top" align="right" class="numeroquestao" style="padding-top:4px;padding-left:5px;"><strong><?=$que?>)</strong></td>
    <td colspan="2" valign="top" style="padding-top:5px;padding-bottom:5px;" class="questao"><img src="images/<?=$imagem?>" title="<?=$titulo?>" /><br /><?=$questao?></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" height="5px;" colspan="3" valign="top"></td>
  </tr>
  

<?
$sq2="select codigo,nome,letra from testes_alternativas where codquestao='$codques' order by letra";
$resultad=mysql_query($sq2) or die(mysql_error()); 

while ($li22=mysql_fetch_array($resultad)){
$co++;
$letra=$li22["letra"];
$coda=$li22["codigo"];
$alternativa=utf8_encode($li22["nome"]);

if ($co==2){$co=0;$cor="#F7FAFB";}else{$cor="#F0F0F0";}
//$coloca="<img src='images/esteaqui.png' />";
$coloca="&nbsp;";
$ajuste="";

$wide="20";

if ($status==0){
if ($letra==$escolhida){
$wide=30;
//$coloca="<img src='images/errou.png' />";
$letra="<font color='#FF0000'><b>$letra)</b></font>";
$alternativa="<font color='#FF0000'>$alternativa</font>";
$ajuste="align='right'";
}
if ($letra==$acorreta){
$coloca="<img src='images/esteaqui.png' title='Esta aqui é a alternativa correta, não a alternativa: ($escolhida) que você escolheu' />";
$letra="<font color='#009900'><b>$letra)</b></font>";
$alternativa="<font color='#009900'>$alternativa</font>";
$ajuste="style='padding-top:7px;'";
}
}

if ($status==1){
if ($letra==$escolhida){
$acertou+=10;
$letra="<font color='#009900'><b>$letra)</b></font>";
$alternativa="<font color='#009900'>$alternativa</font>";
}
}


if ($status==2){
if ($letra==$acorreta){
$coloca="<img src='images/esteaqui.png' title='Esta aqui é a alternativa correta, na dúvida sempre utilize o chute, faça a sorte acontecer' />";
$letra="<font color='#009900'><b>$letra)</b></font>";
$alternativa="<font color='#009900'>$alternativa</font>";
$ajuste="style='padding-top:7px;'";
}
}

if (strlen($letra)==1){$letra="$letra".")";}

//style="padding-top:5px;"
?>
<tr id="choco<?=$coda?>">
<td width="20" valign="top" style="padding-top:8px;padding-left:5px"><?=$coloca?></td>
<td width="17" valign="top" style="padding-top:4px;" class="alterletra"><strong><?=$letra?></strong></td>
<td width="1583" class="alter"><?=$alternativa?></td>
</tr>
<?
}
?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#EAF5FF">
  <tr>
    <td height="2px" bgcolor="#EAF5FF"></td>
  </tr>
</table>
<?
}

if ($acertou==0){$imagem="avalia1";}
if ($acertou>=10 && $acertou<=40){$imagem="avalia2";}
if ($acertou>40 && $acertou<=70){$imagem="avalia3";}
if ($acertou>70 && $acertou<=90){$imagem="avalia4";}
if ($acertou>90 && $acertou<=100){$imagem="avalia5";}

?>

<table width="100%" cellspacing="0" cellpadding="3" bgcolor="#CCCCCC" border="0" style="border-style:dashed;border:1px;">
<tr bgcolor="#F2F2F2">
<td width="3%" id="corrigeteste" style="padding-left:10px;"><img src="images/<?=$imagem?>.png" width="40" height="40" /></td>
<td width="8%" id="corrigeteste" style="padding-left:8px;"><font color="#FF0000" size="+2"><?=$acertou?>%</font></td>
<td width="89%">
<table width="470" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><select name="outroteste" style="FONT-SIZE: 9px; FONT-FAMILY: verdana" id="outro">
      <?
$sq="select upper(cate.nome) as categoria,upper(sub.nome) as sub,sub.codigo from testes_categorias as cate left join testes_subcategorias as sub on cate.codigo=sub.codcate order by cate.nome,sub.nome";
$resultad=mysql_query($sq) or die(mysql_error()); 

while ($li22=mysql_fetch_array($resultad))
{
$codsub=$li22["codigo"];
$catenome=utf8_encode(strtoupper($li22["categoria"]));
$subnome=utf8_encode(strtoupper($li22["sub"]));
$catenome=strtoupper($catenome);
$subnome=strtoupper($subnome);
if ($codsub==$sub){$para="selected";}else{$para="";};

?>
<option value="<? echo $codsub; ?>" <?=$para?> > <? echo remodupli("$catenome - $subnome"); ?></option>
<?
}
?>
</select></td>
    <td align="right" id="sonabu"><a href="javascript:geraoutro();"><img src="images/geraroutro.jpg" width="116" height="15" border="0" title="Clique aqui para gerar outro teste" /></a></td>
  </tr>
</table>
</td>    
</tr>
</table>
<br />
<Br />
