/* Function update user - Validation */
function validar() {
	var ok = true;
	$("span.erro").hide();

	var regexpEmail = /@/;
	var nome = $("#campoNome").val();
	var email = $("#campoEmail").val();
	var trim = $.trim(nome);

	/* Name validation */
	if (nome == "") {
		$("#msg-erro-nome-obrigatoria").show();
		ok = false;
	} else if (trim.length < 4 || trim.length > 50 || trim.match(/\d+/g)) {
		$("#msg-erro-nome-invalida").show();
		ok = false;
	}

	/* Email validation */
	if (email == "") {
		$("#msg-erro-email-obrigatoria").show();
		ok = false;
	} else if (!regexpEmail.test(email)) {
		$("#msg-erro-email-invalida").show();
		ok = false;
	}

	/* If there are no erros*/
	if (ok == true) {
		$("#form_submit").attr("type", "submit").click();
	}
}

/* Function add user - Validation */
function validarAdd() {
	var ok = true;
	$("span.erro-add").hide();

	var regexpEmail = /@/;
	var nome = $("#campoNomeAdd").val();
	var email = $("#campoEmailAdd").val();
	var password = $("#campoPasswordAdd").val();
	var trim = $.trim(nome);

	/* Name validation */
	if (nome == "") {
		$("#msg-erro-nome-obrigatoria-add").show();
		ok = false;
	} else if (trim.length < 4 || trim.length > 50 || trim.match(/\d+/g)) {
		$("#msg-erro-nome-invalida-add").show();
		ok = false;
	}

	/* Email validation */
	if (email == "") {
		$("#msg-erro-email-obrigatoria-add").show();
		ok = false;
	} else if (!regexpEmail.test(email)) {
		$("#msg-erro-email-invalida-add").show();
		ok = false;
	}

	/* Password validation */
	if (password == "") {
		$("#msg-erro-password-obrigatoria-add").show();
		ok = false;
	} else if (password.length < 3 || password.length > 50) {
		$("#msg-erro-password-invalida-add").show();
		ok = false;
	}

	/* If there are no erros*/
	if (ok == true) {
		$("#form_submit_add").attr("type", "submit").click();
	}
}