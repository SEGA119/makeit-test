
/* Ajax Call function (refactor needs) */
function ajaxCall(action, params, success_callback) {
	$.ajax({
		async: true,
		dataType: "json",
		url: globals.ajaxurl,
		type: 'POST',
		data: {
			action: action,
			nonce: globals.nonce,
			params: params
		}
	}).done(success_callback);
}