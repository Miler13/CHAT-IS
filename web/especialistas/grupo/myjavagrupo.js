$(document).ready(paginationgrupo(1));
$(function(){
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-datos').modal({
			show:true,
			backdrop:'static'
		});
	});	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = 'grupo/busca_grupo.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registrosgrupo').html(datos);
		}
	});
	return false;
	});	
});
function agregarRegistro(){
	var url = 'grupo/agrega_semestre.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#grupo').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registrosgrupo').html(registro);
			$('#pro').val('Registro');
			return false;
			}else{
			$('#grupo').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registrosgrupo').html(registro);
			return false;
			}
		}
	});
	return false;
}
function eliminarRegistro(id){
	var url = 'grupo/elimina_grupo.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registrosgrupo').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}
function editarRegistro(id){
	$('#formulario')[0].reset();
	var url = 'grupo/edita_semestre.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-registro').val(id);
				$('#nombre').val(datos[0]);
				$('#registra-datos').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function paginationgrupo(partida){
	var url = 'grupo/paginar_grupo.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registrosgrupo').html(array[0]);
			$('#paginationgrupo').html(array[1]);
		}
	});
	return false;
}


function mostrar(id){
	var url = 'grupos.php';
	
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registrosgrupo').html(registro);
			return false;
		}
	});
	return false;
	
	}