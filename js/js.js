app = {
	init: function() {
		_this = this;

		click.init();
		time.changeTime();
	}
}

click = {
	init: function() {
		_this = this;

		//_this.buttonCreatePost();
		_this.buttonAfficheComment();
		_this.buttonAddComment();
	},

	buttonCreatePost: function() {
		$("#formCreatePost").on("submit", function() {
			//ajax.createPost($(this));
			//return false;
		})
	},

	buttonAfficheComment: function() {
		$(".buttonAfficheComment").on("click", function() {
			comment.afficheComment();
		})
	},

	buttonAddComment: function() {
		$(".buttonAddComment").on("click", function() {
			comment.afficheForm();
		})
	}
}

comment = {
	afficheComment: function() {
		$("#showComment").slideToggle();
		$('html,body').animate({
			scrollTop: $("#showComment").offset().top
		}, 'slow');
	},

	afficheForm: function() {
		$("#formCreatePost").slideToggle();
		$('html,body').animate({
			scrollTop: $("#formCreatePost").offset().top
		}, 'slow');
	}

}

time = {
	changeTime: function() {
		var time = $(".time").text();
		time = time.split(" ")[0];
		setInterval(function() {
			time = time - 1;
			$('.time').fadeOut({
				complete: function() {
					$('.time').empty().text(time + ' minutes')
				}
			}).fadeIn()  
		}, 60000)
		
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