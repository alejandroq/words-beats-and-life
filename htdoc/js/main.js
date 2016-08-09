$(document).ready(function() {

/*
*
*	jQuery Implementations
*
*/
	// 
	// @param toggle #stack_menu
	// 
	// @return toggle #stack_menu 
	// 
	$('#stack_menu').on('click', function() {
		if ($('nav').is(':visible')){
			$('#stack_menu').removeClass('selected');
		} else {
			$('#stack_menu').addClass('selected');
		}
		$('nav').toggle(150);
	});

	// 
	// @param hide nav in mobile 
	// 
	// @return toggle #stack_menu && add selected class to selected item
	// 
	$('nav a').on('click', function() {
		
		if ($(window).width() < 856) {
			$('nav').hide(150);
			$('#stack_menu').removeClass('selected');
		}

		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		} else {
			$(this).addClass('selected');
		}
	});

	// 
	// @param shrink header 
	// 
	// @return add shrink class upon scroll to header
	// 	
		$(document).on("scroll", function(){
		if ($(document).scrollTop() > 30){
		  	$("#wrapper").addClass("shrink");
			$("#branding-logo").addClass('logo-shrink');
			$(".navigation_controls").addClass('menu-shrink');
			$("header").addClass('header-shrink');
			if ($(window).width() > 670) {
				$("nav").addClass('nav-shrink');
				$("#tools").addClass('nav-shrink');
			}
		}
		else
		{
			$("#wrapper").removeClass("shrink");
			$("#branding-logo").removeClass('logo-shrink');
			$(".navigation_controls").removeClass('menu-shrink');
			$("header").removeClass('header-shrink');
			if ($(window).width() > 670) {
				$("nav").removeClass('nav-shrink');
				$("#tools").removeClass('nav-shrink');
			}
		}
	});

	// 
	// @param click 'News' 
	// 
	// @return toggle news
	//
	$('.todo').on('click', function() {
		$('#todos').toggle(200);
		$('#tools').hide(200);
	});
	$('#account').on('click', function() {
		$('#tools').toggle(200);
		$('#todos').hide(200);
	});
	$('#tools a').on('click', function() {
		$('#tools').hide(200);
	});
	$('#todos').on('click', function() {
		$('#todos').toggle(200);
	});
	$('#logout').on('click', function() {
		$('#tools').hide(200);
		$('#todos').hide(200);
	});
	
});