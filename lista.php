<!DOCTYPE html>
<html>
	<head>
		<title> Lista </title>
		<meta charset="UTF-8">
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
		<link rel="stylesheet" href="css/css_geral">
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
			$conexao->exec('SET CHARACTER SET utf8')
		?>
		<script>
			var slideIndex = 1;
			showDivs(slideIndex);

			function plusDivs(n) {
				showDivs(slideIndex += n);
			}

			function showDivs(n) {
				var i;
				var x = document.getElementsByClassName("mySlides");
				if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
				for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				}
				x[slideIndex-1].style.display = "block";  
			}

		</script>
		
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
				<li><a  href="index.php">Registro</a></li>
				<li><a class="active" href="#">Lista</a></li>
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
						
						<!-- carrocel -->
						<div class="sty-content sty-display-container " style="display: table">
						
						
							<div style=" margin-bottom: 30px; margin-right: 52px; margin-left: 52px;">
							<?php
								$select = $conexao->prepare("SELECT * FROM `registro` ORDER BY nome ASC");
								$select->execute();
								$fetchAll = $select->fetchAll();
								$counter = 0;
								foreach($fetchAll as $regs){
									if ($counter == 0) {
										echo '<div class="sty-display-container mySlides" style="display: block">';
									} 
									else {
										echo '<div class="sty-display-container mySlides">';
									}
									echo '
											<p><label>CPF: '.$regs['CPF'].'<label></p>
											<p><label>NOME: '.$regs['NOME'].'<label></p>
											<p><label>TELEFONE: '.$regs['TEL'].'<label></p>
											<p><label>EMAIL: '.$regs['EMAIL'].'<label></p>
											<p><label>IDADE: '.$regs['DT_NASC'].'<label></p>
											<p><label>ENDEREÇO: '.$regs['ENDERECO'].'<label></p>
											<p><label>CIDADE: '.$regs['CIDADE'].'<label></p>
											<p><label>ESTADO: '.$regs['UF'].'<label></p>
										</div>
									';
									$counter = $counter + 1; 
								}
							?>
							</div>
							<button class="sty-button sty-display-left sty-black" onclick="plusDivs(-1)">&#10094;</button>
							<button class="sty-button sty-display-right sty-black" onclick="plusDivs(1)">&#10095;</button>
						</div>
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