document.addEventListener("DOMContentLoaded", function() {

	$("a").click( function (event) {
        
        event.preventDefault();
        var url = $(this).attr("href");

	    if (url) {
			if (url.substr(0,1) == "#") {
				$('html, body').animate({
		            scrollTop: $(url).offset().top
		        }, 2000);
			} else {
				$(".grid-container").fadeOut("fast").css("display: none");
				document.location.href=url;
			}
		}
        
    });

});

window.onload = function() {
	$(".grid-container").fadeIn().css("display: block");
};