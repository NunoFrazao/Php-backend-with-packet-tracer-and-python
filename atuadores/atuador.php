<!-- Atuador -->
<div class="container-fluid p-5 text-light info-section">
	<h1>Atuador <?= ucfirst(preg_replace('/_/', ' ', $atuadores_one_array[0]["nome"])) ?></h1>
	<hr>

	<div class="row anime-dash-divs">
		<!-- Valor -->
		<div class="col-md-4 mb-3">
			<div class="card value-div">
				<div class="card-header text-light bg-dark">
					<span>Atuador <?= ucfirst($atuadores_one_array[0]["nome"]) ?></span>
				</div>
				<div class="card-body">
					<p class="display-5"><?= ($atuadores_one_array[0]["valor"] > 0) ? ucfirst($atuadores_one_array[0]["valor"])."ºC" : "------" ?></p>
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
						if ($atuadores_one_array[0]["valor"] < 2)
							echo ($atuadores_one_array[0]["estado"] == 0) ? "Fechada" : "Aberta";
						else
							echo ($atuadores_one_array[0]["estado"] == 0) ? "Desligado" : "Ligado";
						?>
					</p>
				</div>
			</div>
		</div>

		<!-- Button -->
		<?php if ($_SESSION["estatuto"] != 2) { ?>
			<?php if ($atuadores_one_array[0]["tipo"] == -1) { ?>
				<div class="col-md-4 mb-3">
					<div class="card value-div">
						<div class="card-header text-light bg-dark">
							<span>Interruptor</span>
						</div>
						<div class="card-body">
							<form method="POST" action="../sensores/api.php">
								<label class="switch" for="atuador_checkbox">
									<input onclick="atuadorCheckbox(); this.form.submit();" name="estado_check" id="atuador_checkbox" type="checkbox" <?= ($atuadores_one_array[0]["estado"] == 0) ?  "unchecked" :  "checked" ?>>
									<span class="slider round"></span>
								</label>
								<input hidden id="escondido" name="estado" value="" class="form-control" type="number">
								<input hidden name="micro" value="<?= $micro ?>" class="form-control" type="text">
								<input hidden name="nome" value="<?= $atuadores_one_array[0]["nome"] ?>" class="form-control" type="text">
								<input hidden name="valor" value="<?= $atuadores_one_array[0]["valor"] ?>" class="form-control" type="num">
								<input hidden name="microcontrolador" value="<?= $micro ?>" class="form-control" type="text">
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>

<!-- Table section -->
<div class="container-fluid text-light px-5 mb-5 table-section anime-dash-divs">
	<div class="card">
		<div class="card-header text-light bg-dark">
			<span>Históricos do atuador</span>
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
						<?php foreach ($campos_array as $at) { ?>
							<tr>
								<td><?= $at["id"] ?></td>
								<td><?= ucfirst($at["nome"]) ?></td>
								<td>
									<?= ($at["valor"] <= 0) ? "---------" : $at["valor"] ?>
								</td>
								<td>
									<?php if ($at["valor"] != 0 && $at["valor"] != 1 && $at["valor"] != -1) { ?>
										<span class="badge rounded-pill <?= ($at['estado'] == 0) ? "bg-danger" : "bg-success"  ?>"><?= $at['estado'] == 0 ? "Fechada" : "Aberta" ?></span>
										
									<?php } else { ?>
										<span class="badge rounded-pill <?= ($at['estado'] == 0) ? "bg-danger" : "bg-success"  ?>"><?= $at['estado'] == 0 ? "Desligado" : "Ligado" ?></span>
									<?php } ?>					
								</td>
								<td><?= $at["atualizacao"] ?></td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
