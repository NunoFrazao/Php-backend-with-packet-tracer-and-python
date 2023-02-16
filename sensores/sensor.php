<!-- Sensor -->
<div class="container-fluid p-5 text-light info-section">
	<!-- Nome -->
	<h1>Sensor <?= ucfirst(preg_replace('/_/', ' ', $sensores_one_array[0]["nome"])) ?></h1>
	<hr>

	<div class="row anime-dash-divs">
		<!-- Valor -->
		<div class="col-md-4 mb-3">
			<div class="card value-div">
				<div class="card-header text-light bg-dark">
					<span>Sensor <?= ucfirst($sensores_one_array[0]["nome"]) ?></span>
				</div>
				<div class="card-body">
					<p class="display-5">
						<?php 
						if ($sensores_one_array[0]["valor"] > 0)
							echo ($sensores_one_array[0]["tipo"] == -1) ? ucfirst($sensores_one_array[0]["valor"]) . "%" : ucfirst($sensores_one_array[0]["valor"]) . "ºC";
						else
							echo "------";
						?>
					</p>
				</div>
			</div>
		</div>

		<!-- Estado -->
		<div class="col-md-4 mb-3">
			<div class="card value-div">
				<div class="card-header text-light bg-dark">
					<span>Estado</span>
				</div>
				<div class="card-body">
					<p class="display-5">
						<?php 
						if ($sensores_one_array[0]["valor"] < -1 || $sensores_one_array[0]["valor"] > 1)
							echo ($sensores_one_array[0]["estado"] == 0) ? "Desligado" : "Ligado";
						else
							echo ($sensores_one_array[0]["estado"] == 0) ? "Fechada" : "Aberta";
						?>
					</p>
				</div>
			</div>
		</div>
		
	</div>
</div>

<!-- Table section -->
<div class="container-fluid text-light px-5 mb-5 table-section anime-dash-divs">
	<div class="card">
		<div class="card-header text-light bg-dark">
			<span>Histórico do sensor</span>
		</div>
	</div>
	<div class="card-body bg-dark table-div">
		<table class="table table-dark sensor-table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Valor</th>
					<th>Estado</th>
					<th>Data de atualização</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($campos_array != NULL) { ?>
					<?php foreach ($campos_array as $sen) { ?>
						<tr>
							<td><?= $sen["id"] ?></td>
							<td><?= ucfirst($sen["nome"]) ?></td>
							<td>
								<?= ($sen["valor"] == -1) ? "---------" : $sen["valor"] ?>
							</td>
							<td>
								<?php if ($sen["valor"] != 0 && $sen["valor"] != 1 && $sen["valor"] != -1) { ?>
									<span class="badge rounded-pill <?= ($sen['estado'] == 0) ? "bg-success" : "bg-danger"  ?>"><?= $sen['estado'] == 0 ? "Ligado" : "Desligado" ?></span>
								<?php } else { ?>
									<span class="badge rounded-pill <?= ($sen['estado'] == 0) ? "bg-danger" : "bg-success"  ?>"><?= $sen['estado'] == 0 ? "Fechada" : "Aberta" ?></span>
								<?php } ?>					
							</td>
							<td><?= $sen["atualizacao"] ?></td>
						</tr>
					<?php } ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>