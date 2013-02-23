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
class ReportePdf_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			$this->load->library('session');
        
			$this->is_logged_in();
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m'));
			$this->load->library('cezpdf');
       }
	
	
	function index() 
	{	
		$this->headers();
	}
    
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
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

	function generaReporteLargo($casoId)
	{

		$datos['catalogos'] = $this->traer_catalogos();
		$Data['reporte']= $this->reportes_m->mReporteLargo($casoId);
		$Data['nombreCaso']=$Data['reporte']['casos']['nombre'];
		// echo "<pre>";
		// print_r($datos['catalogos']['tipoIntervencionN1Catalogo']);
		$this->cezpdf->ezText($Data['nombreCaso'] , 15, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);
		
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
	$contenidoReporte['encabezadoLugares']="\nLugares\n\n";

	if (isset($Data['reporte']['lugares']	)) {
		foreach ($Data['reporte']['lugares'] as $key => $value) {
			
			$contenidoReporte['numeroLugar'.$key]=" Lugar:";
			$contenidoReporte['pais'.$key]=$datos['catalogos']['paisesCatalogo'][$value['paisesCatalogo_paisId']]['nombre'] . ", ";
			$contenidoReporte['estado'.$key]=$datos['catalogos']['estadosCatalogo'][$value['estadosCatalogo_estadoId']]['nombre'] . ", ";
			$contenidoReporte['municipio'.$key]=$datos['catalogos']['municipiosCatalogo'][$value['municipiosCatalogo_municipioId']]['nombre'] . "\n";
		}
	}
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
			$contenidoReporte['encabezadoSeguimientoCaso']="\nSeguimiento del caso" . "\n\n";
			foreach ($Data['reporte']['fichas'] as $key => $value) {
				if(isset($value['fichaId'])){
					$contenidoReporte['claveId'.$key]= "Clave:  ".$value['fichaId']. "\n";
				}
				if(isset($value['titulo'])){
					$contenidoReporte['titulo'.$key]= "Título:  ".$value['titulo']. "\n";
				}
				if(isset($value['fecha'])){
					$contenidoReporte['fecha'.$key]= "Fecha:  ".$value['fecha']. "\n";
				}
				if(isset($value['comentarios'])){
				$contenidoReporte['fichaComentario'.$key]= "Comentarios:  ".$value['comentarios']."\n\n";
				}
			}
		}
/******************************************/

