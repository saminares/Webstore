function addToCart(id){
	$.getJSON('cartJSON.php?ID='+id, function(products){
		var html = '';
		$.each(products, function(i){
			var name = products[i].product;
			var price = products[i].price;
			html += name+', '+price+'€<br />';	
		});
		$('#cart').html(html);
	});
}

function emptyCart(){
	$('#cart').load('emptyCart.php');
}

/*
var xmlhttp = new XMLHttpRequest();

function addToCart(id){
	xmlhttp.onreadystatechange = updateCart;
	xmlhttp.open('GET', 'cartJSON.php?ID='+id);
	xmlhttp.send();
}

function updateCart(){
	if(xmlhttp.readyState == 4){
		var response = xmlhttp.responseText;
		var html = '';
		var products = eval('(' + response + ')');
		for (var i = 0; i < products.length; i++){
			var name = products[i].product;
			var price = products[i].price;
			//alert(name+price);
			html += name+', '+price+'€<br />';			
		}
		document.getElementById('cart').innerHTML = html;
	}
}

function emptyCart(){
	xmlhttp.onreadystatechange = function(){
									if(xmlhttp.readyState == 4){
										document.getElementById('cart').innerHTML = 'Cart empty';
									}
								}
	xmlhttp.open('GET', 'emptyCart.php');
	xmlhttp.send();
}

*/

