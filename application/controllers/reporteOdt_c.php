<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
class ReporteOdt_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
			$this->load->library('word');
       }
	
	
	function index() 
	{
		
		$this->generaReporteLargoOdt($casoId);
	}
	
	function traer_catalogos(){
        
        $datos['paisesCatalogo'] = $this->general_m->obtener_todo('paisesCatalogo', 'paisId', 'nombre');
        
        $datos['estadosCatalogo'] = $this->general_m->obtener_todo('estadosCatalogo', 'estadoId', 'nombre');
        
        $datos['municipiosCatalogo'] = $this->general_m->obtener_todo('municipiosCatalogo', 'municipioId', 'nombre');
        
        $datos['gruposIndigenasCatalogo'] = $this->general_m->obtener_todo('gruposIndigenas', 'grupoIndigenaId', 'descripcion');
        
        $datos['estadosCivilesCatalogo'] = $this->general_m->obtener_todo('estadoCivil', 'estadoCivilId', 'descripcion');
        
        $datos['ocupacionesCatalogo'] = $this->general_m->obtener_todo('ocupacionesCatalogo', 'ocupacionId', 'descripcion');
        
        $datos['nacionalidadesCatalogo'] = $this->general_m->obtener_todo('nacionalidadesCatalogo', 'nacionalidadId', 'nombre');
        
        $datos['relacionActoresCatalogo'] = $this->general_m->obtener_todo('relacionActoresCatalogo', 'tipoRelacionId', 'nombre');
        
        $datos['actosCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['tipoPerpetrador'] = $this->catalogos_m->mTraerDatosCatalogoTipoPerpetrador();

        $datos['derechosAfectadosCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['nivelConfiabilidadCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('nivelConfiabilidadCatalogo');

        $datos['gradoDeInvolucramiento'] = $this->catalogos_m->mTraerDatosCatalogoGradoInvolucramiento();

        $datos['estatusPerpetradorCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('estatusPerpetradorCatalogo');

        $datos['estatusVictimaCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('estatusVictimaCatalogo');
		
		$datos['tipoFuenteCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoFuenteCatalogo');
		
		$datos['tipoFuenteDocumentalN1Catalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoFuenteDocumentalN1Catalogo');
		
		$datos['tipoFuenteDocumentalN2Catalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoFuenteDocumentalN2Catalogo');
		
		$datos['relacionCasosCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('relacionCasosCatalogo');
		
		$datos['tipoIntervencionN1Catalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoIntervencionN1Catalogo');
		
		$datos['tipoIntervencionN2Catalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoIntervencionN2Catalogo');
		
		$datos['tipoIntervencionN3Catalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoIntervencionN3Catalogo');
		
		$datos['tipoIntervencionN4Catalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoIntervencionN4Catalogo');
		
		$datos['tipoFechaCatalogo']= array('1'=>'Fecha exacta','2'=>'Fecha aproximada','3'=>'Se desconoce el día','4'=>'Se desconoce el mes y el día');

        $datos['ListaTodosActores'] = $this->actores_m-> mListaTodosActores();

        return $datos;
        
    }
	function generaReporteLargoOdt($casoId)
	{
		$datos['catalogos'] = $this->traer_catalogos();
		$Data['reporte']= $this->reportes_m->mReporteLargo($casoId);
		$Data['nombreCaso']=$Data['reporte']['casos']['nombre'];
		
		
		$section = $this->word->createSection(array('orientation'=>'landscape'));

		/**************Información general***********************/
		$contenidoReporte['EncabezadosInfoGeneral']="Información general" . "\n\n";
		$contenidoReporte['NombreCaso']='Nombre del caso:' ." " . $Data['reporte']['casos']['nombre'] . "\n";
		$contenidoReporte['PersonasAfectadas']="Personas afectadas:" ." " . $Data['reporte']['casos']['personasAfectadas'] . "\n";
		$contenidoReporte['fechaInicio']="Fecha de inicio:" ." " . $Data['reporte']['casos']['fechaInicial'] . "\n";
		if($Data['reporte']['casos']['tipoFechaInicialId'] > 0){
			$contenidoReporte['tipoFechaInicio'] = "Tipo fecha:  ".$datos['catalogos']['tipoFechaCatalogo'][$Data['reporte']['casos']['tipoFechaInicialId']]."\n";
		}
		$contenidoReporte['fechaTermino']="Fecha de término:" ." " . $Data['reporte']['casos']['fechaTermino'] . "\n";
		if($Data['reporte']['casos']['tipoFechaTerminoId'] > 0){
			$contenidoReporte['tipoFechaTermino'] = "Tipo fecha:  ".$datos['catalogos']['tipoFechaCatalogo'][$Data['reporte']['casos']['tipoFechaTerminoId']]."\n";
		}
		/******************************************/	
		
		/**************Lugares***********************/
		if (isset($Data['reporte']['lugares']	)) {
			foreach ($Data['reporte']['lugares'] as $key => $value) {
				
				$contenidoLugares['numeroLugar'.$key]=" Lugar:  ";
				$contenidoLugares['pais'.$key]=$datos['catalogos']['paisesCatalogo'][$value['paisesCatalogo_paisId']]['nombre'] . ", ";
				$contenidoLugares['estado'.$key]=$datos['catalogos']['estadosCatalogo'][$value['estadosCatalogo_estadoId']]['nombre'] . ", ";
				$contenidoLugares['municipio'.$key]=$datos['catalogos']['municipiosCatalogo'][$value['municipiosCatalogo_municipioId']]['nombre'];
			}
			
			
		}
		
		$lugares="";
		if(isset($contenidoLugares)){
			foreach ($contenidoLugares as $key => $value) {
				$lugares=$lugares." ".$value;
			}
		}
				/******************************************/
/******************************************/
		if(isset($Data['reporte']['infoCaso']['descripcion'])){	
			$contenidoReporte['encabezadoDescripcion']="\nDescripción:" . "\n\n";
			$contenidoReporte['descripcion']= $Data['reporte']['infoCaso']['descripcion']. "\n";
		}
/******************************************/
		if(isset($Data['reporte']['infoCaso']['resumen'])){
			$contenidoReporte['encabezadoResumen']="\nResumen:" . "\n\n";
			$contenidoReporte['resumen']= $Data['reporte']['infoCaso']['resumen']. "\n";
		}
/******************************************/
		if(isset($Data['reporte']['infoCaso']['observaciones'])){
			$contenidoReporte['encabezadoObservaciones']="\nObservaciones:" . "\n\n";
			$contenidoReporte['observacion']= $Data['reporte']['infoCaso']['observaciones']. "\n";
		}
/******************************************/
		
		/**************Seguimiento del caso***********************/
		if (isset($Data['reporte']['fichas']	)) {
			foreach ($Data['reporte']['fichas'] as $key => $value) {
				if(isset($value['fichaId'])){
					$contenidoSeguimientoCaso['claveId'.$key]= "Clave:  ".$value['fichaId']. "\n";
				}
				if(isset($value['titulo'])){
					$contenidoSeguimientoCaso['titulo'.$key]= "Título:  ".$value['titulo']. "\n";
				}
				if(isset($value['fecha'])){
					$contenidoSeguimientoCaso['fecha'.$key]= "Fecha:  ".$value['fecha']. "\n";
				}
				if(isset($value['comentarios'])){
					$contenidoSeguimientoCaso['fichaComentario'.$key]= "Comentarios:  ".$value['comentarios']."\n\n";
				}
			}
		}else{
			$contenidoSeguimientoCaso[1]="";
				
		}
		/******************************************/
		if(isset($Data['reporte']['nucleoCaso'])){
		/**************Nucleo del caso***********************/
		$contenidoNucleoCaso['fechaInicio']="Fecha de incio: " . $Data['reporte']['nucleoCaso']['fechaInicio']."\n";
		$contenidoNucleoCaso['fechaTermino']="Fecha de termino: " . $Data['reporte']['nucleoCaso']['fechaTermino']."\n";
		$contenidoNucleoCaso['noPersonasAfectadas']="Personas afectadas: " . $Data['reporte']['nucleoCaso']['noPersonasAfectadas']."\n";
		$contenidoNucleoCaso['municipiosCatalogo_municipioId']="Municipio: " . $datos['catalogos']['municipiosCatalogo'][$Data['reporte']['nucleoCaso']['municipiosCatalogo_municipioId']]["nombre"]."\n";
		$contenidoNucleoCaso['estadosCatalogo_estadoId']="Estado: " . $datos['catalogos']['estadosCatalogo'][$Data['reporte']['nucleoCaso']['estadosCatalogo_estadoId']]['nombre']."\n";
		$contenidoNucleoCaso['paisesCatalogo_paisId']="País: " . $datos['catalogos']['paisesCatalogo'][$Data['reporte']['nucleoCaso']['paisesCatalogo_paisId']]['nombre']."\n";
		/******************************************/
		}
		else{
			$contenidoNucleoCaso[1]="";
						
		}
		/**************Derechos afectados y actos***********************/
		
		if (isset($Data['reporte']['derechoAfectado'])) {
			$contenidoDerechoAfectado['encabezadoDErechosAfectados']="\n\nNúcleo del caso\n\nDerechos afectados y actos "."\n";
			foreach ($Data['reporte']['derechoAfectado'] as $key => $value) {
				
				if(isset($value['derechoAfectadoNivel']) && isset($value['derechoAfectadoId'])){
					$contenidoDerechoAfectado['derechoAfectado'.$key]="\n"."Derecho afectado:  ".$datos['catalogos']['derechosAfectadosCatalogo']['derechosAfectadosN'.$value['derechoAfectadoNivel'].'Catalogos'][$value['derechoAfectadoId']]['descripcion'] ."\n";
				}
				if(isset($Data['reporte']['actos'][$key]['actoViolatorioId'])){
					$contenidoDerechoAfectado['acto'.$key]="Acto:  ". $datos['catalogos']['actosCatalogo']['actosN'.$Data['reporte']['actos'][$key]['actoViolatorioNivel'].'Catalogo'][$Data['reporte']['actos'][$key]['actoViolatorioId']]['descripcion'] ."\n";
				}
				if(isset($value['noVictimas'])){
					$contenidoDerechoAfectado['noVictimas'.$key] = "No. afectados: ".$value['noVictimas']."\n";
				}
				if(isset($value['fechaInicial'])){
					$contenidoDerechoAfectado['fechaInicial'.$key]="Fecha de inicio:  ".$value['fechaInicial']."\n";
				}
				if($value['tipoFechaInicialId'] > 0){
					$contenidoDerechoAfectado['tipoFechaInicioDerechoAfectado'.$key] = "Tipo fecha:  ".$datos['catalogos']['tipoFechaCatalogo'][$value['tipoFechaInicialId']]."\n";
				}
				if(isset($value['fechaTermino'])){
					$contenidoDerechoAfectado['fechaTermino'.$key]="Fecha de termino:  " .$value['fechaTermino']."\n";
				}
				if(isset($value['tipoFechaTerminoId']) && $value['tipoFechaTerminoId'] > 0){
					$contenidoDerechoAfectado['tipoFechaTerminoDerechoAdectado'.$key] = "Tipo fecha:  ".$datos['catalogos']['tipoFechaCatalogo'][$value['tipoFechaTerminoId']]."\n";
				}
				
				$actoId=$Data['reporte']['actos'][$key]['actoId'];
				if (isset($Data['reporte']['victimas']	)) {
					$contenidoDerechoAfectado['EncabezadoVictimas'.$key]="\nVictimas  ". "\n";
					$nVic = 1;
					foreach ($Data['reporte']['victimas'] as $key => $value2) {
						$nPerp = 0;
						if ($value2['actos_actoId']==$actoId) {
							$contenidoDerechoAfectado['victimasComentarios'.$key]= "\n".'Víctima '.$nVic.': '.
							$datos['catalogos']['ListaTodosActores'][$value2['actorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value2['actorId']]['apellidosSiglas'] ."\n";
							if(isset($value2['comentarios'])){
								$contenidoDerechoAfectado['comentariosVictimasPerpetradores']="\n\nComentarios sobre víctimas y perpetradores:  \n". $value2['comentarios'];
							}
							if(isset($value2['estatusVictimaId'])){
								$contenidoDerechoAfectado['estatusVictimaId'.$key]="Estado:  ". $datos['catalogos']['estatusVictimaCatalogo']['estatusVictimaCatalogo'][$value2['estatusVictimaId']-1]['descripcion']."\n\n\n";
							}
							if (isset($Data['reporte']['perpetradores']	)) {
								$contenidoDerechoAfectado['EncabezadoPerpetradores'.$key]="\nPerpetradores  "."\n\n";
								foreach ($Data['reporte']['perpetradores'] as $key => $value3) {
									if ($value3['victimas_victimaId']==$value2['victimaId']) {
										$nPerp = $nPerp+1;
										$status = $value3['estatusPerpetradorCatalogo_estatusPerpetradorId'] -1;
										$contenidoDerechoAfectado['perpetradorId'.$key]="Perpetrador ".$nPerp.":  ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['apellidosSiglas'] ."\n";
										$contenidoDerechoAfectado['tipoPerpetradorId'.$key]="Tipo de perpetrador:  ".$datos['catalogos']['tipoPerpetrador']['tipoPerpetradorN'.$value3['tipoPerpetradorNivel'].'Catalogo'][$value3['tipoPerpetradorId']]['descripcion']. "\n";
										
										if(isset($value3['actorRelacionadoPerpetrador']) && $value3['actorRelacionadoPerpetrador']>0){
											$contenidoDerechoAfectado['actorRelacionadoPerpetatrador'.$key]="Actor colectivo relacionado:  ".$value3['actorRelacionadoPerpetrador'][$value3['actorRelacionadoId']]['nombre']."\n";
											$contenidoDerechoAfectado['tipoRelacionPerpetatrador'.$key]="Tipo de relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$value3['actorRelacionadoPerpetrador'][$value3['actorRelacionadoId']]['tipoRelacionId']]['Nivel2']."\n";
										}
										if(isset($value3['estatusPerpetradorCatalogo_estatusPerpetradorId'])){
											$contenidoDerechoAfectado['estatusPerpetradorId'.$key]="Estatus del perpetrador:  ". $datos['catalogos']['estatusPerpetradorCatalogo']['estatusPerpetradorCatalogo'][$value3['estatusPerpetradorCatalogo_estatusPerpetradorId']-1]['descripcion']."\n";
										}
										if( $value3['nivelInvolugramientoId'] != 0 ){
											$contenidoDerechoAfectado['gradoInvolucramientoid'.$key]="Grado de involucramiento:  ". $datos['catalogos']['gradoDeInvolucramiento']['gradoInvolucramientoN'.$value3['nivelInvolugramientoId'].'Catalogo'][$value3['gradoInvolucramientoid']]['descripcion']."\n\n";
										}
									}
									
								}
							}
						
						}
						$nVic = $nVic+1;
					}
				}

				

			}
		}else{
			$contenidoDerechoAfectado[1]="";
						
		}
		/******************************************/	
		
/**************Intervenciones***********************/

		if (isset($Data['reporte']['intervenciones'])) {
			foreach ($Data['reporte']['intervenciones'] as $key => $intervencion) {
				if(isset($intervencion['tipoIntervencionId'])){
					$contenidoIntervenciones['tipoIntervencion'.$key] = "Tipo de intervención:  ".$datos['catalogos']['tipoIntervencionN'.$intervencion['intervencionNId'].'Catalogo']['tipoIntervencionN'.$intervencion['intervencionNId'].'Catalogo'][$intervencion['tipoIntervencionId']-1]['descripcion']."\n";
				}
				$contenidoIntervenciones['intervencionFecha'.$key]=	"Fecha de la intervención:  ". $intervencion['fecha']."\n";
				
				if(isset($intervencion['interventorId']) && $intervencion['interventorId']>0){
					if ( ($datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['tipoActorId']) == 3) {
						$contenidoIntervenciones['intervencionInstitucion'.$key]=	"Institución:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
					}
				
					else{
						if($intervencion['interventorId']>0){				
							$contenidoIntervenciones['intervencionInterventor'.$key]=	"Interventor:  ".$datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
						}
						if($intervencion['tipoRelacionInterventor'] > 0){
							$contenidoIntervenciones['actorRelacionadoInterventor'.$key]= "Actor colectivo relacionado:  ".$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['nombre']."\n";
							if(isset($datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2'])){
								$contenidoIntervenciones['tipoRelacionInterventor'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2']."\n";
							}
						}
					}
				}
				
				if($intervencion['receptorId'] > 0){
					$contenidoIntervenciones['intervencionReceptor'.$key]=	"Receptor:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['apellidosSiglas'] ."\n";
				}
				if($intervencion['actorRelacionadoReceptor'] > 0){
					$contenidoIntervenciones['actorRelacionadoReceptor'.$key]= "Actor colectivo relacionado:  ".$intervencion['actorRelacionadoReceptor'][$intervencion['tipoRelacionReceptor']]['nombre']."\n";
					$contenidoIntervenciones['tipoRelacionReceptor'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoReceptor'][$intervencion['tipoRelacionReceptor']]['tipoRelacionId']]['Nivel2']."\n";
				}
				$contenidoIntervenciones['intervencionImpacto'.$key]=	"Impacto:  ". $intervencion['impacto']."\n";
				$contenidoIntervenciones['intervencionRespuesta'.$key]=	"Respuesta:  ". $intervencion['respuesta']."\n";
				
				$contenidoIntervenciones['encabezadoPerIntervenidas'] ="Personas por las que se intervino: "."\n";
				if(isset($intervencion['intervenidos'])){
					$i=1;
					foreach ($intervencion['intervenidos'] as $intervenido) {
						$contenidoIntervenciones['intervenido'.$i] = $datos['catalogos']['ListaTodosActores'][$intervenido['actorIntervenidoId']]['nombre']." ". $datos['catalogos']['ListaTodosActores'][$intervenido['actorIntervenidoId']]['apellidosSiglas'] ."\n";
						$i++;
					}
				}
				
				
				$contenidoIntervenciones['espaciosIntervenciones']= "\n\n\n";
			}
		}else{
			$contenidoIntervenciones[1]="";
						
		}	

		/******************************************/
		
		/**************Informcion Adicional***********************/

		if (isset($Data['reporte']['tipoFuenteDocumental'])) {
			foreach ($Data['reporte']['tipoFuenteDocumental'] as $key => $documental) {
					$contenidoFuenteDocumental['fuenteDocNombre'.$key]="\nNombre:  ".$documental['nombre']. "\n";
					$contenidoFuenteDocumental['tipofuenteDocumental'.$key]="Tipo fuente:  ".$datos['catalogos']['tipoFuenteDocumentalN'.$documental['tipoFuenteDocumentalCatalogoNivel'].'Catalogo']['tipoFuenteDocumentalN'.$documental['tipoFuenteDocumentalCatalogoNivel'].'Catalogo'][$documental['tipoFuenteDocumentalCatalogoId']-1]['descripcion']."\n";
					$contenidoFuenteDocumental['fuenteDocfechaPublicacion'.$key]="Fecha de publicación:  ".$documental['fecha']. "\n";
					$contenidoFuenteDocumental['fuenteDocfechaAcceso'.$key]="Fecha de acceso:  ".$documental['fechaAcceso']. "\n";
					$contenidoFuenteDocumental['fuenteDocinfoAdiocional'.$key]="Informción adicional:  ".$documental['infoAdicional']."\n";
					if(isset($documental['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
						$contenidoFuenteDocumental['fuenteDocNivelConfiabilidad'.$key]="Nivel de confiabilidad:  ". $datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$documental['nivelConfiabilidadCatalogo_nivelConfiabilidadId']-1]['descripcion']."\n";
					}
					$contenidoFuenteDocumental['fuenteDocLiga'.$key]= "Liga:  ".$documental['url']."\n";
					$contenidoFuenteDocumental['fuenteDocComentarios'.$key]= "comentarios:  ".$documental['comentarios']."\n";
					$contenidoFuenteDocumental['fuenteDocObaservaciones'.$key]= "observaciones:  ".$documental['observaciones']."\n";
					if(isset($documental['actorReportado']) && $documental['actorReportado'] > 0){
					$contenidoFuenteDocumental['infoAdicionalDocumentalReportado'.$key]="Actor reportado:  ".$datos['catalogos']['ListaTodosActores'][$documental['actorReportado']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$documental['actorReportado']]['apellidosSiglas']."\n";
					}
					if($documental['relacionId'] > 0){
							$contenidoReporte['actorRelacionadoDocReportado'.$key]= "Actor colectivo relacionado:  ".$documental['actorRelacionadoReportado'][$documental['relacionId']]['nombre']."\n";
							$contenidoReporte['tipoRelacionDoc'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$documental['actorRelacionadoReportado'][$documental['relacionId']]['tipoRelacionId']]['Nivel2']."\n";
					}
					$contenidoFuenteDocumental['espaciosFuentes']= "\n\n\n";
			}
		}else{
			$contenidoFuenteDocumental[1]="";
						
		}

		if (isset($Data['reporte']['fuenteInfoPersonal'])) {
			foreach ($Data['reporte']['fuenteInfoPersonal'] as $key => $infoAdicional) {
				$contenidoFuentePersonal['infoAdicionalPersonal'.$key]="Nombre:  ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorId']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorId']]['apellidosSiglas']."\n";
				if($infoAdicional['relacionId'] > 0){
						$contenidoFuentePersonal['actorRelacionadoPersonal'.$key]= "Actor colectivo relacionado:  ".$infoAdicional['actorRelacionadoPersonal'][$infoAdicional['relacionId']]['nombre']."\n";
						$contenidoFuentePersonal['tipoRelacionPersonal'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$infoAdicional['actorRelacionadoPersonal'][$infoAdicional['relacionId']]['tipoRelacionId']]['Nivel2']."\n";
				}
				if(isset($infoAdicional['tipoFuenteCatalogo_tipoFuenteId'])){
					$contenidoFuentePersonal['infoAdicionalTipoFuente'.$key] = "Tipo fuente:  ".$datos['catalogos']['tipoFuenteCatalogo']['tipoFuenteCatalogo'][$infoAdicional['tipoFuenteCatalogo_tipoFuenteId']-1]['descripcion']."\n";
				}
				if(isset($infoAdicional['fecha'])){
					$contenidoFuentePersonal['infoAdicionalfecha'.$key] = "Fecha:  ".$infoAdicional['fecha']."\n";
				}
				if(isset($infoAdicional['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
					$contenidoFuentePersonal['infoAdicionalNivelConfiabilidad'.$key] = "Nivel confiabilidad:  ".$datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$infoAdicional['nivelConfiabilidadCatalogo_nivelConfiabilidadId']-1]['descripcion']."\n";				
				}
				if(isset($infoAdicional['observaciones'])){
					$contenidoFuentePersonal['infoadicionalObservaciones'.$key]= "Observaciones:  ".$infoAdicional['observaciones']."\n";
				}
				if(isset($infoAdicional['comentarios'])){
					$contenidoFuentePersonal['infoadicionalComentarios'.$key]= "Comentarios:  ".$infoAdicional['comentarios']."\n";
				}
				if(isset($infoAdicional['actorReportado']) && $infoAdicional['actorReportado'] > 0){
					$contenidoFuentePersonal['infoAdicionalPersonalReportado'.$key]="Actor reportado:  ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorReportado']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorReportado']]['apellidosSiglas']."\n";
				}
				if($infoAdicional['tipoRelacionActorReportadoId'] > 0){
						$contenidoFuentePersonal['actorRelacionadoReportado'.$key]= "Actor colectivo relacionado:  ".$infoAdicional['actorRelacionadoReportado'][$infoAdicional['tipoRelacionActorReportadoId']]['nombre']."\n";
						$contenidoFuentePersonal['tipoRelacionPersonal'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$infoAdicional['actorRelacionadoReportado'][$infoAdicional['tipoRelacionActorReportadoId']]['tipoRelacionId']]['Nivel2']."\n\n\n";
				}
			}
		}else{
			$contenidoFuentePersonal[1]="";
						
		}
		
		if(isset($Data['reporte']['relacionCasos'])){
			foreach ($Data['reporte']['relacionCasos'] as $key => $relacionCasos) {
				if(isset($relacionCasos['nombreCasoIdB'])){
					$contenidoRelacionCasos['encabezadoCaso'.$key] = $Data['nombreCaso']."\n";
					$contenidoRelacionCasos['nombrecaso'.$key]="Caso relacionado:  ".$relacionCasos['nombreCasoIdB']."\n";
				}
				if(isset($relacionCasos['tipoRelacionId'])){
					$contenidoRelacionCasos['tipoRelacionCaso'.$key]="Tipo de relación:  ".$datos['catalogos']['relacionCasosCatalogo']['relacionCasosCatalogo'][$relacionCasos['tipoRelacionId']-1]['descripcion']."\n";
				}
				if(isset($relacionCasos['fechaIncial'])){
					$contenidoRelacionCasos['FechaInicio'.$key]="Fecha de inicio:  ".$relacionCasos['fechaIncial']."\n";
				}
				if(isset($relacionCasos['fechaTermino'])){
					$contenidoRelacionCasos['FechaTermino'.$key]="Fecha de término:  ".$relacionCasos['fechaTermino']."\n";
				}
			}	
			
		}else{
			$contenidoRelacionCasos[1]="";
		}

		/******************************************/
		
		// Add text elements
		$this->word->addFontStyle('Style', array('bold'=>true, 'size'=>13,));
		$this->word->addFontStyle('estilo', array('size'=>11));
		$this->word->addParagraphStyle('tituloStyle', array('align'=>'center'));
			$section->addText($Data['nombreCaso'], 'Style', 'tituloStyle');
		$section->addText('Información general', 'Style');
		$section->addText(' ', 'Style');
			$section->addText($contenidoReporte['NombreCaso'],'estilo');
			if(isset($contenidoReporte['PersonasAfectadas'])){
				$section->addText($contenidoReporte['PersonasAfectadas'],'estilo');
			}
			if(isset($contenidoReporte['fechaInicio'])){
				$section->addText($contenidoReporte['fechaInicio'],'estilo');
			}
			
		if(isset($lugares)){
			$section->addText(' ', 'Style');
			$section->addText('Lugares', 'Style');
			$section->addText(' ', 'Style');
				$section->addText($lugares,'estilo');
		}
			
		if(isset($contenidoReporte['descripcion'])){
			$section->addText(' ', 'Style');
			$section->addText('Descripción', 'Style');
			$section->addText(' ', 'Style');
				$section->addText($contenidoReporte['descripcion'],'estilo');
		}
		
		if(isset($contenidoReporte['resumen'])){
			$section->addText(' ', 'Style');
			$section->addText('Resumen', 'Style');
			$section->addText(' ', 'Style');
				$section->addText($contenidoReporte['resumen'],'estilo');
		}

		if(isset($contenidoReporte['observacion'])){
			$section->addText(' ', 'Style');
			$section->addText('Observaciones', 'Style');
			$section->addText(' ', 'Style');
				$section->addText($contenidoReporte['observacion'],'estilo');
		}
		
		if(isset($contenidoSeguimientoCaso)){
			$section->addText(' ', 'Style');
			$section->addText('Seguimiento del caso', 'Style');
			$section->addText(' ', 'Style');
			foreach ($contenidoSeguimientoCaso as $key => $value) {
				$seguimientoCaso[$key]=$value;
				$section->addText($seguimientoCaso[$key],'estilo');
			}
		}
		
		// if(isset($contenidoNucleoCaso)){
			// $section->addText(' ', 'Style');
			// $section->addText('Nuclo del caso', 'Style');
			// $section->addText(' ', 'Style');
			// foreach ($contenidoNucleoCaso as $key => $value) {
				// $nucleoCaso[$key]=$value;
				// $section->addText($nucleoCaso[$key],'estilo');
			// }
		// }
		
		if(isset($contenidoDerechoAfectado)){
			$section->addText(' ', 'Style');
			$section->addText('Derechos afectados y actos', 'Style');
			$section->addText(' ', 'Style');
			foreach ($contenidoDerechoAfectado as $key => $value) {
				$derechoAfectado[$key]=$value;
				$section->addText($derechoAfectado[$key],'estilo');
			}
		}
		
		if(isset($contenidoIntervenciones)){
			$section->addText(' ', 'Style');
			$section->addText('Intervenciones', 'Style');
			$section->addText(' ', 'Style');
			foreach ($contenidoIntervenciones as $key => $value) {
				$intervenciones[$key]=$value;
				$section->addText($intervenciones[$key],'estilo');
			}
		}

		if(isset($contenidoFuenteDocumental) || isset($contenidoFuentePersonal)){
			$section->addText(' ', 'Style');
			$section->addText('Información adicional', 'Style');
		}

		if(isset($contenidoFuenteDocumental)){
			$section->addText(' ', 'Style');
			$section->addText('Fuente documental', 'Style');
			$section->addText(' ', 'Style');
			foreach ($contenidoFuenteDocumental as $key => $value) {
				$fuenteDocumental[$key]=$value;
				$section->addText($fuenteDocumental[$key],'estilo');
			}
		}
		
		if(isset($contenidoFuentePersonal)){
			$section->addText(' ', 'Style');
			$section->addText('Fuente de información personal', 'Style');
			$section->addText(' ', 'Style');
			foreach ($contenidoFuentePersonal as $key => $value) {
				$fuentePersonal[$key]=$value;
				$section->addText($fuentePersonal[$key],'estilo');
			}
		}
		
		if(isset($contenidoRelacionCasos)){
			$section->addText(' ', 'Style');
			$section->addText('Relacion entre casos', 'Style');
			$section->addText(' ', 'Style');
			foreach ($contenidoRelacionCasos as $key => $value) {
				$relacionCasos[$key]=$value;
				$section->addText($relacionCasos[$key],'estilo');
			}
		}
			
		$filename='reporte_largo_del_'.$Data['nombreCaso'].'.odt'; //save our document as this file name
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		 
		$objWriter = PHPWord_IOFactory::createWriter($this->word, 'ODText');
		$objWriter->save('php://output');
	}
	
}

?>