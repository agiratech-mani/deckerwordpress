(function($) {
$(function() {


// Remove WPRM on not Book New pages
var url = window.location.href;
if (url.search("book-communicate-to-influence") < 0) { 
	$("#wprmenu_bar").attr('style', 'display: none !important');
	$("html").attr('style', 'padding-top: 0 !important');
}


// For hompage header background
function homePageBg() {
	var dScreenWidth = $(window).width();	
	var url = window.location.href;
	
	if (dScreenWidth <= 480) {
		var bookSize = $("#djumbotron div:first-child img").height();
		
		if (url == "http://decker.com/book-communicate-to-influence/") {
			$("#dheader").hide();
			$("#djumbotron iframe").attr("height", "250px");
		} 
		
		$(".site-header").css({"background-size":'100%' + ((bookSize + 100) + 'px')});
		$("#djumbotron div:nth-child(2)").css({"padding-top":"80px"});
		$(".site-header").css({"height":"auto"});

		//Warning footer for iphone
		$(".dwarning img").attr("src", "/wp-content/themes/decker-new-book/images/mob_warning.png");

	} else if (dScreenWidth <= 768 && url == "http://decker.com/book-communicate-to-influence/") {
		$(".site-header").css({"height":"1350px"});
		
	} else {
		if (url == "http://decker.com/book-communicate-to-influence/") {
			$("#dheader").show();
		} 
	
		$(".site-header").css({"background-size":"cover"});
		$(".site-header").css({"height":"135px"});		
		$("#djumbotron div:nth-child(2)").css({"padding-top":"0px"});
		$("#djumbotron iframe").attr("height", "339px");

		//Warning footer for desktop
		$(".dwarning img").attr("src", "/wp-content/themes/decker-new-book/images/spkg_warning.jpg");

		//Speaking page video
		$("#speaking .row2 iframe").height(360);
		
	}
} 
$(window).resize(function() {
	homePageBg();
});
homePageBg();



// Video Overlay
$("#play-cti").hide();
$("#video-cti").on("click",function(){
	$('#video-cti .video-overlay').fadeOut(2000);
	$("#play-cti").show();	
	$("#play-cti")[0].src += "&autoplay=1";
	ev.preventDefault();
});


});
})(jQuery);

