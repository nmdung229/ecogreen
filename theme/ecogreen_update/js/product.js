var week = 1; 
var day = 1;  
var hour = 1;  
var minutes = 59; 
var seconds = 60; 

var sumSeconds = week * 7 * 24 * 3600 +  day * 24 * 3600 + hour * 3600 + minutes * 60 + seconds; 
setInterval(function(){
	seconds-- ; 
	sumSeconds--; 
	if( seconds < 0 && sumSeconds > 60 ){
		seconds = 59 ; 
		minutes--; 
	}else if(seconds < 0){
		seconds = 0;
	}
	if( minutes < 0 && sumSeconds > 3600){
		minutes = 59; 
		hour--; 
	}else if( minutes < 0 ){
		minutes = 0 ;
	}
	if( hour < 0  && sumSeconds > 24 * 3600 ){
		day-- ;  
		hour = 23; 
	}else if( hour < 0 ){
		hour = 0 ;
	}
	if( day < 0  && sumSeconds > 24 * 3600 * 7){
		day = 7; 
		week--;
	}else if(day < 0) {
		day = 0 ;
	}

	updateTimer( week, day, hour, minutes, seconds);
}, 1000)

function updateTimer(week,  day , hour , minutes  ,seconds){
	$('.timer .week').text(fixText(week));
	$('.timer .day').text(fixText(day));
	$('.timer .hour').text(fixText(hour));
	$('.timer .minute').text(fixText(minutes));
	$('.timer .second').text(fixText(seconds));
}
function fixText(number){
	if( number > 9 ){
		return '' + number; 
	}
	return '0' + number;
}