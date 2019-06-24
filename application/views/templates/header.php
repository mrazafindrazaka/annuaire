<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"/>
</head>
<body>
<header class="container-fluid bg-dark pt-2 pb-4 mb-4 fixed-top">
	<div class="container pl-0 pr-0">
		<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
			<a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo_nancy.png') ?>" alt=""></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse" id="collapsingNavbar">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a class="nav-link" href="https://wikinancy/" target="_blank">Base de connaissance</a></li>
					<?php if (get_cookie('user') == NULL) { ?>
						<li class="nav-item"><a class="nav-link" href="<?= base_url("member/login") ?>">Connexion</a></li>
					<?php } else { ?>
						<?php if (get_cookie('mode') == 1) { ?>
							<li class="nav-item"><a class="nav-link" href="<?= base_url("member/create") ?>">Administration</a></li>
						<?php } ?>
						<li class="nav-item"><a class="nav-link" href="<?= base_url("member/disconnection") ?>">Déconnexion</a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>
		<div class="row">
			<div class="col-sm-12">
				<form method="post" action="<?= base_url("home/search"); ?>">
					<div class="input-group">
						<label for="search"></label>
						<input id="search" class="form-control" type="text" name="search"
							   placeholder="Rechercher une personne, une fonction, un service, un numéro*..." <?php if (isset($search) && !empty($search)) { ?>value="<?= $search ?>" <?php } ?>/>
						<input class="btn btn-danger input-group-btn" type="submit" value="Rechercher"/>
					</div>
				</form>
				<span class="badge badge-danger">* 1 numéro de téléphone (séparé ou non par des espaces uniquement)</span>
			</div>
		</div>
	</div>
</header>
