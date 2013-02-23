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
class Casos_m extends CI_Model {
	
	function __construct() {
		parent::__construct();
	    $this->load->database();
	}
	
	/* Este modelo agrega un caso a la base de datos
	 * @Param $datosCaso
	 * */
	
	public function mAgregarCaso($datosCaso){
		
		/* inserta el array casos en la tabla casos de la BD */
		$this->db->insert('casos', $datosCaso['tablas']['casos']);
		
		/* Obtine el Id del último caso insertado*/
		$this->db->select_max('casoId');
		$consulta = $this->db->get('casos');

		/* Recorre el array $consulta para traer la cadena del actorId */
		if($consulta->num_rows() > 0){
    		foreach ($consulta->result_array() as $row) {
        		$ultimoCasoId = $row['casoId'];
    		}
			
    	}
		print_r($ultimoCasoId);
		/* Agrega el casoId al arreglo en el campo casos_casoId en las tablas...*/
			
		foreach($datosCaso['tablas'] as $key => $value){
			if($key != 'casos'){
				$datosCaso['tablas'][$key]['casos_casoId'] = $ultimoCasoId;
			}
		}


		
		/* Inserta en la BD los arrays */
		foreach($datosCaso['tablas'] as $key => $value){
			if($key != 'casos'){
				$this->db->insert($key,$datosCaso['tablas'][$key]);
			}
		}
		return $ultimoCasoId;
	}/* Fin de mAgregarCaso() */
	
	/* Este modelo trae los datos de un caso dependiendo de su id
	 * @Param casoId
	 * */
	
