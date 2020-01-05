<?php
	// $conexao = new PDO("mysql:host=localhost; dbname=bd_reg","root","");
	// $conexao->exec('SET CHARACTER SET utf8');
	
	// $select = $conexao->prepare("INSERT INTO `registro` (`CPF`, `NOME`, `DT_NASC`, `EMAIL`, `TEL`, `ENDERECO`, `UF`, `CIDADE`) VALUES ('".$_POST['CPF']."', '".$_POST['nome']."', '".$_POST['dt_nasc']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['rua']."', '".$_POST['estados']."', '".$_POST['cidades']."')");
	// $select->execute();
	// $fetchAll = $select->fetchAll();
	// foreach($fetchAll as $cidades){
		// echo '<option value="'.$cidades['id'].'">'.$cidades['nome'].'</option>';
	// }
	// $sql = "INSERT INTO `registro` (`CPF`, `NOME`, `DT_NASC`, `EMAIL`, `TEL`, `ENDERECO`, `UF`, `CIDADE`) VALUES ('".$_POST['CPF']."', '".$_POST['nome']."', '".$_POST['dt_nasc']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['rua']."', '".$_POST['estados']."', '".$_POST['cidades']."')";
	// if (mysqli_query($conexao, $sql)) {
		// echo "New record created successfully";
	// } else {
		// echo  "<script>alert('a, '".$_POST['nome']."', '".$_POST['dt_nasc']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['rua']."', '".$_POST['estados']."', '".$_POST['cidades']."');</script>";
		// echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
	// }
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bd_reg";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO `registro` (`CPF`, `NOME`, `DT_NASC`, `EMAIL`, `TEL`, `ENDERECO`, `UF`, `CIDADE`) VALUES ('".$_POST['CPF']."', '".$_POST['nome']."', '".$_POST['dt_nasc']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['rua']."', '".$_POST['estados']."', '".$_POST['cidades']."')";

	if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
	
	
	header("Location: index.php");
?>
