<?php
//Conexão com o banco de dados
$servername = "127.0.0.1";
$username = "sto19";
$passwd = "Atf010712!";
$dbname = "santo";

$conexao = mysqli_connect($servername, $username, $passwd, $dbname);
if(mysqli_connect_error())
	echo "Falha ao conectar ao servidor: ".mysqli_connect_error();
/*else
	echo "Conexão OK";*/
?>
