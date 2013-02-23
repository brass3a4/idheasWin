	/*
	 * 
    Copyright 2013, i(dh)eas, Litigio Estratégico en Derechos Humanos A.C


    This file is part of bd(i).

    bd(i) is free software: you can redistribute it and/or modify


    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    bd(i) is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with bd(i). If not, see <http://www.gnu.org/licenses/>.


	 * */
$(document).ready(function() {
    
    $('#eliminarActor').click(function() {
		
		var name =  $('#eliminarActor').attr('name');
		
		var cadena = name.split('&');
		
		var id = cadena[0];
		
		var tipo = cadena[1];
		
		eliminarActor(id,tipo);
				
    });
    
    $('#eliminarCaso').click(function() {
		
		var idCaso =  $('#eliminarCaso').attr('name');
		
		eliminarCaso(idCaso);
				
    });
    
});

function returnActores(){
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
}

function returnCasos(){
		document.location.href = base+'index.php/casos_c/mostrar_caso';
}

function returnRelacionCasos(){
	document.location.href = base+'index.php/casosVentanas_c/mostrarCasos';
}

function searchCaso(){
	
		$('#numeroRegistros').html('');
		
		var nombre = $('#'+active+'_nombre').val();
	
		var url = base+'index.php/casos_c/buscarCasos';
	
		var data = 'cadena='+nombre;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	               
	          $('#listaActorIndiv').html(data);  
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
}


function cargarActor(actor,tipo){
	
	var nombre = $('#'+active+'_nombre').val();
			
	var filtro = getRadioButtonSelectedValue(document.frmR.filtroR);
	if(nombre == ''){
		nombre = '0';
	}
	if(filtro == null){		
	
		filtro=0;
				
	}
	
	document.location.href = base+'index.php/actores_c/mostrar_actor/'+actor+'/'+tipo+'/'+nombre+'/'+filtro;
	
}

function cargarCaso(casoId){
    document.location.href = base+'index.php/casos_c/mostrar_caso/'+casoId;

}
function desplegarActores(nombre, filtro, tipoActor){

	if(nombre != '' || filtro != 0){
		
		var url = base+'index.php/actores_c/filtrarActor';
	
		var data = 'cadena='+nombre+'&tipoFiltro='+filtro+'&tipoActor='+tipoActor;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	        	
	        	$('#listaActorIndiv').html(data);  
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
		
	}else{
		
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
		
	}
	
	
}

function filtroRadio(filtro){
	
	$('#numeroRegistros').html('');
	
	if(filtro==5){
		var filtro = getRadioButtonSelectedValue(document.frmR.filtroR);
		
	}
	
	var ventana = $('#tipoVentana').attr('name');				
			
	var tipoActor = $('#tipoActor').attr('name');		
			
	if(filtro == null && nombre==''){		
	
		alert('Introduce un filtro válido de búsqueda')
	}
	if(filtro == null){		
	
		filtro=0;
				
	}
	if(ventana == 0){
		
		var nombre = $('#'+active+'_nombre').val();
		
		desplegarActores(nombre, filtro, tipoActor);
	}else{
		
		var nombre = $('#actores_nombre').val();
		desplegarActoresVentana(nombre, filtro, tipoActor,ventana);
	}
		
	
	
}


function desplegarActoresVentana(nombre, filtro, tipoActor,ventana){
	
	if(nombre != '' || filtro != 0){
		
		var url = base+'index.php/actores_c/filtrarActorVentana';
	
		var data = 'cadena='+nombre+'&tipoFiltro='+filtro+'&tipoActor='+tipoActor+'&ventana='+ventana;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	        	if(ventana == 1){
	        		$('#ventana1Filtro').html(data);  
	        	}
	        	if(ventana == 2){
	        		$('#ventana2Filtro').html(data);  
	        	}
	        	if(ventana == 3){
	        		$('#ventana3Filtro').html(data);  
	        	}
	        	if(ventana == 4){
	        		$('#ventana4Filtro').html(data);  
	        	}
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
		
	}else{
		
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
		
	}
	
}

function getRadioButtonSelectedValue(ctrl)
{
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked) return ctrl[i].value;
}

function eliminarActor(id,tipoActor){
	
	var url = base+'index.php/actores_c/eliminar_actor';
	
	var data = 'actorId='+id+'&tipoActor='+tipoActor;

	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
             alert(data);    
              
             document.location.href = base+'index.php/actores_c/mostrar_actor/0/'+tipoActor;
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
	
}

function eliminarCaso(idCaso){
	
	var url = base+'index.php/casos_c/eliminarCaso';
	
	var data = 'idCaso='+idCaso;
	
	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
             alert(data);    
              
             document.location.href = base+'index.php/casos_c/mostrar_caso/';
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
}


