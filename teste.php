<?php

$id = "62";
echo "ID Antes:".$id;
$tam_conta = strlen($id);
	while ($tam_conta < '6') {
		$id = '0'.$id;
		$tam_conta++;
	}
echo "<br>";
echo "ID Depois:".$id;
?>