<?php
	if(isset($_POST['CPF'])){
		$UFc = $conexao->prepare("SELECT * FROM `registro` WHERE `CPF` LIKE '".$_POST['CPF']."'");
		$UFc->execute();
		$fetchAll = $UFc->fetchAll();
		$counter = 0;
		foreach($fetchAll as $UFs){
			$counter++;
		}
		if ($counter == 0){
			$select = $conexao->prepare("INSERT INTO `registro` (`CPF`, `NOME`, `DT_NASC`, `EMAIL`, `TEL`, `ENDERECO`, `UF`, `CIDADE`) VALUES ('".$_POST['CPF']."', '".$_POST['nome']."', '".$_POST['dt_nasc']."', '".$_POST['email']."', '".$_POST['tel']."', '".$_POST['rua']."', '".$_POST['estados']."', '".$_POST['cidades']."')");
			$select->execute();
			echo '<script> alert("registrado com sucesso"); </script>';
			
		}
		else{
			echo '<script> alert("CPF ja registrado"); </script>';
			$counter = 0;
		}
		
	
	}
?>
