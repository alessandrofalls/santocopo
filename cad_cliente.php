<?php
 session_start();
if(!isset($_SESSION['logado'])){
	header('Location: index.html');
}else{
	try{

		$nome = $_POST['nomeCompleto'];
		$celular = $_POST['telefone_celular'];
		$telefone_fixo = $_POST['telefone_fixo'];
		$cep = $_POST['cep'];
		$logradouro = $_POST['logradouro'];
		$bairro = $_POST['bairro'];
		$complemento = $_POST['complemento'];
		$cidade = $_POST['cidade'];
		$uf = $_POST['uf'];
		$data_nascimento = $_POST['nascimento'];
		$email = $_POST['email'];

		require_once('conectar_bd.php');
		$sql = "INSERT INTO clientes (nome,celular,telefone_fixo,cep,logradouro,bairro,complemento,cidade,uf,data_nascimento,email) VALUES";
		$sql = $sql." ('$nome','$celular','$telefone_fixo','$cep','$logradouro','$bairro','$complemento','$cidade','$uf','$data_nascimento','$email')";
		$resultado = mysqli_query($conexao, $sql);
		//echo $sql;

		/*$sql = "SELECT * FROM clientes ORDER BY id_cliente DESC";
		$resultado = mysqli_query($conexao, $sql);
		$row = mysqli_fetch_array($resultado)


		<p><pre><?php var_dump($row); ?></pre></p>
		*/
    echo $sql;
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	finally{
		$mysqli->close($conexao);
    header('Location:clientes.php');
	}
	//var_dump($row);

	}


?>
