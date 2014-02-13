$(document).ready(function(){

/*center();*/
});

/********************************************************************************************/
/*funciton to authenticate user and load members view if passed*/
/*runns spinner till the authentication is done*/


function center() {
var h=$(document).height();
var w=$(document).width();
var h1=$('.box').height();
var w1=$('.box').width();

var left=(w/2)-(w1/2);
var top=(h/2)-(h1/2);
$('.box').css({'left':left,'top':top});
$('.explore').css({'left':left,'top':top+h1+5});
}