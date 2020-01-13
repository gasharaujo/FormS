<!DOCTYPE html>
<html>
	<head>
		<title> Formulario </title>
		<?php
			include 'head.php';
		?>
		
		
		
	</head>
	<body>
		<!-- cabeçario com logo 1 hora -->
		<?php include 'header.php'; ?>
		<?php include 'fundo.php'; ?>
			<form action="index.php" class="DvPadding" id="form"  method="post">
				<h2 class="TxtCent">Registro</h2>
				<div style="margin:8px -16px;">
					<input class="form-control form-group" type="" placeholder="nome" name="nome" required>
					<input class="form-control form-group" type="" placeholder="CPF" name="CPF" required onkeypress="$(this).mask('000.000.000-00');">
					<input class="form-control form-group" type="date" placeholder="data Nacimento" name="dt_nasc" required>
					<input class="form-control form-group" type="email" placeholder="Email" name="email" required>
					<input class="form-control form-group" type="" placeholder="telefone" name="tel" required onkeypress="$(this).mask('(00) 0000-00009')">
					<!-- Estados cidade -->
					<select class="form-control form-group" id="estados" name="estados">
						<option disabled selected hidden>estado</option>
							<?php
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
					<button type="submit" class="btn btn-warning form-control">Enviar</button>
				</div>
			</form>
		<?php include 'footer.php'; ?>
	</body>
</html>
<!-- cidade script -->
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
<?php include 'reg.php'; ?>