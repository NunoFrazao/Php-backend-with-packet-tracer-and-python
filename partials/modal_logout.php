<!-- Modal delete user -->
<div class="modal fade modals" id="logout-modal" tabindex="-1" aria-labelledby="delete_user" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content value-div">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Terminar sessão (<span class="name-user"><?= ucfirst($_SESSION['username']) ?></span>)</h5>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<p class="text-light">Tem a certeza que pretende terminar sessão?</p>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<form action="../logout.php" method="POST">
					<input hidden id="user-id" type="number" value="">
					<button type="submit" class="btn btn-secondary buttons" data-bs-dismiss="modal">Confirmar</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
				</form>
			</div>
		</div>
	</div>
</div>