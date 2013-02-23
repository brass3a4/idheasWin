<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CasosVentanas_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
		
        $this->load->library('session');
        
		$this->is_logged_in();
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model(array('actores_m', 'general_m', 'casos_m','catalogos_m'));
        
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
        
        $datos['relacionActoresCatalogo'] = $this->general_m->obtener_todo('relacionActoresCatalogo', 'tipoRelacionId', 'tipoRelacionId');
        
		$datos['nivelConfiabilidadCatalogo'] = $this->general_m->obtener_todo('nivelConfiabilidadCatalogo', 'nivelConfiabilidadId', 'descripcion');
		
		$datos['tipoFuenteCatalogo'] = $this->general_m->obtener_todo('tipoFuenteCatalogo', 'tipoFuenteId', 'descripcion');
		
		$datos['actosN1Catalogo'] = $this->general_m->obtener_todo('actosN1Catalogo', 'actoId', 'descripcion');
		
		$datos['actosN2Catalogo'] = $this->general_m->obtener_todo('actosN2Catalogo', 'actoN2Id', 'descripcion');
		
		$datos['actosN3Catalogo'] = $this->general_m->obtener_todo('actosN3Catalogo', 'actoN3Id', 'descripcion');
		
		$datos['actosN4Catalogo'] = $this->general_m->obtener_todo('actosN4Catalogo', 'actoN4Id', 'descripcion');
		
		$datos['derechosAfectadosN1Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN1Catalogo', 'derechoAfectadoN1Id', 'descripcion');
		
		$datos['derechosAfectadosN2Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN2Catalogo', 'derechoAfectadoN2Id', 'descripcion');
		
		$datos['derechosAfectadosN3Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN3Catalogo', 'derechoAfectadoN3Id', 'descripcion');
		
		$datos['derechosAfectadosN4Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN4Catalogo', 'derechoAfectadoN4Id', 'descripcion');
       
	   	$datos['relacionCasosCatalogo'] = $this->general_m->obtener_todo('relacionCasosCatalogo', 'relacionCasosId', 'descripcion');

	   	$datos['tipoIntervencionN1Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN1Catalogo', 'tipoIntervencionN1Id', 'descripcion');

	   	$datos['tipoIntervencionN2Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN2Catalogo', 'tipoIntervencionN2Id', 'descripcion');

	   	$datos['tipoIntervencionN3Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN3Catalogo', 'tipoIntervencionN3Id', 'descripcion');
	   	
	   	$datos['tipoIntervencionN4Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN4Catalogo', 'tipoIntervencionN4Id', 'descripcion');

	   	$datos['relacionesActoresCatalogo'] = $this->general_m->obtener_todo('relacionActores', 'relacionActoresId', 'relacionActoresId');

	   	$datos['tipoFuenteDocumentalN1Catalogo'] = $this->general_m->obtener_todo('tipoFuenteDocumentalN1Catalogo','tipoFuenteDocumentalN1CatalogoId', 'descripcion', 'notas');

	   	$datos['tipoFuenteDocumentalN2Catalogo'] = $this->general_m->obtener_todo('tipoFuenteDocumentalN2Catalogo','tipoFuenteDocumentalN2CatalogoId', 'tipoFuenteDocumentalN1Catalogo_tipoFuenteDocumentalN1CatalogoId','descripcion', 'notas');

        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
		
	    return $datos;
        
    }

    function ventanaLugares($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['lugares'][$i]))
		
			$datos['lugar']=$datos['datosCaso']['lugares'][$i];
		
        $this->load->view('casos/formulariodetalleLugar_v', $datos);
	
        
    }

    function notas(){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $this->load->view('actores/notasCatalogos_', $datos);
        
    }

    function derechosAfectados($casoId,$i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['catalogos']= $this->traer_catalogos();

		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		
		if(!empty($datos['datosCaso']['derechoAfectado'][$i])){
			
			$datos['derechoAfectado']=$datos['datosCaso']['derechoAfectado'][$i];
			$datos['victimas']=$datos['derechoAfectado']['noVictimas'];
			$datos['fInicial']=$datos['derechoAfectado']['fechaInicial'];
			$datos['fTermino']=$datos['derechoAfectado']['fechaTermino'];
			if(isset($datos['datosCaso']['actos'])){
				foreach($datos['datosCaso']['actos'] as $acto){
					if($acto['derechoAfectado_derechoAfectadoCasoId']==$datos['derechoAfectado']['derechoAfectadoCasoId']){
						$datos['acto']=$acto;
					}
				}
			}
		}
		
		
		$datos['tipo'] = '4';
					
		$datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
		
        $this->load->view('casos/formularioActo_v', $datos);
        
    }


    function intervenciones($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['intervenciones'][$i]))
		
			$datos['intervenciones']=$datos['datosCaso']['intervenciones'][$i];

        $this->load->view('casos/formularioIntervencion', $datos);
        
    }

	function fuentesDeInformacion($casoId,$actorId=0,$i=0){
		
		$datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId'] = $casoId;
		
		$datos['id'] = $i;
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);

		if ($i>0) {
			$datos['fuenteDocumental']=$datos['datosCaso']['tipoFuenteDocumental'][$i];

		}
		
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		 
		$datos['actoresIndividuales'] =  $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTrans'] = $this->actores_m->listado_actores_m(2);
				
		if(isset($datos['actoresIndividuales']) && isset($datos['actoresTrans']))		
			$datos['actIndividualesTrns'] = array_merge($datos['actoresIndividuales'],$datos['actoresTrans']);

		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$this->load->view('casos/formularioFuenteDoc_v', $datos);
	}
	
	function fuentesDeInformacionPersonal($casoId,$actorId=0,$id=0){
		
		$datos['head'] = $this->load->view('general/head_v', "", true);
		
		$datos['id'] = $id;

        $datos['casoId'] = $casoId;
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		 
		$datos['actoresIndividuales'] =  $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTrans'] = $this->actores_m->listado_actores_m(2);
		
		if(isset($datos['actoresIndividuales']) && isset($datos['actoresTrans']))
			$datos['actIndividualesTrns'] = array_merge($datos['actoresIndividuales'],$datos['actoresTrans']);
		
		if ($id>0) {
			if (isset($datos['datosCaso']['fuenteInfoPersonal'][$id])) {
				$datos['fuenteInfoPersonal']=$datos['datosCaso']['fuenteInfoPersonal'][$id];
			}
		}

		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$this->load->view('casos/formularioFuentePersonal', $datos);
	}
	
	public function relacionCasos($casoId,$id=0){
		
		$datos['head'] = $this->load->view('general/head_v', "", true);

		$datos['id']=$id;
		
        $datos['casoId'] = $casoId;
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		 
		$datos['actoresIndividuales'] =  $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTrans'] = $this->actores_m->listado_actores_m(2);
		
		if(isset($datos['actoresIndividuales']) && isset($datos['actoresTrans']))
			$datos['actIndividualesTrns'] = array_merge($datos['actoresIndividuales'],$datos['actoresTrans']);
		
		$this->load->view('casos/formularioRelacionCasos', $datos);
	}
	
	function mostrarCasos(){
		
		$datos['is_active'] = 'casos';
		
		$datos['catalogos'] = $this->traer_catalogos();
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        $datos['listado'] = $this->casos_m->mListaCasos();
                
		 $datos['casos']=$this->load->view('casos/informacionGeneral_v', $datos, true);

        $datos['casosNucleo']=$this->load->view('casos/nucleoCaso_v', $datos, true);

        $datos['infoAdicional']=$this->load->view('casos/infoAdicional_v', $datos, true);
		
		$v=$this->load->view('casos/seleccionarCaso_v', $datos, true);
		
		echo $v;

	}
	/***
	 * Agrega y edita las ventanas emergentes de la sección casos
	 * dependiendo del valor de la variable editar, si es 1 se edita si es 0 se agrega
	 * Cierra la ventana con JS y recarga la página que la abrió
	 * ***/
	function guardarDatosVentanas($id){
		
		 foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(isset($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		switch ($id){
            
            case(1): 
				if($_POST['editar'] == 1){
					$mensaje = $this->casos_m->mActualizaDatosLugar($datos['lugares'],$datos['lugares']['lugarId']);
					
				}else{
					$datos1['lugares'] = $datos['lugares'];
            		$mensaje = $this->general_m->llenar_tabla_m($datos1);	
				}
				
            break;
        
            case(2):if($_POST['editar'] == 1){
            	
					$rutas = $this->cargarPDF();
					
					if($rutas != '0'){
						$tot = count($_FILES["archivos"]["name"]);
					         for ($i = 0; $i < $tot; $i++){
					         		$nombreArchivo = $_FILES["archivos"]['name'][$i];
								 	
									$data = array('nombreRegistro'=>$nombreArchivo,'ruta'=>$rutas[$i],'fichas_fichaId'=>$datos['fichas']['fichaId']);
									
									if($nombreArchivo != '' && $rutas[$i] != '')
										$mensaje=$this->casos_m->mAgregarRegistroFicha($data);
							}
						}
	            	$mensaje=$this->general_m->casos_m->mActualizaDatosFicha($datos['fichas'],$datos['fichas']['fichaId']); 
					
				}else{
					
					$datos2['fichas']=$datos['fichas'];
	            	$id = $this->general_m->general_m->llenar_ficha($datos2); 
					
					$rutas = $this->cargarPDF();
					
					if($rutas != '0'){
						$tot = count($_FILES["archivos"]["name"]);
				         //este for recorre el arreglo
					         for ($i = 0; $i < $tot; $i++){
					         		$nombreArchivo = $_FILES["archivos"]['name'][$i];
								 	
									$data = array('nombreRegistro'=>$nombreArchivo,'ruta'=>$rutas[$i],'fichas_fichaId'=>$id);
									
									if($nombreArchivo != '' && $rutas[$i] != '')
										$mensaje=$this->casos_m->mAgregarRegistroFicha($data);
							}
						}
					}
				
            break;
			
			
			
			case(3): 
				if($_POST['editar'] == 1){
					if(isset($datos['actos'])){
						$mensaje = $this->casos_m->mActualizaDatosActo($datos['actos'],$datos['actos']['actoId']);
					}
					if(empty($datos['derechoAfectado']['paisesCatalogo_paisId'])){
							unset($datos['derechoAfectado']['paisesCatalogo_paisId']);
					}
					$mensaje = $mensaje . $this->casos_m->mActualizaDatosDerechoAfectado($datos['derechoAfectado'],$datos['derechoAfectado']['derechoAfectadoCasoId']);
					$botonVictimas=1;
					$Id=$id;
				}else{
					if(!empty($datos['actos']['actoViolatorioId'])){
		            	$datos['actos']['casos_casoId']=$datos['lugares']['casos_casoId'];
						$datos3['derechoAfectado'] =  $datos['derechoAfectado'];
						
						if(empty($datos3['derechoAfectado']['paisesCatalogo_paisId'])){
							unset($datos3['derechoAfectado']['paisesCatalogo_paisId']);
						}
						$Id = $this->casos_m->mAgregarDerechosAfectados($datos3);
						$datos['actos']['derechoAfectado_derechoAfectadoCasoId']=$Id;
						$mensaje = $this->casos_m->mAgregarActoDerechoAfectado($datos['actos']);
						$botonVictimas=1;

					} else{
						echo "<script languaje='javascript' type='text/javascript'>
								alert('Ningun derecho/acto fue seleccionado');
							</script>";
							
						$mensaje ='';
					}
					
				}
            break;
			
			case(4):  
				if($_POST['editar'] == 1){
					if (isset($datos['intervenciones'])) {
						$mensaje =  $this->casos_m->mActualizaDatosIntervencion($datos['intervenciones'],$datos['intervenciones']['intervencionId']);
						
						$data1 = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['intervenciones']['interventorId'],'casoActorId'=>$_POST['casoActorIdInterventor']);
		
						$this->casos_m->mActualizaRelacionCasoActor($data1);
						
						$data2 = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['intervenciones']['receptorId'],'casoActorId'=>$_POST['casoActorIdReceptor']);
		
						$this->casos_m->mActualizaRelacionCasoActor($data2);
					}
					
					if (isset($datos['intervenidos'])) {
						$mensaje = $mensaje . $this->casos_m->mActualizaDatosIntervenido($datos['intervenidos'],$datos['intervenidos']['intervenidoId']);
						
						$data = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['intervenidos']['actorIntervenidoId'],'casoActorId'=>$_POST['casoActorIdIntervenido']);
		
						$this->casos_m->mActualizaRelacionCasoActor($data);		
			
					}
				}else{
					$data1['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['intervenciones']['interventorId']);
							
					$data2['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['intervenciones']['receptorId']);
													
					$this->general_m->llenar_tabla_m($data1);
					
					$this->general_m->llenar_tabla_m($data2);
					
					$datos4['intervencion'] = $datos['intervenciones'];
					$mensaje = $this->casos_m->mAgregarIntervenciones($datos4);
				}
				
            break;
			
			case(5): 
				if($_POST['editar'] == 1){
					$mensaje = $this->casos_m->mActualizaDatosFuenteInfoPersonal($datos['fuenteInfoPersonal'],$datos['fuenteInfoPersonal']['fuenteInfoPersonalId']);
			
					$data1 = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['fuenteInfoPersonal']['actorId'],'casoActorId'=>$_POST['casoActorIdActor']);
		
					$this->casos_m->mActualizaRelacionCasoActor($data1);
						
					$data2 = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['fuenteInfoPersonal']['actorReportado'],'casoActorId'=>$_POST['casoActorIdActorReportado']);
		
					$this->casos_m->mActualizaRelacionCasoActor($data2);	
					
				}else{
					
					$data1['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['fuenteInfoPersonal']['actorId']);
							
					$data2['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['fuenteInfoPersonal']['actorReportado']);
													
					$this->general_m->llenar_tabla_m($data1);
					
					$this->general_m->llenar_tabla_m($data2);
					
					$datos5['fuenteInfoPersonal'] = $datos['fuenteInfoPersonal'];
					$mensaje = $this->general_m->llenar_tabla_m($datos5);
				}
				
            break;
			
			case(6):
				if($_POST['editar'] == 1){
					$mensaje = $this->casos_m->mActualizaDatosTipoFuenteDocumental($datos['tipoFuenteDocumental'],$datos['tipoFuenteDocumental']['tipoFuenteDocumentalId']);
					
					$data = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['tipoFuenteDocumental']['actorReportado'],'casoActorId'=>$_POST['casoActorIdActorReportado']);
		
					$this->casos_m->mActualizaRelacionCasoActor($data);				
	
				}else{
					$data2['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['tipoFuenteDocumental']['actorReportado']);
																		
					$this->general_m->llenar_tabla_m($data2);
					 
					$datos6['tipoFuenteDocumental'] = $datos['tipoFuenteDocumental'];
					$mensaje = $this->general_m->llenar_tabla_m($datos6);
				}
				
            break;
        
            case(7):
				if($_POST['editar'] == 1){
					print_r($datos['relacionCasos']);
	            	$mensaje = $this->casos_m->mActualizaDatosRelacionCaso($datos['relacionCasos']['relacionId'],$datos['relacionCasos']);
				}else{
					if(isset($datos['casoSeleccionado']['seleccionado']) && $datos['casoSeleccionado']['seleccionado'] == 1){
		            	$datos7['relacionCasos'] = $datos['relacionCasos'];
		            	$mensaje = $this->general_m->llenar_tabla_m($datos7);
					} else{
						echo "<script languaje='javascript' type='text/javascript'>
							alert('Ningun caso fue seleccionado para relacionarse');
						</script>";
						
						$mensaje ='';
					}
					
				}
				
            break;
            
        }
      if (!isset($botonVictimas)) {
		echo "<script languaje='javascript' type='text/javascript'>
		window.opener.location.reload();
		window.close();
		</script>";
        }
        else{
		echo "<script languaje='javascript' type='text/javascript'>
		window.opener.location.reload();
		</script>";
        	redirect(base_url().'index.php/casosVentanas_c/derechosAfectados/'.$datos['lugares']['casos_casoId'].'/'.$Id);
        }
		
		return $mensaje;
	}

	
	public function agregarIntervenido(){
		
		$catalogos= $this->traer_catalogos();

		$casoId=$_POST['casoId'];

		if(isset($_POST['intervenciones_intervencionId']) && isset($_POST['actorIntervenidoId'])){
			$datos = array('actorIntervenidoId'=>$_POST['actorIntervenidoId'],'intervenciones_intervencionId'=>$_POST['intervenciones_intervencionId']);
		
			$mensaje = $this->casos_m->mAgregarIntervenidoIntervenciones($datos);
			
			$datos1['casos_has_actores']['casos_casoId']=$casoId;
		
			$datos1['casos_has_actores']['actores_actorId']=$_POST['actorIntervenidoId'];
			
			$this->general_m->llenar_tabla_m($datos1);	
			
		}else{
			$mensaje = 'faltan datos';
		}


		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);

		$datos['intervenciones'] =$datos['datosCaso']['intervenciones'];

		$data="";

			
		foreach ($datos['intervenciones'][$_POST['intervenciones_intervencionId']]['intervenidos'] as $intervenidos) {
				
				foreach ($intervenidos['casosActorIntervenido'] as $intervenido) {
						if ($intervenido['casos_casoId']==$casoId) {
							$valorCaso=$intervenido['casoActorId'];
						} else {
							$valorCaso=0;
						}
				}

			$data= $data.
			'<div class="twelve columns margenes" >'.
				'<div class="nine columns" >'.
					'<img class="foto" src="'.base_url().$catalogos['listaTodosActores'][$intervenidos['actorIntervenidoId']]['foto'].'">
					<br><br><br><br>'.$catalogos['listaTodosActores'][$intervenidos['actorIntervenidoId']]['nombre']." ".$catalogos['listaTodosActores'][$intervenidos['actorIntervenidoId']]['apellidosSiglas'].
				"</div>
				<div class='three columns'>
					<br> <br> <br> <br> 
					<input type='button' class='tiny button' value='Eliminar' Onclick=".'"eliminarIntervenidoAjax('."'".$intervenidos['intervenidoId']."','".$casoId."','".$_POST['intervenciones_intervencionId']."','".$valorCaso."')".'">
				</div>
			</div>';

		}

		// $data=$datos['intervenciones'][$_POST['intervenciones_intervencionId']]['intervenidos'];

		print_r($data);
	}

	/***
	 * Elimina una persona que participa en una intervención como intervenido
	 * Recibe el id del intervenido
	 * Redirecciona al caso en donde se elimino el intervenido
	 * **/
	public function eliminarIntervenido($idIntervenido,$idCaso,$idInternvencion,$casoActorId){
		
		$mensaje = $this->casos_m->mEliminarIntervenido($idIntervenido);
		
		//redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		$this->casos_m->mEliminarRelacionCasoActor($casoActorId);
	
		$catalogos= $this->traer_catalogos();

		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($idCaso);

		$datos['intervenciones'] =$datos['datosCaso']['intervenciones'];

		// echo "<pre>";
		// print_r($datos['intervenciones'][$idInternvencion]['intervenidos']);
		// echo "</pre>";

		$data="";
		if (isset($datos['intervenciones'][$idInternvencion]['intervenidos'])) {
			
			foreach ($datos['intervenciones'][$idInternvencion]['intervenidos'] as $intervenidos) {
									

				foreach ($intervenidos['casosActorIntervenido'] as $intervenido) {
						if ($intervenido['casos_casoId']==$idCaso) {
							$valorCaso=$intervenido['casoActorId'];
						} else {
							$valorCaso=0;
						}
				}
				$data= $data.'<div class="twelve columns margenes" >'.
					'<div class="nine columns">
						<img class="foto" src="'.base_url().$catalogos['listaTodosActores'][$intervenidos['actorIntervenidoId']]['foto'].
						'"><br><br><br><br>'.
					$catalogos['listaTodosActores'][$intervenidos['actorIntervenidoId']]['nombre']." ".$catalogos['listaTodosActores'][$intervenidos['actorIntervenidoId']]['apellidosSiglas'].
					"</div>
					<div class='three columns'>
						<br> <br> <br> <br> 
							<input type='button' class='tiny button' value='Eliminar' Onclick=".'"eliminarIntervenidoAjax('."'".$intervenidos['intervenidoId']."','".$idCaso."','".$idInternvencion."','".$valorCaso."')".'">
					</div>
				</div>';

			}
		}
		 print_r($data);
		

		return $mensaje;
		
	}
	
	/****
	 * Elimina un lugar de la información general del caso
	 * Recibe el id del lugar a eliminar y el id del caso al que se redirecciona despues de
	 * la eliminación.
	 * **/
	public function eliminarLugar($lugarId,$idCaso){
	
		$mensaje = $this->casos_m->mEliminaLugar($lugarId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
    }
	
	/****
	 * Elimina una Ficha de la sección seguimiento del caso
	 * recibe el id de la ficha a eliminar y el id del caso para redireccionar
	 * **/
	public function eliminarFicha($fichaId,$idCaso){
		
		$mensaje = $this->casos_m->mEliminaFicha($fichaId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarRegistro($registroId,$idCaso){
		
		$mensaje = $this->casos_m->mEliminarRegistro($registroId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarDerechoAfectado($derechoId, $idCaso){
		$mensaje = $this->casos_m->mEliminaDerechoAfectadoCaso($derechoId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
		
	}
	
	public function eliminarIntervencion($intervencionId,$idCaso,$casoActorIdReceptor,$casoActorIdInterventor){
		
		$mensaje =  $this->casos_m-> mEliminaIntervenciones($intervencionId);
		
		$this->casos_m->mEliminarRelacionCasoActor($casoActorIdReceptor);
		
		$this->casos_m->mEliminarRelacionCasoActor($casoActorIdInterventor);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarFuenteInfoPersonal($fuenteInfoPersonalId,$idCaso,$casoActorIdActorId,$actorReportado){
			
		$mensaje =  $this->casos_m->mEliminaFuenteInfoPersonal($fuenteInfoPersonalId);
		
		$this->casos_m->mEliminarRelacionCasoActor($casoActorIdActorId);
		
		$this->casos_m->mEliminarRelacionCasoActor($actorReportado);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarFuenteInfoDocumental($tipoFuenteDocumentalId,$idCaso,$actorReportado){
		
		$mensaje =  $this->casos_m->mEliminaTipoFuenteDocumental($tipoFuenteDocumentalId);		
		
		$this->casos_m->mEliminarRelacionCasoActor($actorReportado);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	
	public function eliminaRelacionCasos($relacionId,$idCaso){
		
		$mensaje =  $this->casos_m->mEliminaRelacionCasos($relacionId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	public function seguimientoCaso($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['fichas'][$i]))
		
			$datos['ficha']=$datos['datosCaso']['fichas'][$i];

        $this->load->view('casos/formularioSeguimientoCaso_v', $datos);
        
    }
	
	public function traerActos(){
		
		$id1 = $this->input->post("id1");	
		
		$id2 = $this->input->post("id2");
		
		$id3 = $this->input->post("id3");
		
		$id4 = $this->input->post("id4");	
		
		$catalogos= $this->traer_catalogos();
		
		echo "<pre>";
			print_r($catalogos['actosN3Catalogo']);
		echo "</pre>";
		
		$datos=array();
		
		if($id1 !='undefined')
			$datos = array(1=>$id1);
		
		if($id1 !='undefined' && $id2 !='undefined')
			$datos = array(1=>$id1,2=>$id2);
		
		if($id1 !='undefined' && $id2 !='undefined' && $id3 !='undefined')
			$datos = array(1=>$id1,2=>$id2,3=>$id3);
		
		if($id1 !='undefined' && $id2 !='undefined' && $id3 !='undefined' && $id4 !='undefined')
			$datos = array(1=>$id1,2=>$id2,3=>$id3,4=>$id4);
		
		$data=$this->casos_m->mTraerActoDerechoAfectado($datos);
		
		
		
		$lista='';
		$expander='';
		$sub = '';
		//print_r($data['actosN1']);
			if(isset($data['actosN1'])){
			$lista = $lista.' <ul>';
			foreach ($data['actosN1'] as $acto1) {
				$lista = $lista. '<li class="listas">'.
						'<div class="ExpanderFlecha flecha hand" value="subnivel" onclick="nombrarActo('."'".$acto1['descripcion']."'".','."'".$acto1['actoId']."'".','."'".$acto1['notas']."'".','."'1',this".')">'.
							$acto1['descripcion'].
						'</div>';	
						if(isset($data['actosN2'])){
							$lista = $lista. '<ul class="Escondido" id="'.$acto1['actoId'].'act1" >';
							foreach ($data['actosN2'] as $acto2) {
								foreach($catalogos['actosN3Catalogo'] as $c1){
									if($c1['actosN2Catalogo_actoN2Id']==$acto2['actoN2Id']){
										$sub = 'subnivel';
										$expander = 'ExpanderFlecha flecha hand';
									}
								}
								
								$lista = $lista. '<li  class="listas">'.
								'<div value="'.$sub.'"class="'.$expander.'" onclick="nombrarActo('."'".$acto2['descripcion']."'".','."'".$acto2['actoN2Id']."'".','."'".$acto2['notas']."'".','."'2',this".')">'.
									$acto2['descripcion'].
								'</div>';	
								
												$expander='';
												$sub = '';
								if(isset($data['actosN3'])){
									$lista = $lista. '<ul class="Escondido" id="'.$acto2['actoN2Id'].'act2" >';
									foreach ($data['actosN3'] as $acto3) {
										foreach($catalogos['actosN4Catalogo'] as $c2){
											if($c2['actosN3Catalogo_actoN3Id']==$acto3['actoN3Id']){
												$sub = 'subnivel';
												$expander = 'ExpanderFlecha flecha hand';
											}
										}
										$lista=$lista.'<li  class="listas">'.
										'<div value="'.$sub.'"class="'.$expander.'" onclick="nombrarActo('."'".$acto3['descripcion']."'".','."'".$acto3['actoN3Id']."'".','."'".$acto3['notas']."'".','."'3',this".')">'.
											$acto3['descripcion'].
										'</div>';
												$expander='';
												$sub = '';
										if(isset($data['actosN4'])){
											$lista = $lista.'<ul class="Escondido" id="'.$acto3['actoN3Id'].'act3">';
											foreach($data['actosN4'] as $acto4){
												if($acto4['actosN3Catalogo_actoN3Id']==$acto3['actoN3Id']){
													$lista = $lista.'<li class="listas">'.
													'<div onclick="nombrarActo('."'".$acto4['descripcion']."'".','."'".$acto4['actoN4Id']."'".','."'".$acto4['notas']."'".','."'4',this".')">'.
														$acto4['descripcion'].
													'</div></li>';	
												}
											}$lista=$lista.'</ul>';
										}
									}$lista = $lista.'</li></ul>';
								}
							}$lista = $lista.'</li></ul>';
						}
			     }
			     $lista = $lista.'</li></ul>';
		    }
	
		print_r($lista);
				
	}
	
	public function cargarPDF(){
			
   //Preguntamos si nuetro arreglo 'archivos' fue definido
         if (isset ($_FILES["archivos"])) {
        	$tot = count($_FILES["archivos"]["name"]);
         //este for recorre el arreglo
	         for ($i = 0; $i < $tot; $i++){
	         //con el indice $i, poemos obtener la propiedad que desemos de cada archivo
	         //para trabajar con este
	         		
					$tamano = $_FILES["archivos"]['size'][$i];
					$tipo = $_FILES["archivos"]['type'][$i];
					$archivo = $_FILES["archivos"]['name'][$i];
					$prefijo = substr(md5(uniqid(rand())),0,6);
					
					if($tipo == "application/pdf"){			
						if ($archivo != "") {
						    // guardamos el archivo a la carpeta files
						    
						    //para MAC y Linux
						    $urlBase = system('pwd');
							
						    //Para windows
							//$urlBase = system('chdir');
							
						    $destino = $urlBase.'/statics/fichas/'.$prefijo.'_'.$archivo;
						  					
						    if (move_uploaded_file($_FILES['archivos']['tmp_name'][$i],$destino)) {
						    	
								$status = "Archivo subido: <b>".$archivo."</b>";
								
								$urls[$i]= '/statics/fichas/'.$prefijo.'_'.$archivo;
								
						    } else {
						    	
								 return '0';
								
						    }
						} else {
							
						    return '0';
							
						}
						
					}else{
							
						return '0';
						
					}
	            }	
     		 } 
		
		return $urls;
	}
	
}
    
?>