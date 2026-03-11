<?php include_once("cabec.php"); ?>

	<p>&nbsp;</p>

	<h2 align="center" class="cor_texto text-primary"><?php echo $lng['selecioneIdioma']; ?></h2>

	<p>&nbsp;</p>

	<div class="container">
		<div class="d-flex justify-content-center gap-4 flex-wrap">
			<div class="col">
				<div class="card border-primary bg-dark text-light">
					<div class="card-header border-primary fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['portugues']; ?></p>
						<p class="card-text">Brasil</p>
					</div>

					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=pt"><img src="./icones/pt.png" width="100px"></a></p>
					</div>

					<div class="card-footer border-primary text-center">
						<small class="corTextoDestaque">pt</small>
					</div>
				</div>
			</div>
			
			<div class="col">
				<div class="card border-primary bg-dark text-light">
					<div class="card-header border-primary fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['ingles']; ?></p>
						<p class="card-text">EUA</p>
					</div>

					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=en"><img src="./icones/en.png" width="100px"></a></p>
					</div>

					<div class="card-footer border-primary text-center">
						<small class="corTextoDestaque">en</small>
					</div>
				</div>
			</div>
			
			
			
			<div class="col">
				<div class="card border-primary bg-dark text-light">
					<div class="card-header border-primary fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['espanhol']; ?></p>
						<p class="card-text">Espanha</p>
					</div>

					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=es"><img src="./icones/es.png" width="100px"></a></p>
					</div>
					
					<div class="card-footer border-primary text-center">
						<small class="corTextoDestaque">es</small>
					</div>
				</div>
			</div>



			<div class="col">
				<div class="card border-primary bg-dark text-light">
					<div class="card-header border-primary fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['frances']; ?></p>
						<p class="card-text">França</p>
					</div>

					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=fr"><img src="./icones/fr.png" width="100px"></a></p>
					</div>
					
					<div class="card-footer border-primary text-center">
						<small class="corTextoDestaque">fr</small>
					</div>
				</div>
			</div>


			<div class="col">
				<div class="card border-primary bg-dark text-light">
					<div class="card-header border-primary fw-bolder fs-4 text-center">
						<p class="card-text"><?php echo $lng['italiano']; ?></p>
						<p class="card-text">Itália</p>
					</div>

					<div class="card-body text-center">
						<p class="card-text"><a href="idiomaSeleciona.php?idioma=it"><img src="./icones/it.png" width="100px"></a></p>
					</div>
					
					<div class="card-footer border-primary text-center">
						<small class="corTextoDestaque">it</small>
					</div>
				</div>
			</div>
			</div>
		</div>
		
	</div>

	<p>&nbsp;</p>
	
<?php include_once("rodape.php"); ?>