	public function mTraerDatosCaso($casoId){
		
		
		/* Trae todos los datos de casos*/
		$this->db->select('*');
		$this->db->from('casos');
		$this->db->where('casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['casos'] = $row;
			}
		}
		
		
		/* Trae todos los datos de infoCaso*/
		$this->db->select('*');
		$this->db->from('infoCaso');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['infoCaso'] = $row;
			}
		}
		
		/* Trae todos los datos de fichas*/
		$this->db->select('*');
		$this->db->from('fichas');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['fichas'][$row['fichaId']] = $row;
				
				$this->db->select('*');
				$this->db->from('registro');
				$this->db->where('fichas_fichaId',$row['fichaId']);
				$consultaRegistros = $this->db->get();
				
				//print_r($consultaRegistros->result_array());
				if ($consultaRegistros->num_rows() > 0){
					foreach ($consultaRegistros->result_array() as $row2) {
						$datos['fichas'][$row['fichaId']]['registros'][$row2['registroId']] = $row2;
					}
				}
			}
		}
		
		/* Trae todos los datos de lugares*/
		$this->db->select('*');
		$this->db->from('lugares');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['lugares'][$row['lugarId']] = $row;
			}
		}
		
		/* Trae todos los datos de relacionCasos*/
		$this->db->select('*');
		$this->db->from('relacionCasos');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['relacionCasos'][$row['relacionId']] = $row;
				$datos['relacionCasos'][$row['relacionId']]['casoIdB'] = $row['casoIdB'];
				
				$this->db->select('nombre,fechaInicial,fechaTermino');
				$this->db->from('casos');
				$this->db->where('casoId', $row['casoIdB']);
				$consultaCaso = $this->db->get();
				
				if ($consultaCaso->num_rows() > 0){
					foreach ($consultaCaso->result_array() as $row3) {
						$nombreCaso = $row3;
					}
					
					$datos['relacionCasos'][$row['relacionId']]['nombreCasoIdB'] = $nombreCaso['nombre']; 
					$datos['relacionCasos'][$row['relacionId']]['fechaIncial'] = $nombreCaso['fechaInicial'];
					$datos['relacionCasos'][$row['relacionId']]['fechaTermino'] = $nombreCaso['fechaTermino'];	
				}
				
				
			}

			
		}/* fin else */
		
		/* Trae todos los datos de intervenciones*/
		$this->db->select('*');
		$this->db->from('intervenciones');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['intervenciones'][$row['intervencionId']] = $row;
				
				/*Trae los casos relacionados directamente a un interventor */
				$this->db->select('*');
				$this->db->from('casos_has_actores');
				$this->db->where('actores_actorId',$row['interventorId']);
				$consultaCasosActor = $this->db->get();
				
				if($consultaCasosActor->num_rows() > 0){
					foreach ($consultaCasosActor->result_array() as $valor) {
						$datos['intervenciones'][$row['intervencionId']]['casosActorInterventor'][$valor['casoActorId']]=$valor;
					}
				}

				/*Trae los casos relacionados directamente a un receptor */
				$this->db->select('*');
				$this->db->from('casos_has_actores');
				$this->db->where('actores_actorId',$row['receptorId']);
				$consultaCasosActor = $this->db->get();
				
				if($consultaCasosActor->num_rows() > 0){
					foreach ($consultaCasosActor->result_array() as $valor) {
						$datos['intervenciones'][$row['intervencionId']]['casosActorReceptor'][$valor['casoActorId']]=$valor;
					}
				}
			}
			
			foreach ($datos['intervenciones'] as $row) {
				
				/*Trae los intervenidos de una intervención*/
				$this->db->select('*');
				$this->db->from('intervenidos');
				$this->db->where('intervenciones_intervencionId',$row['intervencionId']);
				$this->db->order_by("intervenidoId", "desc"); 
				$consultaIntervenidos = $this->db->get();
				
				if ($consultaIntervenidos->num_rows() > 0) {
					foreach ($consultaIntervenidos->result_array() as $row4) {
						$datos['intervenciones'][$row['intervencionId']]['intervenidos'][$row4['intervenidoId']]=$row4;
						
						/*Trae los casos relacionados directamente a un intervenido */
						$this->db->select('*');
						$this->db->from('casos_has_actores');
						$this->db->where('actores_actorId',$row4['actorIntervenidoId']);
						$consultaCasosActor = $this->db->get();
						
						if($consultaCasosActor->num_rows() > 0){
							foreach ($consultaCasosActor->result_array() as $valor) {
								$datos['intervenciones'][$row['intervencionId']]['intervenidos'][$row4['intervenidoId']]['casosActorIntervenido'][$valor['casoActorId']]=$valor;
							}
						}	
					}
				}
				
				
				$this->db->select('actorId');
				$this->db->from('actorReportado');
				$this->db->where('intervenciones_intervencionId', $row['intervencionId']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row2) {
						//$datos['actorReportado'][$row['actorId']] = $row;
						$this->db->select('actorId,nombre,apellidosSiglas');
						$this->db->from('actores');
						$this->db->where('actorId', $row2['actorId']);
						$consultaActorReportado = $this->db->get();
						
						if ($consultaActorReportado->num_rows() > 0){
							foreach ($consultaActorReportado->result_array() as $row3) {
								
								$datos['intervenciones'][$row['intervencionId']]['actorReportado'][$row3['actorId']] =$row3;
								
								$this->db->select('*');
								$this->db->from('casos_has_actores');
								$this->db->where('actores_actorId',$row3['actorId']);
								$consultaCasosActor = $this->db->get();
								
								if($consultaCasosActor->num_rows() > 0){
									foreach ($consultaCasosActor->result_array() as $valor) {
										//print_r($valor);
										$datos['intervenciones'][$row['intervencionId']]['actorReportado'][$row3['actorId']]['casosActor'][$valor['casoActorId']]=$valor;
									}
								}
								
								
							}
						}/*fin if consultaActorReportado*/ 
						
					}/*fin foreach consulta de intervenciones */
				}/* fin de if consulta intervenciones*/
				
			}
			
		}

		/* Trae todos los datos de actos*/
		$this->db->select('*');
		$this->db->from('actos');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['actos'][$row['actoId']] = $row;
			}
			
			foreach ($datos['actos'] as $row) {
				$this->db->select('*');
				$this->db->from('derechoAfectado');
				$this->db->where('derechoAfectadoCasoId', $row['derechoAfectado_derechoAfectadoCasoId']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['derechoAfectado'][$row['derechoAfectadoCasoId']] = $row;
					}
				}
			}/* Fin foreach de derechoAfectado*/
			
			foreach ($datos['actos'] as $row) {
				//print_r($row);
				$this->db->select('*');
				$this->db->from('victimas');
				$this->db->where('actos_actoId', $row['actoId']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row2) {
						$datos['actos'][$row['actoId']]['victimas'][$row2['victimaId']] = $row2;

						foreach ($datos['actos'] as $row3) {
						//echo "<pre>"; print_r($row3); echo "</pre>";
								if (isset($row3['victimas']) && (isset($row3['victimas'][$row2['victimaId']]['victimaId'])) ) {
									$this->db->select('*');
									$this->db->from('perpetradores');
									$this->db->where('victimas_victimaId', $row3['victimas'][$row2['victimaId']]['victimaId']);
									$consulta = $this->db->get();
									
									if ($consulta->num_rows() > 0){				
										/* Pasa la consulta a un cadena */
										foreach ($consulta->result_array() as $row4) {
											$datos['actos'][$row['actoId']]['victimas'][$row2['victimaId']]['perpetradores'][$row4['perpetradorVictimaId']] = $row4;
										}
								}
							}
						}/*Fin foreach Victimas*/
						
					}
					
				}
			}/*Fin foreach actos*/
			
			
		}
		
		
		/* Trae todos los datos de fuenteInfoPersonal*/
		$this->db->select('*');
		$this->db->from('fuenteInfoPersonal');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']] = $row;
				
				//print_r($row);
				if(isset($row['actorReportado'])){
						$this->db->select('actorId,nombre,apellidosSiglas');
						$this->db->from('actores');
						$this->db->where('actorId',$row['actorReportado']);
						$consultaActorReportado = $this->db->get();
						
						if ($consultaActorReportado->num_rows() > 0){
							foreach ($consultaActorReportado->result_array() as $row2) {
								$datosActorReportado = $row2;
							}
							
							$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']]['actorReportadoNombre'] = $datosActorReportado['nombre'];
							$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']]['actorReportadoApellidosSiglas'] = $datosActorReportado['apellidosSiglas'];
						}	
					}
				
				$this->db->select('*');
				$this->db->from('casos_has_actores');
				$this->db->where('actores_actorId',$row['actorReportado']);
				$consultaCasosActor = $this->db->get();
				
				if($consultaCasosActor->num_rows() > 0){
					foreach ($consultaCasosActor->result_array() as $valor) {
						//print_r($valor);
						$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']]['casosActorReportado'][$valor['casoActorId']]=$valor;
					}
				}

				$this->db->select('*');
				$this->db->from('casos_has_actores');
				$this->db->where('actores_actorId',$row['actorId']);
				$consultaCasosActor = $this->db->get();
				
				if($consultaCasosActor->num_rows() > 0){
					foreach ($consultaCasosActor->result_array() as $valor) {
						//print_r($valor);
						$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']]['casosActor'][$valor['casoActorId']]=$valor;
					}
				}
				
			}/*fin foreach consulta de fuenteInfoPersonal */
			
			
			
		}
		
		/* Trae todos los datos de fuenteInfoDocumental*/
		$this->db->select('*');
		$this->db->from('tipoFuenteDocumental');
		$this->db->where('casos_casoId',$casoId);
		$consulta = $this->db->get();
					
		if ($consulta->num_rows() > 0){				
			/* Pasa la consulta a un cadena */
			foreach ($consulta->result_array() as $row) {
				$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']] = $row;
				//print_r($row);
				if(isset($row['actorReportado'])){
						$this->db->select('actorId,nombre,apellidosSiglas');
						$this->db->from('actores');
						$this->db->where('actorId',$row['actorReportado']);
						$consultaActorReportado = $this->db->get();
						
						if ($consultaActorReportado->num_rows() > 0){
							foreach ($consultaActorReportado->result_array() as $row2) {
								$datosActorReportado = $row2;
							}
							
							$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']]['actorReportadoNombre'] = $datosActorReportado['nombre'];
							$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']]['actorReportadoApellidosSiglas'] = $datosActorReportado['apellidosSiglas'];
						}	
				}
				$this->db->select('*');
				$this->db->from('casos_has_actores');
				$this->db->where('actores_actorId',$row['actorReportado']);
				$consultaCasosActor = $this->db->get();
				
				if($consultaCasosActor->num_rows() > 0){
					foreach ($consultaCasosActor->result_array() as $valor) {
						//print_r($valor);
						$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']]['casosActor'][$valor['casoActorId']]=$valor;
					}
				}/*Fin if de consultaCasosActor*/
				
			}
		}
		
		if (isset($datos)) {
			return $datos;
		}else{
			return $mensaje = 'No hay datos en la base de datos';
		}
		
	}/* Fin de mTraer DatosCaso*/
	
	/* Ese modelo lista los casos */
	 public function mListaCasos(){
	 	
             $this->db->select('*');
		
             $this->db->from('casos');
			 
			 $this->db->where('estadoActivo', 1);

			 $this->db->order_by('nombre','asc');
		
             $casos = $this->db->get();
		
             //Pasa la consulta a un cadena */
		
             if($casos->num_rows() != 0){
		
                 foreach($casos->result_array() as $key => $value){
		
                     $listaCasos[$value['casoId']] = $value;
			
                }
		
                /* Regresa la cadena al controlador */
              
                return $listaCasos;
		
            }else{
	
                return ($listaCasos['mensaje'] = 'Aún no tienes casos en la base de datos');
            
            }
		
		 
	 }/* Fin de mListaCasos*/
	 
	/* Este modelo actualiza los datos de un caso
	 * @param ($casoId, $datosCaso)
	 * */	
	public function mActualizaDatosCaso($casoId,$datosCaso){
		
		$this->db->where('casoId', $casoId);
		if($this->db->update('casos',$datosCaso['tablas']['casos'])){
		
			foreach($datosCaso['tablas'] as $key => $value){
				if($key != 'casos'){
					$this->db->where('casos_casoId', $casoId);
					$this->db->update($key,$datosCaso['tablas'][$key]);
				}
			}
				
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
		
	}/* Fin de mActualisaDatosCaso */
	
	/* Este modelo cambia el estado de un caso a inactivo, en lugar de eliminarlo de la base de datos
	 * @param ($casoId)
	 * */
	
	public function mCambiaEstadoActivoCaso($casoId){

		$estado = array('estadoActivo' => 0);
		
		$this->db->select('nombre');
		$this->db->from('casos');
		$this->db->where('casoId',$casoId);
		
		$consulta = $this->db->get();
		
		if($consulta->num_rows() > 0){
			$this->db->where('casoId', $casoId);
			$this->db->update('casos',$estado);
			$mensaje = $casoId.$estado;
			/* Regresa la cadena al controlador*/
			return ($mensaje = $mensaje .'Hecho');
		}else{
			return '0';
			
		}
			
	}/* Fin de mCambiaEstadoActivoCaso */
	
	
	 /* Este modelo edita una ficha
	 *@ $datos = array(
                  
				  'titulo' => 'ficha 1 actualizado',
				  'fecha' => '1988-04-07',
				  'comentarios' => 'comentarios ficha 1' ,
				  );
				   
	 *@ $fichaId [INT]
	 * */
	 public function mActualizaDatosFicha($datos,$fichaId){
		
		$this->db->where('fichaId', $fichaId);
		if($this->db->update('fichas',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosLugar*/
	
	/* Este modelo elimina una ficha relacionada a un caso
	 * @param ($fichaId)
	 * */
	
	public function mEliminaFicha($fichaId){
		
		/*Eliminamos los registros asociados a una ficha */	
		$this->db->where('fichas_fichaId', $fichaId);	
		$this->db->delete('registro');
			
		/*Elimina la ficha asociada al $fichaId*/
		$this->db->where('fichaId', $fichaId);
	
		if($this->db->delete('fichas')){
		
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}	
		
	}/*Fin de mEliminaFichas*/
	
	/* Este modelo elimina la relacion en un caso de una intervención
	 * @param ($intervencionId)
	 * */
	
	public function mEliminaIntervenciones($intervencionId){

		$this->db->where('intervenciones_intervencionId', $intervencionId);

		if($this->db->delete('intervenidos')){
		
				
			$this->db->where('intervencionId', $intervencionId);
			
			if($this->db->delete('intervenciones')){
			
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
				
			}else{
				
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
	        	return $mensaje;
			}
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
		
		
	}/*Fin de mEliminaIntervenciones*/
	
			
	/* Este modelo elimina la relacion en un caso de un perpetrador
	 * @param ($actoId)
	 * */
	
	public function mEliminaActo($actoId){
		
		$this->db->where('actoId', $actoId);
		
		if($this->db->delete('actos')){
			
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
		
	}/*Fin de mEliminaActo*/

	/*Este modelo relaciona dos actores
     * @param $datos 
     * */
    public function mRelacionaCasos($datos){

	    if($this->db->insert('relacionCasos',$datos)){
		    /* Regresa la cadena al controlador*/
		    return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
    }/* Fin de mRelacionaActores */
   
	/*Este modelo elimina todas las relaciones caso-caso
	 * @param $relacionId
	 * */
   	public function mEliminaRelacionCasos($relacionId){

	    $this->db->where('relacionId', $relacionId);
		
		if($this->db->delete('relacionCasos')){
			
	    /* Regresa la cadena al controlador*/
	    return ($mensaje = 'Hecho');
		
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
    }/* Fin de mEliminaRelacionCasos */	
    
    /* Este modelo trae todas las relaciones caso-caso
	 * @param $casoId
	 * */
    public function mTraeRelacionesCaso($casoId){
		
		/*Trae datos relacion directa*/	
		$this->db->select('*');
		$this->db->from('relacionCasos');
		$this->db->where('casos_casoId',$casoId);
		
		$consulta = $this->db->get();
		
		if ($consulta->num_rows() > 0){				
				/* Pasa la consulta a un cadena */
				foreach ($consulta->result_array() as $row) {
					
                    $relaciones[$row['casoIdB']] = $row;
                    //$relaciones[$casoId]['casoIdB'] = $this->db->select('*')->from('casos')->where('casoId', $row['casoIdB'])->get()->result_array();
					

					$this->db->select('nombre,fechaInicial,fechaTermino');
					$this->db->from('casos');
					$this->db->where('casoId', $row['casoIdB']);
					$consultaCaso = $this->db->get();
					// echo 'hola';
					// print_r($consultaCaso->resul_array());
					if ($consultaCaso->num_rows() > 0){
						foreach ($consultaCaso->result_array() as $row3) {
							$nombreCaso = $row3;
						}	
						
						
						$relaciones[$row['casoIdB']]['nombreCasoIdB'] = $nombreCaso['nombre']; 
						$relaciones[$row['casoIdB']]['fechaIncial'] = $nombreCaso['fechaInicial'];
						$relaciones[$row['casoIdB']]['fechaTermino'] = $nombreCaso['fechaTermino'];
					}
					
					
					
					
				}
		}
	
		/*Trae datos relacion citada*/
		$this->db->select('*');
		$this->db->from('relacionCasos');
		$this->db->where('casoIdB',$casoId);
		
		$consulta = $this->db->get();
		
		if ($consulta->num_rows() > 0){				
				/* Pasa la consulta a un cadena */
				foreach ($consulta->result_array() as $row) {
                    $relacionesIdB[$casoId] = $row;
                    //$relacionesIdB[$casoId]['casoIdB'] = $this->db->select('*')->from('casos')->where('casoId', $row['casos_casoId'])->get()->result_array();
					
					$this->db->select('nombre,fechaInicial,fechaTermino');
					$this->db->from('casos');
					$this->db->where('casoId', $row['casos_casoId']);
					$consultaCaso = $this->db->get();
					
					if ($consultaCaso->num_rows() > 0){
						foreach ($consultaCaso->result_array() as $row3) {
							$nombreCaso = $row3;
						}	
					}
					
					$relacionesIdB[$casoId]['nombreCasoId'] = $nombreCaso['nombre']; 
					$relacionesIdB[$casoId]['fechaIncialCasoId'] = $nombreCaso['fechaInicial'];
					$relacionesIdB[$casoId]['fechaTerminoCasoId'] = $nombreCaso['fechaTermino'];
					
				}
		}


		if(isset($relaciones) && isset($relacionesIdB)){
			$lista = array_merge($relaciones, $relacionesIdB);
			return $lista;
			
		}else{
			if (isset($relaciones)) {
				return $relaciones;
				
			} elseif (isset($relacionesIdB)) {
				return $relacionesIdB;
			}else{
				return 0;
			}
		}/*fin else*/		
			
	}/* Fin de mTraeRelacionesCaso 	*/
	
	/* Actualiza los datos de una relacion caso-caso
	 * @param $relacionId $datosRelacion
	 * */
	public function mActualizaDatosRelacionCaso($relacionId,$datosRelacion){
		
		$this->db->where('relacionId', $relacionId);
		
		if($this->db->update('relacionCasos',$datosRelacion)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
		}
	}/* Fin de mActualizaDatosRelacionCaso */
	
	/*Este modelo lista los modelos por una cadena en el campo nombre */
	public function mBuscarCasosNombre($cadena){
			
			$this->db->select('casoId, nombre');
			$this->db->from('casos');
			$this->db->like('nombre', $cadena);
			$this->db->where('estadoActivo',1);
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0){
				/* Pasa la consulta a un cadena */
				foreach ($consulta->result_array() as $key => $value) {
					$datos[$value['casoId']] = $value;
				}
				
				/* Regresa la cadena al controlador*/
				return $datos;
			}else{
				return ($mensaje = '0');
			}

			
	}/* Fin de mBuscarCasosNombre() */	
	
	/* Este modelo Agrega la informacion de Derechos Afectado
	 * @param:
	 * $datos = array (derechoAfectado => array (
	 * 									fechaInicial => '1879-12-01',...
	 * 									),
	 * 				   actos => array (
	 * 									actoVilolatorioId => 1,
	 * 									actoViolatorioNivel => 2,....
	 * 									));
	 * */
	
	public function mAgregarDerechosAfectados($datos){
		
		$this->db->insert('derechoAfectado', $datos['derechoAfectado']);
        $obtener_id = $this->db->select_max('derechoAfectadoCasoId')->from('derechoAfectado')->get();
		
		if($obtener_id->num_rows() > 0){
	        foreach ($obtener_id->result_array() as $row) {
	            $derechoAfectadoCasoId = $row['derechoAfectadoCasoId'];
	        }
	    }/* Fin de obtener_id */
	    
	    foreach($datos as $tabla => $campo){
                
            if($tabla != 'derechoAfectado' && (!empty($tabla))){
                
                $datos[$tabla]['derechoAfectado_derechoAfectadoCasoId'] = $derechoAfectadoCasoId;
                $this->db->insert($tabla, $datos[$tabla]);
            }
     	}/* Fin foreach tabla */
     	
	    return $derechoAfectadoCasoId;
	}/* Fin de mAgregarDerechosAfectados */
	
	
	/* Este modelo elimina un derecho afectado antes borrando actos, victimas, perpetradores asociados a un acto, si existen */
	public function mEliminaDerechoAfectadoCaso($derechoAfectadoCasoId)
	{
		/* Trae los actos asociados asociados a un derecho afectado */
		$this->db->select('actoId');
		$this->db->from('actos');
		$this->db->where('derechoAfectado_derechoAfectadoCasoId',$derechoAfectadoCasoId);
		$consultaActos = $this->db->get();
		
		if($consultaActos->num_rows() > 0){
			/* Pasa la consulta a un cadena */
			foreach ($consultaActos->result_array() as $row){
				//$datos['actos'][$row['actoId']] = $row;
				
				/* Trae las victimas asociadas a un acto */
				
				$this->db->select('victimaId');
				$this->db->from('victimas');
				$this->db->where('actos_actoId',$row['actoId']);
				$consultaVictimas = $this->db->get();
				
				if($consultaVictimas->num_rows() > 0){
					/* Pasa la consulta a un cadena */
					foreach ($consultaVictimas->result_array() as $row2){
						//$datos['victmas'][$row2['victimaId']] = $row2;
						
						 /* Elimina un perpetrador asiciado a una victima */
						$this->mEliminaPerpetradoresVictima($row2['victimaId']);		
					}
				}/* fin de if consultaVictimas */
				
				/* Elimina una victima asociada a un acto */
				$this->mEliminaVictimasActo($row['actoId']);
						
			}/* fin foreach consultaActos */
			
			/* Elimina un acto asociado a un derecho Afectado */
			$this->mEliminaActosDerechoAfectado($derechoAfectadoCasoId);
			/* Elimina un derecho afectado asociado a un caso */
			
		}
			
		$this->db->where('derechoAfectadoCasoId', $derechoAfectadoCasoId);
	
		if($this->db->delete('derechoAfectado')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
			
	}/*fin de mEliminaDerechoAfectadoCaso */	
	
	public function mEliminaActosPerpetrador($perpetradorVictimaId){
		
		$this->db->where('perpetradores_perpetradorVictimaId', $perpetradorVictimaId);
		
		if($this->db->delete('actosPerpetrador')){
			
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	}/* fin de mEliminaActosPerpetrador*/
	
	
	/* Este modelo edita un DerechoAfectado
	 *@ $datos = array(
                  
				  'fecha' => '1988-04-07',
				  'fechaAcceso' => '1988-06-10',
				  'observaciones' => 'obs',
				  'actorReportado' => 1 ,
				  );
	 *@ $tipoFuenteDocumentalId [INT]
	 * */
	 public function mActualizaDatosDerechoAfectado($datos,$derechoAfectadoCasoId){
		
		$this->db->where('derechoAfectadoCasoId', $derechoAfectadoCasoId);
		if($this->db->update('derechoAfectado',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosDerechoAfectado */
	
	/*Este modelo Agrega un acto a un derecho afectado
	 * @param
	 * 
	 * */
	 public function mAgregarActoDerechoAfectado($datos){
		
		if($this->db->insert('actos', $datos)){
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mAgregarActoDerechoAfectado */
	
	
	/* Este modelo edita un Acto
	 *@ $datos = array(
                  
				  'actoViolatorioId' => 1,
				  'actoViolatorioNivel' => 2
				  );
	 *@ $actoId [INT]
	 * */
	 public function mActualizaDatosActo($datos,$actoId){
		
		$this->db->where('actoId', $actoId);
		if($this->db->update('actos',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosActo */
	 
	 /* Este modelo elimina los actos de un derechoAfectado 
	  * @param
	  * $derechoAfectadoCasoId [INT]
	  * */
	 public function mEliminaActosDerechoAfectado($derechoAfectadoCasoId){
	 	$this->db->where('derechoAfectado_derechoAfectadoCasoId', $derechoAfectadoCasoId);
		
		if($this->db->delete('actos')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
	 }/* fin de mEliminaActosDerechoAfectado */
	 
	 /* Este modelo elimina una acto a un derechoAfectado 
	  * @param
	  * $actoId [INT]
	  * */
	 public function mEliminaActoDerechoAfectado($actoId){
	 	
		/* Trae las victimas asociadas a un acto */
				
		$this->db->select('victimaId');
		$this->db->from('victimas');
		$this->db->where('actos_actoId',$actoId);
		$consultaVictimas = $this->db->get();
		
		if($consultaVictimas->num_rows() > 0){
			/* Pasa la consulta a un cadena */
			foreach ($consultaVictimas->result_array() as $row2){
				//$datos['victmas'][$row2['victimaId']] = $row2;
				
				/* Trae los perpetradores asociados a una victima */
				$this->db->select('perpetradorVictimaId');
				$this->db->from('perpetradores');
				$this->db->where('victimas_victimaId',$row2['victimaId']);
				$consultaPerpetradores = $this->db->get();
				
				if($consultaPerpetradores->num_rows() > 0){
					/* Pasa la consulta a un cadena */
					foreach ($consultaPerpetradores->result_array() as $row3){
						//$datos['perpetradores'][$row3['perpetradorVictimaId']] = $row3;
						/* Elimina la relacion de un perpetrador con un acto */
						$this->mEliminaActosPerpetrador($row3['perpetradorVictimaId']);
						 
					}/* fin foreach consultaPerpetradores*/
					
				}/*fin de if consultaPerpetradores */
					
				 /* Elimina un perpetrador asiciado a una victima */
				$this->mEliminaPerpetradoresVictima($row2['victimaId']);		
			}
		}/* fin de if consultaVictimas */
		
		/* Elimina una victima asociada a un acto */
		$this->mEliminaVictimasActo($actoId);
		
		$this->db->where('actoId', $actoId);

		if($this->db->delete('actos')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
				
		
	 }/* fin de mEliminaActoDerechoAfectado */
	 
	 
	 /*Este modelo Agrega una victima a un acto 
	 * @param
	 * $datos = array(
                  
				  'actorId' => 1,
				  'estatusVictimaId' =>1,
				  'actos_actoId' => 1 
				  );
	 * */
	 public function mAgregarVictimaActo($datos){
		
		if($this->db->insert('victimas', $datos)){
			
			$obtener_id = $this->db->select_max('victimaId')->from('victimas')->get();
            
            if($obtener_id->num_rows() > 0){
                
                foreach ($obtener_id->result_array() as $row) {
                
                    $victimaId = $row['victimaId'];
        	
                }
                
            }
			return $victimaId;

		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mAgregarVictimaCaso */
	 
	 /* Este modelo edita una Victima
	 *@ $datos = array(
                  
				  'actorId' => 1,
				  'estatusVictimaId' => 2
				  );
	 *@ $victimaId [INT]
	 * */
	 public function mActualizaDatosVictima($datos,$victimaId){
		
		$this->db->where('victimaId', $victimaId);
		if($this->db->update('victimas',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosVictima */
	 
	 /* Este modelo elimina todas las victimas de un acto 
	  * @param
	  * $actoId [INT]
	  * */
	 public function mEliminaVictimasActo($actoId){
	 	$this->db->where('actos_actoId', $actoId);
		
		if($this->db->delete('victimas')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
	 }/* fin de mEliminaVictimasActo*/
	 
	 /* Este modelo elimina una victma a un acto 
	  * @param
	  * $victimaId [INT]
	  * */
	 public function mEliminaVictimaActo($victimaId){

	 	$this->db->where('victimas_victimaId',$victimaId);

	 	$this->db->delete('perpetradores');


	 	$this->db->where('victimaId', $victimaId);

		if($this->db->delete('victimas')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
	 }/* fin de mEliminaVictimasActo*/
	 
	 
	 /*Este modelo Agrega una perpetrador a una victima 
	 * @param
	 * 
	 * */
	 public function mAgregarPerpetradorVictima($datos){
		
		if($this->db->insert('perpetradores', $datos)){
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mAgregarPerpetradorVictima */
	 
	 /* Este modelo edita un perpetrador
	 *@ 
	 *@ $perpetradorId [INT]
	 * */
	 public function mActualizaDatosPerpetrador($datos,$perpetradorId){
		
		$this->db->where('perpetradorVictimaId', $perpetradorId);
		if($this->db->update('perpetradores',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosPerpetrador */
	 
	 
	 /* Este modelo elimina un perpetrador a un avictima 
	  * @param
	  * $victimaId [INT]
	  * */
	 public function mEliminaPerpetradoresVictima($victimaId){
	 	$this->db->where('victimas_victimaId', $victimaId);
		
		if($this->db->delete('perpetradores')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
	 }/* fin de mEliminaPerpetradorVictima */
	 
	 /* Este modelo elimina un perpetrador a un avictima 
	  * @param
	  * $perpetradorVictimaId [INT]
	  * */
	 public function mEliminaPerpetradorVictima($perpetradorVictimaId){
	 	
		/* Elimina el la relacion entre un acto y un perpetrador */
		//$this->mEliminaActosPerpetrador($perpetradorVictimaId);
		
	 	$this->db->where('perpetradorVictimaId',$perpetradorVictimaId);
		
		if($this->db->delete('perpetradores')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
		
	 }/* fin de mEliminaPerpetradorVictima */
	 
	/* Este modelo Agrega la informacion de una intervencion
	 * 
	 * 
	 * */
	
	public function mAgregarIntervenciones($datos){
		
		if($this->db->insert('intervenciones', $datos['intervencion'])){
			$obtener_id = $this->db->select_max('intervencionId')->from('intervenciones')->get();
			
			if($obtener_id->num_rows() > 0){
		        foreach ($obtener_id->result_array() as $row) {
		            $intervencionId = $row['intervencionId'];
		        }
		    }/* Fin de obtener_id */
		    
		    return $intervencionId;
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
        
		
	}/* fin de mAgregarIntervenciones */
	
	/* Este modelo edita una intervencion
	 *@ $datos = array(
                  
				  'tipoIntervencionId' => 1,
				  'IntervencionNId' => 2
				  );
	 *@ $intervencionId [INT]
	 * */
	 public function mActualizaDatosIntervencion($datos,$intervencionId){
		$this->db->where('intervencionId', $intervencionId);
		if($this->db->update('intervenciones',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosintervencion */
	 
	 /* Este modelo agrega un intervenido a una intervencion 
	  * @param:
	  * 
	  * $datosIntervenido = array (
	  * 				relacionId => 1,
	  * 				tipoRelacionId => 1,
	  * 				comentarios => '',
	  * 				observacines => '',
	  * 				intervenciones_intervencionId => 1
	  * );
	  * 
	  * */
	 public function mAgregarIntervenidoIntervenciones($datosIntervenidos){
	 	
		
			/* inserta el array $datosIntervenidos en la tabla de intervenidos de la BD */
			if($this->db->insert('intervenidos', $datosIntervenidos)){
				
				/* Regresa la cadena al controlador*/
				return $mensaje='Hecho';
			}else{
			
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
	        	return $mensaje;
				
			} 
			
			
	 }
	 
	 /*Este modelo elimina un intervenido*/
	 public function mEliminarIntervenido($intervenidoId) {
		 
		$this->db->where('intervenidoId', $intervenidoId);
		
		if($this->db->delete('intervenidos')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		} 
		 
	 }
	 /* Este modelo edita una intervencion
	 *@ $datos = array(
                  
				  'relacionId' => 1,
				  'tipoRelacionId' => 2
				  );
	 *@ $intervenidoId [INT]
	 * */
	 public function mActualizaDatosIntervenido($datos,$intervenidoId){
		
		$this->db->where('intervenidoId', $intervenidoId);
		if($this->db->update('intervenidos',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosintervencion */
	
	/* Este modelo trae los id's de los casos relaciones con un actor*/
		public function mTraerActoresRelacionadosCaso($casoId){
			$this->db->select('actores_actorId');
			$this->db->from('casos_has_actores');
			$this->db->where('casos_casoId',$casoId);
			$consulta = $this->db->get();
			
			if ($consulta->num_rows() > 0){
				foreach ($consulta->result_array() as $row) {
					$actores[$row['actores_actorId']]=$row;
				}
				
				return $actores;
			}else{
				return '0';
			}
		}/* Fin de mTraeCasosRelacionadosActor */
		
	/*
	 * Este modelo edita un lugar
	 *@ $datos = array(
                  
				  'paisesCatalogo_paisId' => '2',
				  'estadosCatalogo_estadoId' => '3',
				  'municipiosCatalogo_municipioId' => '4' ,
				  );
	 *@ $luagarId [INT]
	 * */
	 public function mActualizaDatosLugar($datos,$lugarId){
		
		$this->db->where('lugarId', $lugarId);
		if($this->db->update('lugares',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosLugar*/
	 
	 public function mEliminaLugar($lugarId){

		$this->db->where('lugarId', $lugarId);
		if($this->db->delete('lugares')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		} 
	 }/* Fin de mEliminaLugar*/
	 
	 /* Este modelo edita un fuenteInfoPersonal
	 *@ $datos4 = array(
                  
				  'actorId' => 1,
				  'fecha' => '1988-04-07',
				  'actorReportado' => 1 ,
				  );
	 *@ $fuenteInfoPersonalId [INT]
	 * */
	 public function mActualizaDatosFuenteInfoPersonal($datos,$fuenteInfoPersonalId){
		
		$this->db->where('fuenteInfoPersonalId', $fuenteInfoPersonalId);
		if($this->db->update('fuenteInfoPersonal',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosFuenteInfoPersonal */
	 
	 /* Este modelo elimina una fuenteInfoPersonal
	  * @param 
	  * $fuenteInfoPersonalId [INT]
	  * */
	 public function mEliminaFuenteInfoPersonal($fuenteInfoPersonalId){

		$this->db->where('fuenteInfoPersonalId', $fuenteInfoPersonalId);
		if($this->db->delete('fuenteInfoPersonal')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		} 
	 }/* Fin de mEliminaFuenteInfoPersonal */
	 
	 /* Este modelo edita un tipoFuenteDocumental
	 *@ $datos = array(
                  
				  'fecha' => '1988-04-07',
				  'fechaAcceso' => '1988-06-10',
				  'observaciones' => 'obs',
				  'actorReportado' => 1 ,
				  );
	 *@ $tipoFuenteDocumentalId [INT]
	 * */
	 public function mActualizaDatosTipoFuenteDocumental($datos,$tipoFuenteDocumentalId){
		
		$this->db->where('tipoFuenteDocumentalId', $tipoFuenteDocumentalId);
		if($this->db->update('tipoFuenteDocumental',$datos)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	 }/* Fin de mActualizaDatosFuenteInfoPersonal */
	 
	 /* Este modelo elimina una TipoFuenteDocumental
	  * @param 
	  * $ftipoFuenteDocumentalId [INT]
	  * */
	 
	 public function mEliminaTipoFuenteDocumental($tipoFuenteDocumentalId){

		$this->db->where('tipoFuenteDocumentalId', $tipoFuenteDocumentalId);
		if($this->db->delete('tipoFuenteDocumental')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		} 
	 }/* Fin de mEliminaFuenteInfoPersonal */
	 
	 
	 /* Este modelo trae las victimas de un acto y los perpetradores de cada acto 
	  * @param:
	  * $actoId [INT]
	  * */
	public function mTraerVictimasActo($actoId){
		$this->db->select('actorId,victimaId,estatusVictimaId,comentarios');
		$this->db->from('victimas');
		$this->db->where('actos_actoId', $actoId);
		$consultaVictimas = $this->db->get();
		
		if($consultaVictimas->num_rows() > 0){
			
			foreach ($consultaVictimas->result_array() as $victimas) {
				
				$this->db->select('actorId,nombre,apellidosSiglas,foto');
				$this->db->from('actores');
				$this->db->where('actorId', $victimas['actorId']);
				$consultaActores = $this->db->get();
				
				if($consultaActores->num_rows() > 0){
			
					foreach ($consultaActores->result_array() as $datosActores) {
						$datos['victimas'][$victimas['victimaId']] = $datosActores;
						$datos['victimas'][$victimas['victimaId']]['victimaId'] = $victimas['victimaId'];
						$datos['victimas'][$victimas['victimaId']]['estatusVictimaId'] = $victimas['estatusVictimaId'];
						$datos['victimas'][$victimas['victimaId']]['comentarios'] = $victimas['comentarios'];
						
						$this->db->select('*');
						$this->db->from('perpetradores');
						$this->db->where('victimas_victimaId', $victimas['victimaId']);
						$consultaPerpetradores = $this->db->get();
						
						if($consultaPerpetradores->num_rows() > 0){
			
							foreach ($consultaPerpetradores->result_array() as $datosPerpetradores) {
								$datos['victimas'][$victimas['victimaId']]['perpetradores'][$datosPerpetradores['perpetradorVictimaId']]=$datosPerpetradores;
							
								$this->db->select('*');
								$this->db->from('casos_has_actores');
								$this->db->where('actores_actorId',$datosPerpetradores['perpetradorId']);
								$consultaCasosActor = $this->db->get();
								
								if($consultaCasosActor->num_rows() > 0){
									foreach ($consultaCasosActor->result_array() as $valor) {
										//print_r($valor);
										$datos['victimas'][$victimas['victimaId']]['perpetradores'][$datosPerpetradores['perpetradorVictimaId']]['casosActor'][$valor['casoActorId']]=$valor;
									}
								}
							
							}
								
						}/* fin if $consultaPerpetradores */	
						
						$this->db->select('*');
						$this->db->from('casos_has_actores');
						$this->db->where('actores_actorId',$victimas['actorId']);
						$consultaCasosActor = $this->db->get();
						
						if($consultaCasosActor->num_rows() > 0){
							foreach ($consultaCasosActor->result_array() as $valor) {
								//print_r($valor);
								$datos['victimas'][$victimas['victimaId']]['casosActor'][$valor['casoActorId']]=$valor;
							}
						}	
					}
				}/* fin if consultaActores*/		
				
				
				
			}/*fin for each consultaVictimas */
			
			return $datos;
		}else{
			$mensaje= '0';
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
		
		
	}/* fin de mTraerVictimasActo */
	
	/* Este modelo Trae los actos relacionados a un derecho afectado por niveles
	 * @param
	 * 
	 * $datosArrray = array (
	 * 						[nivel] = [idNivel]
	 * 						[1] 	= 1, 
	 * 						[2] 	= 3,
	 * 						[3] 	= 5, 
	 * 						[4] 	= 10
	 * )
	 * 
	 * 
	 * */
	public function mTraerActoDerechoAfectado($datosArray){
			
			$this->db->select('actosN1Catalogo_actoId');
			$this->db->from('actosN1Catalogo_has_derechosAfactadosN1Catalogo');
			$this->db->where('derechosAfactadosN1Catalogo_derechoAfectadoN1Id',$datosArray[1]);
			$consultaActosN1 = $this->db->get();
			
			
			if ($consultaActosN1->num_rows() > 0) {
				foreach ($consultaActosN1->result_array() as $row) {
					
					$this->db->select('*');
					$this->db->from('actosN1Catalogo');
					$this->db->where('actoId',$row['actosN1Catalogo_actoId']);
					$consultaActoN1 = $this->db->get();
					
					if ($consultaActoN1->num_rows() > 0) {
						foreach ($consultaActoN1->result_array() as $row2) {

							$datos['actosN1'][$row2['actoId']] = $row2;
							
							if(isset($datosArray[2]) && isset($row2)){
								$this->db->select('*');
								$this->db->from('actosN2Catalogo');
								$this->db->where('actosN1Catalogo_actoId',$row2['actoId']);
								$this->db->where('derechosAfectadosN2Catalogo_derechoAfectadoN2Id',$datosArray[2]);
								$consultaActoN2 = $this->db->get();
								
								if ($consultaActoN2->num_rows() > 0) {
									foreach ($consultaActoN2->result_array() as $row3) {
										$datos['actosN2'][$row2['actoId']] = $row3;
										
										if(isset($datosArray[3]) && isset($row3)){
											$this->db->select('*');
											$this->db->from('actosN3Catalogo');
											$this->db->where('actosN2Catalogo_actoN2Id',$row3['actoN2Id']);
											$this->db->where('derechosAfectadosN3Catalogo_derechoAfectadoN3Id',$datosArray[3]);
											$consultaActoN3 = $this->db->get();
											
											if ($consultaActoN3->num_rows() > 0) {
												foreach ($consultaActoN3->result_array() as $row4) {
													$datos['actosN3'][$row4['actoN3Id']] = $row4;
													
													if(isset($datosArray[4]) && isset($row4)){
														$this->db->select('*');
														$this->db->from('actosN4Catalogo');
														$this->db->where('actosN3Catalogo_actoN3Id',$row4['actoN3Id']);
														$this->db->where('derechosAfectadosN4Catalogo_derechoAfectadoN4Id',$datosArray[4]);
														$consultaActoN4 = $this->db->get();
														
														if ($consultaActoN4->num_rows() > 0) {
															foreach ($consultaActoN4->result_array() as $row5) {
																$datos['actosN4'][$row5['actoN4Id']] = $row5;
															}
														}
													}else{
														
														$this->db->select('*');
														$this->db->from('actosN4Catalogo');
														$this->db->where('actosN3Catalogo_actoN3Id',$row4['actoN3Id']);
														$consultaActoN4 = $this->db->get();
														
														if ($consultaActoN4->num_rows() > 0) {
															
															foreach ($consultaActoN4->result_array() as $row5) {
																$datos['actosN4'][$row5['actoN4Id']] = $row5;
															}/*fin foreach $consultaActoN4*/
														}/*fin if $consultaActoN4*/
													}/*fin else*/
													
												}/*fin foreach $consultaActoN3*/
											}/* fin if $consultaActoN3*/
										}else{
											
											$this->db->select('*');
											$this->db->from('actosN3Catalogo');
											$this->db->where('actosN2Catalogo_actoN2Id',$row3['actoN2Id']);
											$consultaActoN3 = $this->db->get();
											
											if ($consultaActoN3->num_rows() > 0) {
												foreach ($consultaActoN3->result_array() as $row4) {
													$datos['actosN3'][$row4['actoN3Id']] = $row4;
													
													$this->db->select('*');
													$this->db->from('actosN4Catalogo');
													$this->db->where('actosN3Catalogo_actoN3Id',$row4['actoN3Id']);
													$consultaActoN4 = $this->db->get();
													
													if ($consultaActoN4->num_rows() > 0) {
														
														foreach ($consultaActoN4->result_array() as $row5) {
															$datos['actosN4'][$row5['actoN4Id']] = $row5;
														}/*fin foreach $consultaActoN4*/
														
													}/*fin if $consultaActoN4*/
													
												}/*fin foreach $consultaActoN3*/
											}/* fin if $consultaActoN3 */
										}/*fin else $datosArray[3]*/
									}/*fin foreach $consultaActoN2*/
								}/*fin if $consultaActoN2 */
							}else{
								$this->db->select('*');
								$this->db->from('actosN2Catalogo');
								$this->db->where('actosN1Catalogo_actoId',$row2['actoId']);
								$consultaActoN2 = $this->db->get();
								
								if ($consultaActoN2->num_rows() > 0) {
									foreach ($consultaActoN2->result_array() as $row3) {
										
										$datos['actosN2'][$row3['actoN2Id']] = $row3;
										
										$this->db->select('*');
										$this->db->from('actosN3Catalogo');
										$this->db->where('actosN2Catalogo_actoN2Id',$row3['actoN2Id']);
										$consultaActoN3 = $this->db->get();
										
										if ($consultaActoN3->num_rows() > 0) {
											foreach ($consultaActoN3->result_array() as $row4) {
												$datos['actosN3'][$row4['actoN3Id']] = $row4;
												
												$this->db->select('*');
												$this->db->from('actosN4Catalogo');
												$this->db->where('actosN3Catalogo_actoN3Id',$row4['actoN3Id']);
												$consultaActoN4 = $this->db->get();
												
												if ($consultaActoN4->num_rows() > 0) {
													
													foreach ($consultaActoN4->result_array() as $row5) {
														$datos['actosN4'][$row5['actoN4Id']] = $row5;
													}/*fin foreach $consultaActoN4*/
													
												}/*fin if $consultaActoN4*/
												
											}/*fin foreach $consultaActoN3*/
											
										}/*fin if $consultaActoN3*/
										
									}/*fin foreach $consultaActoN2*/
									
								}/*fin if $consultaActoN2*/
								
							}/*fin else */
		
							
							
						}
					}
					
					
				}
				
				
				
				return $datos;
			}		
		
	}
	
	/*Este modelo agrega un registro a a una ficha
	 * @param:
	 * $datosResgistro = array (
	 * 							nombreRegistro => 'nombre',
	 * 							ruta => '/ruta',
	 * 							fichas_fichaId => 1
	 * );
	 * 
	 * */
	public function mAgregarRegistroFicha($datosRegistro){
		
		/* inserta el array registro en la tabla de registros de la BD */
		if($this->db->insert('registro', $datosRegistro)){
			
			return 'Hecho';
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
	}
	
	public function mEliminarRegistro($registroId){
		
		$this->db->where('registroId', $registroId);
		
		if($this->db->delete('registro')){
		
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	}
	
	public function mActualizaRelacionCasoActor($datosRelacion){


        	if ( (!isset($datos['casos_has_actores']['actores_actorId'])) || ($datos['casos_has_actores']['actores_actorId']==0) || (empty($datos['casos_has_actores']['actores_actorId'])) ) {

        		$datos['actores_actorId']=NULL;
        		
        	}
		
		$this->db->where('casoActorId', $datosRelacion['casoActorId']);
		if($this->db->update('casos_has_actores',$datosRelacion)){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
		}else{
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
		}
	}
	
	public function mEliminarRelacionCasoActor($casoActorId){
		$this->db->where('casoActorId', $casoActorId);
		if($this->db->delete('casos_has_actores')){
			/* Regresa la cadena al controlador*/
			return ($mensaje = 'Hecho');
			
		}else{
			
			$mensaje['error'] = $this->db->_error_message();
			/* Regresa la cadena al controlador*/
        	return $mensaje;
			
		}
	}


        public function llenarCasoActor($datos){

        	if ( (!isset($datos['casos_has_actores']['actores_actorId'])) || ($datos['casos_has_actores']['actores_actorId']==0) || (empty($datos['casos_has_actores']['actores_actorId'])) ) {

        		$datos['casos_has_actores']['actores_actorId']=NULL;

        	}

            foreach($datos as $key => $value){

                    $this->db->insert($key, $datos[$key]);

            }

            return ($mensaje = 'Listo datos insertados, por favor cierra la ventana y actualiza tu navegador.');
	
        }
	 
	 
}

?>
