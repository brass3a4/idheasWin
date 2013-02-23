
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	 
class Actores_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
		
		$this->load->library('session');
        
		$this->is_logged_in();
		
        $this->load->model(array('actores_m', 'general_m','catalogos_m','casos_m'));
        
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
        
        $datos['tipoActorColectivo'] = $this->general_m->obtener_todo('tipoActorColectivo', 'tipoActorColectivoId', 'descripcion');
        
        $datos['nivelEscolaridad'] = $this->general_m->obtener_todo('nivelEscolaridadCatalogo', 'nivelEscolaridadId', 'descripcion');
        
        $datos['tipoDireccion'] = $this->general_m->obtener_todo('tipoDireccionCatalogo', 'tipoDireccionId', 'descripcion');

		$datos['motivoViaje'] = $this->general_m->obtener_todo('motivoViajeCatalogo', 'motivoViajeId', 'descripcion');
		
        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
/*Desde aquí agregue estos catalogos*/		

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


        return $datos;
        
    }
    
    function mostrar_actor($actorId = 0, $tipoActorId = 1, $cadena = '0', $tipoFiltro = 0){
   
	    $datos['actorId'] = $actorId;
        
		$datos['EstoyEnActor']=1;
		
        if($actorId > 0){
            
            $datos['catalogos'] = $this->traer_catalogos();
            
            $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $tipoActorId);
			
			$datos['casosRelacionados']="";
			/*----------Esta parte me trae los casos con los que se encuntra relacionado un actor------------------*/

			$casosRelacionados=$this->actores_m->mTraeCasosRelacionadosActor($actorId);

		
            if ($casosRelacionados != 0) {

            	 foreach ($casosRelacionados as $casosColectivos) {

		            	$datos['casosRelacionados'][$casosColectivos['casos']['casoId']]=$casosColectivos;

						$datos['casosRelacionados'][$casosColectivos['casos']['casoId']]['relacionCasos'] = $this->casos_m->mTraeRelacionesCaso($casosColectivos['casos']['casoId']);

		            }

            	
            }
			/*----------Termina la parte que me trae los casos con los que se encuntra relacionado un actor------------------*/

            $datos['citaActor'] = $this->actores_m->mTraerCitasActor($actorId);

			if ($tipoActorId==3) {
				$arreglo="";
	            $casoAfiliados= $this->casosRelacionados($actorId,$actorId,$arreglo);

	            if ($casoAfiliados!=0) {

		            foreach ($casoAfiliados as $casosColectivos) {

		            	$datos['casosRelacionados'][$casosColectivos['casos']['casoId']]=$casosColectivos;

		            }
	            
	            }

            }
            
        }
        
        $datos['is_active'] = 'actores';
        
        $datos['is_actor_type'] = $tipoActorId;
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
        
        switch ($tipoActorId){
            
            case(1): $datos['form'] = $this->load->view('actores/individual_v', $datos, true);
                
            break;
        
            case(2): 
            	$relaciones = $this->actores_m->mTraeCasosRelacionadosActor($actorId);
						
						if($relaciones != '0'){
								$datos['relacionadoCaso'] = 1;
						}
						
            	$datos['form'] = $this->load->view('actores/transmigrante_v', $datos, true);
                
            break;
            case(3): $datos['form'] = $this->load->view('actores/colectivo_v', $datos, true);
                
            break;
            
        }
        
        if($tipoActorId > 0){
        	
			 if ($cadena != '0' && ($tipoFiltro == 0)){
		   		
				$datos['listado']  = $this->actores_m->mBuscarActoresNombre($cadena,$tipoActorId);
				 
				$datos['cadena'] = $cadena; 
			   
			}elseif($cadena == '0' && ($tipoFiltro != 0)){
				
				$datos['listado']   = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,$tipoActorId);	
				
				$datos['tipoFiltro'] = $tipoFiltro;
					
			}elseif($cadena != '0' && ($tipoFiltro != 0)){
				
				$datos['listado']  = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,$tipoActorId);
				
				$datos['cadena'] = $cadena; 
				
				$datos['tipoFiltro'] = $tipoFiltro;
			}else{
			
            	$datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
			}
				
			
        }
		
		if(!empty($datos['casosRelacionados'])){
			
			 $datos['casos'] = $this->load->view('actores/casos_v', $datos, true);
			
		}
        
        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }
   
		
	function mostrar_actor_lista(){
      
	    $actorId = $this->input->post("actorId");	
		
		$tipoActorId = $this->input->post("tipoActor");
		
        $datos['actorId'] = $actorId;
        
		$datos['EstoyEnActor']=1;
		
        if($actorId > 0){
            
            $datos['catalogos'] = $this->traer_catalogos();
            
            $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $tipoActorId);

            $datos['citaActor'] = $this->actores_m->mTraerCitasActor($actorId);
			if($tipoActorId == 3)
				$datos['casosRelacionados'] = $this->casosRelacionados($actorId);
            
        }
        
        $datos['is_active'] = 'actores';
        
        $datos['is_actor_type'] = $tipoActorId;
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
        
        switch ($tipoActorId){
            
            case(1): $datos['form'] = $this->load->view('actores/individual_v', $datos, true);
                
            break;
        
            case(2): $datos['form'] = $this->load->view('actores/transmigrante_v', $datos, true);
                
            break;
        
            case(3): $datos['form'] = $this->load->view('actores/colectivo_v', $datos, true);
                
            break;
            
        }
        
        if($tipoActorId > 0){
            
            $datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
            
        }
		
		if(!empty($datos['casosRelacionados'])){
			
			 $datos['casos'] = $this->load->view('actores/casos_v', $datos, true);
			
		}
        
        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }	
  
    function agregar_actor($tipoActorId = 0){
        
        $datos['catalogos'] = $this->traer_catalogos();
		 $datos['head'] = $this->load->view('general/head_v', $datos, true);
		 $datos['tipoActor']=$tipoActorId;
        if($tipoActorId > 0){
            
            $datos['action'] = base_url().'index.php/actores_c/agregar_actor_bd';
            
                switch ($tipoActorId){

                    case(1):
						$datos['tipo'] = '1';
						$datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
						$datos['filtroDireccion'] = $this->load->view('actores/filtroDireccion', $datos, true);
                        $datos['form'] = $this->load->view('actores/agregar_editar_individual_v', $datos, true);

                    break;

                    case(2): 
						$datos['tipo'] = '2';
						$datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
                        $datos['form'] = $this->load->view('actores/agregar_editar_transmigrante_v', $datos, true);

                    break;

                    case(3): 
						$datos['tipo'] = '3';
						$datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
                        $datos['form'] = $this->load->view('actores/agregar_editar_colectivo_v', $datos, true);

                    break;
                
                    default : redirect(base_url().'index.php/actores_c/mostrar_actor');
                        
                    break;

                }
                
				
				if($tipoActorId > 0){
		            
		            $datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
		            
		        }
				
				
                $datos['is_active'] = 'actores';
        
                $datos['is_actor_type'] = $tipoActorId;

               
                
                $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
                $datos['content'] = $this->load->view('actores/principal_v', $datos, true);

                $datos['body'] = $this->load->view('general/body_v', $datos, true);

                $this->load->view('general/principal_v', $datos);
            
        } else {
            
            redirect(base_url().'index.php/actores_c/mostrar_actor');
            
        }
        
    }
    
    function agregar_actor_bd(){
        
        foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		//print_r($datos);
		$foto = $this->cargarFoto();

		if(!isset($datos['alias']))
			$datos['alias'] = array();
		
		if(!isset($datos['datosDeNacimiento']))
			$datos['datosDeNacimiento'] = array();
			
		if(!isset($datos['infoGralActor']))
			$datos['infoGralActor'] = array();
		
		if(!isset($datos['direccionActor']))
			$datos['direccionActor'] = array();
		
		if(!isset($datos['infoGralActor']))
			$datos['infoGralActor'] = array();
		
		if(!isset($datos['infoContacto']))
			$datos['infoContacto'] = array();
		
		if((!isset($datos['infoMigratoria'])) && $datos['actores']['tipoActorId'] == '2')
			$datos['infoMigratoria'] = array();
		
		if(!isset($datos['infoGralActores']))
			$datos['infoGralActores'] = array();
		
		$datos['actores']['foto'] = $foto;
		
        $datos['agregado'] = $this->actores_m->agregar_actor_m($datos);
        
        redirect(base_url().'index.php/actores_c/mostrar_actor/'.$datos['agregado'].'/'.$_POST['actores_tipoActorId']);
        
    }

	public function cargarFoto(){
		
		$status = "";
	   
			// obtenemos los datos del archivo
			$tamano = $_FILES["archivo"]['size'];
			$tipo = $_FILES["archivo"]['type'];
			$archivo = $_FILES["archivo"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "image/png" || $tipo == "image/jpg" || $tipo == "image/jpeg"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    
				    //para MAC y Linux
				    //$urlBase = system('pwd');
					
				    //Para windows
					$urlBase = system('chdir');
					
				    $destino = $urlBase.'/statics/fotosActor/'.$prefijo.'_'.$archivo;
				  					
				    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)) {
				    	
						$status = "Archivo subido: <b>".$archivo."</b>";
						
						return '/statics/fotosActor/'.$prefijo.'_'.$archivo;
						
				    } else {
				    	
						$status = $destino;
						
				    }
				} else {
					
				    $status = $archivo;
					
				}
				
			}else{
					
				$status = $tipo;
				
			}
	    
		return $status;
	}
    
    function agregar_relacion_actor($actorId,$tipoRelacion,$ventana,$idRelacionActor){
        

        $datos['catalogos'] = $this->traer_catalogos();
        
        $datos['actorId'] = $actorId;

        $datos['listaIndividual'] = $this->actores_m->listado_actores_m(1);

        $datos['listaTransmigrante'] = $this->actores_m->listado_actores_m(2);

        $datos['listaColectivo'] = $this->actores_m->listado_actores_m(3);

        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();

        $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $datos['listaTodosActores'][$actorId]['tipoActorId']);

        $datos['relacionActoresColectivo'] =$this->catalogos_m->mTraerDatosCatalogoNombre('relacionActoresCatalogo');

        $datos['head'] = $this->load->view('general/head_v', $datos, true);
  
       

        if ($idRelacionActor!=0) {
        	if(isset($datos['datosActor']['relacionActores'][$idRelacionActor]))
				 $datos['relaciones']=$datos['datosActor']['relacionActores'][$idRelacionActor];
        } 
        
        if ($ventana==0) {

            $datos['action'] = base_url().'index.php/actores_c/guardar_relacion';

        } else {
            $datos['action'] = base_url().'index.php/actores_c/editar_relacion';
        }


        if ($tipoRelacion==1) {
                        
            $datos['archivoRelacion']='relacion_actores_individual_v';

        }
        else{

            $datos['archivoRelacion']='relacion_actores_colectivo_v';
        }


            $this->load->view('actores/'.$datos['archivoRelacion'], $datos);        
        
    }
    
    function guardar_relacion(){
        
        
        foreach($_POST as $campo => $valor){ 
   		
            $datos[$campo] = $valor;

        }
        
        $respuesta = $this->actores_m->relaciona_actores_m($datos);
        
		 echo "<script languaje='javascript' type='text/javascript'>
			 window.opener.location.reload();
		     window.close();</script>";
        
    }
    
    function editar_relacion(){
        
        foreach($_POST as $campo => $valor){ 
   		
            $datos[$campo] = $valor;

        }
		
        $mensaje = $this->actores_m->mActualizaDatosRelacionActor($datos['relacionActoresId'], $datos);
        
		echo "<script languaje='javascript' type='text/javascript'>
			 window.opener.location.reload();
		     window.close();</script>";
		
		return $mensaje;	
    }
    
    function eliminar_actor(){
        	
		$actorId = $this->input->post("actorId");	
		
		$tipoActor = $this->input->post("tipoActor");
			
		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$datos['casosRelacionados'] = $this->actores_m->mTraeCasosRelacionadosActor($actorId);
		
		if($datos['actoresRelacionados'] == '0' && $datos['casosRelacionados'] == '0'){
			
			$mensaje = $this->actores_m->mCambiaEstadoActivoActor($actorId);
			
		}else{
			
			$mensaje = "Este caso tiene otros casos y/o actores relacionados, elimina primero estas relaciones";
			
		}
        
		echo $mensaje;
				
   }
	
    function editar_actor($actorId, $tipoActorId){
        
        $datos['actorId'] = $actorId;
        
        $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $tipoActorId);
        
        $datos['catalogos'] = $this->traer_catalogos();
        /*----------Agregue este campo-------------------*/
		 $datos['tipoActor']=$tipoActorId;
        /*----------Agregue este campo-------------------*/
        
        if($tipoActorId > 0){
            
            $datos['action'] = base_url().'index.php/actores_c/editar_actor_bd';
            
                switch ($tipoActorId){

                    case(1):
						$datos['tipo'] = '1';
						$datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
						$datos['filtroDireccion'] = $this->load->view('actores/filtroDireccion', $datos, true);
                        $datos['form'] = $this->load->view('actores/agregar_editar_individual_v', $datos, true);

                    break;

                    case(2): 
                      $datos['tipo'] = '2';
                        $datos['tipoT'] = '2';
                        $datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
                        $datos['filtroPaisDatosN'] = $this->load->view('actores/filtroDireccion', $datos, true);
                        //si esta relacionado con un caso y si si envior relacionadoCaso
                        $relaciones = $this->actores_m->mTraeCasosRelacionadosActor($actorId);
                       
                        if($relaciones != '0'){
                            $datos['relacionadoCaso'] = 1;
                        }
                       
                        $datos['form'] = $this->load->view('actores/agregar_editar_transmigrante_v', $datos, true);

                    break;

                    case(3): 
						$datos['tipo'] = '3';
						$datos['filtroPais'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
                        $datos['form'] = $this->load->view('actores/agregar_editar_colectivo_v', $datos, true);

                    break;
                
                    default : redirect(base_url().'index.php/actores_c/mostrar_actor');
                        
                    break;

                }
				
				if($tipoActorId > 0){
		            
		            $datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
		            
				}
                
                $datos['is_active'] = 'actores';
        
                $datos['is_actor_type'] = $tipoActorId;

                $datos['head'] = $this->load->view('general/head_v', $datos, true);
                
                $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
                $datos['content'] = $this->load->view('actores/principal_v', $datos, true);

                $datos['body'] = $this->load->view('general/body_v', $datos, true);

                $this->load->view('general/principal_v', $datos);
            
        } else {
            
            redirect(base_url().'index.php/actores_c/mostrar_actor');
            
        }
        
    }
    
    public function editar_actor_bd(){
        
        foreach($_POST as $campo => $valor){
            
            if($campo != 'userfile' && $valor !=''){
            
                $pos = strpos($campo, '_');

                $nombre_tabla = substr($campo, 0, $pos);

                $nombre_campo = substr($campo, ++$pos);

                $datos[$nombre_tabla][$nombre_campo] = $valor; 
                
            }

        }
		
		
		if(isset($datos['actores']['foto'])){
			$fotoAntes = $datos['actores']['foto'];
		}	

		$foto = $this->cargarFoto();
		
		if(empty($foto))
			$datos['actores']['foto'] = $fotoAntes;
		else
			$datos['actores']['foto'] = $foto ;
		
        $this->actores_m->mActualizaDatosActor($datos['actores']['actorId'], $datos);
        
       redirect(base_url().'index.php/actores_c/mostrar_actor/'.$datos['actores']['actorId'].'/'.$_POST['actores_tipoActorId']);
        
    }

	/*
	 * Recibe el tipo 1 => pais ó 2=>estado y obtiene sus estados o municipios respectivamente
	 * */
	public function filtroPaisEstado(){
		
		$tipo = $this->input->post("tipo");	
		
		$id = $this->input->post("id");	
		
		$actorId = $this->input->post("actorId");	
		
				
		if($tipo == 1){
			
			$datosTabla = array('tabla' => 'estadosCatalogo' , 'campo' => 'paises_paisId', 'valor' => $id);
			
			$datos['estadosCatalogos'] = $this->general_m->mTraerDatosTabla($datosTabla);
			
			$data="<option></option>";
			if(!empty($datos['estadosCatalogos'] ))
			{
				foreach($datos['estadosCatalogos']  as $estado){
	                $data = $data.'<option value="'.$estado['estadoId'].'">'.$estado['nombre'].'</option>';
	         	}
			}
			
		
		}elseif ($tipo == 2) {
			
			$datosTabla = array('tabla' => 'municipiosCatalogo' , 'campo' => 'estados_estadoId', 'valor' => $id);
			
			$datos['municipiosCatalogos'] = $this->general_m->mTraerDatosTabla($datosTabla);
			
			$data="<option></option>";
			
			if(!empty($datos['municipiosCatalogos'])){
				foreach($datos['municipiosCatalogos']   as $municipio){
	                $data = $data.'<option value="'.$municipio['municipioId'].'">'.$municipio['nombre'].'</option>';
	        	 }
			
			}
			
		}else{
			echo "no se encuentra el tipo de filtro";
		}
		
		print_r($data);
	}

	public function casosIndividuales($actorId){

            $citaActor = $this->actores_m->mTraerCitasActor($actorId);

            if ($citaActor!=0) {
            	
            	foreach ($citaActor['citas'] as $citado) {
            		if ($citado['datosCitas']['tipoRelacionIndividualColectivoId']<3) {
            			$casosActorActual=$this->actores_m->mTraeCasosRelacionadosActor($citado['datosCitas']['actores_actorId']);

            			if ($casosActorActual!=0) {
            				if (isset($casosDeIndividuales)) {
            					$casosDeIndividuales=$casosDeIndividuales+$casosActorActual;
            				}
            				else{ 
            					$casosDeIndividuales=$casosActorActual;
            				}
            	
            			}
            		}
            		
            	}
            }
            if (isset($casosDeIndividuales)) {
            	return $casosDeIndividuales;            	
            }
            else {
            	return 0;
            }
	}

	/*Trae los casos relacionados con un actor colectivo y sus afiliados*/
	public function casosRelacionados($actorInicial,$actorColectivo,$casosColectivo)
	{
		//Traer casos relacionados con los afiliados del actor colectivo
		
		$casosActorActual=$this->actores_m->mTraeCasosRelacionadosActor($actorColectivo);

		if ($casosActorActual!=0) {
			
			if (empty($casosColectivo)) {

				$casosColectivo=$casosActorActual;

			}else{
				$casosColectivo=$casosColectivo+$casosActorActual;
			}
		}

		$casosDeIndividuales=$this->casosIndividuales($actorColectivo);

		if ($casosDeIndividuales!=0) {

			if (empty($casosColectivo)) {

				$casosColectivo=$casosDeIndividuales;
			}

			else{
				$casosColectivo=$casosColectivo+$casosDeIndividuales;
			}
		}

		if ($actorColectivo>0) {

			$listaActores=  $this->actores_m->mListaTodosActores();
			
	
	        $datosActor = $this->actores_m->traer_datos_actor_m($actorColectivo, $listaActores[$actorColectivo]['tipoActorId']);

	        if (isset($datosActor['actoresRelacionados'])) {
	        	
	        	$colectivosRelacionados=$datosActor['actoresRelacionados'];
					
				foreach ($colectivosRelacionados as $key => $ColectivoRelacionado) {
					
					if ($key!=$actorInicial && (isset($listaActores[$key]))) {

						$arregloCaso=$this->casosRelacionados($actorInicial,$key,$casosColectivo);
						
						if ($arregloCaso!=0) {

							return $arregloCaso;
						}

					}
				}

	        }

	        else{

	        	return $casosColectivo;
	        }

		}

		//Obtengo los casos de sus actoresIndividuales relacionados
		
	}

	public function filtrarActorVentana(){
		
		$total = 0;
		
		$cadena = "";
		
		$tipoFiltro = "";
		
		$tipoActor = 1;
		
		$tipoActor = $this->input->post('tipoActor');
		
		$cadena = $this->input->post('cadena');
		
		$tipoFiltro = $this->input->post('tipoFiltro');
		
		$ventana = $this->input->post('ventana');
		
		if($tipoFiltro == 8){
			  	switch ($ventana){
					case(1):
						 $data['individuales'] = $this->actores_m->listado_actores_m(1);
		
						 $datos="";
						 		if($data == 0){
									echo "No existen actores con ese filtro";
								}else{
									if(isset($data['individuales']) && $data['individuales'] !=0){
										foreach ($data['individuales'] as $individual) {
				
									    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
									    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
									    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
										        </div >';
										}
									}
								  }	
				
								print_r($datos);
					break;
					
					case (2):
						$data = $this->actores_m->listado_actores_m(3);
						$datos="";
				 		if($data == 0){
							echo "No existen actores con ese filtro";
						}else{
							if(isset($data) && $data != 0){
								foreach ($data as $individual) {
		
							    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
							    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
							    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
								        </div >';
								}
							}
										    	
						  }	
		
						print_r($datos);
					break;
					case (3):
						$data['individuales'] = $this->actores_m->listado_actores_m(1);
						
						$data['transmigrantes'] = $this->actores_m->listado_actores_m(2);
						
						$data['colectivos'] = $this->actores_m->listado_actores_m(3);
						
						$datos="";
				 		if($data == 0){
							echo "No existen actores con ese filtro";
						}else{
							if(isset($data['individuales']) && $data['individuales'] !=0){
								foreach ($data['individuales'] as $individual) {
		
							    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
							    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
							    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
								        </div >';
								}
							}
							if(isset($data['transmigrantes']) && $data['transmigrantes'] !=0){
								foreach ($data['transmigrantes'] as $individual) {
		
								    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
								    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
								    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
									        </div >';
							     }
							}
							
							if(isset($data['colectivos']) && $data['colectivos'] !=0){
								foreach ($data['colectivos'] as $individual) {
		
								    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
								    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
								    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
									        </div >';
							     }
							}
					    	
						  }	
		
						print_r($datos);
					break;
					
					case(4):
						
						 $data['transmigrantes'] = $this->actores_m->listado_actores_m(2);
						 
						 $datos="";
						 		if($data == 0){
									echo "No existen actores con ese filtro";
								}else{
									
									if(isset($data['transmigrantes']) && $data['transmigrantes'] !=0){
										foreach ($data['transmigrantes'] as $individual) {
				
										    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
										    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
										    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
											        </div >';
									     }
									}
							    	
								  }	
				
								print_r($datos);
					break;
			  	}
			 	
			
		}else{
			switch ($ventana){
            
	            case(1): 
	
					if ((!empty($cadena)) && ($tipoFiltro == 0)){
			   	
						$data['individuales'] = $this->actores_m->mBuscarActoresNombre($cadena,1);
						
					}elseif((empty($cadena)) && ($tipoFiltro != 0)){
						
						$data['individuales'] = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,1);	
						
					}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
						
						$data['individuales'] = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,1);
						
					}else{
		            	echo "error";
					}
	                $datos="";
			 		if($data == 0){
						echo "No existen actores con ese filtro";
					}else{
						if(isset($data['individuales']) && $data['individuales'] !=0){
							foreach ($data['individuales'] as $individual) {
	
						    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
						    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
						    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
							        </div >';
							}
						}
				    	
					  }	
	
					print_r($datos);
						
	            break;
				
				case(2):  
					if ((!empty($cadena)) && ($tipoFiltro == 0)){
			   	
						$data = $this->actores_m->mBuscarActoresNombre($cadena,3);
						
					}elseif((empty($cadena)) && ($tipoFiltro != 0)){
						
						$data = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,3);	
							
					}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
						
						$data = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,3);
						
					}else{
		            	echo "error";
					}
	                $datos="";
			 		if($data == 0){
						echo "No existen actores con ese filtro";
					}else{
						if(isset($data) && $data != 0){
							foreach ($data as $individual) {
	
						    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
						    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
						    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
							        </div >';
							}
						}
									    	
					  }	
	
					print_r($datos);
				
				
				break;     
				
				case(3):   
					if ((!empty($cadena)) && ($tipoFiltro == 0)){
			   	
						$data['individuales'] = $this->actores_m->mBuscarActoresNombre($cadena,1);
						
						$data['transmigrantes'] = $this->actores_m->mBuscarActoresNombre($cadena,2);
						
						$data['colectivos'] = $this->actores_m->mBuscarActoresNombre($cadena,3);
						
					   
					}elseif((empty($cadena)) && ($tipoFiltro != 0)){
						
						$data['individuales'] = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,1);	
						
						$data['transmigrantes'] = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,2);	
						
						$data['colectivos'] = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,3);	
							
					}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
						
						$data['individuales'] = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,1);
						
						$data['transmigrantes'] = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,2);
						
						$data['colectivos'] =  $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,3);
						
						
					}else{
		            	echo "error";
					}
	                $datos="";
			 		if($data == 0){
						echo "No existen actores con ese filtro";
					}else{
						if(isset($data['individuales']) && $data['individuales'] !=0){
							foreach ($data['individuales'] as $individual) {
	
						    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
						    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
						    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
							        </div >';
							}
						}
						if(isset($data['transmigrantes']) && $data['transmigrantes'] !=0){
							foreach ($data['transmigrantes'] as $individual) {
	
							    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
							    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
							    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
								        </div >';
						     }
						}
						
						if(isset($data['colectivos']) && $data['colectivos'] !=0){
							foreach ($data['colectivos'] as $individual) {
	
							    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
							    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
							    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
								        </div >';
						     }
						}
				    	
					  }	
	
					print_r($datos);
				break;	    
				case(4): 
	
					if ((!empty($cadena)) && ($tipoFiltro == 0)){
			   	
						$data['transmigrantes'] = $this->actores_m->mBuscarActoresNombre($cadena,2);
						
					   
					}elseif((empty($cadena)) && ($tipoFiltro != 0)){
						
						$data['transmigrantes'] = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,2);	
							
					}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
						
						$data['transmigrantes'] = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,2);
						
						
					}else{
		            	echo "error";
					}
	                $datos="";
			 		if($data == 0){
						echo "No existen actores con ese filtro";
					}else{
						
						if(isset($data['transmigrantes']) && $data['transmigrantes'] !=0){
							foreach ($data['transmigrantes'] as $individual) {
	
							    $datos =  $datos.'<div class="twelve columns lista" onclick="Seleccionar('.$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'].')"> 
							    		<img class="three columns imagenFoto" src="'.base_url().$individual['foto'].'" />
							    		<b class="nine columns">'.$individual['nombre']." ".$individual['apellidosSiglas'].'</b>
								        </div >';
						     }
						}
				    	
					  }	
	
					print_r($datos);
	        }
		}
		
		
		
		
		
	}

	public function filtrarActor(){
			
		$total = 0;
		
		$cadena = "";
		
		$tipoFiltro = "";
		
		$tipoActor = 1;
		
		$tipoActor = $this->input->post('tipoActor');
		
		$cadena = $this->input->post('cadena');
		
		$tipoFiltro = $this->input->post('tipoFiltro');
		
		   if ((!empty($cadena)) && ($tipoFiltro == 0)){
		   	
				$data = $this->actores_m->mBuscarActoresNombre($cadena,$tipoActor);
			   
			}elseif((empty($cadena)) && ($tipoFiltro != 0)){
				
				$data = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro,$tipoActor);	
					
			}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
				
				$data = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena,$tipoActor);
				
			}else{
            	echo "error";
			}
				$datos="";
		 		if($data == 0){
					echo "No existen actores con ese filtro";
				}else{
					
					foreach ($data as $individual) {
						
						$datos = $datos.  '<div class="twelve columns" id="caja'.$individual['actorId'].'" onclick="cargarActor('.$individual['actorId'].','.$tipoActor.')" style="cursor: pointer;">		        
		                    <img class="five columns" src="'.base_url().$individual['foto'].'" />
		                    <p style="color:#0080FF;">'.$individual['nombre'].' '.$individual['apellidosSiglas'].'</p>
			             </div><hr />';	
						 
						$total = $total +1;
					}
				}
		
			if ($total==1) {
		    		$datos = $datos .'<div id="numeroRegistros">'.$total.' registro encontrado</div>';
				} else {
				    $datos = $datos .'<div id="numeroRegistros">'.$total.' registros encontrados</div>';
				} 
		
			print_r($datos);
		
	}

	
	public function relacionaActorCaso($idCaso, $idActor)
	{
		$datos = array('casoId' => $idCaso , 'actorId' => $idActor);
		
		$mensaje = $this->actores_m->mRelacionaCasoActor($datos);
		
		return $mensaje;
	}

	public function agregarDireccion($actorId){
		
		
		 foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
	
		
		
		$datos['direccionActor']['actores_actorId'] = $actorId;
		
        $mensaje = $this->actores_m->mAgregarDireccionActor($datos['direccionActor']);
		
		echo "<script languaje='javascript' type='text/javascript'>
			 window.opener.location.reload();
		     window.close();</script>";
		
     	return $mensaje;
	}

	public function eliminarDireccion($direccionId,$actorId,$tipoActor){
		
		$mensaje = $this->actores_m->mEliminarDireccionActor($direccionId);	
		
		redirect(base_url().'index.php/actores_c/editar_actor/'.$actorId.'/'.$tipoActor);
		
		return $mensaje;
		
	}
	
	public function actualizaDireccion($direccionId,$actorId){
		
		 foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 


		$datos['direccionActor']['actores_actorId'] = $actorId;
		
        $mensaje = $this->actores_m->mActualizaDatosDireccion($datos['direccionActor'],$direccionId);
		
		 echo "<script languaje='javascript' type='text/javascript'>
			 window.opener.location.reload();
		     window.close();</script>";

		//redirect(base_url().'index.php/actores_c/mostrar_actor/'.$actorId.'/'.$_POST['actores_tipoActorId']);
		
		return $mensaje;
		
		
	}
    
	public function eliminarRelacionActor($relacionActoresId, $actorRelacionadoId,$actorId,$tipoActorId){
		
		$mensaje = $this->actores_m->mEliminaRelacionActores($relacionActoresId);
		
		redirect(base_url().'index.php/actores_c/mostrar_actor/'.$actorId.'/'.$tipoActorId);
		
		return $mensaje;
	}
	
	public function seleccionarColectivo(){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		 
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		
		$this->load->view('casos/SeleccionActorColectivo', $datos);
	}
	
	public function seleccionarIndividual(){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['actoresIndividuales'] = $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTransmigrantes'] = $this->actores_m->listado_actores_m(2);
		
		$datos['pestana'] = 'individual';
		
		$this->load->view('casos/SeleccionActorIndividualTrans', $datos);
	}
	
	public function cargarTransmigrante()
	{
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['actoresIndividuales'] = $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTransmigrantes'] = $this->actores_m->listado_actores_m(2);
		
		$datos['pestana'] = 'trans';
		
		$this->load->view('casos/actorTransmigrante_v', $datos);
	}
    
	
	public function seleccionarActores(){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['todosActores'] =  $this->actores_m->mListaTodosActores();
		
		$this->load->view('casos/SeleccionActor', $datos);
	}
	/*
	 * carga los datos de la direccion de un actor individual para poder ser visto en la edicion del actor
	 * */
	public function direccion($idActor, $direccionId = 0){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);

        $datos['catalogos'] = $this->traer_catalogos();
		
		$datos['actorId'] = $idActor;
		
		if($direccionId != 0){
			
			$datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
			
			$datos['datos'] = $this->actores_m->traer_datos_actor_m($idActor, $datos['listaTodosActores'][$idActor]['tipoActorId']);

			if(isset($datos['datos']['direccionActor'][$direccionId])){
				
				$datos['datosActor'] = $datos['datos']['direccionActor'][$direccionId];
				$datos['datosActor']['direccionActor']=$datos['datosActor'];
			}
			
		}
		$datos['tipo'] = '3';
		$datos['direccionExtra'] = '1';
		$datos['filtroDireccion'] = $this->load->view('actores/filtroPaisEstadoMunicipio_v', $datos, true);
		$this->load->view('actores/formularioNuevaDireccion', $datos);
	}
	/*
	 * Actualiza la seccion de direcciones en editar actor individual
	 * Es llamada desde la funcion java script clearDiv. que lanza la ventan popup de editar
	 *  y agregar direccion
	 * */
	public function traerDirecciones(){
		
		$idActor = $this->input->post('idActor');
		
		$catalogos = $this->traer_catalogos();
		
		$datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
			
		$datos['datos'] = $this->actores_m->traer_datos_actor_m($idActor, $datos['listaTodosActores'][$idActor]['tipoActorId']);
				
		$data="";
		//echo "<pre>";
		//print_r($datos['datos']['direccionActor']);
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		if (isset($datos['datos']['direccionActor'])){
			$data=$data.$datos['head']." <input type='hidden' id='idActor' name='".$idActor."'/><fieldset><!--Dirección-->
	                <legend>Dirección</legend>
	                	   <div id='pestania' data-collapse>
	                	   	<div>
	                            <table style='margin-left: 10px'>
	                                <thead>
	                                    <tr>
	                                        <th>Tipo de dirección</th>
	                                        <th>Ubicación</th>
	                                        <th>Código Postal</th>
	                                        <th>País</th>
	                                        <th>Estado</th>
	                                        <th>Municipio</th>
	                                        <th>Accion</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                	   ";
	      	foreach ($datos['datos']['direccionActor'] as $key => $direccion) {
	      		//echo "<pre>";	
	      		//print_r($direccion['paisesCatalogo_paisId']);
	      		if(isset($direccion['paisesCatalogo_paisId'])){
	      			if(isset($direccion['estadosCatalogo_estadoId'])) {
					$estado = $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre']; 
					}
					else{
						$estado = '';
					}
		      				
					if(isset($direccion['paisesCatalogo_paisId'])){
						$pais=$catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'];
						
					}
						
					else{
						$pais='';
					}
		      		
		      		if(isset($direccion['codigoPostal'])){
						$codigoPostal = $direccion['codigoPostal']; 
					}					
					else{
						$codigoPostal='';
					}			
					if(isset($direccion['tipoDireccionId'])) {
						$tipoDireccion=$catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'];
					}
					else{
						$tipoDireccion = '';
					}
												
					if(isset($direccion['direccion'])){
						$campoDireccion= $direccion['direccion'];
					}
					else{
						$campoDireccion='';	
					}
								
					if(isset($direccion['municipiosCatalogo_municipioId'])) { 
						$municipio=$catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] ;
					}else{
						$municipio ='';
					}
				
					$data = $data. '<tr>
						<td>'.$tipoDireccion.'</td>
						<td>'.$campoDireccion.'</td>
						<td>'.$codigoPostal.'</td>
						<td>'.$pais.'</td>
						<td>'.$estado.'</td>
						<td>'.$municipio.'</td>
					';
						$data = $data .' <td>
												<input type="button" class="tiny button espacioInferior" style="padding: 7px 19px 7px 19px" value="Editar" onclick="nuevaDireccion('.$idActor.','.$direccion['direccionId'].')"/> 
		                                 		<input type="button" value="Elminar" class="tiny button" style="padding: 7px 15px 7px 15px" onclick="eliminarDireccionActor('.$direccion['direccionId'].','.$idActor.',2)"/> 
		                             </td></tr>';
					
	      		}
	      		
	      	}
					$data = $data. '</tbody>
	                            </table>
	                                <input style="margin-left:15px;" type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion('.$idActor.',0)">
	                  </div></div></fieldset>
	                  ';
		}
		
		echo $data;
	}
}

/* End of file actores_c.php */
/* Location: ./application/controllers/actores_c.php */
