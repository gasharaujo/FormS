<!DOCTYPE html>
<html>
	<head>
		<title> Formulario </title>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" href="css/css_geral.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<script src="js/jquary.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		
		<link rel="icon" href="assets/ic.png">
		<!-- Bootstrap-->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<?php
			$conexao = new PDO("mysql:host=localhost; dbname=bd_reg","root","");
			$conexao->exec('SET CHARACTER SET utf8');
		?>
		
		<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
			ul {
			  list-style-type: none;
			  margin: 0;
			  padding: 0;
			  overflow: hidden;
			}
			li {
			  float: left;
			}
			li a {
			  display: block;
			  color: black;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			}

			li a:hover:not(.active) {
			  background-color: gray;
			}
			.active {
			  color: orange;
			}
			
			.mySlides {display:none;}
		</style>
		
	</head>
	<body>
		<!-- cabeçario com logo 1 hora -->
		<div>
			<div class="sty-padding-16 sty-row-padding sty-half">
				<img src="assets/logo.png">
			</div>
			<ul class="sty-padding-16 sty-row-padding">
				<li><a class="active" href="#">Registro</a></li>
				<li><a href="lista.php">Lista</a></li>
			</ul>
		</div>
		<header class="sty-display-container sty-content" style="max-width:70%; height: 100%;">
			<img class="sty-image" src="assets/back1.png" style="min-width: 180%; position: relative; margin-left:-35%" >
			<div class="sty-padding-16 sty-row-padding sty-half">
				<div class="sty-display-left sty-padding sty-col l6 m8" style="max-width:40%; max-height:100% background: rgb(255,165,0); background: linear-gradient(180deg, rgba(255,165,0,1) 0%, rgba(204,81,81,1) 100%);">
					<div class="sty-container sty-white sty-border" style="border-radius: 25px; max-width:100%; max-height:">
						<div class="sty-container sty-white sty-justify sty-center">
							<h2><i class="fa fa-bed sty-margin-right"></i>Registro</h2>
						</div>
						<form action="reg.php" class="sty-row-padding" id="form"  method="post">
							
							<div class="sty-row-padding" style="margin:8px -16px;">
								<input class="form-control form-group" type="" placeholder="nome" name="nome" required>
								<input class="form-control form-group" type="" placeholder="CPF" name="CPF" required onkeypress="$(this).mask('000.000.000-00');">
								<input class="form-control form-group" type="date" placeholder="data Nacimento" name="dt_nasc" required>
								<input class="form-control form-group" type="email" placeholder="Email" name="email" required>
								<input class="form-control form-group" type="" placeholder="telefone" name="tel" required onkeypress="$(this).mask('(00) 0000-00009')">
								<!-- Estados cidade -->
								<select class="form-control form-group" id="estados" name="estados">
									<option disabled selected hidden>estado</option>
										<?php
											// $select = $conexao->prepare("INSERT INTO `registro` (`CPF`, `NOME`, `DT_NASC`, `EMAIL`, `TEL`, `ENDERECO`, `UF`, `CIDADE`) VALUES ('".$_POST['nome']."', '".$_POST['nome']."', '2020-01-07', '".$_POST['nome']."', '".$_POST['nome']."', '".$_POST['nome']."', '".$_POST['nome']."', '".$_POST['nome']."')");
											$select = $conexao->prepare("SELECT * FROM estados ORDER BY nome ASC");
											$select->execute();
											$fetchAll = $select->fetchAll();
											foreach($fetchAll as $estados){
												echo '<option value="'.$estados['id'].'">'.$estados['nome'].'</option>';
											}
										?>
								</select>
								<select class="form-control form-group" style="" id="cidades" name="cidades">
									<option disabled selected hidden>cidade</option>
									
								</select>
									<input class="form-control form-group" type="" placeholder="endereço" name="rua" required >
							</div>
								<div class="sty-margin-bottom">
									<button type="submit" class="button button-block button-calm sty-button sty-orange sty-bar">Enviar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</header>
		<div>
		<br><br><br><br>
			<center>
				<p><img src="assets/logo.png"></img></p>
			</center>
		</div>
	</body>
</html>
<script>
	$("#estados").on("change", function(){
		var idEstado = $("#estados").val();
		$.ajax({
			url : 'pega_cidades.php',
			type: 'POST',
			data: {id:idEstado},
			beforeSend: function(){
				$("#cidades").css({'display':'block'});
				$("#cidades").html('Carregando...');
			},
			success: function(data){
				$("#cidades").css({'display':'block'});
				$("#cidades").html(data);
			},
			error: function(data){
				$("#cidades").css({'display':'block'});
				$("#cidades").html("error");
			}
		});
	});
</script>
