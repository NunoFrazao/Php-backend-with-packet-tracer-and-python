$(document).ready(() => {
	// Create timeline
	var tl = anime.timeline({
		easing: 'easeOutExpo',
		duration: 1500,
		loop: false
	});

	// Add childrens to timeline
	tl.add({
		targets: '.anime-dash-divs',
		opacity: [0,1],
		translateY: [30,0],
		delay: function(el, i) {return i * 250;}
	});
	
});