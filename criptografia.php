<?php

$senha = "apaFPP010213";
$senha2 = "apa010213";


$senha_segura = password_hash($senha2, PASSWORD_DEFAULT);

echo $senha_segura;

/*if(password_verify($senha2, $senha_segura))
	echo "<br>senha ok";
else
	echo "senha errada";
*/

?>

<?php /*
$senha = “123456”;

$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

echo $senhaSegura;

if(password_verify($senha, $senha_db));
*/
?>
