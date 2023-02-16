<!-- Modal delete user -->
<div class="modal fade modals" id="delete_user" tabindex="-1" aria-labelledby="delete_user" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content value-div">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apagar conta</h5>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<p class="text-light">Tem a certeza que pretende apagar a conta?</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<form action="../deleteUser.php?id=<?= $id ?>" method="POST">
					<input hidden id="user-id" type="number" value="">
					<button type="submit" class="btn btn-secondary buttons" data-bs-dismiss="modal">Confirmar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal delete user (ADMIN) -->
<div class="modal fade modals" id="delete_user_account" tabindex="-1" aria-labelledby="delete_user_account" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content value-div">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Apagar conta</h5>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<p class="text-light">Tem a certeza que pretende apagar a conta de <span id="user-nome" class="span-nome-modal"></span>?</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<form action="../deleteUserAdmin.php?id=<?= $id ?>" method="POST">
					<input hidden id="user-id" type="number" value="">
					<button type="submit" class="btn btn-secondary buttons" data-bs-dismiss="modal">Confirmar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				</form>
			</div>
		</div>
	</div>
</div>