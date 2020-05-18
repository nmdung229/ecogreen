$(window).scroll(function(e){
	if( $(this).scrollTop() == 0){
		$('.menu').removeClass('fixed-top');
	}else{
		$('.menu').addClass('fixed-top');
	}
})