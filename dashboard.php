<!-- Info section -->
<div class="container-fluid p-5 text-light info-section">
	<div class="row">
		<!-- Trinco -->
		<div class="col-md-4 mt-2 anime-dash-divs">
			<div id="door-div" class="card">
				<div class="card-header text-light bg-dark">
					Carro
				</div>
				<div class="card-body">
					<?php if ($trincs == 1) { ?>
						<svg width="100" height="70" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
							<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z" />
						</svg>
					<?php } else { ?>
						<svg width="100" height="70" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
							<path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
						</svg>
					<?php } ?>
				</div>
				<div class="card-footer text-light locked-footer">
					<span><?= ($trincs == 0) ? "Destrancado" : "Trancado" ?></span>
				</div>
			</div>
		</div>
		<!-- Graphs -->
		<div class="col-md-8 mt-2 anime-dash-divs">
			<div class="row">
				<!-- Graph temperatura -->
				<div class="col-md-6">
					<div class="card value-div">
						<div class="card-header text-light bg-dark">
							Sensor Temperatura
						</div>
						<div class="card-body">
							<canvas id="sensor-temperatura"></canvas>
						</div>
						<div class="card-footer text-light bg-dark">
							<span><a href="?pagina=sensores/sensor.php&nome=temperatura&micro=sensor">Ver mais</a></span>
						</div>
					</div>
				</div>

				<!-- Graph aquecimento -->
				<div class="col-md-6">
					<div class="card value-div">
						<div class="card-header text-light bg-dark">
							Aquecimento
							<?php setlocale(LC_TIME, "Portuguese_Portugal");
							echo ucfirst(strftime("%B", strtotime("today")));
							?>
						</div>
						<div class="card-body">
							<canvas id="sensor-aquecimento"></canvas>
						</div>
						<div class="card-footer text-light bg-dark">
							<span><a href="?pagina=sensores/sensor.php&nome=temperatura&micro=sensor">Ver mais</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php for ($i = 0; $i < 2; $i++) { ?>
	<!-- TABLE ATUADORES & SENSORES -->
	<div class="container-fluid text-light px-5 mb-5 table-section anime-dash-divs">
		<div class="row">
			<!-- See more -->
			<div class="col-12 d-flex justify-content-end py-3 see-more">
				<a href="?pagina=all.php&micro=<?= $type_name[$i] ?>">Ver todos os <?= $type_name[$i] ?>es</a>
				<svg width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
				</svg>
			</div>
		</div>
		<div class="card">
			<div class="card-header text-light bg-dark">
				<span>Valores recentes de <?= $type_name[$i] ?>es</span>
			</div>
			<div class="card-body bg-dark table-div">
				<table class="table table-dark">
					<thead>
						<tr>
							<th>Tipo de <?= $type_name[$i] ?></th>
							<th>Valor</th>
							<th>Data de atualização</th>
							<th>Estado</th>
						</tr>
					</thead>
					<tbody>
						<?php for ($j = 0; $j < 3; $j++) { ?>
							<tr>
								<td><?= ucfirst(preg_replace('/_/', ' ', $type[$i][$j]['nome'])) ?></td>							
								<td><?= ($type[$i][$j]['valor'] != NULL && $type[$i][$j]['valor'] > 0) ? $type[$i][$j]['valor']."ºC" : "------" ?></td>						
								<td><?= $type[$i][$j]['atualizacao'] ?></td>
								<td><span class="badge rounded-pill <?= ($type[$i][$j]['estado'] == 0) ? "bg-danger" : "bg-info"  ?>"><?= $type[$i][$j]['estado'] == 0 ? "Desligado" : "Ligado" ?></span></td>						
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php } ?>