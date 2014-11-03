app = {
	init: function() {
		_this = this;

		//click.init();
	}
}

click = {
	init: function() {
		_this = this;

		//_this.buttonCreatePost();
	},

	buttonCreatePost: function() {
		$("#formCreatePost").on("submit", function() {
			//ajax.createPost($(this));
			//return false;
		})
	}
}

ajax = {
	createPost: function(e) {

		$.ajax ({
			url: e.attr("action"),
			type: e.attr("method"),
			data: e.serialize(),
			success: function(html) {
				var page = $(html);
				var error = $(html).find('.error');
				if(error.length) {
					$(".error").fadeOut({
						complete: function() {
							$(".error").empty().text(error.text())
						}
					}).fadeIn();
				} else {
					$("body").fadeOut({
						complete: function() {
							$("body").empty().append(page);
							window.history.pushState("", "", location.origin + location.pathname + "?method=home");
						}
					}).fadeIn();
				}

				//console.log(error);
			}
		

		})
	}
}



$(function() {
	app.init();
})