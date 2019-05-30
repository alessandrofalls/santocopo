<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Santo Copo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
#session_start();
if(!isset($_SESSION['logado'])){
	header('Location: index.html');
}else{
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php">Santo Copo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Início</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pedidos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Avulso</a></li>
            <li><a href="#">Personalizado</a></li>
          </ul>
        </li>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="#">Produtos</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Ajuda</a></li>
        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>
<?php } //fim do else linha 16 após validação da sessão. ?>
</body>
</html>
