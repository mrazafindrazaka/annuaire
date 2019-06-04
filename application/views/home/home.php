<main class="container">
	<div class="row">
		<script>
			let services = [];
			<?php foreach ($services as $service) { ?>
				services.push(<?= json_encode($service) ?>);
			<?php } ?>
			let info_member = [];
			let search = "";
			<?php if (isset($search)) { ?>
				search = "<?= $search ?>";
			<?php } ?>
		</script>
		<?php if (isset($members) && count($members) > 0) {
		foreach ($members as $member) { ?>
			<script>
				info_member.push(<?= json_encode($member) ?>);
			</script>
			<div class="card col-sm-12 col-lg-6 mb-3">
				<div class="card-header">
					<h5 class="card-text"><?= mb_convert_case($member->nom, MB_CASE_UPPER) ?> <?= mb_convert_case($member->prenom, MB_CASE_TITLE) ?></h5>
				</div>
				<div class="card-body">
					<p>
						<a href="<?= base_url("home/search/" . $member->id_service) ?>"><?= mb_convert_case($member->service, MB_CASE_TITLE) ?></a><br><?= $member->t_fixe ?>
					</p>
				</div>
				<div class="card-footer">
					<button id="d<?= $member->id_member ?>" class="btn btn-dark detail">Détails</button>

					<?php if (get_cookie('mode') == 1) { ?>
						<button id="m<?= $member->id_member ?>" class="btn btn-success modify">Modifier</button>
						<button id="<?= $member->id_member ?>" class="btn btn-danger delete">Supprimer</button>
					<?php } ?>
				</div>
			</div>
		<?php }
		} else { ?>
			<div class="col-sm-12">
				<p>Aucune fiche trouvée pour votre recherche.</p>
			</div>
		<?php } ?>
	</div>
</main>
