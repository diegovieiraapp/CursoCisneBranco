<?
/*
$time = microtime(); 
$time = explode(' ', $time); 
$time = $time[1] + $time[0]; 
$begintime = $time; 
*/

$sub=$_GET["subcategoria"];

if (!is_numeric($sub)){
echo "Mysql e PhpInjection não são permitidos, este site está protegido";	
exit();
}

include ("abreconexao.php");

function remodupli($str){
$word_array = preg_split('/[\s?:;,.]+/', $str, -1, PREG_SPLIT_NO_EMPTY);
$unique_word_array = array_unique($word_array);
$unique_str = implode(' ',$unique_word_array);
return $unique_str;
}


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

for ($que=1;$que<=10;$que++)
{


$sq="select codigo,questao from testes_questoes where subcate='$sub' $naovai order by rand() limit 13";
$resultad=mysql_query($sq) or die(mysql_error()); 
$li22=mysql_fetch_array($resultad);

$codques=$li22["codigo"];
$questao=utf8_encode($li22["questao"]);
$naovai.="and codigo!='$codques' "
?>
<table width="100%" cellspacing="1" cellpadding="2">
  <tr bgcolor="#F8F8F8">
    <td colspan="3" class="codques">&nbsp;Questão Nº: <?=$codques?><input type="hidden" value="<?=$codques?>" name="que<?=$que?>" id="que<?=$que?>" /> - <strong><font color="#00A47E"><?=$titulocima?></font></strong></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td height="5px" colspan="3" align="right" valign="top"></td>
  </tr>
  <tr bgcolor="#E7DBFF">
    <td valign="top" align="right" class="numeroquestao" style="padding-top:4px;padding-left:5px;"><strong><?=$que?>)</strong></td>
    <td colspan="2" valign="top" style="padding-top:5px;padding-bottom:5px;text-align: justify;" class="questao"><?=$questao?></td>
  </tr>
  <tr>
    <td bgcolor="#ffffff" height="5px;" colspan="3" valign="top"></td>
  </tr>

<?
$sq2="select codigo,nome,letra from testes_alternativas where codquestao='$codques' order by letra";
$resultad=mysql_query($sq2) or die(mysql_error()); 
$co2=0;
while ($li22=mysql_fetch_array($resultad)){
$co2++;
$letra=$li22["letra"];
$coda=$li22["codigo"];
$alternativa=utf8_encode($li22["nome"]);



?>
<tr id="choco<?=$coda?>" onclick="javascript:entra('q<?=$que?><?=$letra?>','choco<?=$coda?>',<?=$que?>)" style="cursor:pointer; cursor:hand;text-align: justify;" onmouseover="javascript:corsim('choco<?=$coda?>',<?=$que?>);" onmouseout="javascript:cornao('choco<?=$coda?>',<?=$que?>);">
<td width="20" valign="top" style="padding-top:8px;" align="center"><input type="radio" value="q<?=$que?><?=$letra?>-<?=$codques?>" name="q<?=$que?>" id="q<?=$que?><?=$letra?>" /></td>
<td width="17" valign="top" style="padding-top:4px;" class="alterletra"><strong><?=$letra?>)</strong></td>
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
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="18%" id="corrigeteste" align="center"><a href="javascript:corrigir('<?=$sub?>');"><img src="images/corrigir.jpg" width="75" height="18" border="0" title="Corrigir Simulado" /></a></td>
<td width="82%" align="center"><table width="490" border="0" cellspacing="0" cellpadding="0">
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
</table></td>    
</tr>
</table>
<br />
<Br />
<?
/*
$time = microtime(); 
$time = explode(" ", $time); 
$time = $time[1] + $time[0]; 
$endtime = $time; 
$totaltime = ($endtime - $begintime); 

echo "<Br><br>".$totaltime."<br><Br>";
*/
?>