function changeTest (tipo) { 
	
	var actor = $('#tipoActorAE').attr('name');
	
	var actorId = $('#actorId').attr('name');
	if(actor == 1){
		if(tipo == 1){
			var Index = document.menuForm.datosDeNacimiento_paisesCatalogo_paisId.options[document.menuForm.datosDeNacimiento_paisesCatalogo_paisId.selectedIndex].value; 
			document.getElementById('datosDeNacimiento_municipiosCatalogo_municipioId').options.length = 0;
		}
		if(tipo == 2){
			var Index = document.menuForm.datosDeNacimiento_estadosCatalogo_estadoId.options[document.menuForm.datosDeNacimiento_estadosCatalogo_estadoId.selectedIndex].value; 
			document.getElementById('datosDeNacimiento_municipiosCatalogo_municipioId').options.length = 0;
		}
	}
	if(actor == 2){
		if(tipo == 1){
			var Index = document.menuForm.infoMigratoria_lugarOrigenPaisId.options[document.menuForm.infoMigratoria_lugarOrigenPaisId.selectedIndex].value; 
			document.getElementById('infoMigratoria_lugarOrigenMunicipioId').options.length = 0;
		}
		if(tipo == 2){
			var Index = document.menuForm.infoMigratoria_lugarOrigenEstadoId.options[document.menuForm.infoMigratoria_lugarOrigenEstadoId.selectedIndex].value; 
			document.getElementById('infoMigratoria_lugarOrigenMunicipioId').options.length = 0;
		}
	}
	if(actor == 3){
		
			if(tipo == 1){
				var Index = document.menuForm.direccionActor_paisesCatalogo_paisId.options[document.menuForm.direccionActor_paisesCatalogo_paisId.selectedIndex].value; 
				document.getElementById('direccionActor_municipiosCatalogo_municipioId').options.length = 0;
			}
			if(tipo == 2){
				var Index = document.menuForm.direccionActor_estadosCatalogo_estadoId.options[document.menuForm.direccionActor_estadosCatalogo_estadoId.selectedIndex].value; 
				document.getElementById('direccionActor_municipiosCatalogo_municipioId').options.length = 0;
			}
	}
	if(actor == 4){
		
		if(tipo == 1){
				var Index = document.menuForm.lugares_paisesCatalogo_paisId.options[document.menuForm.lugares_paisesCatalogo_paisId.selectedIndex].value; 
				document.getElementById('lugares_municipiosCatalogo_municipioId').options.length = 0;
			}
			if(tipo == 2){
				var Index = document.menuForm.lugares_estadosCatalogo_estadoId.options[document.menuForm.lugares_estadosCatalogo_estadoId.selectedIndex].value; 
				document.getElementById('lugares_municipiosCatalogo_municipioId').options.length = 0;
			}
	}
	
	if(actor == 5){
		if(tipo == 1){
				var Index = document.menuForm.derechoAfectado_paisesCatalogo_paisId.options[document.menuForm.derechoAfectado_paisesCatalogo_paisId.selectedIndex].value; 
				document.getElementById('derechoAfectado_municipiosCatalogo_municipioId').options.length = 0;
			}
			if(tipo == 2){
				var Index = document.menuForm.derechoAfectado_estadosCatalogo_estadoId.options[document.menuForm.derechoAfectado_estadosCatalogo_estadoId.selectedIndex].value; 
				document.getElementById('derechoAfectado_municipiosCatalogo_municipioId').options.length = 0;
			}
	}
	
	//$("#notasUltimaOcupacion").html(Index+tipo);

	var url = base+'index.php/actores_c/filtroPaisEstado';
	
	var data = 'tipo='+tipo+'&id='+Index+'&actorId='+actorId;
	
	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
        	if(actor == 1){
        		if(tipo == 1){
        			var select=document.getElementById('datosDeNacimiento_estadosCatalogo_estadoId');
  					select.removeAttribute('disabled');
        			
	             	$("#datosDeNacimiento_estadosCatalogo_estadoId").html(data);	             
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('datosDeNacimiento_municipiosCatalogo_municipioId');
  					select.removeAttribute('disabled');
  					
					$("#datosDeNacimiento_municipiosCatalogo_municipioId").html(data);					
	             }
        	}
        	if(actor == 2){
        		if(tipo == 1){
        			var select=document.getElementById('infoMigratoria_lugarOrigenEstadoId');
  					select.removeAttribute('disabled');
  					
        			$("#infoMigratoria_lugarOrigenEstadoId").html(data);
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('infoMigratoria_lugarOrigenMunicipioId');
  					select.removeAttribute('disabled');
  					
	             	$("#infoMigratoria_lugarOrigenMunicipioId").html(data);
	             }
        		
        	}
        	
        	if(actor == 3){
        		if(tipo == 1){
        			var select=document.getElementById('direccionActor_estadosCatalogo_estadoId');
  					select.removeAttribute('disabled');
  					
        			$("#direccionActor_estadosCatalogo_estadoId").html(data);
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('direccionActor_municipiosCatalogo_municipioId');
  					select.removeAttribute('disabled');
  					
	             	$("#direccionActor_municipiosCatalogo_municipioId").html(data);
	             }
        		
        	}
        	if(actor == 4){
        		
        		if(tipo == 1){
        			var select=document.getElementById('lugares_estadosCatalogo_estadoId');
  					select.removeAttribute('disabled');
	             	$("#lugares_estadosCatalogo_estadoId").html(data);
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('lugares_municipiosCatalogo_municipioId');
  					select.removeAttribute('disabled');
  					
					$("#lugares_municipiosCatalogo_municipioId").html(data);
	             }
        		
        	}
        	
        	if(actor == 5){
        		
        		if(tipo == 1){
        			var select=document.getElementById('derechoAfectado_estadosCatalogo_estadoId');
  					select.removeAttribute('disabled');
  					
	             	$("#derechoAfectado_estadosCatalogo_estadoId").html(data);
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('derechoAfectado_municipiosCatalogo_municipioId');
  					select.removeAttribute('disabled');
  					
					$("#derechoAfectado_municipiosCatalogo_municipioId").html(data);
	             }
        		
        	}
             
            
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
} 

