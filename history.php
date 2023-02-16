<!-- All Sensores -->
<div class="container-fluid p-5 text-light info-section">
	<h1>Histórico</h1>
	<hr>

	<!-- Table section -->
	<div class="container-fluid text-light mb-5 table-section others-table anime-dash-divs">
		<div class="card">
			<div class="card-header text-light bg-dark">
				<span>Histórico de todos os sensores e atuadores</span>
			</div>
		</div>
		<div class="card-body bg-dark table-div">
			<table class="table table-dark sensor-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Valor</th>
						<th>Data de atualização</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($campos_array as $ty) { ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= ucfirst(preg_replace('/_/', ' ', $ty['nome'])) ?></td>							
							<td><?= ($ty['valor'] != NULL && $ty['valor'] > 0) ? $ty['valor']."" : "------" ?></td>						
							<td><?= $ty['atualizacao'] ?></td>
							<td><span class="badge rounded-pill <?= ($ty['estado'] == 0) ? "bg-danger" : "bg-info"  ?>"><?= $ty['estado'] == 0 ? "Desligado" : "Ligado" ?></span></td>						
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>