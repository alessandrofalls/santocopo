<!DOCTYPE html>
<html>
<head>
<title>Santo Copo</title>
<meta charset="utf-8">
<script src="js/jquery-3.4.0.min.js"></script>
</head>
<body>
 <?php
 session_start();
if(!isset($_SESSION['logado'])){
	header('Location: index.html');
}else{
 echo "Olá ".$_SESSION['usuario']; 
}
?>
<p><a href='clientes.php'>Clientes</a></p>
<p><a href='pedido_avulso.php'>Pedido Avulso</a></p>

<p><a href='sair.php'>Sair</a> </p>
</body>
</html> 