$(document).ready(function () {
	$('.delete').click(function () {
		let r = confirm("Voulez-vous vraiment supprimer cette fiche?");

		if (r === true) {
			let card = $(this).closest($('.card'));
			let id = $(this).attr('id');

			$.ajax({
				url: base_url + "member/delete/" + id,
				cache: false,
				success: function (result) {
					let data = $.parseJSON(result);
					if (data === 'done')
						card.fadeOut(500, function () {
							card.remove();
						});
				}
			});
		}
	});

	$(".detail").click(show_detail);

	function show_detail() {
		let id = $(this).attr('id').substr(1);
		let counter = 0;

		while (counter < info_member.length) {
			if (info_member[counter].id_member === id)
				break;
			counter++;
		}
		let html = '<div class="modal-dialog modal-dialog-centered" role="document">' +
			'<div class="modal-content">' +
			'<div class="modal-body">' +
			'<ul class="list-group">' +
			'<li class="list-group-item">Nom-Prénom: ' + info_member[counter].nom + ' ' + info_member[counter].prenom + '</li>' +
			'<li class="list-group-item">Service: ' + info_member[counter].service + '</li>' +
			'<li class="list-group-item">Téléphone fixe: ' + info_member[counter].t_fixe + '</li>' +
			'<li class="list-group-item">Téléphone mobile: ' + info_member[counter].t_mobile + '</li>' +
			'<li class="list-group-item">Téléphone fixe2: ' + info_member[counter].t_fixe_2 + '</li>' +
			'<li class="list-group-item">Bâtiment: ' + info_member[counter].batiment + '</li>' +
			'<li class="list-group-item">Bureau: ' + info_member[counter].bureau + '</li>' +
			'<li class="list-group-item">Sexe: ' + info_member[counter].sexe + '</li>' +
			'<li class="list-group-item">Mail: <a href="mailto:' + info_member[counter].mail + '">' + info_member[counter].mail + '</a></li>' +
			'<li class="list-group-item">Activités: ' + info_member[counter].autre + '</li>' +
			'<li class="list-group-item">Matricule: ' + info_member[counter].matricule + '</li>' +
			'</ul>' +
			'</div>' +
			'<div class="modal-footer">' +
			'<button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>' +
			'</div>' +
			'</div>' +
			'</div>;';
		if ($('#detail').length) {
			$('#detail').html(html);
			$('#detail').modal('show');
		} else {
			$('body').append('<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-hidden="true"></div>');
			$('#detail').html(html);
			$('#detail').modal('show');
		}
	}

	$(".modify").click(modify);

	function modify() {
		let id = $(this).attr('id').substr(1);
		let counter = 0;

		while (counter < info_member.length) {
			if (info_member[counter].id_member === id)
				break;
			counter++;
		}
		let html = '<div class="modal-dialog modal-dialog-centered" role="document">' +
			'<div class="modal-content">' +
			'<div class="modal-body">' +
			'<form method="post" action="' + base_url + 'member/update/' + info_member[counter].id_member + '">' +
			'<div class="form-row">' +
			'<div class="form-group col-sm-12">' +
			'<label for="service">Service</label>';

		html += '<select id="service" class="form-control" name="id_service">';
		let counter2 = 0;
		while (counter2 < services.length) {
			if (services[counter2].id === info_member[counter].id_service) {
				html += '<option selected value="' + services[counter2].id + '">' + services[counter2].service + '</option>';
			} else {
				html += '<option value="' + services[counter2].id + '">' + services[counter2].service + '</option>';
			}
			counter2++;
		}
		html += '</select>';

		html += '</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="prenom">Prénom</label>' +
			'<input type="text" id="prenom" class="form-control" name="prenom" value="' + info_member[counter].prenom + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="nom">Nom</label>' +
			'<input type="text" id="nom" class="form-control" name="nom" value="' + info_member[counter].nom + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="t_fixe">Téléphone fixe 1</label>' +
			'<input type="text" id="t_fixe" class="form-control" name="t_fixe" value="' + info_member[counter].t_fixe + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="t_mobile">Téléphone mobile</label>' +
			'<input type="text" id="t_mobile" class="form-control" name="t_mobile" value="' + info_member[counter].t_mobile + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="t_fixe_2">Téléphone fixe 2</label>' +
			'<input type="text" id="t_fixe_2" class="form-control" name="t_fixe_2" value="' + info_member[counter].t_fixe_2 + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="batiment">Bâtiment</label>' +
			'<input type="text" id="batiment" class="form-control" name="batiment" value="' + info_member[counter].batiment + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="bureau">Bureau</label>' +
			'<input type="text" id="bureau" class="form-control" name="bureau" value="' + info_member[counter].bureau + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="sexe">Sexe</label>';

		html += '<select id="sexe" class="form-control" name="sexe">' +
			'<option value="sans" ' + (info_member[counter].sexe === "sans" ? "selected" : "") + '>Sans</option>' +
			'<option value="femme" ' + (info_member[counter].sexe === "femme" ? "selected" : "") + '>Femme</option>' +
			'<option value="homme" ' + (info_member[counter].sexe === "homme" ? "selected" : "") + '>Homme</option>' +
			'</select>';

		html += '</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="email">Email</label>' +
			'<input type="email" id="email" class="form-control" name="mail" value="' + info_member[counter].mail + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="autre">Autre</label>' +
			'<textarea id="autre" class="form-control" name="autre">' + info_member[counter].autre + '</textarea>' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<label for="matricule">Matricule</label>' +
			'<input type="text" id="matricule" class="form-control" name="matricule" value="' + info_member[counter].matricule + '">' +
			'</div>' +
			'<div class="form-group col-sm-12">' +
			'<input type="hidden" name="back_location" value="' + search + '">' +
			'<input class="btn btn-dark" type="submit" value="Envoyer">' +
			'</div>' +
			'</div>' +
			'</form>' +
			'</div>' +
			'<div class="modal-footer">' +
			'<button type="button" class="btn btn-dark" data-dismiss="modal">Fermer</button>' +
			'</div>' +
			'</div>' +
			'</div>';
		if ($('#modify').length) {
			$('#modify').html(html);
			$('#modify').modal('show');
		} else {
			$('body').append('<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-hidden="true"></div>');
			$('#modify').html(html);
			$('#modify').modal('show');
		}
	}
});
