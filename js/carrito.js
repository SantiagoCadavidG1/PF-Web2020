window.onload = function(){
	if(document.getElementById("procesar_compra")){
		document.getElementById("procesar_compra").onclick= procesar_compra;

	}
}

$(document).ready(function(){
	$.ajax({
		url : 'servicios/pedido/get_procesar.php',
		type: 'POST',
		data:{},
		success:function(data){
			let html='';
			let sumaMonto=0;
			for (var i = 0; i < data.datos.length; i++) {
				html+=
				'<div class="item-pedido">'+
					'<div class="pedido-img">'+
						'<img src="assets/products/'+data.datos[i].imagen+'">'+
					'</div>'+
					'<div class="pedido-detalle">'+
						'<h3>'+data.datos[i].nombre+'</h3>'+
						'<p><b>Precio:</b> '+formato_precio(data.datos[i].precio)+'</p>'+
						'<p><b>Fecha:</b> '+data.datos[i].fecha_pedido+'</p>'+
						'<p><b>Estado:</b> '+data.datos[i].estado+'</p>'+
						'<p><b>Dirección:</b> '+data.datos[i].direccion_pedido+'</p>'+
						'<p><b>Celular:</b> '+data.datos[i].telefono_pedido+'</p>'+
					'</div>'+
				'</div>';
				sumaMonto+=parseInt(data.datos[i].precio)+1;
			}
			document.getElementById("space-list").innerHTML=html;
		},
	});
});


function procesar_compra(){
	let dirusu=document.getElementById("direccion_usuario").value;
	let telusu=document.getElementById("telefono_usuario").value;
	let tipopago=1;
	
	console.log(telusu, dirusu);
	if (document.getElementById("tipo2").checked) {
		tipopago=2;
	}
	if (dirusu=="" || telusu=="") {
		alert("Complete la direccion y/o celular");
	}else{
		if (!document.getElementById("tipo1").checked && !document.getElementById("tipo2").checked) {
			alert("Seleccione un método de pago!");
		}else{
			$.ajax({
				url:'servicios/pedido/confirm.php',
				type:'POST',
				data:{
					dirusu:dirusu,
					telusu:telusu,
					tipopago:tipopago,
				},
				success:function(data){
					console.log(data);
					if (data.state) {
						window.location.href="pedido.php";
						alert(data.detail); 
					}else{
						alert(data.detail);
					}
				},
			});
		}
	
	}
}

function formato_precio(valor){
	//199
	let svalor=valor.toString();
	//let array=svalor.split(".");
	return "USD "+svalor;
}