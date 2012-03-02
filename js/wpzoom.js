(function($) { 
$(document).ready(function() {
 
$(".fancy").fancybox({
	'titleShow'		: true,
	'speedIn'		: 300,
	'speedOut'		: 200,
	'padding'		: 0,
	'overlayOpacity' : 0.8,
	'overlayColor'	: '#000',
	'centerOnScroll' : true,
	'easingIn': 'easeOutBack',
	'easingOut': 'easeInBack',
	'scrolling': 'no'
 });
 
 
$(".fade").css("opacity","0.5");
$(".fade").hover(function () {
    $(this).stop().animate({
        opacity: 1.0
    }, "quick");
}, function () {
    $(this).stop().animate({
        opacity: 0.5
    }, "quick");
});
 
});
})(jQuery);