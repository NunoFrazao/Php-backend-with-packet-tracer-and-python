<!-- Side nav -->
<div id="side-nav">
	<!-- User -->
	<div id="user-info">
		<img src="assets/img/circle.png" alt="User image" class="mt-5">
		<h1 class="mt-4"><?= ucfirst($_SESSION['username']) ?></h1>
	</div>

	<!-- Link main page -->
	<hr class="side-hr mb-4">
	<h2><a href="index.php">Dashboard</a></h2>
	<hr class="side-hr mb-4">

	<!-- List -->
	<div id="div-list">
		<ul class="list-unstyled main-lists">
			<!-- Sensores & Atuadores -->
			<?php for ($i = 0; $i < 2; $i++) { ?>
				<li id="li-dropdown-<?= $type_name[$i] ?>">
					<a data-bs-toggle="collapse" href="#lista-<?= $type_name[$i] ?>es" role="button" aria-expanded="false" aria-controls="lista-<?= $type_name[$i] ?>es" class="main-anc">
						<span><?= ucfirst($type_name[$i]) ?>es</span>
						<svg width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
						</svg>
					</a>

					<!-- Dropdown List -->
					<ul id="lista-<?= $type_name[$i] ?>es" class="list-unstyled in-lists collapse nav-listas">
						<?php for ($j = 0; $j < 3; $j++) { ?>
							<li><a href="?pagina=<?= $type_name[$i] ?>es/<?= $type_name[$i] ?>.php&nome=<?= $type[$i][$j]['nome'] ?>&micro=<?= $type_name[$i] ?>"><?= ucfirst(preg_replace('/_/', ' ', $type[$i][$j]['nome'])) ?></a></li>
						<?php } ?>
						<li><hr></li>
						<li><a href="?pagina=all.php&micro=<?= $type_name[$i] ?>&microcontrolador">Todos</a></li>
					</ul>
				</li>
			<?php } ?>

			<!-- History -->
			<li class="main-anc">
				<a href="?pagina=history.php&allhistory" class="main-anc">Histórico</a>
			</li>

			<!-- Users -->
			<li><a href="?pagina=users.php&user" class="main-anc">Utilizadores</a></li>

			<!-- Options -->
			<li><a href="?pagina=options.php&utilizador=<?= $_SESSION['username'] ?>" class="main-anc">Definições</a></li>
		</ul>
	</div>
</div>