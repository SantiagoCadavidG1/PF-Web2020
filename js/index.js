
window.onload = function (){
	
	if(document.getElementById("boton_compra")){
		document.getElementById("boton_compra").onclick= iniciar_compra;	
	}
	

}



var p = getParameterByName('p');


function iniciar_compra(){

		$.ajax({
			url:'servicios/compra/validar_inicio_compra.php',
			type:'POST',
			data:{
				codigo:p
			},
			success:function(data){
				console.log(data);
				if (data.state) {
					alert(data.detail);
				}else{
					alert(data.detail);
					if (data.open_login) {
						open_login();
					}
				}
			},
			error:function(err){
				console.error(err);
			}
		});

}

function open_login(){
	window.location.href="login.php"
}

$(document).ready(function(){
			$.ajax({
				url:'servicios/productos/get_all_products.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
						if ( p !="" && data.datos[i].codigo==p) {
							document.getElementById("idimg").src="assets/products/"+data.datos[i].imagen;
							document.getElementById("idtitle").innerHTML=data.datos[i].nombre;
							document.getElementById("idprice").innerHTML=formato_precio(data.datos[i].precio);
							document.getElementById("iddescription").innerHTML=data.datos[i].descripcion;
						}
						html+=
						'<div class="product-box">'+
							'<a href="producto.php?p='+data.datos[i].codigo+'">'+
								'<div class="product">'+
									'<img src="assets/products/'+data.datos[i].imagen+'">'+
									'<div class="detail-title">'+data.datos[i].nombre+'</div>'+
									'<div class="detail-description">'+data.datos[i].descripcion+'</div>'+
									'<div class="detail-price">'+formato_precio(data.datos[i].precio)+'</div>'+
								'</div>'+
							'</a>'+
						'</div>';
					}
					document.getElementById("space-list").innerHTML=html;
				},
			});
		});

function formato_precio(valor){
	//199
	let svalor=valor.toString();
	//let array=svalor.split(".");
	return "USD "+svalor;
}

//funcion que devuelve el valor de una variable enviada por URL
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}