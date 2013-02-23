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
function notasCatalogos(tipo,value,escribeNotas,id){
	
	if(tipo == '2'){
		var notas =document.getElementById(value+'OC').getAttribute("name");
	}else{
		var notas =document.getElementById(value).getAttribute("name");	
	}
	

	if(notas!=""){
		 if(id=="1"){
		 	$('#'+escribeNotas).html(notas); 
		 } 
		 else{
		 	notas="botonNotas('"+notas+"')";
		 	$('#notas'+escribeNotas).html('<input type="button" value="i" class="tiny button" onclick="'+notas+'" />');

		 }	
	}
	else{
		$('#notas'+escribeNotas).html(" "); 
	}
}
function notasCatalogos2(notas,escribeNotas,id){
	if(notas!=""){
		 if(id=="1"){
		 	$('#'+escribeNotas).html(notas); 
		 } 
		 else{
		 	notas="botonNotas('"+notas+"')";
		 	$('#notas'+escribeNotas).html('<input type="button" value="i" class="tiny button" onclick="'+notas+'" />');

		 }	
	}
	else{
		$('#notas'+escribeNotas).html(" "); 
		 	$('#'+escribeNotas).html(" "); 
	}
}
function botonNotas(notas){
    var windowSizeArray = [ "width=350,height=150" ];
    OpenWindow=window.open(base+'index.php/casosVentanas_c/notas', 'notas del catálogo', windowSizeArray);;
	OpenWindow.document.write("<title>Notas</title>")
	OpenWindow.document.write("<body>")
	OpenWindow.document.write("<script>function cerrarVentana(){window.close();	};</script>");
	OpenWindow.document.write("<h6>"+notas+"</h6>")
	OpenWindow.document.write("<center><input type='button' value='Cerrar' onclick='cerrarVentana()' /></center>")
	OpenWindow.document.write("</body>")
}

/**función que despliega el catalogo de tipo de perpetrador**/
function tipoPerpetrador(id, notas, descripcion, nivel,flechita,e){
	
	numNivel=nivel.substr(5, 5);
	$("#tipoPerpetrador").html(descripcion);
	$("#notasPerpetrador").html(notas);
	//$().html(id);//Aqui agrego el id del tipo de perpetrador
	$('#'+nivel+id).toggleClass("Escondido");
	$('.cambiarColorPerpetrador').css('background-color', '#efefef');
    $(e).css('background-color', '#ddd');
    document.getElementById('perpetradores_tipoPerpetradorId').value=id;
    document.getElementById('perpetradores_tipoPerpetradorNivel').value=numNivel;

	subnivel= $(e).attr('value');
	    if (subnivel == "subnivel"){
				$(e).toggleClass("ExpanderFlecha");
    			$('.cambiarColorPerpetrador').css('background-color', '#efefef');
		};
		
}
/**función que despliega el catalogo de tipo de intervención**/
function tipoIntervencion(id, descripcion, nivel,flechita,e){
	
	numNivel=nivel.substr(5, 5);
	$("#tipoIntervencion").html(descripcion);
	//$().html(id);//Aqui agrego el id del tipo de perpetrador
	$('#'+nivel+id).toggleClass("Escondido");
	$('.cambiarColorPerpetrador').css('background-color', '#efefef');
    $(e).css('background-color', '#ddd');
    document.getElementById('intervenciones_tipoIntervencionId').value=id;
    document.getElementById('intervenciones_intervencionNId').value=numNivel;

	subnivel= $(e).attr('value');
	    if (subnivel == "subnivel"){
				$(e).toggleClass("ExpanderFlecha");
    			$('.cambiarColorPerpetrador').css('background-color', '#efefef');
		};
		
}
/* Notas Grado de involucramiento */

function involucramientoPerpetradores(notas, descripcion, id, nivel,e) {

	$('#subNivelInvolucramiento'+id).toggleClass("Escondido");
	$("#gradoDeInvolucramiento").html(descripcion);
	$("#notasgradoDeInvolucramiento").html(notas);
	$('.colorTipoPerpetrador').css('background-color', '#efefef');
    $(e).css('background-color', '#ddd');
    document.getElementById('perpetradores_gradoInvolucramientoid').value=id;
    document.getElementById('perpetradores_nivelInvolugramientoId').value=nivel;

    subnivel= $(e).attr('value');
	    if (subnivel == "subnivel"){
				$(e).toggleClass("ExpanderFlecha");
    			$('.colorTipoPerpetrador').css('background-color', '#efefef');
		};
}


function tipoLugarNotas(notas, descripcion, id, e, nivel) {

	$('#subnivel'+id).toggleClass("Escondido");
	$("#tipoLugarActo").html(descripcion);
	$("#notastipoLugarActo").html(notas);
    document.getElementById('perpetradores_tipoLugarId').value=id;
    document.getElementById('perpetradores_tipoLugarNivelId').value=nivel;
	$('.colorTipoLugar').css('background-color', '#efefef');
    $(e).css('background-color', '#ddd');

    subnivel= $(e).attr('value');
	    if (subnivel == "subnivel"){
				$(e).toggleClass("ExpanderFlecha");
    			$('.colorTipoLugar').css('background-color', '#efefef');
		};
}