/**************Derechos afectados y actos***********************/
		
		if (isset($Data['reporte']['derechoAfectado'])) {
			$contenidoReporte['encabezadoDErechosAfectados']="\n\nNúcleo del caso\n\nDerechos afectados y actos "."\n";
			foreach ($Data['reporte']['derechoAfectado'] as $key => $value) {
				if(isset($value['derechoAfectadoNivel']) && isset($value['derechoAfectadoId'])){
					$contenidoReporte['derechoAfectado'.$key]="\n"."Derecho afectado:  ".$datos['catalogos']['derechosAfectadosCatalogo']['derechosAfectadosN'.$value['derechoAfectadoNivel'].'Catalogos'][$value['derechoAfectadoId']]['descripcion'] ."\n";
				}
				if(isset($Data['reporte']['actos'][$key]['actoViolatorioId'])){
					$contenidoReporte['acto'.$key]="Acto:  ". $datos['catalogos']['actosCatalogo']['actosN'.$Data['reporte']['actos'][$key]['actoViolatorioNivel'].'Catalogo'][$Data['reporte']['actos'][$key]['actoViolatorioId']]['descripcion'] ."\n";
				}
				if(isset($value['noVictimas'])){
					$contenidoReporte['noVictimas'.$key] = "No. afectados: ".$value['noVictimas']."\n";
				}
				if(isset($value['fechaInicial'])){
					$contenidoReporte['fechaInicial'.$key]="Fecha de inicio:  ".$value['fechaInicial']."\n";
				}
				if($value['tipoFechaInicialId'] > 0){
					$contenidoReporte['tipoFechaInicioDerechoAfectado'.$key] = "Tipo fecha:  ".$datos['catalogos']['tipoFechaCatalogo'][$value['tipoFechaInicialId']]."\n";
				}
				if(isset($value['fechaTermino'])){
					$contenidoReporte['fechaTermino'.$key]="Fecha de termino:  " .$value['fechaTermino']."\n";
				}
				if(isset($value['tipoFechaTerminoId']) && $value['tipoFechaTerminoId'] > 0){
					$contenidoReporte['tipoFechaTerminoDerechoAdectado'.$key] = "Tipo fecha:  ".$datos['catalogos']['tipoFechaCatalogo'][$value['tipoFechaTerminoId']]."\n";
				}

				$actoId=$Data['reporte']['actos'][$key]['actoId'];
				if (isset($Data['reporte']['victimas']	)) {
					$contenidoReporte['EncabezadoVictimas'.$key]="\nVictimas  ". "\n";
					$nVic = 1;
					foreach ($Data['reporte']['victimas'] as $key => $value2) {
						$nPerp = 0;
						if ($value2['actos_actoId']==$actoId) {
							$contenidoReporte['victimasComentarios'.$key]= "\n".'Víctima '.$nVic.': '.
							$datos['catalogos']['ListaTodosActores'][$value2['actorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value2['actorId']]['apellidosSiglas'] ."\n";
							if(isset($value2['comentarios'])){
								$contenidoReporte['comentariosVictimasPerpetradores']="\n\nComentarios sobre víctimas y perpetradores:  \n". $value2['comentarios'];
							}
							if(isset($value2['estatusVictimaId'])){
								$contenidoReporte['estatusVictimaId'.$key]="Estado:  ". $datos['catalogos']['estatusVictimaCatalogo']['estatusVictimaCatalogo'][$value2['estatusVictimaId']-1]['descripcion']."\n\n\n";
							}
							if (isset($Data['reporte']['perpetradores']	)) {
								$contenidoReporte['EncabezadoPerpetradores'.$key]="\n\nPerpetradores  "."\n\n";
								foreach ($Data['reporte']['perpetradores'] as $key => $value3) {
									if ($value3['victimas_victimaId']==$value2['victimaId']) {
										$nPerp = $nPerp+1;
										$status = $value3['estatusPerpetradorCatalogo_estatusPerpetradorId'] -1;
										$contenidoReporte['perpetradorId'.$key]="\nPerpetrador ".$nPerp.":  ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['apellidosSiglas'] ."\n";
										$contenidoReporte['tipoPerpetradorId'.$key]="Tipo de perpetrador:  ".$datos['catalogos']['tipoPerpetrador']['tipoPerpetradorN'.$value3['tipoPerpetradorNivel'].'Catalogo'][$value3['tipoPerpetradorId']]['descripcion']. "\n";
										
										if(isset($value3['actorRelacionadoPerpetrador']) && $value3['actorRelacionadoPerpetrador']>0){
											$contenidoReporte['actorRelacionadoPerpetatrador'.$key]="Actor colectivo relacionado:  ".$value3['actorRelacionadoPerpetrador'][$value3['actorRelacionadoId']]['nombre']."\n";
											$contenidoReporte['tipoRelacionPerpetatrador'.$key]="Tipo de relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$value3['actorRelacionadoPerpetrador'][$value3['actorRelacionadoId']]['tipoRelacionId']]['Nivel2']."\n";
										}
										if(isset($value3['estatusPerpetradorCatalogo_estatusPerpetradorId'])){
											$contenidoReporte['estatusPerpetradorId'.$key]="Estatus del perpetrador:  ". $datos['catalogos']['estatusPerpetradorCatalogo']['estatusPerpetradorCatalogo'][$value3['estatusPerpetradorCatalogo_estatusPerpetradorId']-1]['descripcion']."\n";
										}
										if( $value3['nivelInvolugramientoId'] != 0 ){
											$contenidoReporte['gradoInvolucramientoid'.$key]="Grado de involucramiento:  ". $datos['catalogos']['gradoDeInvolucramiento']['gradoInvolucramientoN'.$value3['nivelInvolugramientoId'].'Catalogo'][$value3['gradoInvolucramientoid']]['descripcion']."\n\n";
										}
									}
									
								}
							}
						
						}
						$nVic = $nVic+1;
					}
				}

				

			}
		}
/******************************************/		

/**************Intervenciones***********************/
		

		if (isset($Data['reporte']['intervenciones'])) {
			$contenidoReporte['encabezadoIntervenciones']="\nIntervenciones "."\n\n";
			foreach ($Data['reporte']['intervenciones'] as $key => $intervencion) {
				if(isset($intervencion['tipoIntervencionId'])){
					$contenidoReporte['tipoIntervencion'.$key] = "Tipo de intervención:  ".$datos['catalogos']['tipoIntervencionN'.$intervencion['intervencionNId'].'Catalogo']['tipoIntervencionN'.$intervencion['intervencionNId'].'Catalogo'][$intervencion['tipoIntervencionId']-1]['descripcion']."\n";
				}
				$contenidoReporte['intervencionFecha'.$key]=	"Fecha de la intervención:  ". $intervencion['fecha']."\n";
				if(isset($intervencion['interventorId']) && $intervencion['interventorId']>0){
					if ( ($datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['tipoActorId']) == 3) {
						$contenidoReporte['intervencionInstitucion'.$key]=	"Institución:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
					}
				
					else{
						if($intervencion['interventorId']>0){				
							$contenidoReporte['intervencionInterventor'.$key]=	"Interventor:  ".$datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
						}
						if($intervencion['tipoRelacionInterventor'] > 0){
							$contenidoReporte['actorRelacionadoInterventor'.$key]= "Actor colectivo relacionado:  ".$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['nombre']."\n";
							if(isset($datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2'])){
								$contenidoReporte['tipoRelacionInterventor'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2']."\n";
							}
						}
					}
				}
				if($intervencion['receptorId'] > 0){
					$contenidoReporte['intervencionReceptor'.$key]=	"Receptor:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['apellidosSiglas'] ."\n";
				}
				if($intervencion['actorRelacionadoReceptor'] > 0){
					$contenidoReporte['actorRelacionadoReceptor'.$key]= "Actor colectivo relacionado:  ".$intervencion['actorRelacionadoReceptor'][$intervencion['tipoRelacionReceptor']]['nombre']."\n";
					$contenidoReporte['tipoRelacionReceptor'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoReceptor'][$intervencion['tipoRelacionReceptor']]['tipoRelacionId']]['Nivel2']."\n";
				}
				
				$contenidoReporte['intervencionImpacto'.$key]=	"Impacto:  ". $intervencion['impacto']."\n";
				$contenidoReporte['intervencionRespuesta'.$key]=	"Respuesta:  ". $intervencion['respuesta']."\n";
				
				$contenidoReporte['encabezadoPerIntervenidas'] ="Personas por las que se intervino: "."\n";
				if(isset($intervencion['intervenidos'])){
					$i=1;
					foreach ($intervencion['intervenidos'] as $intervenido) {
						$contenidoReporte['intervenido'.$i] = $datos['catalogos']['ListaTodosActores'][$intervenido['actorIntervenidoId']]['nombre']." ". $datos['catalogos']['ListaTodosActores'][$intervenido['actorIntervenidoId']]['apellidosSiglas'] ."\n";
						$i++;
					}
				}
				
				
				$contenidoReporte['espaciosIntervenciones']= "\n\n\n";
			}
		}	

/******************************************/

/**************Informcion Adicional***********************/

		
		if (isset($Data['reporte']['tipoFuenteDocumental'])) {
			$contenidoReporte['encabezadoInfoAdcional']="\nInformacion adicional "."\n\n";
			$contenidoReporte['encabezadoFuenteDocumental']="\n Fuentes documentales  \n\n";
			foreach ($Data['reporte']['tipoFuenteDocumental'] as $key => $documental) {
					$contenidoReporte['fuenteDocNombre'.$key]="\nNombre:  ".$documental['nombre']. "\n";
					$contenidoReporte['tipofuenteDocumental'.$key]="Tipo fuente:  ".$datos['catalogos']['tipoFuenteDocumentalN'.$documental['tipoFuenteDocumentalCatalogoNivel'].'Catalogo']['tipoFuenteDocumentalN'.$documental['tipoFuenteDocumentalCatalogoNivel'].'Catalogo'][$documental['tipoFuenteDocumentalCatalogoId']-1]['descripcion']."\n";
					$contenidoReporte['fuenteDocfechaPublicacion'.$key]="Fecha de publicación:  ".$documental['fecha']. "\n";
					$contenidoReporte['fuenteDocfechaAcceso'.$key]="Fecha de acceso:  ".$documental['fechaAcceso']. "\n";
					$contenidoReporte['fuenteDocinfoAdiocional'.$key]="Informción adicional:  ".$documental['infoAdicional']."\n";
					if(isset($documental['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
						$contenidoReporte['fuenteDocNivelConfiabilidad'.$key]="Nivel de confiabilidad:  ". $datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$documental['nivelConfiabilidadCatalogo_nivelConfiabilidadId']-1]['descripcion']."\n";
					}
					$contenidoReporte['fuenteDocLiga'.$key]= "Liga:  ".$documental['url']."\n";
					$contenidoReporte['fuenteDocComentarios'.$key]= "comentarios:  ".$documental['comentarios']."\n";
					$contenidoReporte['fuenteDocObaservaciones'.$key]= "observaciones:  ".$documental['observaciones']."\n";
					
					if(isset($documental['actorReportado']) && $documental['actorReportado'] > 0){
						$contenidoReporte['infoAdicionalDocumentalReportado'.$key]="Actor reportado:  ".$datos['catalogos']['ListaTodosActores'][$documental['actorReportado']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$documental['actorReportado']]['apellidosSiglas']."\n";
					}
					if($documental['relacionId'] > 0){
							$contenidoReporte['actorRelacionAdicionalDocReportado'.$key]= "Actor colectivo relacionado:  ".$documental['actorRelacionadoReportado'][$documental['relacionId']]['nombre']."\n";
							$contenidoReporte['tipoRelacionDoc'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$documental['actorRelacionadoReportado'][$documental['relacionId']]['tipoRelacionId']]['Nivel2']."\n";
					}
					$contenidoReporte['espaciosFuentes']= "\n\n\n";
			}
		}

		
		if (isset($Data['reporte']['fuenteInfoPersonal'])) {
			$contenidoReporte['encabezadoFuentePersonal']="\nFuente individual/colectiva\n\n";
			foreach ($Data['reporte']['fuenteInfoPersonal'] as $key => $infoAdicional) {
				$contenidoReporte['infoAdicionalPersonal'.$key]="\n\nNombre:  ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorId']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorId']]['apellidosSiglas']."\n";
				if($infoAdicional['relacionId'] > 0){
						$contenidoReporte['actorRelacionadoPersonal'.$key]= "Actor colectivo relacionado:  ".$infoAdicional['actorRelacionadoPersonal'][$infoAdicional['relacionId']]['nombre']."\n";
						$contenidoReporte['tipoRelacionPersonal'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$infoAdicional['actorRelacionadoPersonal'][$infoAdicional['relacionId']]['tipoRelacionId']]['Nivel2']."\n";
				}
				if(isset($infoAdicional['tipoFuenteCatalogo_tipoFuenteId'])){
					$contenidoReporte['infoAdicionalTipoFuente'.$key] = "Tipo fuente:  ".$datos['catalogos']['tipoFuenteCatalogo']['tipoFuenteCatalogo'][$infoAdicional['tipoFuenteCatalogo_tipoFuenteId']-1]['descripcion']."\n";
				}
				if(isset($infoAdicional['fecha'])){
					$contenidoReporte['infoAdicionalfecha'.$key] = "Fecha:  ".$infoAdicional['fecha']."\n";
				}
				if(isset($infoAdicional['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
					$contenidoReporte['infoAdicionalNivelConfiabilidad'.$key] = "Nivel confiabilidad:  ".$datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$infoAdicional['nivelConfiabilidadCatalogo_nivelConfiabilidadId']-1]['descripcion']."\n";				
				}
				if(isset($infoAdicional['observaciones'])){
					$contenidoReporte['infoadicionalObservaciones'.$key]= "Observaciones:  ".$infoAdicional['observaciones']."\n";
				}
				if(isset($infoAdicional['comentarios'])){
					$contenidoReporte['infoadicionalComentarios'.$key]= "Comentarios:  ".$infoAdicional['comentarios']."\n";
				}
				if(isset($infoAdicional['actorReportado']) && $infoAdicional['actorReportado'] > 0){
					$contenidoReporte['infoAdicionalPersonalReportado'.$key]="Actor reportado:  ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorReportado']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorReportado']]['apellidosSiglas']."\n";
				}
				if($infoAdicional['tipoRelacionActorReportadoId'] > 0){
						$contenidoReporte['actorRelacionadoReportado'.$key]= "Actor colectivo relacionado:  ".$infoAdicional['actorRelacionadoReportado'][$infoAdicional['tipoRelacionActorReportadoId']]['nombre']."\n";
						$contenidoReporte['tipoRelacionPersonal'.$key]= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$infoAdicional['actorRelacionadoReportado'][$infoAdicional['tipoRelacionActorReportadoId']]['tipoRelacionId']]['Nivel2']."\n\n\n";
				}
			}
		}
		
		
		if(isset($Data['reporte']['relacionCasos'])){
			$contenidoReporte['encabezadoCasosRelacionados']="\n Casos relacionados  \n\n";
			foreach ($Data['reporte']['relacionCasos'] as $key => $relacionCasos) {
				if(isset($relacionCasos['nombreCasoIdB'])){
					$contenidoReporte['encabezadoCaso'.$key] = $Data['nombreCaso']."\n";
					$contenidoReporte['nombrecaso'.$key]="Caso relacionado:  ".$relacionCasos['nombreCasoIdB']."\n";
				}
				if(isset($relacionCasos['tipoRelacionId'])){
					$contenidoReporte['tipoRelacionCaso'.$key]="Tipo de relación:  ".$datos['catalogos']['relacionCasosCatalogo']['relacionCasosCatalogo'][$relacionCasos['tipoRelacionId']-1]['descripcion']."\n";
				}
				if(isset($relacionCasos['fechaIncial'])){
					$contenidoReporte['FechaInicio'.$key]="Fecha de inicio:  ".$relacionCasos['fechaIncial']."\n";
				}
				if(isset($relacionCasos['fechaTermino'])){
				$contenidoReporte['FechaTermino'.$key]="Fecha de término:  ".$relacionCasos['fechaTermino']."\n";
				}
			}	
			
		}
		$content ="";
/******************************************/
		foreach ($contenidoReporte as  $value) {
		
		$content = $content . $value;

		}
	$this->cezpdf->ezText($content, 10);

	$this->cezpdf->ezStream();
		
	}



}

?>