<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand logo" href="#"><img src="assets/logo.png"></a>
					<?php //echo basename($_SERVER['PHP_SELF']); ?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
			<ul class="navbar-nav mr-auto">
				<?php 
					if (basename($_SERVER['PHP_SELF']) == "index.php"){
				?>
						<li class="nav-item active">
							<a class="nav-link" href="index.php">Registro <span class="sr-only">(página atual)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="lista.php">Lista</a>
						</li>
				<?php
					}
					else{
				?>
						<li class="nav-item">
							<a class="nav-link" href="index.php">Registro</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="lista.php">Lista <span class="sr-only">(página atual)</span></a>
						</li>
				<?php
					}
				?>
			</ul>
		</div>
	</nav>
</header>