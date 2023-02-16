$(document).ready(() => {

	/* ================ Modal delete user ================ */

	// Ao abrir a modal
	$('#delete_user').on('show.bs.modal', function (event) {
		// Botão que dá trigger à modal
		var button = $(event.relatedTarget);

		// Buscar informação dos atrivutos data-*
		var id = button.data('id');
		var modal = $(this);

		modal.find("input#user-id").val(id);
	});

	// Ao fechar a modal
	$('#delete_user').on('hide.bs.modal', function (event) {
		// Botão que dá trigger à modal
		var button = $(event.relatedTarget);

		// Buscar informação dos atrivutos data-*
		var id = button.data('id');
		var modal = $(this);

		modal.find("input#user-id").html("");
	});

	/* ================ Modal delete user (ADMIN) ================ */

	// Ao abrir a modal
	$('#delete_user_account').on('show.bs.modal', function (event) {
		// Botão que dá trigger à modal
		var button = $(event.relatedTarget);

		// Buscar informação dos atrivutos data-*
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find("input#user-id").val(id);
		modal.find("span#user-nome").html(nome);
	});

	// Ao fechar a modal
	$('#delete_user_account').on('hide.bs.modal', function (event) {
		// Botão que dá trigger à modal
		var button = $(event.relatedTarget);

		// Buscar informação dos atrivutos data-*
		var id = button.data('id');
		var nome = button.data('nome');
		var modal = $(this);

		modal.find("input#user-id").html("");
		modal.find("span#user-nome").text("");
	});
});