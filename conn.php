<?php
 session_start();
 if(isset($_POST['btn-entrar'])){
	require_once('conectar_bd.php');
	$erros = array();
	$login = mysqli_escape_string($conexao, $_POST['login']);
	$senha = mysqli_escape_string($conexao, $_POST['senha']);
	$senha_segura = password_hash($senha, PASSWORD_DEFAULT);

	if(empty($login) or empty($senha)){
		$erros[] = "<li>O Campo login/senha precisa ser preenchido </li>";
		print_r($erros);
	}
	else{
		$sql = "SELECT * FROM usuarios WHERE LOGIN = '$login'";
		$resultado = mysqli_query($conexao, $sql);
//------------- bloco de testes ----------------
		if(mysqli_num_rows($resultado) == 1){
			$row = mysqli_fetch_row($resultado);
			$senha_banco = $row[2];
			//echo $senha_banco;
			if(password_verify($senha, $senha_banco)){
				//echo "senha ok";
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $row[0];
				$_SESSION['usuario'] = ucfirst ($row[1]);
				header('Location: home.php');
			}
			else{
				echo "Erro de senha";
				echo '<br><a href="index.html">Voltar</a>';
			}
		}else
			echo "erro na verificação para este login";
//------------- fim do bloco de testes ----------------
	}
 mysqli_close($conexao);
 }
?>
