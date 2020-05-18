var cart = [];
function addCart(){
	$('.btn-add-card').click(function(){
		let obj = new Object();
		obj.id = $(this).attr('data-id');

		let result  = cart.find( x => x.id == obj.id);  
		if( result == undefined){
			obj.name = $(this).parent().siblings('.name').text();
			obj.img = $(this).parent().siblings('.img').children('img').attr('src');
			obj.price = $(this).parent().siblings('.img').children('.price').val();
			obj.quantity = 1; 
			cart.push(obj);
		}else{

			result.quantity++; 
		}
		$('.cart-count').text(cart.length);
		addListCartHtml(cart);
		showCartBox();
	})
}
addCart();
hiddenCartBox();
function removeCartBox(){
	$('.product .delete').click(function(){
		$(this).parent().remove();
	})
}
function showCartBox(){
	$('.cart-box').css({
		'display': 'block' 
	});  
	removeCartBox();
}
function hiddenCartBox(){
	$(document).mouseup(function(e) 
	{
	    var container = $(".cart-box .box-left");

	    if (!container.is(e.target) && container.has(e.target).length === 0) 
	    {
	        $('.cart-box').css({
				'display': 'none' 
			}); 
	    }
	});
}
function addListCartHtml( cart){
	$('.product-in-cart').html('');  
	$.each( cart , function( index, el ){
		addCartHtml(el);
	})
	changeQuantity();
}
function addCartHtml(obj){
	let row = `<div class="product">
					<div class="img">
						<img src="${obj.img}" alt="">
					</div>
					<div class="content">
						<div class="info">
							<p class="product-name">  ${obj.name} </p>
							<p class="price"> <span class="old"> 900.00Đ</span> ${obj.price}</p>
							<p class="text-uppercase"> Số lượng</p>
							<div class="form-group d-flex quantity">
								
								<button class="minus" data-id="${obj.id}"><i class="fas fa-minus"></i> </button>
								<input type="number" name="quantity" value="${obj.quantity}">
								<button class="plus" data-id="${obj.id}"> <i class="fas fa-plus"></i></button>
							</div>
						</div>
					</div>
					<button class="delete"><i class="fas fa-times"></i></button>
				</div>`; 
	$('.product-in-cart').append(row);  
}

function changeQuantity(){
	$('.quantity .plus').click(function(){
		let id  = $(this).attr('data-id');
		let result = cart.find( x => x.id == id);  
		result.quantity++;  
		let quantity = eval($(this).siblings('input').val());
		quantity = quantity + 1; 
		$(this).siblings('input').val(quantity);
	})
	$('.quantity .minus').click(function(){
		let id  = $(this).attr('data-id');
		let result = cart.find( x => x.id == id);  
		result.quantity--;
		if( result.quantity < 0 ) result.quantity = 0 ;  
		let quantity = eval($(this).siblings('input').val());
		quantity = quantity - 1;  
		if( quantity < 0  ) quantity = 0 ;
		$(this).siblings('input').val(quantity);
	})
}