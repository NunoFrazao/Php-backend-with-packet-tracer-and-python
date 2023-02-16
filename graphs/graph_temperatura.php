<?php

$array_temps = array();

// Corre todos os meses
for ($i = 1; $i <= 12; $i++) {
	$sum = 0;
	$total = 0;
	$aux = $i + 1;
	$date = date("Y");

	# Query
	$query_temps = $conn->query("SELECT * FROM `logs_sensor` WHERE `nome` = 'temperatura' AND YEAR(`atualizacao`) = YEAR(CURRENT_DATE()) AND MONTH(`atualizacao`) = MONTH('$date-$i-01')");

	# Guarda valores para a media
	if ($query_temps->num_rows > 0) {
		while ($row_temp = mysqli_fetch_array($query_temps)) {
			$total += $row_temp['valor'];
			$sum++;
		}
	}

	# Faz a media - validação pois não se pode dividir por 0
	($sum == 0) ? ($final = 0) : ($final = $total / $sum);

	# Mete os valores no array
	array_push($array_temps, $final);
}

?>

<script>
	/* ----------- SENSOR TEMPERATURE DASHBOARD ----------- */

	const s1 = $("#sensor-temperatura");
	const sensor1 = new Chart(s1, {
		type: "bar",
		data: {
			labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
			datasets: [{
				data: [

				<?php
				for ($i = 0; $i < 12; $i++) {
					echo $array_temps[$i] . ",";
				}
				?>

				],
				backgroundColor: [
				"rgba(255, 99, 132, 0.2)",
				"rgba(54, 162, 235, 0.2)",
				"rgba(255, 206, 86, 0.2)",
				"rgba(75, 192, 192, 0.2)",
				"rgba(153, 102, 255, 0.2)",
				"rgba(255, 159, 64, 0.2)"
				],
				borderColor: [
				"rgba(255, 99, 132, 1)",
				"rgba(54, 162, 235, 1)",
				"rgba(255, 206, 86, 1)",
				"rgba(75, 192, 192, 1)",
				"rgba(153, 102, 255, 1)",
				"rgba(255, 159, 64, 1)"
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			},
			plugins: {
				legend: {
					display: false
				}
			}
		}
	});
</script>