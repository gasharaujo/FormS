<?php
	include 'bd.php';
	
	echo '<option disabled selected hidden>cidade</option>';
	$select = $conexao->prepare("SELECT * FROM `cidades` WHERE `estados_id` = ".$_POST['id']);
	$select->execute();
	$fetchAll = $select->fetchAll();
	foreach($fetchAll as $cidades){
		echo '<option value="'.$cidades['id'].'">'.$cidades['nome'].'</option>';
	}
?>
