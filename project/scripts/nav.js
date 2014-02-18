
function show_menu(x)
{	
	var menu = $(x).find('.menu')
	$(menu).stop().slideDown();
}

function hide_menu(y)
{
	$('.nav .tabs .tab .menu').stop().slideUp('fast');
}

function on(x)
{
	$(x).stop().slideDown('fast');
}