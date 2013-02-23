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
    class Reportes_m extends CI_Model {

        function __construct(){
            
            parent::__construct();
            
            $this->load->database();
        
        }
	     
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
					$this->db->where('tipoActorId',3);
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

			
				
				
				
				
			
				if (isset($listaActores)) {
					return $listaActores;
					
				}else{
					return 0;
				}
               
	     }/* fin mTraeRekacionesColectivo*/
		
			public function mReporteLargo($casoId){
		
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
				
				/* Trae todos los datos de intervenciones*/
				$this->db->select('*');
				$this->db->from('intervenciones');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['intervenciones'][$row['intervencionId']] = $row;
						$datos['intervenciones'][$row['intervencionId']]['actorRelacionadoInterventor']=$this->mTraerRelacionesActor($row['interventorId']);
						$datos['intervenciones'][$row['intervencionId']]['actorRelacionadoReceptor']=$this->mTraerRelacionesActor($row['receptorId']);
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
							}
						}
						
						
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
						$datos['actos'][$row['derechoAfectado_derechoAfectadoCasoId']] = $row;
					}
					
					/*Trae todos los datos de derechosafectados*/
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
						$this->db->select('*');
						$this->db->from('victimas');
						$this->db->where('actos_actoId', $row['actoId']);
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){				
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['victimas'][$row['victimaId']] = $row;
							}
							
							foreach ($datos['victimas'] as $row) {
								$this->db->select('*');
								$this->db->from('perpetradores');
								$this->db->where('victimas_victimaId', $row['victimaId']);
								$consulta = $this->db->get();
								
								if ($consulta->num_rows() > 0){				
									/* Pasa la consulta a un cadena */
									foreach ($consulta->result_array() as $row) {
										$datos['perpetradores'][$row['perpetradorVictimaId']] = $row;
										$datos['perpetradores'][$row['perpetradorVictimaId']]['actorRelacionadoPerpetrador']=$this->mTraerRelacionesActor($row['perpetradorId']);
									}
								}
							}/*Fin foreach Victimas*/
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
							$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']]['actorRelacionadoPersonal']=$this->mTraerRelacionesActor($row['actorId']);
							$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']]['actorRelacionadoReportado']=$this->mTraerRelacionesActor($row['actorReportado']);
						}
					}
					
					/* Trae todos los datos de fuenteInfoPersonal*/
					$this->db->select('*');
					$this->db->from('tipoFuenteDocumental');
					$this->db->where('casos_casoId',$casoId);
					$consulta = $this->db->get();
								
					if ($consulta->num_rows() > 0){				
						/* Pasa la consulta a un cadena */
						foreach ($consulta->result_array() as $row) {
							$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']] = $row;
							$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']]['actorRelacionadoReportado']=$this->mTraerRelacionesActor($row['actorReportado']);
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
					} 	
				
				if (isset($datos)) {
					return $datos;
				}else{
					return $mensaje = 'No hay datos en la base de datos';
				}
				
			}/* Fin de mReporteLargo*/
			
			/* Trae los datos necesarios para generar un reporte corto 
			 * @param $casoId */
			public function mTraeDatosCorto($casoId){
		
		
				/* Trae el nombre del caso */
				$this->db->select('*');
				$this->db->from('casos');
				$this->db->where('estadoActivo',1);
				$this->db->where('casoId',$casoId);
				$consulta = $this->db->get();

							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['caso'] = $row;
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
						$this->db->from('victimas');
						$this->db->where('actos_actoId', $row['actoId']);
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){				
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['victimas'][$row['victimaId']] = $row;
							}
							
							foreach ($datos['victimas'] as $row) {
								$this->db->select('*');
								$this->db->from('perpetradores');
								$this->db->where('victimas_victimaId', $row['victimaId']);
								$consulta = $this->db->get();
								
								if ($consulta->num_rows() > 0){				
									/* Pasa la consulta a un cadena */
									foreach ($consulta->result_array() as $row) {
										$datos['perpetradores'][$row['perpetradorVictimaId']] = $row;
										
										$this->db->select('nombre,apellidosSiglas');
										$this->db->from('actores');
										$this->db->where('actorId',$row['perpetradorId']);
										$consultaActores = $this->db->get();
										
										if($consultaActores->num_rows() > 0){
											foreach ($consultaActores->result_array() as $datosActores) {
												$datos['perpetradores'][$row['perpetradorVictimaId']]['nombre'] = $datosActores['nombre'];
												$datos['perpetradores'][$row['perpetradorVictimaId']]['apellidos'] = $datosActores['apellidosSiglas'];
											}/*fin foreach $consultaActores*/
											
										}/*fin if $consultaActores*/
										
									}/*fin foreach consulta*/
								}
							}/*Fin foreach Victimas*/
						}
					}/*Fin foreach actos*/
					
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
				}
				
				
				return $datos;
			}/* Fin de mTraeDatosCorto */
			
			/* Este modelo trae los datos para poder generar un reporte corto
			 * @param $datos = array (
			  						'nombre' 					=> 'caso1',
			  						'desdeFecha' 				=> '1987-07-24',
			  						'hastaFecha' 				=> '1987-09-16',
			  						'actoViolatorioId' 					=> '1',
			  						'actoViolatorioNivel'					=> '1'
			  						);
			 */
			
			public function mGeneraReporteCorto($datos){
				
				if($datos['nombre'] != ''){
					$datos = $this->mReporteCortoNombre($datos);
					return $datos;
				}elseif(($datos['desdeFecha'] != '') && ($datos['hastaFecha'] != '')){
					$datos = $this->mReporteCortoFechas($datos);
					return $datos;
				}else{
					$this->mReporteCortoActoDerechoAfectado($datos);
					return $datos;
				}
				
				return $mensaje;
			}/* Fin de mReporteCorto*/
			/*$datos = array('nombre'=>'caso1');
			 * */
			public function mReporteCortoNombre($datos){
				$this->db->select('casoId');
				$this->db->from('casos');
				$this->db->where('estadoActivo',1);
				$this->db->where('nombre',$datos['nombre']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $value) {
						$casoId = $value;
					}
					
					$datos=$this->mTraeDatosCorto($casoId['casoId']);
					
					
						return $datos;
				}else{
					return '0';
				}
			}
			/*$datos = array('desdeFecha'=>'fechainicial','hastaFecha'=>'fechafinal');
			 * */
			public function mReporteCortoFechas($datos){
				/* Trae los casoId de los casos que esten entre las fechas desdeFecha, hastaFecha*/
				$this->db->select('casoId');
				$this->db->from('casos');
				$this->db->where('estadoActivo',1);
				$this->db->where('fechaInicial >=',$datos['desdeFecha']);
				$this->db->where('fechaInicial <=',$datos['hastaFecha']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$casos['casos'][$row['casoId']] = $row;
					}
					
					/* Por cada caso trae los datos dependiendo de su casoId */
					foreach ($casos['casos'] as $row) {
						$casoId = $row['casoId'];
						$datosCasos['casos'][$row['casoId']]=$this->mTraeDatosCorto($casoId);
					}
						return $datosCasos;
					
				}else{
					return '0';
				}
				
			}/* fin de mReporteCortoFechas*/
			
			public function mReporteCortoActoDerechoAfectado($datos){
				/* Trae los actosId relacionados con un derecho afectado*/
				$this->db->select('casos_casoId');
				$this->db->from('actos');
				$this->db->where('actoViolatorioId',$datos['actoViolatorioId']);
				$this->db->where('actoViolatorioNivel',$datos['actoViolatorioNivel']);
				$consultaCasos = $this->db->get();
				
				if ($consultaCasos->num_rows() > 0){
					foreach ($consultaCasos->result_array() as $row) {
						$casosId['casos'][$row['casos_casoId']] = $row;
					}
					
					/* Por cada caso trae los datos dependiendo de su casoId */
					foreach ($casosId['casos'] as $row) {
						$casoId = $row['casos_casoId'];
						$datosCasos['casos'][$row['casos_casoId']]=$this->mTraeDatosCorto($casoId);
					}
						return $datosCasos;
				}else{
					return '0';
				}
			}/* fin de mReporteCortoActoDerechoAfectado*/
			
			
	}/* Fin de clase Reportes_m*/
	
?>