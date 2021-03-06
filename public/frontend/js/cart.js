var cart = [];
// console.log('1234');
function addCart() {
	$('.btn-add-card').click(function(){
		let obj = new Object();
		obj.id = $(this).attr('data-id');
        // alert(obj.id);
        $.ajax({
            url: "/cart/add",
            type: "GET",
            dataType: "json",
            data: {
                id: obj.id
            },
            beforeSend: function () {
            },
            success: function (res) {
                $('.cart-count').text(Object.keys(res).length);
                addListCartHtml(res);
            },
            error: function () {
            },
            complete: function () {
            }
        });

		// $('.cart-count').text(cart.length);
		// addListCartHtml(cart);
		showCartBox();
	})
}
addCart();
hiddenCartBox();


function removeItemfromCart (id) {

    var result = confirm("Bạn có chắc chắn muốn bỏ sản phẩm khỏi giỏ hàng?");
    if (result) { // neu nhấn == ok , sẽ send request ajax, dc r.
        $.ajax({
            url: "/cart/delete", // base_url được khai báo ở đầu page == http://webshop.local
            type: 'GET',
            // data: {}, // dữ liệu truyền sang nếu có
            data: { id: id }, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax


                // console.log(response);
               // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    var quantity = $('.cart-count').html();
                    quantity--;
                    $('.cart-count').text(quantity);
                    $('.product-'+id).remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index

                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

function removeItemfromFlexCart (id) {

    var result = confirm("Bạn có chắc chắn muốn bỏ sản phẩm khỏi giỏ hàng?");
    if (result) { // neu nhấn == ok , sẽ send request ajax, dc r.
        $.ajax({
            url: "/cart/delete", // base_url được khai báo ở đầu page == http://webshop.local
            type: 'GET',
            // data: {}, // dữ liệu truyền sang nếu có
            data: { id: id }, // dữ liệu truyền sang nếu có
            dataType: "json", // kiểu dữ liệu trả về
            success: function (response) { // success : kết quả trả về sau khi gửi request ajax


                // console.log(response);
                // dữ liệu trả về là một object nên để gọi đến status chúng ta sẽ gọi như bên dưới
                if (response.status != 'undefined' && response.status == true) {
                    // xóa dòng vừa được click delete
                    var quantity = $('.cart-count').html();
                    quantity--;
                    $('.cart-count').text(quantity);
                    $('.product-'+id).remove(); // class .item- ở trong class của thẻ td đã khai báo trong file index
                }
            },
            error: function (e) { // lỗi nếu có
                console.log(e.message);
            }
        });
    }
}

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

function showCartIndex() {

    $.ajax({
        url: "/cart/getData",
        type: "GET",
        dataType: "json",
        data: {
        },
        beforeSend: function () {
        },
        success: function (res) {

            $('.cart-count').text(Object.keys(res).length);
            addListCartHtml(res);
            // showCartBox();
        },
        error: function () {
        },
        complete: function () {
        }
    });
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
function addListCartHtml(cart){
	$('.product-in-cart').html('');
	$.each( cart , function( index, el ){
		addCartHtml(el);
	})
	changeQuantity();
}
function addCartHtml(obj){
	let row = `<div class="product product-${obj.product.id}">
					<div class="img">
						<img src="${obj.product.image}" alt="">
					</div>
					<div class="content">
						<div class="info">
							<p class="product-name">  ${obj.product.name} </p>
							<p class="price"> <span class="old"> ${obj.product.sale}</span> ${obj.product.price}</p>
							<p class="text-uppercase"> Số lượng</p>
							<div class="form-group d-flex quantity">

								<button class="minus" data-id="${obj.product.id}"><i class="fas fa-minus"></i> </button>
								<input type="number" name="quantity" value="${obj.quantity}">
								<button class="plus" data-id="${obj.product.id}"> <i class="fas fa-plus"></i></button>
							</div>
						</div>
					</div>
					<a href="javascript:void(0)" onclick="removeItemfromFlexCart(${obj.product.id})"><button class="delete"><i class="fas fa-times"></i></button></a>
				</div>`;
	$('.product-in-cart').append(row);
}

function changeQuantity(){
	$('.quantity .plus').click(function(){
		let id  = $(this).attr('data-id');
		let result = cart.find( x => x.id == id);
		if( result != undefined){
            result.quantity++;
        }

		let quantity = eval($(this).siblings('input').val());
		quantity = quantity + 1;
		$(this).siblings('input').val(quantity);
	})
	$('.quantity .minus').click(function(){
		let id  = $(this).attr('data-id');

		let result = cart.find( x => x.id == id);
        if( result != undefined){
            result.quantity--;
            if( result.quantity < 0 ) result.quantity = 0 ;
        }

		let quantity = eval($(this).siblings('input').val());
		quantity = quantity - 1;
		if( quantity < 0  ) quantity = 0 ;
		$(this).siblings('input').val(quantity);
	})
}
changeQuantity();
showCartIndex();
