$(document).ready(function()
{	

	$('.proj_cell').mouseover(function()
	{	
		var cell=$(this).find('.share');
		$(cell).stop().css('visibility','visible');
		
	});
	$('.proj_cell').mouseout(function()
	{
		$('.proj_cell .share').css('visibility','hidden');
	});
	$('.proj_cell .share .link').click(function(){link($(this));});
	
	$('.nav .tabs .tab').bind('click',function(){show_menu(this);});
	$('.nav .tabs .tab .menu').bind('mouseout',function(){hide_menu(this);});
	$('.nav .tabs .tab').bind('mouseout',function(){hide_menu(this);});
	$('.nav .tabs .tab .menu').bind('mouseover',function(){on(this);});
	
});



function link(x)
{
	window.open('http://'+$(x).attr('href'),'_blank');
}