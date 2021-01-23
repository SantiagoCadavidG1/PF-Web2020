
$(document).ready(function(){
	$.ajax({
		url:'servicios/pedido/get_procesados.php',
		type:'POST',
		data:{},
		success:function(data){
			console.log(data);
			let html='';
			let monto=0;
			for (var i = 0; i < data.datos.length; i++) {
				html+=
				'<div class="item-pedido">'+
					'<div class="pedido-img">'+
						'<img src="assets/products/'+data.datos[i].imagen+'">'+
					'</div>'+
					'<div class="pedido-detalle">'+
						'<h3>'+data.datos[i].nombre+'</h3>'+
						'<p><b>Precio:</b> USD .'+data.datos[i].precio+'</p>'+
						'<p><b>Fecha:</b> '+data.datos[i].fecha_pedido+'</p>'+
						'<p><b>Estado:</b> '+data.datos[i].estadotext+'</p>'+
						'<p><b>Dirección:</b> '+data.datos[i].direccion_pedido+'</p>'+
						'<p><b>Celular:</b> '+data.datos[i].telefono_pedido+'</p>'+
					'</div>'+
				'</div>';
				if (data.datos[i].estadotext=='Por pagar') {
					monto+=parseFloat(data.datos[i].precio);

				}else if(data.datos[i].estadotext=='Por entregar'){
					monto = 0;
				}
				else{
					monto =0;
					console.log(data.datos[i].estado);
				}
			}
			document.getElementById("montototal").innerHTML=monto;
			document.getElementById("space-list").innerHTML=html;

		},
	});
});