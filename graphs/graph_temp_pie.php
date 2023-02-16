<?php 

$array_aquecimento = array();
$sum_ligado = 0;
$sum_desligado = 0;

# Query
$query_aquecimento = $conn->query("SELECT * FROM `logs_atuador` WHERE `nome` = 'aquecimento' AND YEAR(`atualizacao`) = YEAR(CURRENT_DATE()) AND MONTH(`atualizacao`) = MONTH(CURRENT_DATE())");

var_dump($query_aquecimento);
# Guarda valores para a media
while ($row_aquecimento = mysqli_fetch_array($query_aquecimento)) {
	var_dump($row_aquecimento);
	if ($row_aquecimento["estado"] == 0) {
		$sum_desligado++;
	} else {
		$sum_ligado++;
	}
}

# Mete os valores no array
array_push($array_aquecimento, $sum_desligado, $sum_ligado);

?>

<script>
	/* ----------- SENSOR 2 DASHBOARD ----------- */

	const s2 = $("#sensor-aquecimento");
	const sensor2 = new Chart(s2, {
		type: "bar",
		data: {
			labels: ["Desligado", "Ligado"],
			datasets: [{
				data: [

				<?php 
				for ($i = 0; $i < 2; $i++) {
					echo $array_aquecimento[$i] . ",";
				}
				?>

				],
				backgroundColor: [
				"rgba(75, 192, 192, 0.2)",
				"rgba(255, 206, 86, 0.2)"
				],
				borderColor: [
				"rgba(75, 192, 192, 1)",
				"rgba(255, 159, 64, 1)"
				],
				borderWidth: 1
			}]
		},
		options: {
			indexAxis: 'y',
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