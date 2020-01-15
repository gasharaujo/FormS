<html>
	<head>
		<title> Lista </title>
		<?php include 'head.php'; ?>
		<!-- Slide script -->
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
	</head>
	<body>
		<!-- cabeçario com logo 1 hora -->
		<?php include 'header.php'; ?>
		<?php include 'fundo.php'; ?>
			<form class="DvPadding">
						<h2 class="TxtCent">LISTA</h2>
						<!-- carrocel -->
						<div class="container DvPadding" style="display: table">
						
						
							<div style=" margin-bottom: 30px; margin-right: 52px; margin-left: 52px;">
								<?php
									$select = $conexao->prepare("SELECT * FROM `registro` ORDER BY nome ASC");
									$select->execute();
									$fetchAll = $select->fetchAll();
									$counter = 0;
									foreach($fetchAll as $regs){
										if ($counter == 0) {
											echo '<div class="container mySlides" style="display: block">';
										} 
										else {
											echo '<div class="container mySlides">';
										}
					
										$UFc = $conexao->prepare("SELECT * FROM `estados` WHERE `id` = ".$regs['UF']);
										$UFc->execute();
										$fetchAll = $UFc->fetchAll();
										foreach($fetchAll as $UFs){
											$UF = $UFs['nome'];
										}
										$CIDc = $conexao->prepare("SELECT * FROM `cidades` WHERE `id` = ".$regs['UF']);
										$CIDc->execute();
										$fetchAll = $CIDc->fetchAll();
										foreach($fetchAll as $CIDs){
											$CID = $CIDs['nome'];
										}
										
										echo '
												<p><label>CPF: '.$regs['CPF'].'<label></p>
												<p><label>NOME: '.$regs['NOME'].'<label></p>
												<p><label>TELEFONE: '.$regs['TEL'].'<label></p>
												<p><label>EMAIL: '.$regs['EMAIL'].'<label></p>
												<p><label>NASCIMENTO: '.date('d/m/Y',  strtotime($regs['DT_NASC'])).'<label></p>
												<p><label>ENDEREÇO: '.$regs['ENDERECO'].'<label></p>
												<p><label>CIDADE: '.$CID.'<label></p>
												<p><label>ESTADO: '.$UF.'<label></p>
											</div>
										';
										$counter = $counter + 1; 
									}
								?>
							</div>
							<a class="btn btn-dark BtLeft" onclick="plusDivs(-1)" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="btn btn-dark BtRight" onclick="plusDivs(-1)" role="button" data-slide="prev">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
							<!-- button class="btn btn-dark BtLeft" onclick="plusDivs(-1)">&#10094;</button>
							<button class="btn btn-dark BtRight" onclick="plusDivs(1)">&#10095;</button-->
						</div>
			</form>
		<?php include 'footer.php'; ?>
	</body>
</html>