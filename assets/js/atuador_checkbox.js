/* Verifica se a checkbox está checked ou unchecked */
function atuadorCheckbox() {
	if (document.getElementById("atuador_checkbox").checked) {
		/* Input escondido fica com o value a 1*/
		document.getElementById("escondido").value = "1";
	} else {
		/* Input escondido fica com o value a 0*/
		document.getElementById("escondido").value = "0";
	}
}