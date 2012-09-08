$(document).ready(function() {
	

	$('div.brick').on('mousedown', function(e) {
		$(this).addClass("grabbed");
    });

	$('div.brick').on('mouseup', function(e) {
		$(this).removeClass("grabbed");

    });

	$('a.btn-close').on('click', function(e) {
		$(this).closest('div.brick').remove();
    });



	
	$('a.tryagain').on('click', function(e) {
		runRearrange();
    });
	


});