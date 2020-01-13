<?php
	// login="root", senha "", bd="bd_reg"
	$conexao = new PDO("mysql:host=localhost; dbname=bd_reg","root","");
	$conexao->exec('SET CHARACTER SET utf8');
?>