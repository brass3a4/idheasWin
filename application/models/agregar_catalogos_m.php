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
class Agregar_catalogos_m extends CI_Model {
    
    public function __construct () {
        
         parent::__construct();
         
         $this->load->database();
    
    }
    
    public function mAgregarCatalogos($datos_catalogos){
        
        foreach ($datos_catalogos as $catalogo => $dato){
            
            $this->db->insert_batch($catalogo, $dato);
            
        }
        
    }
    
    public function mAgregarDerechosCatalogos($derechos){
        
        foreach ($derechos as $derecho => $valor){
        	
            $this->db->insert_batch($derecho, $valor);
            
        }
        
    }
	
}
    
?>