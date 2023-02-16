<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}
require_once "connect.php";
include "include.php";

?>

<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Car company">
	<meta name="author" content="José Parreira, Nuno Frazão">
	<title>Carro | Página Inicial</title>

	<!-- LINKS -->
	<?php include "partials/structure/links.php"; ?>
</head>

<body>
	<main id="main-div">
		<?php
		# Side navbar
		if (isset($_SESSION['username']))
			include "partials/navbar.php";
		?>

		<div id="content">
			<?php
			# Top navbar
			include "partials/topnav.php";
			?>

			<div id="content-info">
				<?php
				# Page system
				if (isset($_GET["pagina"])) {
					$pag = $_GET["pagina"];
					include($pag);
				} else {
					include "dashboard.php";
				}
				?>
			</div>
		</div>
	</main>

	<!-- SCRIPTS -->
	<?php include "partials/structure/scripts.php"; ?>
	<?php include "graphs.php"; ?>
</body>


</html>