<?php
	$conexao = new PDO("mysql:host=localhost; dbname=bd_reg","root","");
	$conexao->exec('SET CHARACTER SET utf8');
	
	echo '<option disabled selected hidden>cidade</option>';
	$select = $conexao->prepare("SELECT * FROM `cidades` WHERE `estados_id` = ".$_POST['id']);
	$select->execute();
	$fetchAll = $select->fetchAll();
	foreach($fetchAll as $cidades){
		echo '<option value="'.$cidades['id'].'">'.$cidades['nome'].'</option>';
	}
?>
