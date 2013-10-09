$(function() {

	$('header nav').corner("10px");

	$('.wraplink').wraplink();

	// hover menu companies
	companies_menu();

});



function companies_menu(){
	var nav = $('.element_menu_companies').find('nav');
	var nav_link = nav.find('li');
	var page_class = nav.attr('class');
	nav_link.mouseover(function() {
		var this_class = $(this).attr("class");
		nav.attr('class', this_class);
	}).mouseout(function(){
		nav.attr('class', page_class);
	});
}