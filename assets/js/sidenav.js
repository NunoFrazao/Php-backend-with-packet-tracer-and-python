$(document).ready(() => {
	/* Menu svg on click */
	$("div#top-nav span.span-icon").click(() => {
		$("div#side-nav").toggleClass("side-nav-hidden");
		$("div#content").toggleClass("content-hidden");
	});

	/* List item on click rotate icon */
	$("li#li-dropdown-sensor a").click(() => {
		$("li#li-dropdown-sensor svg").toggleClass("rotated-arrow");
	});

	$("li#li-dropdown-atuador a").click(() => {
		$("li#li-dropdown-atuador svg").toggleClass("rotated-arrow");
	});
});