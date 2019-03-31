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
						card.fadeOut(500, function() {
							card.remove();
						});
				}
			});
		}
	});
});
