<!-- Utilizadores -->
<div id="users-table" class="container-fluid p-5 text-light info-section">
	<h1>Utilizadores</h1>
	<hr>

	<!-- Table section -->
	<div class="container-fluid text-light mb-5 table-section others-table anime-dash-divs">
		<div class="card">
			<div class="card-header text-light bg-dark">
				<span>Lista de utilizadores</span>
			</div>
			<div class="card-body bg-dark table-div">
				<table class="table table-dark sensor-table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>Email</th>
							<?php if ($_SESSION['estatuto'] == 1) { ?>
								<th>Eliminar</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user) { ?>
							<tr>
								<td><?= $user["id"] ?></td>
								<td class="users-name"><strong><?= ucfirst($user["username"]) ?></strong></td>
								<td><?= $user["email"] ?></td>
								<?php if ($_SESSION['estatuto'] == 1) { ?>
									<td class="masterOnly">
										<span class="<?= ($user["username"] == $_SESSION["username"]) ? masterLine : "" ?>" data-bs-toggle="modal" data-bs-target="<?= ($user["username"] != $_SESSION["username"]) ? "#delete_user_account" : "" ?>" data-id="<?= $user["id"] ?>" data-nome="<?= $user["username"] ?>">
											<svg viewBox="0 0 448 512" width="10"><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg>	
										</span>
									</td>
								<?php } ?>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php include "partials/modal_delete.php"; ?>