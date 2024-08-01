function load(page) {
	$("#calculate").show();
	$("#calculate").fadeIn(400).html("<center><img src='img/load_loader.gif' style='width:80px;margin:30pt'/></center>");
	topFunction();
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#calculate').html(data);
				 $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
			} catch (err) {
				alert(err);
			}
		}
	});
}

