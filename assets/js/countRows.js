$(document).ready(() => {
	var countSensor = $(".sensores-all-divs").length;
	var countAtuador = $(".atuadores-all-divs").length;

	$("#count-sensores").text(countSensor);
	$("#count-atuadores").text(countAtuador);
});