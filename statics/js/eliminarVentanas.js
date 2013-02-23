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
function eliminarLugar(idLugar,idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminarLugar/'+idLugar+'/'+idCaso;
}
function eliminarFicha(fichaId,idCaso){
	
	document.location.href = base+'index.php/casosVentanas_c/eliminarFicha/'+fichaId+'/'+idCaso;
}

function eliminarRegistro(idRegistro,idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminarRegistro/'+idRegistro+'/'+idCaso;
}

// function eliminarDerechoAfectado(derechoId, idCaso){
// 	document.location.href = base+'index.php/casosVentanas_c/eliminarDerechoAfectado/'+derechoId+'/'+idCaso;
// }

function eliminarFuenteDocumental(fuenteDocId, idCaso, actorReportado){
	document.location.href = base+'index.php/casosVentanas_c/eliminarFuenteInfoDocumental/'+fuenteDocId+'/'+idCaso+'/'+actorReportado;
}

function eliminarFuentePersonal(fuentePersonalId, idCaso,casoActorIdActorId,actorReportado){
	document.location.href = base+'index.php/casosVentanas_c/eliminarFuenteInfoPersonal/'+fuentePersonalId+'/'+idCaso+'/'+casoActorIdActorId+'/'+actorReportado; 
}

function eliminarRelacionCasos(relacionId,idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminaRelacionCasos/'+relacionId+'/'+idCaso;
}

function eliminarIntervencion(intervencionId,idCaso,casoActorIdReceptor,casoActorIdInterventor){
	document.location.href = base+'index.php/casosVentanas_c/eliminarIntervencion/'+intervencionId+'/'+idCaso+'/'+casoActorIdReceptor+'/'+casoActorIdInterventor;
}

