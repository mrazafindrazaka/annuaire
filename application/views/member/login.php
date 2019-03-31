<main class="container mt-5">
	<div class="login-form center-align">
		<form method="post" action="<?= base_url("member/connection") ?>">
			<h3 class="mb-4">Connexion</h3>
			<div class="form-group">
				<label for="user">Utilisateur</label>
				<input type="text" class="form-control" id="user" name="user" placeholder="Utilisateur" required="required">
			</div>
			<div class="form-group">
				<label for="pwd">Mots de passe</label>
				<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Mots de passe" required="required">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-dark">Connexion</button>
			</div>
		</form>
	</div>
</main>
