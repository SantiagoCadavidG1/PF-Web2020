$(document).ready(function(){
			$.ajax({
				url:'servicios/productos/get_all_products.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					for (var i = 0; i < data.datos.length; i++) {
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