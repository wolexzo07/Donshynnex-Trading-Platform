function load(page) {
$(".menuTag").hide();
$("#loadTemporal").show();
$("#loadTemporal").fadeIn(400).html("<center><img src='img/loader.gif' style='width:50px;margin:30pt;border-radius:100%;'/></center>");
topFunction();
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#calculate').html(data);
				$("#loadTemporal").hide();
			} catch (err) {
				alert(err);
			}
		}
	});
}

function pageLoader(page,pageid){
	$(".menuTag").hide();
$(pageid).show();
$(pageid).fadeIn(400).html("<center><img src='img/load_loader.gif' style='width:80px;margin:30pt'/></center>");
topFunction();
	$.ajax({
		type	: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$(pageid).html(data);
				
			} catch (err) {
				alert(err);
			}
		}
	});
}

function showalert(msg){
	Toastify({
	  text: msg,
	  duration: 3000,
	  //destination: "https://github.com/apvarun/toastify-js",
	  newWindow: true,
	  close: true,
	  gravity: "top", // `top` or `bottom`
	  position: "right", // `left`, `center` or `right`
	  stopOnFocus: true, // Prevents dismissing of toast on hover
	  style: {
		//background: "linear-gradient(to right, #00b09b, #96c93d)",
		background: "white",
		color:"green",
	  },
	  onClick: function(){} // Callback after click
	}).showToast();
}

function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
