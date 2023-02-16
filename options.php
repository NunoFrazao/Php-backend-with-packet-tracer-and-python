<!-- User options -->
<div class="container-fluid p-5 text-light info-section">
	<h1><?= ucfirst($username) ?></h1>
	<hr>

	<!-- User personal info -->
	<div class="container-fluid text-light mb-5 table-section others-table anime-dash-divs">
		<div class="card">
			<div class="card-header text-light bg-dark">
				<span>Definições de utilizador</span>
			</div>

			<!-- User info -->
			<div class="card-body bg-dark w-100">
				<form method="POST" action="forms.php?id=<?= $id ?>&updateuser" id="form-registo" class="w-100">
					<div class="row">
						<!-- Name -->
						<div class="col-md-3 d-flex flex-column justify-content-center">
							<label class="form-label text-secondary" for="campoNome">Nome de utilizador <span class="required-elem">*</span></label>
							<input id="campoNome" name="username" value="<?= $username ?>" class="form-control mt-2" type="text">
							<span class="erro" id="msg-erro-nome-invalida">Nome tem de ter entre 4 e 50 letras</span>
							<span class="erro" id="msg-erro-nome-obrigatoria">Campo nome obrigatório</span><br>
						</div>
						<!-- Email -->
						<div class="col-md-6 d-flex flex-column justify-content-center">
							<label class="form-label text-secondary" for="campoEmail">Email <span class="required-elem">*</span></label>
							<input pattern="^[a-zA-Z0-9!#$%&'+/=?^_`{|}~-]+(?:.[a-zA-Z0-9!#$%&'+/=?^_`{|}~-]+)@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-][a-zA-Z0-9])?.)+(?:[a-zA-Z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$" id="campoEmail" name="email" value="<?= $email ?>" class="form-control mt-2" type="email">
							<span class="erro" id="msg-erro-email-invalida">Email inválido</span>
							<span class="erro" id="msg-erro-email-obrigatoria">Campo email obrigatório</span><br>
						</div>
						<!-- Button submit -->
						<div class="col-md-3 d-flex flex-column justify-content-center">
							<button onclick="validar();" id="form_submit" class="btn text-light change-button mt-2" type="button">Alterar</button>
						</div>
					</div>
				</form>

				<!-- Functionalities -->
				<div id="pass-div" class="row w-100">
					<hr>
					<!-- Change password -->
					<div class="col-md-4">
						<p>Mudar palavra-passe</p>
						<div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Em progresso...">
							<button id="change-password" class="btn text-light mb-3 w-100" disabled>Mudar palavra-passe</button>
						</div>
					</div>
					<?php if ($estatuto != 1) { ?>
						<!-- Delete account -->
						<div class="col-md-4">
							<p>Apagar conta</p>
							<button id="delete-account" class="btn text-light mb-3 w-100" data-bs-toggle="modal" data-bs-target="#delete_user" data-id="<?= $id ?>">Apagar conta</button>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<?php if ($estatuto == 1) { ?>
		<!-- Add users - Only admin -->
		<div class="container-fluid text-light mb-5 table-section others-table anime-dash-divs">
			<div class="card">
				<div class="card-header text-light bg-dark">
					<span>Adicionar utilizador</span>
				</div>

				<!-- User info -->
				<div class="card-body bg-dark w-100">
					<form method="POST" action="forms.php?adduser" id="form-registo" class="w-100">
						<div class="row">
							<!-- Name -->
							<div class="col-md-3 d-flex flex-column justify-content-center">
								<label class="form-label text-secondary" for="campoNomeAdd">Nome de utilizador <span class="required-elem">*</span></label>
								<input id="campoNomeAdd" name="username" value="" class="form-control mt-2" type="text">
								<span class="erro-add" id="msg-erro-nome-invalida-add">Nome tem de ter entre 4 e 50 letras</span>
								<span class="erro-add" id="msg-erro-nome-obrigatoria-add">Campo nome obrigatório</span><br>
							</div>
							<!-- Email -->
							<div class="col-md-3 d-flex flex-column justify-content-center">
								<label class="form-label text-secondary" for="campoEmailAdd">Email <span class="required-elem">*</span></label>
								<input pattern="^[a-zA-Z0-9!#$%&'+/=?^_`{|}~-]+(?:.[a-zA-Z0-9!#$%&'+/=?^_`{|}~-]+)@(?:[a-zA-Z0-9](?:[a-zA-Z0-9-][a-zA-Z0-9])?.)+(?:[a-zA-Z]{2}|aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel)$" id="campoEmailAdd" name="email" value="" class="form-control mt-2" type="email">
								<span class="erro-add" id="msg-erro-email-invalida-add">Formato de email inválido</span>
								<span class="erro-add" id="msg-erro-email-obrigatoria-add">Campo email obrigatório</span><br>
							</div>
							<!-- Password -->
							<div class="col-md-3 d-flex flex-column justify-content-center">
								<label class="form-label text-secondary" for="campoPasswordAdd">Palavra-passe <span class="required-elem">*</span></label>
								<input id="campoPasswordAdd" name="password" value="" class="form-control mt-2" type="password">
								<span class="erro-add" id="msg-erro-password-invalida-add">Palavra-passe tem de ter entre 3 e 50 caratéres</span>
								<span class="erro-add" id="msg-erro-password-obrigatoria-add">Campo palavra-passe obrigatório</span><br>
							</div>
							<!-- Button submit -->
							<div class="col-md-3 d-flex flex-column justify-content-center">
								<button onclick="validarAdd();" id="form_submit_add" class="btn text-light change-button mt-2" type="button">Adicionar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
</div>

<?php include "partials/modal_delete.php"; ?>