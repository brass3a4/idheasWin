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
    
    class General_m extends CI_Model {

        function __construct(){
            
            parent::__construct();
            
            $this->load->database();
        
        }
        
        public function obtener_todo($tabla, $llave_primaria = null, $order_by = null){
            
            if(!$order_by){
                
                $consulta = $this->db->select('*')->from($tabla)->get();
                
            } else {
                
                $consulta = $this->db->select('*')->from($tabla)->order_by($order_by)->get();
                
            }
            
            if($llave_primaria){
                
                foreach($consulta->result_array() as $fila){
                 
                    $datos[$fila[$llave_primaria]] = $fila;
                    
                }
                    
            } else {
                
                foreach($consulta->result_array() as $fila){
                 
                    $datos = $fila;
                    
                }
                    
            }
             
            if(isset($datos)){
                
                return $datos;
                
            } else {
                
                return null;
                
            }
            
        }
        
        public function llenar_tabla_m($datos){

            foreach($datos as $key => $value){

                    $this->db->insert($key, $datos[$key]);

            }

            return ($mensaje = 'Listo datos insertados, por favor cierra la ventana y actualiza tu navegador.');
	
        }
		
		public function llenar_ficha($datos){

            foreach($datos as $key => $value){

                    $this->db->insert($key, $datos[$key]);

            }
			
			return $this->db->insert_id();
	
        }
		
		/* Este modelo trae todos los campos de una tabla:
		 * @param 
		 * $datos = array (
							'tabla' => 'actores',
							'campo'	=> 'actorId',
							'valor' => 1
						);
		 * */
		public function mTraerDatosTabla($datos){
			
			$this->db->select('*');
			$this->db->from($datos['tabla']);
			$this->db->where($datos['campo'],$datos['valor']);
			
			$consulta = $this->db->get();
			
			$i =0;
			
			if($consulta->num_rows() > 0){
				
				foreach ($consulta->result_array() as $row) {
					$i++;
					$datosTabla[$i] = $row; 
				}
				return $datosTabla;	
			
			}else{
				return ($mensaje = '0');
			}
		}/* Fin de mTraerDatosTabla */
		
		
		/* Este modelo verifica si el usuario existe y si la contraseña es correcta
		 * @param
		 * 
		 * $datos = array ( 
							'usr' => 'brass3a4',
							'pass' => '123'
						   );
		 * 
		 * */
		public function mVerificarLoginUsuario($datos){
			
			$this->db->select('pass');
			$this->db->from('usuarios');
			$this->db->where('nombre',$datos['usr']);
			
			$consultaPass = $this->db->get();
			
			/*Sí existe el usuario:*/
			if($consultaPass->num_rows() > 0){
				foreach ($consultaPass->result_array() as $row) {
					$pass = $row['pass']; 
				}
				/*Si la contraseña coincide: */
				if($pass == $datos['pass']){
					$mensaje = '1';
				}else{
					$mensaje = '2';
				}
			}else{
				
				$mensaje = '3';
			}

			return $mensaje;
		}/*Fin de mVerificaLoginUsuario*/
        
        
        /* Este modelo cambia el pass de un usuario
		 * @param:
		 * $datos = array ( 'datosViejos'=> array ( 'usr' => 'brass3a4', 'pass' => '1234'), 
		 * 					'datosNuevos' => array('pass' => '123')
							
					);
		 * */
        public function mCambiarPassUsuario($datos){
			
			$this->db->select('pass');
			$this->db->from('usuarios');
			$this->db->where('nombre',$datos['datosViejos']['usr']);
			
			$consultaPass = $this->db->get();
			if($consultaPass->num_rows() > 0){
				foreach ($consultaPass->result_array() as $row) {
					$pass = $row['pass']; 
				}
				/* Revisa si las contraseñas actuales coinciden antes de actualizar la contraseña*/
				if($pass == $datos['datosViejos']['pass']){
					$this->db->where('nombre', $datos['datosViejos']['usr']);
					$this->db->update('usuarios',$datos['datosNuevos']);
					
					/* Regresa la cadena al controlador*/
					return ($mensaje = 'Hecho');
				}else{
					/* Regresa la cadena al controlador*/
					return ($mensaje = 'No conicide el pass');
				}

			}else{//si no existe el usuario
				/* Regresa la cadena al controlador*/
					return ($mensaje = 'El usuario no existe');				
			}
        }/* fin de mCambiaPassUsuario */    
    }

?>