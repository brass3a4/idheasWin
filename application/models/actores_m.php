<?php
	
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

    class Actores_m extends CI_Model {

        function __construct(){
            
            parent::__construct();
            
            $this->load->database();
			
			$this->load->model(array('casos_m'));
        
        }
        
        /*
         * @Descripcion: Esta funcion agregar un actor
         * @Parametros: $datos [Array]
         * @Ejemplo: $datos = 
		'tablas' => array(
			'actores' => array('nombre' => 'Juan', 'apellidosSiglas' => 'Hernandez Martinez', 'tipoActorId' => '1', 'codigoPostal' => '10000'),
			'datosDeNacimiento' => array('fechaNacimiento' => '24-12-1985', 'paisesCatalogo_paisId' => '1', 'estadosCatalogo_paisId' => '1', 'municipiosCatalogo_paisId' => '1' ),
			'infoContacto' => array('telefono' => '58565856', 'telefonoMovil' => '0445558565856', 'correoE' => 'ejemplo@ejemplo.com', 'fax' => ''),
			'infoMigratoria' => array('paisTransitorioId' => 1, 'paisDestinoId' => 1, 'intCruceDestino' => 1, 'intCruceTransitorio' => 1, 'expCruceDestino' => 1, 'expCruceTransitorio' => 1, 'motivoViaje' => 'Ganar más dinero', 'tipoEstanciaId' => 1, 'realizaViaje' => 'Solo', 'comentarios' => 'No sabe escribir.'),
			'direccionActor' => array('direccion' => 'Calle: Desconocida Esq Lo que sea, Colonia: La otra, Delegación, Otra cosa Nada, Solo porprobar. Juguemos Zombie Island'),
			'infoGralActor' => array('generoId' => '1', 'edad' => 21, 'nacionalidad' => 'Ingles', 'hijos' => 4, 'escolaridad' => 'primaria', 'espaniol' => 'Si', 'estadoCivil_estadoCivilId' => 1, 'ocupacionesCatalogo_ultimaOcupacionId' => 1, 'gruposIndigenas_grupoIndigenaId' => 1)
		
		);*/
        
        function agregar_actor_m($datos){
            
		
           
            $this->db->insert('actores', $datos['actores']);
            
            $obtener_id = $this->db->select_max('actorId')->from('actores')->get();
            
            if($obtener_id->num_rows() > 0){
                
                foreach ($obtener_id->result_array() as $row) {
                
                    $actorId = $row['actorId'];
        	
                }
                
            }
            
			
            foreach($datos as $tabla => $campo){
                
                if($tabla != 'actores' && $tabla != ''){
                    
                    $datos[$tabla]['actores_actorId'] = $actorId;
                
                    $this->db->insert($tabla, $datos[$tabla]);
                    
                }
                
            }

            return $actorId;
                    
        }
        
		
		/*Este modelo Lista los actores dependiendo del tipoActorId */
        function listado_actores_m($tipoActorId){
            
            $consulta = $this->db->select('actorId, nombre,tipoActorId, apellidosSiglas,foto')->from('actores')->where('tipoActorId',$tipoActorId)->where('estadoActivo', 1)->order_by('nombre','asc')->get();
	
            if($consulta->num_rows() > 0){
                
                foreach($consulta->result_array() as $actor){
                
                    $lista[$actor['actorId']] = $actor;
                    
                }
                
            } else {
                
                $lista = null;
                
            }
	
            return $lista;
			
			          
        }
        
        function traer_datos_actor_m($actorId, $tipoActorId){
            
            switch ($tipoActorId) {

                /* Si es el actor es del tipo invividual*/
               	case '1': 

                $this->db->select('estadoActivo');
                $this->db->from('actores');
                $this->db->where('actorId',$actorId);

                $estadoActivo = $this->db->get();

                foreach ($estadoActivo->result_array() as $value) {
                $es_activo = $value;
                }


                /* Si el actor solicitado está activo*/
                if($es_activo['estadoActivo'] == 1){

                /* Trae todos los datos de actores*/
                $this->db->select('*');
                $this->db->from('actores');
                $this->db->where('actorId',$actorId);
                $this->db->where('estadoActivo',1);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['actores'] = $row;
                }
                }

                /* Trae todos los datos de datosDeNacimiento */
                $this->db->select('*');
                $this->db->from('datosDeNacimiento');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['datosDeNacimiento'] = $row;
                }
                }

                /* Trae todos los datos de infoContacto */
                $this->db->select('*');
                $this->db->from('infoContacto');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoContacto'] = $row;
                }
                }

                /* Trae todos los datos de direccionActor */
                $this->db->select('*');
                $this->db->from('direccionActor');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
		            /* Pasa la consulta a un cadena */
		            foreach ($consulta->result_array() as $row) {
		            	$datos['direccionActor'][$row['direccionId']] = $row;
		            }
                }

                /* Trae todos los datos de infoGralActor */
                $this->db->select('*');
                $this->db->from('infoGralActor');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoGralActor'] = $row;
                }
                }

                /* Trae todos los datos de alias */
                $this->db->select('*');
                $this->db->from('alias');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                    /* Pasa la consulta a un cadena */
                    foreach ($consulta->result_array() as $row) {
                        $datos['alias'] = $row;
                    }
                }

                /* Trae todos los datos de relacionActores */
                $this->db->select('*');
                $this->db->from('relacionActores');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                    /* Pasa la consulta a un cadena */
                    foreach ($consulta->result_array() as $row) {
                        $datos['relacionActores'][$row['relacionActoresId']] = $row;
                    }
                }
                
                if(isset($datos['relacionActores'])){
                    
                    $this->db->select('actorId, nombre, apellidosSiglas');
                    
                    $this->db->from('actores');
                    foreach($datos['relacionActores'] as $relacion){
                        
                        $this->db->where('actorId', $relacion['actorRelacionadoId']);
                     
                    }
                    
                    $consulta = $this->db->get();
                    
                    foreach ($consulta->result_array() as $datosActor){
                        
                        $datos['actoresRelacionados'][$datosActor['actorId']]['nombre'] = $datosActor['nombre'].' '.$datosActor['apellidosSiglas'];
                        
                    }
                    
                }
                
                }
                
                /* Regresa la cadena al controlador*/
                return $datos;						
                
                break;

                /* Si es el actor es del tipo transmigrante*/	
                case '2':

                $this->db->select('estadoActivo');
                $this->db->from('actores');
                $this->db->where('actorId',$actorId);

                $estadoActivo = $this->db->get();

                foreach ($estadoActivo->result_array() as $value) {
                $es_activo = $value;
                }


                /* Si el actor solicitado está activo*/
                if($es_activo['estadoActivo'] == 1){

                /* Trae todos los datos de actores*/
                $this->db->select('*');
                $this->db->from('actores');
                $this->db->where('actorId',$actorId);
                $this->db->where('estadoActivo',1);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['actores'] = $row;
                }
                }

                /* Trae todos los datos de datosDeNacimiento */
                $this->db->select('*');
                $this->db->from('datosDeNacimiento');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['datosDeNacimiento'] = $row;
                }
                }

                /* Trae todos los datos de infoMigratoria */
                $this->db->select('*');
                $this->db->from('infoMigratoria');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoMigratoria'] = $row;
                }
                }

                /* Trae todos los datos de infoContacto */
                $this->db->select('*');
                $this->db->from('infoContacto');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoContacto'] = $row;
                }
                }

                /* Trae todos los datos de direccionActor */
                $this->db->select('*');
                $this->db->from('direccionActor');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
		            /* Pasa la consulta a un cadena */
		            foreach ($consulta->result_array() as $row) {
		            	$datos['direccionActor'][$row['direccionId']] = $row;
		            }
                }


                /* Trae todos los datos de infoGralActor */
                $this->db->select('*');
                $this->db->from('infoGralActor');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();
                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoGralActor'] = $row;
                }
                }

                /* Trae todos los datos de alias */
                $this->db->select('*');
                $this->db->from('alias');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['alias'] = $row;
                }
                }

                /* Trae todos los datos de relacionActores */
                $this->db->select('*');
                $this->db->from('relacionActores');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){             
                    /* Pasa la consulta a un cadena */
                    foreach ($consulta->result_array() as $row) {
                        $datos['relacionActores'][$row['relacionActoresId']] = $row;
                    }
                }
                
                if(isset($datos['relacionActores'])){
                    
                    $this->db->select('actorId, nombre, apellidosSiglas');
                    
                    $this->db->from('actores');
                    foreach($datos['relacionActores'] as $relacion){
                        
                        $this->db->where('actorId', $relacion['actorRelacionadoId']);
                     
                    }
                    
                    $consulta = $this->db->get();
                    
                    foreach ($consulta->result_array() as $datosActor){
                        
                        $datos['actoresRelacionados'][$datosActor['actorId']]['nombre'] = $datosActor['nombre'].' '.$datosActor['apellidosSiglas'];
                        
                    }
                    
                }
                }
                /* Regresa la cadena al controlador*/
                return $datos;					
                break;

                /* Si es el actor es del tipo colectivo*/
                case '3':

                $this->db->select('estadoActivo');
                $this->db->from('actores');
                $this->db->where('actorId',$actorId);

                $estadoActivo = $this->db->get();

                foreach ($estadoActivo->result_array() as $value) {
                $es_activo = $value;
                }


                /* Si el actor solicitado está activo*/
                if($es_activo['estadoActivo'] == 1){

                /* Trae todos los datos de actores*/
                $this->db->select('*');
                $this->db->from('actores');
                $this->db->where('actorId',$actorId);
                $this->db->where('estadoActivo',1);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['actores'] = $row;
                }
                }

                /* Trae todos los datos de infoContacto */
                $this->db->select('*');
                $this->db->from('infoContacto');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoContacto'] = $row;
                }
                }


				/* Trae todos los datos de direccionActor */
                $this->db->select('*');
                $this->db->from('direccionActor');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
		            /* Pasa la consulta a un cadena */
		            foreach ($consulta->result_array() as $row) {
		            	$datos['direccionActor'][$row['direccionId']] = $row;
		            }
                }
				
                /* Trae todos los datos de infoGralActor */
                $this->db->select('*');
                $this->db->from('infoGralActores');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){				
                /* Pasa la consulta a un cadena */
                foreach ($consulta->result_array() as $row) {
                $datos['infoGralActores'] = $row;
                }
                }

                /* Trae todos los datos de relacionActores */
                $this->db->select('*');
                $this->db->from('relacionActores');
                $this->db->where('actores_actorId',$actorId);
                $consulta = $this->db->get();

                if ($consulta->num_rows() > 0){             
                    /* Pasa la consulta a un cadena */
                    foreach ($consulta->result_array() as $row) {
                        $datos['relacionActores'][$row['relacionActoresId']] = $row;
                    }
                }
                
                if(isset($datos['relacionActores'])){
                    
                    $this->db->select('actorId, nombre, apellidosSiglas');
                    
                    $this->db->from('actores');
                    foreach($datos['relacionActores'] as $relacion){
                        
                        $this->db->where('actorId', $relacion['actorRelacionadoId']);
                     
                    }
                    
                    $consulta = $this->db->get();
                    
                    foreach ($consulta->result_array() as $datosActor){
                        
                        $datos['actoresRelacionados'][$datosActor['actorId']]['nombre'] = $datosActor['nombre'].' '.$datosActor['apellidosSiglas'];
                        
                    }
                    
                }
                }

                return $datos;

                break;

                default:

                /* Si el tipo de actor no existe regresa un mensaje */
                $datos = 'Tipo de Actor incorrecto';
                return $datos;

                break;
        }// fin del Switch
        
        }
        
		public function mListaTodosActores(){
			$this->db->select('actorId,nombre,apellidosSiglas,tipoActorId,foto');
			$this->db->from('actores');
			$this->db->where('estadoActivo',1);
			$consulta = $this->db->get();
			
			if($consulta->num_rows() != 0){
				foreach($consulta->result_array() as $key => $value){
					$listaActores[$value['actorId']] = $value;
				}
			}
			
			/* Regresa la cadena al controlador */
			return (isset($listaActores)) ? $listaActores : '' ;
						
		}
                
        /*Este modelo relaciona dos actores
         * @param 
         * $datos = array(
         * 'relacionActoresId' => '1' ,
         * 'actorId' => '1' ,
         * 'actorRelacionadoId' => '1' ,
         * 'tipoRelacionId' => '1'
         * 'tipoRelacionIndividualColectivoId' => '1'
         * );
         */
        public function relaciona_actores_m($datos){

            if($this->db->insert('relacionActores',$datos)){
            	return ($mensaje = 'Hecho');
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
			}
        }
        
        /* Fin de mRelacionaActores 
         */
         
        /*Este modelo trae las relaciones actor-actor de un actor */
        public function mTraeRelacionesColectivo($actorId){
            $this->db->select('actorRelacionadoId');
            $this->db->from('relacionActores');
            $this->db->where('actores_actorId',$actorId);
            $consulta = $this->db->get();
			
			//echo '<pre>';
			//print_r($consulta->num_rows());
			if($consulta->num_rows() != 0){
				foreach($consulta->result_array() as $row){

					$listaActoresId[$row['actorRelacionadoId']] = $row;

				}
				
				foreach ($listaActoresId as $key => $value) {
					$this->db->select('actorId,nombre,apellidosSiglas,tipoActorId');
		            $this->db->from('actores');
					$this->db->where('estadoActivo',1);
		            $this->db->where('actorId',$value['actorRelacionadoId']);
		            $actores = $this->db->get();
					
					if($actores->num_rows() > 0){
						foreach($actores->result_array() as $row2){
							$listaActores[$row2['actorId']] = $row2;
						}
                       
									
					}
				}
                return $listaActores;
			}else{
				return '0';
			}
			 
			 //*fin If*/
	      }/* fin mTraeRekacionesColectivo*/
	     
	     /*Este modelo trae las relaciones actor-actor de un actor 
		  * @param $actorId [INT]
		  * 
		  * */
        public function mTraerRelacionesActor($actorId){
            $this->db->select('*');
            $this->db->from('relacionActores');
            $this->db->where('actores_actorId',$actorId);
            $consulta = $this->db->get();
			
			//echo '<pre>';
			//print_r($consulta->num_rows());
			if($consulta->num_rows() != 0){
				foreach($consulta->result_array() as $row){
					
					$listaActores[$row['relacionActoresId']] = $row;
					
					$this->db->select('*');
		            $this->db->from('actores');
					$this->db->where('estadoActivo',1);
		            $this->db->where('actorId',$row['actorRelacionadoId']);
		            $actores = $this->db->get();
					
					if($actores->num_rows() > 0){
						foreach($actores->result_array() as $row2){
							$listaActores[$row['relacionActoresId']]['actorId'] = $row2['actorId'];
							$listaActores[$row['relacionActoresId']]['nombre'] = $row2['nombre'];
							$listaActores[$row['relacionActoresId']]['apellidosSiglas'] = $row2['apellidosSiglas'];
							$listaActores[$row['relacionActoresId']]['tipoActorId'] = $row2['tipoActorId'];
							$listaActores[$row['relacionActoresId']]['foto'] = $row2['foto'];
						}
					}

				}
				
			}

			/* Trae todos los datos de relacionActores */
			$this->db->select('*');
			$this->db->from('relacionActores');
			$this->db->where('actorRelacionadoId',$actorId);
			$consulta = $this->db->get();
						
			if($consulta->num_rows() != 0){
				foreach($consulta->result_array() as $row3){
					
					$listaCitados[$row3['relacionActoresId']] = $row3;
					
					$this->db->select('*');
		            $this->db->from('actores');
					$this->db->where('estadoActivo',1);
		            $this->db->where('actorId',$row3['actores_actorId']);
		            $actores = $this->db->get();
					
					if($actores->num_rows() > 0){
						foreach($actores->result_array() as $row4){
							$listaCitados[$row3['relacionActoresId']]['actorId'] = $row4['actorId'];
							$listaCitados[$row3['relacionActoresId']]['nombre'] = $row4['nombre'];
							$listaCitados[$row3['relacionActoresId']]['apellidosSiglas'] = $row4['apellidosSiglas'];
							$listaCitados[$row3['relacionActoresId']]['tipoActorId'] = $row4['tipoActorId'];
							$listaCitados[$row3['relacionActoresId']]['foto'] = $row4['foto'];
						}
					}

				}
				
			}
				
				
				
				
			if(isset($listaActores) && isset($listaCitados)){
				$lista = array_merge($listaActores, $listaCitados);
				return $lista;
				
			}else{
				if (isset($listaActores)) {
					return $listaActores;
					
				} elseif (isset($listaCitados)) {
					return $listaCitados;
				}else{
					return 0;
				}
			}/*fin else*/
               
	     }/* fin mTraeRekacionesColectivo*/
	     
	     
	     /*Este modelo relaciona un actor con un caso 
		 * @param $datos 
		 * $datos = array(
                  'casoId' => '1' ,
         		   'actorId' => '1');
		 * */
		
		public function mRelacionaCasoActor($datos)
		{
			if($this->db->insert('casos_has_actores',$datos)){
				/* Regresa la cadena al controlador*/
	            return ($mensaje = 'Hecho');	
				
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
			}			
			
		}
		
		
		/* Este modelo actualiza los datos de un actor */
		public function mActualizaDatosActor($actorId,$datosActor)
		{
		
			$this->db->where('actorId', $actorId);
			if($this->db->update('actores',$datosActor['actores'])){
				
				foreach($datosActor as $key => $value){
					if($key != 'actores'){
	                   // print_r($datosActor[$key]);
						$this->db->where('actores_actorId', $actorId);
						$this->db->update($key, $datosActor[$key]);
					}
				}
				
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
			}
					
		}/* Fin de mActualizaDatosActor */
		
		/* Este modelo busca a un actor por nombre, apellidosSiglas o inicial 
	 	* @param cadena 
	 	*/
		public function mBuscarActoresNombre($cadena,$tipoActorId){
			
			$this->db->select('actorId, nombre,tipoActorId, apellidosSiglas,foto');
			$this->db->from('actores');
			$this->db->where('estadoActivo', 1);
			$this->db->where('tipoActorId', $tipoActorId);
			$this->db->like('nombre', $cadena);
			$this->db->or_like('apellidosSiglas', $cadena);
			$consulta = $this->db->get();
			
			if ($consulta->num_rows() > 0){		
				/* Pasa la consulta a un cadena */
				foreach ($consulta->result_array() as $key => $value) {
					$datos[$value['actorId']] = $value;
				}
		
				/* Regresa la cadena al controlador*/
				return $datos;
			}else{
				$mensaje = 'ok';
				return $mensaje;
			}

			
		}/* Fin de mBuscarActores() */
		
		/* Este modelo cambia el estado de un actor a inactivo, en lugar de eliminarlo de la base de datos
		 * @param ($actorId)
		 * */
		
		public function mCambiaEstadoActivoActor($actorId){
			
			$estado = array('estadoActivo' => 0);
			
			$this->db->select('nombre');
			$this->db->from('actores');
			$this->db->where('actorId',$actorId);
			
			$consulta = $this->db->get();
			
			if($consulta->num_rows() > 0){
			
				$this->db->where('actorId', $actorId);
				$this->db->update('actores',$estado);
				
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
			
			}else{
				return '0';
			}
			
		}/* Fin de mCambiaEstadoActivoActor */
		
		/* Este modelo elimina la relacion en un caso de un perpetrador
		 * @param ($perpetradorId)
		 * */
		
		public function mEliminaPerpetrador($perpetradorId){
			
			$this->db->where('perpetradorId', $perpetradorId);
			if($this->db->delete('perpetradrores')){
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
				
			}else{
				
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
				
			}
			
		}/*Fin de mEliminaPerpetrador*/
		
		/*Este modelo elimina todas las relaciones actor-actor
		 * @param $relacionActoresId
		 * */
		public function mEliminaRelacionActores($relacionActoresId){
			$this->db->where('relacionActoresId', $relacionActoresId);
			if($this->db->delete('relacionActores')){
			    /* Regresa la cadena al controlador*/
			    return ($mensaje = 'Hecho');
				
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
			}
		}
		
		/* Este modelo trae las citas hechas hacia el actorId 
		 * @param $actorId
		 * */
		public function mTraerCitasActor($actorId){
			/* Trae todos los datos de relacionActores */
			$this->db->select('*');
			$this->db->from('relacionActores');
			$this->db->where('actorRelacionadoId',$actorId);
			$consulta = $this->db->get();
						
			if ($consulta->num_rows() > 0){
				/* Pasa la consulta a un cadena */
				foreach ($consulta->result_array() as $key => $row) {
					$datos['citas'][$key+1]['datosCitas'] = $row;
					$datos['citas'][$key+1]['actoresRelacionados'] = $this->db->select('nombre, apellidosSiglas')->from('actores')->where('actorId', $row['actores_actorId'])->get()->result_array();
				}
				
				/* Regresa la cadena al controlador*/
            	return $datos;
			}
			
			
			
		}/* Fin de mTraerCitasActor */
		
		/* Actualiza los datos de una relacion Actor-Actor
		 * @param $relacionActoresId $datosRelacion
		 * */
		public function mActualizaDatosRelacionActor($relacionActoresId,$datosRelacion){
			$this->db->where('relacionActoresId', $relacionActoresId);
			if($this->db->update('relacionActores',$datosRelacion)){
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
            	return $mensaje;
			}
		}/* Fin de mActualizaDatosRelacionActor*/
		
		
		/* Este modelo busca a un actor por victima o perpetrador o interventor o receptor */
		public function mFiltrosBusquedaActor($tipoFiltro,$tipoActorId)
		{
			switch ($tipoFiltro) {
				case '1':
					$this->db->select('actorId,victimaId');
					$this->db->from('victimas');
					$consulta = $this->db->get();
					
					if ($consulta->num_rows() > 0){		
						/* Pasa la consulta a un cadena */
						foreach ($consulta->result_array() as $row) {
							$datos['actores'][$row['victimaId']] = $row;
							
							
						}
						
						foreach ($datos['actores'] as $row2) {
							
							$this->db->select('actorId,tipoActorId,nombre,apellidosSiglas,foto');
							$this->db->from('actores');
							$this->db->where('actorId',$row2['actorId']);
							$this->db->where('estadoActivo', 1);
							$this->db->where('tipoActorId', $tipoActorId);
							$consultaDatosActor = $this->db->get();
							
							if ($consultaDatosActor->num_rows() > 0){
								foreach ($consultaDatosActor->result_array() as $row3) {
									$datosActor[$row3['actorId']]=$row3;
									
								}
								
							}	
						}/* fin foreach $datos*/
						
						if(isset($datosActor)){
								return $datosActor;
							}else{
								return 0;
							}
						
					}else{
						return $mensaje = 0;
					}
					
					
					break;
					
					case '2':
						
						$this->db->select('perpetradorId');
						$this->db->from('perpetradores');
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){		
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['actores'][$row['perpetradorId']] = $row;
							}
							
							foreach ($datos['actores'] as $row) {
								
								$this->db->select('actorId,tipoActorId,nombre,apellidosSiglas,foto');
								$this->db->from('actores');
								$this->db->where('actorId',$row['perpetradorId']);
								$this->db->where('estadoActivo', 1);
								$this->db->where('tipoActorId', $tipoActorId);
								$consultaDatosActor = $this->db->get();
								
								if ($consultaDatosActor->num_rows() > 0){
									foreach ($consultaDatosActor->result_array() as $row) {
										$datosActor[$row['actorId']]=$row;
									}
									
								}		
							}/* fin foreach $datos*/
							
							/* Regresa la cadena al controlador*/
							if(isset($datosActor)){
								return $datosActor;
							}else{
								return 0;
							}
									
							
						}else{
							return $mensaje = 0;
						}
						
					break;
					
					case '3':
						
						$this->db->select('interventorId');
						$this->db->from('intervenciones');
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){		
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['actores'][$row['interventorId']] = $row;
							}
							
							foreach ($datos['actores'] as $row) {
								
								$this->db->select('actorId,tipoActorId,nombre,apellidosSiglas,foto');
								$this->db->from('actores');
								$this->db->where('actorId',$row['interventorId']);
								$this->db->where('estadoActivo', 1);
								$this->db->where('tipoActorId', $tipoActorId);
								$consultaDatosActor = $this->db->get();
								
								if ($consultaDatosActor->num_rows() > 0){
									foreach ($consultaDatosActor->result_array() as $row) {
										$datosActor[$row['actorId']]=$row;
									}
								}		
							}/* fin foreach $datos*/
							
							/* Regresa la cadena al controlador*/
							if(isset($datosActor)){
								return $datosActor;
							}else{
								return 0;
							}
							
						}else{
							return $mensaje = 0;
						}
						
					break;
					
					case '4':
						
						$this->db->select('receptorId');
						$this->db->from('intervenciones');
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){		
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['actores'][$row['receptorId']] = $row;
							}
							
							foreach ($datos['actores'] as $row) {
								
								$this->db->select('actorId,tipoActorId,nombre,apellidosSiglas,foto');
								$this->db->from('actores');
								$this->db->where('actorId',$row['receptorId']);
								$this->db->where('estadoActivo', 1);
								$this->db->where('tipoActorId', $tipoActorId);
								$consultaDatosActor = $this->db->get();
								
								if ($consultaDatosActor->num_rows() > 0){
									foreach ($consultaDatosActor->result_array() as $row) {
										$datosActor[$row['actorId']]=$row;
									}
									
								}		
							}
							
							/* Regresa la cadena al controlador*/
							if(isset($datosActor)){
								return $datosActor;
							}else{
								return 0;
							}
							
						}else{
							return $mensaje =0;
						}
						
					break;
				
				default:
						$mensaje = 0;
						return $mensaje;
					
					break;
			}	
			
		}/* filtrosBusquedaActor */
		
		/* Este modelo busca a un actor por victima o perpetrador o interventor o receptor y por nombre del actor */
		public function mBusquedaActorFiltroNombre($tipoFiltro,$cadena,$tipoActorId)
		{
			switch ($tipoFiltro) {
				case '1':
					$this->db->select('actorId');
					$this->db->from('victimas');
					$consulta = $this->db->get();
					
					if ($consulta->num_rows() > 0){		
						/* Pasa la consulta a un cadena */
						foreach ($consulta->result_array() as $row) {
							$datos['actores'][$row['actorId']] = $row;
						}
						
						foreach ($datos['actores'] as $row) {
							
							$this->db->select('actorId,nombre,tipoActorId,apellidosSiglas,foto');
							$this->db->from('actores');
							$this->db->like('nombre', $cadena);
							$this->db->or_like('apellidosSiglas', $cadena);
							$this->db->where('actorId',$row['actorId']);
							$this->db->where('estadoActivo', 1);
							$this->db->where('tipoActorId', $tipoActorId);
							$consultaDatosActor = $this->db->get();
							
							if ($consultaDatosActor->num_rows() > 0){
								foreach ($consultaDatosActor->result_array() as $row) {
									$datosActor[$row['actorId']]=$row;
								}
								/* Regresa la cadena al controlador*/
								return $datosActor;
							}		
						}
						
						
					}else{
							return $mensaje = 0;
					}
					
					
					break;
					
					case '2':
						
						$this->db->select('perpetradorId');
						$this->db->from('perpetradores');
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){		
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['actores'][$row['perpetradorId']] = $row;
							}
							
							foreach ($datos['actores'] as $row) {
								
								$this->db->select('actorId,nombre,tipoActorId,apellidosSiglas,foto');
								$this->db->from('actores');
								$this->db->like('nombre', $cadena);
								$this->db->or_like('apellidosSiglas', $cadena);
								$this->db->where('actorId',$row['perpetradorId']);
								$this->db->where('estadoActivo', 1);
								$this->db->where('tipoActorId', $tipoActorId);
								$consultaDatosActor = $this->db->get();
								
								if ($consultaDatosActor->num_rows() > 0){
									foreach ($consultaDatosActor->result_array() as $row) {
										$datosActor[$row['actorId']]=$row;
									}
									/* Regresa la cadena al controlador*/
									return $datosActor;
								}		
							}
							
							
						}else{
							return $mensaje = 0;
						}
						
					break;
					
					case '3':
						
						$this->db->select('interventorId');
						$this->db->from('intervenciones');
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){		
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['actores'][$row['interventorId']] = $row;
							}
							
							foreach ($datos['actores'] as $row) {
								
								$this->db->select('actorId,tipoActorId,nombre,apellidosSiglas,foto');
								$this->db->from('actores');
								$this->db->like('nombre', $cadena);
								$this->db->or_like('apellidosSiglas', $cadena);
								$this->db->where('actorId',$row['interventorId']);
								$this->db->where('estadoActivo', 1);
								$this->db->where('tipoActorId', $tipoActorId);
								$consultaDatosActor = $this->db->get();
								
								if ($consultaDatosActor->num_rows() > 0){
									foreach ($consultaDatosActor->result_array() as $row) {
										$datosActor[$row['actorId']]=$row;
									}
									/* Regresa la cadena al controlador*/
									return $datosActor;
								}		
							}
							
							
						}else{
							return $mensaje = 0;
						}
						
					break;
					
					case '4':
						
						$this->db->select('receptorId');
						$this->db->from('intervenciones');
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){		
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['actores'][$row['receptorId']] = $row;
							}
							
							foreach ($datos['actores'] as $row2) {
								
								$this->db->select('actorId,tipoActorId,nombre,apellidosSiglas,foto');
								$this->db->from('actores');
								$this->db->like('nombre', $cadena);
								$this->db->or_like('apellidosSiglas', $cadena);
								$this->db->where('actorId',$row2['receptorId']);
								$this->db->where('estadoActivo', 1);
								$this->db->where('tipoActorId', $tipoActorId);
								$consultaDatosActor = $this->db->get();
								
								if ($consultaDatosActor->num_rows() > 0){
									foreach ($consultaDatosActor->result_array() as $row3) {
										$datosActor[$row3['actorId']]=$row3;
									}
									/* Regresa la cadena al controlador*/
									return $datosActor;
								}		
							}
							
							
						}else{
							return $mensaje = 0;
						}
						
					break;
				
				default:
						$mensaje = 0;
						return $mensaje;
					
					break;
			}	
			
		}/* filtrosBusquedaActor */
		
		/* Este modelo trae los datos de los casos relaciones con un actor*/
		public function mTraeCasosRelacionadosActor($actorId){
			$this->db->select('*');
			$this->db->from('casos_has_actores');
			$this->db->where('actores_actorId',$actorId);
            $this->db->distinct();
			$consulta = $this->db->get();
			
			if ($consulta->num_rows() > 0){
				foreach ($consulta->result_array() as $row) {
					//$casos[$row['casos_casoId']]=$row;
					
					$casos[$row['casoActorId']]=$this->casos_m->mTraerDatosCaso($row['casos_casoId']);
				}
				
				return $casos;
			}else{
				return '0';
			}
		}/* Fin de mTraeCasosRelacionadosActor */
		
		/* Este modelo trae los id's de los casos relaciones con un actor*/
		public function mTraeCasosIdRelacionadosActor($actorId){
			$this->db->select('*');
			$this->db->from('casos_has_actores');
			$this->db->where('actores_actorId',$actorId);
            $this->db->distinct();
			$consulta = $this->db->get();
			
			if ($consulta->num_rows() > 0){
				$i=1;
				foreach ($consulta->result_array() as $row) {
					//$casos[$row['casos_casoId']]=$row;
					
					$casos[$i]=$row['casos_casoId'];
					$i++;
				}
				
				return $casos;
			}else{
				return '0';
			}
		}/* Fin de mTraeCasosRelacionadosActor */
		
		/* Este modelo busca actores de forma excluyente por 
		 * 1.- Cadena (nombre y/o apellido) en este caso el el valor del tipo de filtro debe ser así $tipoFiltro = 0
		 * 2.- Tipo filtro (1 = victima,2 = perpetradores,3 = interventores,4 = receptores)
		 * 3.- Cadena y filtro
		 * */		
		public function mBuscaActor($cadena,$tipoFiltro){
			if ((!empty($cadena)) && ($tipoFiltro == 0)){
				$datos = $this->mBuscarActoresNombre($cadena);
				echo "cadena llena y filtro vacio";
				return $datos;
			}elseif((empty($cadena)) && ($tipoFiltro != 0)){
				$datos = $this->mFiltrosBusquedaActor($tipoFiltro);
				echo "cadena vacia filtro distinto de cero";
				return $datos;
			}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
				$datos = $this->mBusquedaActorFiltroNombre($tipoFiltro, $cadena);
				echo "cadena llena filtro lleno";
				return $datos;
			}else{
            	return ($mensaje = '0');

			}
			
		}/* Fin de mBuscaActor */

		/*Este modelo Agrega una dirección a un actor 
		 * @param
		 * $datos = array (
		 * 					'direccion' => 'direccion',
		 * 					'tipoDireccionId' => 1,
		 * 					'actores_actorId' => 1,...
		 * 				);
		 * */
		public function mAgregarDireccionActor($datos){
			
			if($this->db->insert('direccionActor', $datos)){
				return ($mensaje = 'Hecho');
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
	        	return $mensaje;
			}
		}/* Fin de mAgregarDireccionActor */
		
		/* Este modelo edita la direccion de un actor
		 *@ $datos = array(
	                  
					  'direccion' => 'direccion actualizada',
					  'tipoDireccionId' => 1,... 
					  );
		 *@ $direccionId [INT]
		 * */
		 public function mActualizaDatosDireccion($datos,$direccionId){
			
			$this->db->where('direccionId', $direccionId);
			if($this->db->update('direccionActor',$datos)){
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
			}else{
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
	        	return $mensaje;
			}
		 }/* Fin de mActualizaDatosDireccion */
		 
		 /* Este modelo elimina la direccion de un actor 
		  * $direccionId [INT]
		  * */ 
	 	 public function mEliminarDireccionActor($direccionId){
			$this->db->where('direccionId', $direccionId);
			if($this->db->delete('direccionActor')){
				/* Regresa la cadena al controlador*/
				return ($mensaje = 'Hecho');
				
			}else{
				
				$mensaje['error'] = $this->db->_error_message();
				/* Regresa la cadena al controlador*/
	        	return $mensaje;
				
			}  
		 }/* Fin de mEliminarDireccionActor*/
		
    }/* Fin de la clase Actores_m*/
    
    

?>
