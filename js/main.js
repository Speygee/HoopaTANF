$(document).ready(function(){
	$("#menu-icon").click(function() {
		$("#site-menu").toggle();
		$("#search-bar").hide();
	});
	
	$("#search-icon").click(function() {
		$("#site-menu").hide();
		$("#search-bar").toggle();
	});

});
