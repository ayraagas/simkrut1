$('.toggle').on('click', function() {
  $('.container').stop().addClass('active');
});

$('.close').on('click', function() {
  $('.container').stop().removeClass('active');
  $("#form-register").find("input, select").popover("destroy");
});

$.validator.setDefaults({
	errorPlacement: function( error, element ) {
		// if ( element.type === "radio" ) {
		// 	this.findByName( element.name ).addClass( errorClass ).removeClass( validClass );
		// } else {
		// 	$( element ).addClass( errorClass ).removeClass( validClass );
		// }
		var text = error.html();
		if (error !== true) {
			$(element).popover({
				content: error.html(),
				placement: "right",
				trigger: "manual",
				container: "body"
			});
			$(element).popover("show");
			error = true;
		}
	},
	success: function( error, element ) {
		$(element).popover("destroy");
	}
});

$("#form-register").validate({
	rules: {
		nim: {
			remote: {
				url: $("base").prop("href")+"ajax/check_nim"
			}
		},
		repeat_password: {
			equalTo: "#password"
		}
	},
	messages: {
		nim: {
			remote: "NIM yang anda masukkan sudah ada!"
		},
		repeat_password: {
			equalTo: "Masukkan password yang sama"
		}
	}
});
