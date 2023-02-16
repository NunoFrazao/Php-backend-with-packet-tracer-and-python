<div id="top-nav">
	<!-- Menu icon -->
	<span class="span-icon">
		<svg width="18" height="18" viewBox="0 0 448 512"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg>
	</span>

	<?php if (isset($_GET["success"])) { ?>	
		<div class="alert alert-success fade show mensagens" role="alert">
			<strong>Sucesso!</strong> Ação realizada
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php } elseif (isset($_GET["failed"])) { ?>
		<div class="alert alert-danger fade show mensagens" role="alert">
			<strong>Erro!</strong> Não foi possivel realizar essa ação
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
	<?php } ?>

	<!-- Logout button -->
	<button id="button-logout" class="btn" data-bs-toggle="modal" data-bs-target="#logout-modal">Logout</button>
</div>

<?php include "partials/modal_logout.php"; ?>