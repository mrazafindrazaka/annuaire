<main class="container">
	<h2>Modifier un service</h2>
	<form method="post" action="<?= base_url("member/service/") ?>" class="mb-4">
		<div class="form-row">
			<div class="form-group col-lg-6">
				<label for="set_service">Service</label>
				<select id="set_service" class="form-control" name="id_service">
					<?php foreach ($services as $service) { ?>
						<option value="<?= $service->id ?>"><?= $service->service ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label for="service_change">Modifier le nom du service</label>
				<input type="text" id="service_change" class="form-control" placeholder="Nouveau nom" name="service" required>
			</div>
		</div>
		<input class="btn btn-dark" type="submit" value="Modifier">
	</form>
	<h2>Créer une fiche</h2>
	<form method="post" action="<?= base_url("member/insert/") ?>">
		<div class="form-row">
			<div class="form-group col-lg-6">
				<label for="service">Service</label>
				<select id="service" class="form-control" name="id_service">
					<?php foreach ($services as $service) { ?>
						<option value="<?= $service->id ?>"><?= $service->service ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label for="prenom">Prénom</label>
				<input type="text" id="prenom" class="form-control" name="prenom" required>
			</div>
			<div class="form-group col-lg-6">
				<label for="nom">Nom</label>
				<input type="text" id="nom" class="form-control" name="nom" required>
			</div>
			<div class="form-group col-lg-6">
				<label for="t_fixe">Téléphone fixe 1</label>
				<input type="text" id="t_fixe" class="form-control" name="t_fixe" required>
			</div>
			<div class="form-group col-lg-6">
				<label for="t_mobile">Téléphone mobile</label>
				<input type="text" id="t_mobile" class="form-control" name="t_mobile">
			</div>
			<div class="form-group col-lg-6">
				<label for="t_fixe_2">Téléphone fixe 2</label>
				<input type="text" id="t_fixe_2" class="form-control" name="t_fixe_2">
			</div>
			<div class="form-group col-lg-6">
				<label for="batiment">Bâtiment</label>
				<input type="text" id="batiment" class="form-control" name="batiment">
			</div>
			<div class="form-group col-lg-6">
				<label for="bureau">Bureau</label>
				<input type="text" id="bureau" class="form-control" name="bureau">
			</div>
			<div class="form-group col-lg-6">
				<label for="sexe">Sexe</label>
				<select id="sexe" class="form-control" name="sexe">
					<option value="sans">Sans</option>
					<option value="femme">Femme</option>
					<option value="homme">Homme</option>
				</select>
			</div>
			<div class="form-group col-lg-6">
				<label for="email">Email</label>
				<input type="email" id="email" class="form-control" name="mail">
			</div>
			<div class="form-group col-lg-6">
				<label for="autre">Autre</label>
				<textarea id="autre" class="form-control" name="autre"></textarea>
			</div>
			<div class="form-group col-lg-6">
				<label for="matricule">Matricule</label>
				<input type="text" id="matricule" class="form-control" name="matricule">
			</div>
		</div>
		<input class="btn btn-dark" type="submit" value="Envoyer">
	</form>
</main>
