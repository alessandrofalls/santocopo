<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Santo Copo</title>
  <meta http-equiv="Content-Type" content="text/html" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
# session_start();
if(!isset($_SESSION['logado'])){
	header('Location: index.html');
}else{
	require_once('navbar.html');
	require_once('conectar_bd.php');
	//$sql = "SELECT * FROM pedidos";
	//$resultado = mysqli_query($conexao, $sql);
	//$row = mysqli_fetch_array($resultado);
?>
<div class="container">

  <div>

<form class="border border-light p-5" action="cad_pedido.php" method="post">

  <p class="h4 mb-4 text-center">Pedido avulso</p>

  <input type="text" name="nomeCompleto" class="form-control" placeholder="*Nome Completo" required>

  <input type="text" name="logradouro" class="form-control" placeholder="*Endereço" required />

	<input type="text" name="bairro" class="form-control" placeholder="Bairro" />

	<input type="text" name="complemento" class="form-control" placeholder="Complemento" />

	<input type="text" name="cep" class="form-control" placeholder="CEP" />

	<input type="text" name="cidade" class="form-control" placeholder="*Cidade" value="Maringá" required />

	<input type="text" name="uf" class="form-control" placeholder="*UF" value="PR" required />

	<input type="date" name="nascimento" class="form-control" placeholder="Nascimento"  />

  <input type="text" name="telefone_fixo" class="form-control" placeholder="Telefone Fixo"  />

	<input type="text" name="telefone_celular" class="form-control" placeholder="*Telefone Celular" required />

    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail" />

    <button class="btn btn-info my-4 btn-block" type="submit" name="btn-cad_cliente">Cadastrar</button>

</form>

  <p><?php echo '<pre>';
  while($row = mysqli_fetch_array($resultado)) {
      print_r($row);
  }
  echo '</pre>';
  //echo '<pre>'; print_r( array_values( $row )); echo '</pre>'; ?></p>
  </div>
</div>
<?php } //fim do else linha 16 após validação da sessão. ?>
</body>
</html>
