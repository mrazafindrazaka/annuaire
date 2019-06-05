<main class="container">
	<div class="row">
		<?php if (isset($members) && count($members) > 0) { ?>
		<?php foreach ($members as $member) { ?>
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
					<button class="btn btn-dark" data-toggle="modal"
							data-target="#modal<?= $member->id_member ?>detail">
						Détails
					</button>

					<?php if (get_cookie('mode') == 1) { ?>
						<button class="btn btn-success" data-toggle="modal"
								data-target="#modal<?= $member->id_member ?>form">Modifier
						</button>
						<button id="<?= $member->id_member ?>" class="btn btn-danger delete">Supprimer</button>
					<?php } ?>

					<div class="modal fade" id="modal<?= $member->id_member ?>detail" tabindex="-1" role="dialog"
						 aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<ul class="list-group">
										<li class="list-group-item">
											Nom-Prénom: <?= mb_convert_case($member->nom, MB_CASE_UPPER) . ' ' . mb_convert_case($member->prenom, MB_CASE_TITLE) ?></li>
										<li class="list-group-item">
											Service: <?= mb_convert_case($member->service, MB_CASE_TITLE) ?></li>
										<li class="list-group-item">Téléphone fixe: <?= $member->t_fixe ?></li>
										<li class="list-group-item">Téléphone mobile: <?= $member->t_mobile ?></li>
										<li class="list-group-item">Téléphone fixe2: <?= $member->t_fixe_2 ?></li>
										<li class="list-group-item">
											Bâtiment: <?= mb_convert_case($member->batiment, MB_CASE_TITLE) ?></li>
										<li class="list-group-item">
											Bureau: <?= mb_convert_case($member->bureau, MB_CASE_TITLE) ?></li>
										<li class="list-group-item">
											Sexe: <?= mb_convert_case($member->sexe, MB_CASE_TITLE) ?></li>
										<li class="list-group-item">Mail: <a
												href="mailto:<?= $member->mail ?>"><?= mb_convert_case($member->mail, MB_CASE_LOWER) ?></a>
										</li>
										<li class="list-group-item">Activités: <?= $member->autre ?></li>
										<li class="list-group-item">Matricule: <?= $member->matricule ?></li>
									</ul>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-dark" data-dismiss="modal">
										Fermer
									</button>
								</div>
							</div>
						</div>
					</div>

					<?php if (get_cookie('mode') == 1) { ?>

						<div class="modal fade" id="modal<?= $member->id_member ?>form" tabindex="-1" role="dialog"
							 aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<form method="post"
											  action="<?= base_url("member/update/" . $member->id_member) ?>">
											<div class="form-row">
												<div class="form-group col-sm-12">
													<label for="service">Service</label>
													<select id="service" class="form-control" name="id_service">
														<?php foreach ($services as $service) { ?>
															<?php if ($service->id == $member->id_service) { ?>
																<option
																	value="<?= $service->id ?>" <?= "selected" ?>><?= $service->service ?></option>
															<?php } else { ?>
																<option
																	value="<?= $service->id ?>"><?= $service->service ?></option>
															<?php }
														} ?>
													</select>
												</div>
												<div class="form-group col-sm-12">
													<label for="prenom">Prénom</label>
													<input type="text" id="prenom" class="form-control" name="prenom" value="<?= $member->prenom ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="nom">Nom</label>
													<input type="text" id="nom" class="form-control" name="nom" value="<?= $member->nom ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="t_fixe">Téléphone fixe 1</label>
													<input type="text" id="t_fixe" class="form-control" name="t_fixe" value="<?= $member->t_fixe ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="t_mobile">Téléphone mobile</label>
													<input type="text" id="t_mobile" class="form-control"
														   name="t_mobile" value="<?= $member->t_mobile ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="t_fixe_2">Téléphone fixe 2</label>
													<input type="text" id="t_fixe_2" class="form-control"
														   name="t_fixe_2" value="<?= $member->t_fixe_2 ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="batiment">Bâtiment</label>
													<input type="text" id="batiment" class="form-control"
														   name="batiment" value="<?= $member->batiment ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="bureau">Bureau</label>
													<input type="text" id="bureau" class="form-control" name="bureau" value="<?= $member->bureau ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="sexe">Sexe</label>
													<select id="sexe" class="form-control" name="sexe">
														<option value="sans" <?php if ($member->sexe == "sans") { ?>selected<?php } ?>>Sans</option>
														<option value="femme" <?php if ($member->sexe == "femme") { ?>selected<?php } ?>>Femme</option>
														<option value="homme" <?php if ($member->sexe == "homme") { ?>selected<?php } ?>>Homme</option>
													</select>
												</div>
												<div class="form-group col-sm-12">
													<label for="email">Email</label>
													<input type="email" id="email" class="form-control" name="mail" value="<?= $member->mail ?>">
												</div>
												<div class="form-group col-sm-12">
													<label for="autre">Autre</label>
													<textarea id="autre" class="form-control" name="autre"><?= $member->autre ?></textarea>
												</div>
												<div class="form-group col-sm-12">
													<label for="matricule">Matricule</label>
													<input type="text" id="matricule" class="form-control"
														   name="matricule" value="<?= $member->matricule ?>">
												</div>
												<div class="form-group col-sm-12">
													<input class="btn btn-dark" type="submit" value="Envoyer">
												</div>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-dark" data-dismiss="modal">
											Fermer
										</button>
									</div>
								</div>
							</div>
						</div>

					<?php } ?>

				</div>
			</div>
		<?php } ?>
		<?php } else { ?>
			<div class="col-sm-12">
				<p>Aucune fiche trouvée pour votre recherche.</p>
			</div>
		<?php } ?>
	</div>
</main>
