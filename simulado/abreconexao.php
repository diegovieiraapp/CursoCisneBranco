<?php
$bd_host = "localhost";
$bd_user = "cursocis_simulado"; // Usuário do Banco de Dados
$bd_pass = "kikodiego123"; // Senha do Bando de Dados
$bd_bd = "cursocis_simulado"; // Nome do Banco de Dados
$conectar = mysql_connect($bd_host, $bd_user, $bd_pass) or die (mysql_error());
mysql_select_db($bd_bd, $conectar);
?>