function changeTest2 (tipo) { 
	
	
		if(tipo == 1){
			var Index = document.menuForm.direccionActor_paisesCatalogo_paisId.options[document.menuForm.direccionActor_paisesCatalogo_paisId.selectedIndex].value; 
			document.getElementById('direccionActor_municipiosCatalogo_municipioId').options.length = 0;
		}
		if(tipo == 2){
			var Index = document.menuForm.direccionActor_estadosCatalogo_estadoId.options[document.menuForm.direccionActor_estadosCatalogo_estadoId.selectedIndex].value; 
			document.getElementById('direccionActor_municipiosCatalogo_municipioId').options.length = 0;

		}
	
	
	//$("#notasUltimaOcupacion").html(Index+tipo);

	var url = base+'index.php/actores_c/filtroPaisEstado';
	
	var data = 'tipo='+tipo+'&id='+Index;
	
	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        		if(tipo == 1){
        			var select=document.getElementById('direccionActor_estadosCatalogo_estadoId');
  					select.removeAttribute('disabled');
  					
	             	$("#direccionActor_estadosCatalogo_estadoId").html(data);
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('direccionActor_municipiosCatalogo_municipioId');
  					select.removeAttribute('disabled');
  					
					$("#direccionActor_municipiosCatalogo_municipioId").html(data);
	             }
             
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
} 
function changeTest3 (tipo) { 
	
		if(tipo == 1){
			var Index = document.menuForm.datosDeNacimiento_paisesCatalogo_paisId.options[document.menuForm.datosDeNacimiento_paisesCatalogo_paisId.selectedIndex].value; 
			document.getElementById('datosDeNacimiento_municipiosCatalogo_municipioId').options.length = 0;
		}
		if(tipo == 2){
			var Index = document.menuForm.datosDeNacimiento_estadosCatalogo_estadoId.options[document.menuForm.datosDeNacimiento_estadosCatalogo_estadoId.selectedIndex].value; 
			document.getElementById('datosDeNacimiento_municipiosCatalogo_municipioId').options.length = 0;
		}

	//$("#notasUltimaOcupacion").html(Index+tipo);

	var url = base+'index.php/actores_c/filtroPaisEstado';
	
	var data = 'tipo='+tipo+'&id='+Index;
	
	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
        		if(tipo == 1){
        			var select=document.getElementById('datosDeNacimiento_estadosCatalogo_estadoId');
  					select.removeAttribute('disabled');
        			
	             	$("#datosDeNacimiento_estadosCatalogo_estadoId").html(data);	             
	             }  
	             if(tipo == 2){
	             	var select=document.getElementById('datosDeNacimiento_municipiosCatalogo_municipioId');
  					select.removeAttribute('disabled');
  					
					$("#datosDeNacimiento_municipiosCatalogo_municipioId").html(data);					
	             }
        	
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
} 


function clearDiv(){
	
	var idActor = $('#idActor').attr('name');
	
	var url = base+'index.php/actores_c/traerDirecciones';
	
	var data = 'idActor='+idActor;
	
	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        		
        		document.getElementById('direccionActorIndividual').innerHTML = data;
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
	
	 // document.getElementById('direccionActorIndividual').innerHTML = "<fieldset><legend>Dirección</legend>";
}
