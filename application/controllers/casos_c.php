<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casos_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
       $this->load->library('session');
        
		$this->is_logged_in();
        
        $this->load->model(array('actores_m', 'general_m', 'casos_m'));
        
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
        
		$datos['nivelConfiabilidadCatalogo'] = $this->general_m->obtener_todo('nivelConfiabilidadCatalogo', 'nivelConfiabilidadId', 'descripcion');
		
		$datos['tipoPerpetradorN1Catalogo'] = $this->general_m->obtener_todo('tipoPerpetradorN1Catalogo', 'tipoPerpetradorN1Id', 'descripcion');
		
		$datos['tipoPerpetradorN2Catalogo'] = $this->general_m->obtener_todo('tipoPerpetradorN2Catalogo', 'tipoPerpetradorN2Id', 'descripcion');
		
		$datos['tipoPerpetradorN3Catalogo'] = $this->general_m->obtener_todo('tipoPerpetradorN3Catalogo', 'tipoPerpetradorN3Id', 'descripcion');
		
		$datos['tipoPerpetradorN4Catalogo'] = $this->general_m->obtener_todo('tipoPerpetradorN4Catalogo', 'tipoPerpetradorN4Id', 'descripcion');
		
		$datos['tipoPerpetradorN5Catalogo'] = $this->general_m->obtener_todo('tipoPerpetradorN5Catalogo', 'tipoPerpetradorN5Id', 'descripcion');
		
		$datos['estatusPerpetradorCatalogo'] = $this->general_m->obtener_todo('estatusPerpetradorCatalogo', 'estatusPerpetradorId', 'descripcion');
		
		$datos['gradoInvolucramientoN1Catalogo'] = $this->general_m->obtener_todo('gradoInvolucramientoN1Catalogo', 'gradoInvolucramientoN1Id', 'descripcion');

		$datos['gradoInvolucramientoN2Catalogo'] = $this->general_m->obtener_todo('gradoInvolucramientoN2Catalogo', 'gradoInvolucramientoN2Id', 'descripcion');

        $datos['estatusVictimaCatalogo'] = $this->general_m->obtener_todo('estatusVictimaCatalogo', 'estatusVictimaId', 'descripcion');
		
		$datos['tipoLugarN1Catalogo'] = $this->general_m->obtener_todo('tipoLugarN1Catalogo', 'tipoLugarId', 'descripcion');
		
		$datos['tipoLugarN2Catalogo'] = $this->general_m->obtener_todo('tipoLugarN2Catalogo', 'tipoLugarN2Id', 'descripcion');
		
		$datos['tipoLugarN3Catalogo'] = $this->general_m->obtener_todo('tipoLugarN3Catalogo', 'tipoLugarN3Id', 'descripcion');
		
		$datos['derechosAfectadosN1Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN1Catalogo', 'derechoAfectadoN1Id', 'descripcion');
		
		$datos['derechosAfectadosN2Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN2Catalogo', 'derechoAfectadoN2Id', 'descripcion');
		
		$datos['derechosAfectadosN3Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN3Catalogo', 'derechoAfectadoN3Id', 'descripcion');
		
		$datos['derechosAfectadosN4Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN4Catalogo', 'derechoAfectadoN4Id', 'descripcion');
		
		$datos['actosN1Catalogo'] = $this->general_m->obtener_todo('actosN1Catalogo', 'actoId', 'descripcion');
		
		$datos['actosN2Catalogo'] = $this->general_m->obtener_todo('actosN2Catalogo', 'actoN2Id', 'descripcion');
		
		$datos['actosN3Catalogo'] = $this->general_m->obtener_todo('actosN3Catalogo', 'actoN3Id', 'descripcion');
		
		$datos['actosN4Catalogo'] = $this->general_m->obtener_todo('actosN4Catalogo', 'actoN4Id', 'descripcion');
		
		$datos['tipoFuenteCatalogo'] = $this->general_m->obtener_todo('tipoFuenteCatalogo', 'tipoFuenteId', 'descripcion');
		
        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
       
	   	$datos['relacionCasosCatalogo'] = $this->general_m->obtener_todo('relacionCasosCatalogo', 'relacionCasosId', 'descripcion');

	   	$datos['tipoIntervencionN1Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN1Catalogo', 'tipoIntervencionN1Id', 'descripcion');

	   	$datos['tipoIntervencionN2Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN2Catalogo', 'tipoIntervencionN2Id', 'descripcion');

	   	$datos['tipoIntervencionN3Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN3Catalogo', 'tipoIntervencionN3Id', 'descripcion');
	   	
	   	$datos['tipoIntervencionN4Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN4Catalogo', 'tipoIntervencionN4Id', 'descripcion');

	   	$datos['relacionesActoresCatalogo'] = $this->general_m->obtener_todo('relacionActores', 'relacionActoresId', 'relacionActoresId');
		
		$datos['tipoFuenteDocumentalN1Catalogo'] = $this->general_m->obtener_todo('tipoFuenteDocumentalN1Catalogo', 'tipoFuenteDocumentalN1CatalogoId', 'descripcion');
		
		$datos['tipoFuenteDocumentalN2Catalogo'] = $this->general_m->obtener_todo('tipoFuenteDocumentalN2Catalogo', 'tipoFuenteDocumentalN2CatalogoId', 'descripcion');
		
        return $datos;
        
    }
    
    function mostrar_caso($casoId = 0, $cadena ='0'){
        
     
        $datos['casoId'] = $casoId;
        
        if ($casoId!=0) {
        $datos['clase']="";
    }else{
        $datos['clase']="Escondido";
    }
        
        if($casoId > 0){
            
            $datos['catalogos'] = $this->traer_catalogos();
            
            $datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
			
			$datos['datosCaso']['relacionCasos'] = $this->casos_m->mTraeRelacionesCaso($casoId);
        }
        $datos['is_active'] = 'casos';
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
           if($cadena != '0'){
           		$datos['listado'] = $this->casos_m->mBuscarCasosNombre($cadena);
				//$datos['listado']['mensaje']='ok';/ 	print_r($datos['listado']);
           }else{
           		$datos['listado'] = $this->casos_m->mListaCasos();
           }         

        $datos['casos']=$this->load->view('casos/informacionGeneral_v', $datos, true);

        $datos['casosNucleo']=$this->load->view('casos/nucleoCaso_v', $datos, true);

        $datos['infoAdicional']=$this->load->view('casos/infoAdicional_v', $datos, true);
        

        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['form'] = $this->load->view('casos/principalCasos_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }
    
    public function agregar_caso(){
        
        $datos['action'] = base_url().'index.php/casos_c/guardar_caso';
        
        $datos['is_active'] = 'casos';
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
                    
        $datos['listado'] = $this->casos_m->mListaCasos();
        
        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['form'] = $this->load->view('casos/formularioInfoGral_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }
    
    public function guardar_caso(){
        
        foreach($_POST as $campo => $valor){ 
   		
                    $pos = strpos($campo, '_');
                    
                    $nombre_tabla = substr($campo, 0, $pos);
                    
                    $nombre_campo = substr($campo, ++$pos);
                    
                    $datos['tablas'][$nombre_tabla][$nombre_campo] = $valor; 
                        
                }

           $casoId = $this->casos_m->mAgregarCaso($datos);
           
           $url = base_url().'index.php/casos_c/mostrar_caso/'.$casoId;
           
           redirect($url);
        
    }
	/*
	 * Valida si hay casos o actores relacionados con el caso, si no los hay cambia el estado del caso a "inactivo"
	 * se existen al menos un caso o un actor relacionado, manda el mensaje de que no puede eliminar el caso
	 * */
	public function eliminarCaso(){
		
		$casoId = $this->input->post("idCaso");	
		
		$datos['relacionesConCasos'] = $this->casos_m-> mTraeRelacionesCaso($casoId);
		
		$datos['relacionesConActores'] = $this->casos_m->mTraerActoresRelacionadosCaso($casoId);

		if($datos['relacionesConCasos'] == '0' && $datos['relacionesConActores'] == '0'){
			
			 $mensaje = $this->casos_m->mCambiaEstadoActivoCaso($casoId);
			
				$mensaje = 'Hecho';
			
		}else{
			
			$mensaje = "Este caso tiene otros casos o actores relacionados, elimina primero estas relaciones";
			
		}
		
		echo $mensaje;
	}
	
	function editarCaso($casoId){
        
        $datos['casoId'] = $casoId;
        
        $datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
        
        if($casoId > 0){
                                

            $datos['head'] = $this->load->view('general/head_v', $datos, true);
			
            $datos['action'] = base_url().'index.php/casos_c/editarCasoBd';
            
            $datos['is_active'] = 'casos';

	        $datos['listado'] = $this->casos_m->mListaCasos();
	        
	        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);

	        $datos['form'] = $this->load->view('casos/formularioInfoGral_v', $datos, true);

	        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
	        
	        $datos['body'] = $this->load->view('general/body_v', $datos, true);

            $this->load->view('general/principal_v', $datos);
            
            
            
        } else {
            
            redirect(base_url().'index.php/casos_c/mostrar_caso');
            
        }
        
    }
    
    public function editarCasoBd(){
        
        foreach($_POST as $campo => $valor){
            
            if($campo != 'userfile' && $valor != ''){
            
                $pos = strpos($campo, '_');

                $nombre_tabla = substr($campo, 0, $pos);

                $nombre_campo = substr($campo, ++$pos);

                $datos[$nombre_tabla][$nombre_campo] = $valor; 
                
            }

        }
		$datos['tablas']=$datos;
		
        $this->casos_m->mActualizaDatosCaso($datos['casos']['casoId'], $datos);
        
       redirect(base_url().'index.php/casos_c/mostrar_caso/'.$datos['casos']['casoId']);
        
    }
	
	public function seleccionActor(){
		
		$DatosGenerales['head'] = $this->load->view('general/head_v', "", true);
		
		
		$this->load->view('casos/SelecionActor',$DatosGenerales);
	}
	
	
	public function buscarCasos(){
		
		$cadena = $this->input->post('cadena');
		$total = 0;
		if(!empty($cadena)){
			$data = $this->casos_m->mBuscarCasosNombre($cadena);
			
			$datos="";
		 		if($data == 0){
					echo "No existen casos con ese filtro";
				}else{
					
					foreach ($data as $individual) {
						
						$datos = $datos. '<div class="twelve columns" id="caja'.$individual['casoId'].
						'" onclick="cargarCaso('.$individual['casoId'].')" style="cursor: pointer;">'.$individual['nombre'].'</div><hr />';
						
						$total = $total +1;
					}
				}
			
    	
		    	if ($total==1) {
		    		$datos = $datos .'<div id="numeroRegistros">'.$total.' registro encontrado</div>';
				} else {
				    $datos = $datos .'<div id="numeroRegistros">'.$total.' registros encontrados</div>';
				} 
		    
			print_r($datos);			
			
		}else{
			echo 0;
		}
	    
		
	}
	
	/**
	 * Carga la vista para editar o para guardar una nueva victima
	 */
	public function mostrarVictimas($idActo,$idVictima = 0, $ventana = 0, $casoId){
		
        $datos['is_active'] = 'casos';
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['casoId']=$casoId;

		$datos['victimas'] = $this->casos_m->mTraerVictimasActo($idActo);
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['idVictima'] = $idVictima;
		
		$datos['idActo'] = $idActo;
		
		if($ventana == 0){
			if($idVictima == 0){
				$datos['action'] = base_url().'index.php/casos_c/guardarVictima/'.$idVictima;
			}
			
			$this->load->view('casos/formularioVictima_v', $datos);
		}
		if($ventana == 1){
			if($idVictima != 0){
				$datos['action'] = base_url().'index.php/casos_c/editarVictima/'.$idActo.'/'.$idVictima;
			}
			$this->load->view('casos/formularioEditarVictima_v', $datos);
		}
		
	}
	
	public function guardarVictima($idActo){
		
		foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		$data['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['victimas']['actorId']);
			
		$this->casos_m->llenarCasoActor($data);
		
		$datos['victimas']['actos_actoId'] = $idActo;
		

		$victimaId=$this->casos_m->mAgregarVictimaActo($datos['victimas']);
		
		redirect(base_url().'index.php/casos_c/mostrarVictimas/'.$idActo.'/'.$victimaId.'/1/'.$data['casos_has_actores']['casos_casoId']);
				
	}

	public function editarVictima($idActo, $idVictima){
		
		foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
				
		$data = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$datos['victimas']['actorId'],'casoActorId'=>$_POST['casoActorId']);
		
		$this->casos_m->mActualizaRelacionCasoActor($data);
		
		$datos['victimas']['actos_actoId'] = $idActo;
		
		$this->casos_m->mActualizaDatosVictima($datos['victimas'],$idVictima);
		
		print_r($_POST);
		redirect(base_url().'index.php/casos_c/mostrarVictimas/'.$idActo.'/'.$idVictima.'/0/'.$data['casos_casoId']);
		
	}
	/**
	 * Elimina la victima del id dado y redirecciona al caso dado
	 * */
	public function eliminarVictima($idActo,$idVictima,$casoActorId,$casoId){
		
		$datos['victimas'] = $this->casos_m->mTraerVictimasActo($idActo);

		if (isset($datos['victimas']['victimas'][$idVictima]['perpetradores'])) {
			
			$data="No es posible eliminar esta victima, porque tiene perpetradores asociados";

		}
		else{

		$mensaje = $this->casos_m->mEliminaVictimaActo($idVictima);
		
		$this->casos_m->mEliminarRelacionCasoActor($casoActorId);

		$data=0;
		
		}

		print_r($data);

	}
	
	/**
	 * carga la vista de un perpetrador para editarlo o crear uno nuevo dependiendo de si el perpetrador es distinto de cero
	 * se cargara para editar si es cero se cargara para agregar.
	 * */
	public function mostrarPerpetrador($idActo,$idVictima,$idPerpetrador,$casoId){
		
		$datos['catalogos'] = $this-> traer_catalogos();

		$datos['casoId']=$casoId;


		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['victimas'] = $this->casos_m->mTraerVictimasActo($idActo);

		$datos['victimas']=$datos['victimas']['victimas'];

		//print_r($idPerpetrador);

		if($idPerpetrador != 0){
			
			$datos['perpetradorVictimaId']=$datos['victimas'][$idVictima]['perpetradores'][$idPerpetrador]['perpetradorVictimaId'];

			$datos['action'] = base_url().'index.php/casos_c/editarPerpetrador/'.$idActo.'/'.$idVictima.'/'.$datos['perpetradorVictimaId'];
			
			if(isset($datos['victimas'][$idVictima]['perpetradores'][$idPerpetrador]))

				$datos['perpetrador'] = $datos['victimas'][$idVictima]['perpetradores'][$idPerpetrador];

		}else{
			
			$datos['action'] = base_url().'index.php/casos_c/agregarPerpetrador/'.$idActo.'/'.$idVictima;
			
		}
		
		$this->load->view('casos/formularioPerpetrador_v', $datos);
			
	}
	/**
	 * Agrega un perpatrador a la victima y redirecciona a la victima
	 * */
	public function agregarPerpetrador($idActo,$idVictima){
			
			foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		$data['casos_has_actores']= array('casos_casoId' =>$_POST['casoId'],'actores_actorId'=>$datos['perpetradores']['perpetradorId']);
																		
		$this->casos_m->llenarCasoActor($data);
		
		$datos['perpetradores']['victimas_victimaId'] = $idVictima;
		
		$this->casos_m->mAgregarPerpetradorVictima($datos['perpetradores']);
		echo "<script languaje='javascript' type='text/javascript'>
		 window.opener.location.reload();
		 window.close();</script>";
		
	}
	/**
	 * Edita el perpetrador y redirecciona a la victima del perpetrador que se edito.
	 * */
	public function editarPerpetrador($idActo,$idVictima,$idPerpetrador){
		
		foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		$data = array('casos_casoId'=>$_POST['casoId'],'actores_actorId'=>$idPerpetrador,'casoActorId'=>$_POST['casoActorId']);

		$this->casos_m->mActualizaRelacionCasoActor($data);

		$this->casos_m->mActualizaDatosPerpetrador($datos['perpetradores'],$idPerpetrador);

		echo "<script languaje='javascript' type='text/javascript'>
		 window.opener.location.reload();
		 window.close();</script>";
		
	}
	/**
	 * Elimina un perpetrador de una victima y redirecciona a la página de la victima
	 * */
	public function eliminarPerpetrador($idActo,$idVictima,$perpetradorId,$casoActorId,$casoId){
		
		$mensaje = $this->casos_m->mEliminaPerpetradorVictima($perpetradorId);
		
		$this->casos_m->mEliminarRelacionCasoActor($casoActorId);
		
		redirect(base_url().'index.php/casos_c/mostrarVictimas/'.$idActo.'/'.$idVictima.'/1/'.$casoId);
		
		return $mensaje;
	}
	
	public function eliminarActo($idCaso,$actoId){
		
		$mensaje = $this->casos_m->mEliminaActoDerechoAfectado($actoId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}


	public function traeRelaciones($actorId,$dato = 0){

		$datos['dato'] = $dato;

        $datos['head'] = $this->load->view('general/head_v', "", true);

		$datos['actoresRelacionados'] = $this->actores_m->mTraerRelacionesActor($actorId);
		
		$datos['idActor']=$actorId;

        $datos['catalogos'] = $this->traer_catalogos();

        $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId,$datos['catalogos']['listaTodosActores'][$actorId]['tipoActorId']);

        if (isset($datos['datosActor']['relacionActores'])) {

        	$datos['relaciones']=$datos['datosActor']['relacionActores'];
        }

		$this->load->view('casos/seleccionaRelacion_v', $datos);

	}
	
	public function actorColectivoDatos($dato=0){
		
		$datos['dato'] = $dato;
		
		$datos['head'] = $this->load->view('general/head_v', "", true);
		 
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		
		$this->load->view('casos/SeleccionActorColectivo', $datos);
	}

	public function seleccionarIndividualConDatos($dato){
		
		$datos['dato'] = $dato;
		
		$datos['head'] = $this->load->view('general/head_v',"", true);
		 
		$datos['actoresIndividuales'] = $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTransmigrantes'] = $this->actores_m->listado_actores_m(2);
		
		$datos['pestana'] = 'individual';

		$this->load->view('casos/SeleccionActorIndividualTrans', $datos);
	}

	public function seleccionarTransmigranteConDatos($dato){
		
		$datos['dato'] = $dato;

		$datos['head'] = $this->load->view('general/head_v',  "", true);
		
		$datos['actoresIndividuales'] = $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTransmigrantes'] = $this->actores_m->listado_actores_m(2);
		
		$datos['pestana'] = 'trans';
		
		$this->load->view('casos/actorTransmigrante_v', $datos);

	}


}
/**/
