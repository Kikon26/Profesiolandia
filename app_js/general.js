var bloqueaPantalla=function(object) {
	//$('.splash').css('display','block');
	$(".preloader").fadeIn();
}
var desbloqueaPantalla=function(object) {
	$(".preloader").fadeOut();
	$("#main-wrapper").attr("data-sidebartype","mini-sidebar");

}
