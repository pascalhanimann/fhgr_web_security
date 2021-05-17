$(document).ready(function() {
	$(window).scroll(function() {
		if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
			$("nav").addClass("small").removeClass("large");
		} else {
			$("nav").addClass("large").removeClass("small");
		}
	});
	
	$("header").click(function() {
		$("nav").toggleClass("visible hidden");
		$("header").toggleClass("open");
	});
});

hljs.initHighlightingOnLoad();