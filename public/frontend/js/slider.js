var countSlider = 0 ; 
var detal = 1; 
var _maxCountSlider = $('.slider__container .slider-item').length;

nextSlide(); 
prewSlide();

var autoNextSlide = setInterval(autoMoveSlide,5000);  
slider();
// setInterval(function(){
// 	countSlider+= detal;  
// 	slider(); 
// }, 5000)
function slider(){
	if( countSlider > _maxCountSlider) countSlider = 1 ; 
	if( countSlider < 1 ) countSlider = _maxCountSlider; 
	$('.slider__container .slider-item').css({
		'display' : 'none',  

	}); 
	$('.slider__container .slider-item:nth-child(' + countSlider+ ')').css({
		'display' : 'block'
	});
}
function autoMoveSlide(){
	
	
}
function nextSlide(){
	$('.slider__container .btn-direct button.next').click(function(){
		clearInterval(autoNextSlide); 
		detal = 1;
		countSlider += detal; 
		slider(); 
		autoNextSlide = setInterval(autoMoveSlide,5000)
	})

}
function prewSlide(){
	$('.slider__container .btn-direct button.prew').click(function(){
		clearInterval(autoNextSlide); 
		detal = -1;  
		countSlider += detal; 
		slider(); 
		autoNextSlide = setInterval(autoMoveSlide,5000)
	})

}

function autoMoveSlide(){
	countSlider+= detal;  
	slider(); 
}