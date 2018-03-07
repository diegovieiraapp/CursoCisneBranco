<?
$bd_host = "localhost";
$bd_user = "conect_simulado"; // Usuário do Banco de Dados
$bd_pass = "456e654E@!"; // Senha do Bando de Dados
$bd_bd = "conect_simulado"; // Nome do Banco de Dados
$conectar = mysql_connect($bd_host, $bd_user, $bd_pass) or die (mysql_error());
mysql_select_db($bd_bd, $conectar);
?>