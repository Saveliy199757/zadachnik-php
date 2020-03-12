$(document).ready(function() {
	$('form.form_block').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					window.location.href = '/' + json.url;
					location.reload();
				} else {
					alert(json.status + ' - ' + json.message);
					location.reload();
				}
			},
			error: function (xhr, ajaxOptions, thrownError) {
				alert("Доступ запрещён, статус: 404" );
				location.reload()
			}
		});
	});
});

