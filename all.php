<!-- All Sensores & Atuadores -->
<div class="container-fluid p-5 text-light info-section all-sensores">
	<h1>Todos os <?= $micro ?>es <span id="count-sensores" class="text-secondary small"></span></h1>
	<hr>

	<div class="row">
		<!-- Columns -->
		<?php foreach($sensores as $sensor) {?>
			<div class="col-md-4 mt-3 anime-dash-divs sensores-all-divs">
				<div class="card">
					<div class="card-header bg-dark ">
						<span><?= ucfirst($micro) ?> <?= ucfirst(preg_replace('/_/', ' ', $sensor["nome"])) ?></span>
					</div>
					<div class="card-body">
						<p class="display-5">
							<?php
							if ($sensor["valor"] < 2)
								echo ($sensor["estado"] == 0) ? "Fechada" : "Aberta";
							else if ($sensor["valor"] == -1)
								echo ($sensor["estado"] == 0) ? "Desligado" : "Ligado";
							else
								echo ($sensor["tipo"] == -1) ? ucfirst($sensor["valor"]) . "%" : ucfirst($sensor["valor"]) . "ºC";
							?>
						</p>
					</div>
					<div class="card-footer text-light bg-dark">
						<span><a href="?pagina=<?= $micro ?>es/<?= $micro ?>.php&nome=<?= $sensor["nome"] ?>&micro=<?= $micro ?>&microcontrolador">Ver mais</a></span>
					</div>
				</div>
			</div>
		<?php }?>
	</div>		
</div>