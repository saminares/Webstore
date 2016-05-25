var xmlhttp = new XMLHttpRequest();

function addToCart(id){
	xmlhttp.onreadystatechange = updateCart;
	xmlhttp.open('GET', 'cartXML.php?id='+id);
	xmlhttp.send();

}

function updateCart(){
	var html='';
	var total=0;
	if (xmlhttp.readyState == 4) {
		//alert (xmlhttp.responseText);
		var xml = xmlhttp.responseXML;
		var products = xml.getElementsByTagName('Album');
		for (var i= 0; i < products.length; i++){
			var name = products[i].firstChild.firstChild.nodeValue;
			var price = products[i].lastChild.firstChild.nodeValue;
			// childNodes[o] == firstChild
			html += name+', '+price+'&euro;<br />';
			total =  parseInt(total) + parseInt(price);
		}
		html += '<b>Total Price: '+total+'&euro;</b>'
		document.getElementById('cart').innerHTML = html;
	}
}