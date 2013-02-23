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
class Catalogos_m extends CI_Model {
	
	function __construct() {
		parent::__construct();
	    $this->load->database();
	}
	
	/* Este modelo trae los datos de un catálogo que sólo tienen un nivel de alcance
	 * @param $nombreCatalogo
	 * */
	
	public function mTraerDatosCatalogoNombre($nombreCatalogo){
		
		//$nombreCatalogo = 'estatusPerpetradorCatalogo';
		
		$this->db->select('*');
		$this->db->from($nombreCatalogo);
		
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		if ($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $row) {
				$datos[$nombreCatalogo][] = $row;
			}
		
			return $datos;
		}else{
			$mensaje = 'No hay datos en el catalogo'+$nombreCatalogo;
			return (isset($mensaje));
		}
		
	}/* Fin de mTraerDatosCatalogoNombre*/
	
	
	/* Este modelo trae los datos de los catálogos Actos */
	
	public function mTraerDatosCatalogoActos(){
		 		
		/* Trae todos los datos de actosN1Catalogo*/
		$this->db->select('*');
		$this->db->from('actosN1Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['actosN1Catalogo'][$row['actoId']] = $row;
		}
		
		/* Trae todos los datos de actosN2Catalogo*/
		$this->db->select('*');
		$this->db->from('actosN2Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['actosN2Catalogo'][$row['actoN2Id']] = $row;
		}
		
		/* Trae todos los datos de actosN3Catalogo*/
		$this->db->select('*');
		$this->db->from('actosN3Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['actosN3Catalogo'][$row['actoN3Id']] = $row;
		}
		
		/* Trae todos los datos de actosN4Catalogo*/
		$this->db->select('*');
		$this->db->from('actosN4Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['actosN4Catalogo'][$row['actoN4Id']] = $row;
		}
		
		/* Regresa la cadena al controlador*/
		return $datos;
		
	}/* Fin de mTraerDatosCatalogoActos*/
	
	/* Este modelo trae los datos de los catálogos DerechosAfectados */
	
	public function mTraerDatosCatalogoDerechosAfectados(){
		
		/* Trae todos los daos de derechosAfectadosN1Catalogo */
		$this->db->select('*');
		$this->db->from('derechosAfectadosN1Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['derechosAfectadosN1Catalogos'][$row['derechoAfectadoN1Id']] = $row;
		}
		
		/* Trae todos los datos de derechosAfectadosN2Catalogo */
		$this->db->select('*');
		$this->db->from('derechosAfectadosN2Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['derechosAfectadosN2Catalogos'][$row['derechoAfectadoN2Id']] = $row;
		}
		
		/* Trae todos los datos de derechosAfectadosN3Catalogo */
		$this->db->select('*');
		$this->db->from('derechosAfectadosN3Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['derechosAfectadosN3Catalogos'][$row['derechoAfectadoN3Id']] = $row;
		}
		
		/* Trae todos los datos de derechosAfectadosN4Catalogo */
		$this->db->select('*');
		$this->db->from('derechosAfectadosN4Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['derechosAfectadosN4Catalogos'][$row['derechoAfectadoN4Id']] = $row;
		}
		
		/* Regresa la cadena al controlador*/
		return $datos;
		
	} /* fin de mTraerDatosCatalogoDerechosAfectados */
	
	
	/* Este modelo trae los datos de los catálogos TipoIntervencion */
	
	public function mTraerDatosCatalogoTipoIntervencion(){
		
		/* Trae todos los datos de tipoIntervencionN1Catalogo */
		$this->db->select('*');
		$this->db->from('tipoIntervencionN1Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoIntervencionN1Catalogo'][$row['tipoIntervencionN1Id']] = $row;
		}
		
		/* Trae todos los daos de tipoIntervencionN2Catalogo */
		$this->db->select('*');
		$this->db->from('tipoIntervencionN2Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoIntervencionN2Catalogo'][$row['tipoIntervencionN2Id']] = $row;
		}
		
		/* Trae todos los datos de tipoIntervencionN3Catalogo */
		$this->db->select('*');
		$this->db->from('tipoIntervencionN3Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoIntervencionN3Catalogo'][$row['tipoIntervencionN3Id']] = $row;
		}
		
		/* Trae todos los datos de tipoIntervencionN4Catalogo */
		$this->db->select('*');
		$this->db->from('tipoIntervencionN4Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoIntervencionN4Catalogo'][$row['tipoIntervencionN4Id']] = $row;
		}
		
		/* Regresa la cadena al controlador*/
		return $datos;	
		
	}/* Fin de mTraerDatosCatalogoTipoIntervencion*/
	
	/* Este modelo trae los datos de los catálogos TipoLugar */
	
	public function mTraerDatosCatalogoTipoLugar(){
		
		/* Trae todos los datos de tipoLugarN1Catalogo */
		$this->db->select('*');
		$this->db->from('tipoLugarN1Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoLugarN1Catalogo'][$row['tipoLugarId']] = $row;
		}
		
		/* Trae todos los datos de tipoLugarN2Catalogo */
		$this->db->select('*');
		$this->db->from('tipoLugarN2Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoLugarN2Catalogo'][$row['tipoLugarN2Id']] = $row;
		}
		
		/* Trae todos los datos de tipoLugarN3Catalogo */
		$this->db->select('*');
		$this->db->from('tipoLugarN3Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		if ($consulta->num_rows() > 0){
			foreach ($consulta->result_array() as $row) {
				$datos['tipoLugarN3Catalogo'][$row['tipoLugarN3Id']] = $row;
			}
			return $datos;
		}else{
			$mensaje = 'No hay datos en el catalogo tipoLugar';
			return (isset($mensaje));
		}
		
	}/* Fin de mTraerDatosCatalogoTipoLugar*/
	
	/* Este modelo trae los datos de los catálogos Paises-Estados-Municipios */
	
	public function mTraerDatosCatalogoPaises(){
		
		/* Trae todos los datos de paisesCatalogo */
		$this->db->select('*');
                $this->db->order_by('nombre');
		$this->db->from('paisesCatalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['paisesCatalogo'][$row['paisId']] = $row;
		}
		
		/* Trae todos los datos de estadosCatalogo */
		$this->db->select('*');
		$this->db->from('estadosCatalogo');
                $this->db->order_by('nombre');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['estadosCatalogo'][$row['estadoId']] = $row;
		}
		
		/* Trae todos los datos de municipiosCatalogo */
		$this->db->select('*');
                $this->db->order_by('nombre');
		$this->db->from('municipiosCatalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['municipiosCatalogo'][$row['municipioId']] = $row;
		}
		
		/* Regresa la cadena al controlador*/
		return $datos;
		
	}/* Fin de mTraerDatosCatalogoPaises */
	
	/* Este modelo trae los datos de los catálogos TipoPerpetrador */
	
	public function mTraerDatosCatalogoTipoPerpetrador(){
		
		/* Trae todos los datos de tipoPerpetradorN1Catalogo */
		$this->db->select('*');
		$this->db->from('tipoPerpetradorN1Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoPerpetradorN1Catalogo'][$row['tipoPerpetradorN1Id']] = $row;
		}
		
		/* Trae todos los datos de tipoPerpetradorN2Catalogo */
		$this->db->select('*');
		$this->db->from('tipoPerpetradorN2Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoPerpetradorN2Catalogo'][$row['tipoPerpetradorN2Id']] = $row;
		}
		
		/* Trae todos los datos de tipoPerpetradorN3Catalogo */
		$this->db->select('*');
		$this->db->from('tipoPerpetradorN3Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoPerpetradorN3Catalogo'][$row['tipoPerpetradorN3Id']] = $row;
		}
		
		/* Trae todos los datos de tipoPerpetradorN4Catalogo */
		$this->db->select('*');
		$this->db->from('tipoPerpetradorN4Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoPerpetradorN4Catalogo'][$row['tipoPerpetradorN4Id']] = $row;
		}

		/* Trae todos los datos de tipoPerpetradorN5Catalogo */
		$this->db->select('*');
		$this->db->from('tipoPerpetradorN5Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['tipoPerpetradorN5Catalogo'][$row['tipoPerpetradorN5Id']] = $row;
		}

		/* Regresa la cadena al controlador*/
		return $datos;
		
	}/* Fin de mTraerDatosCatalogoTipoPerpetrador*/
        
        public function mTraerDatosCatalogoOcupacion(){
		
		/* Trae todos los datos de tipoPerpetradorN1Catalogo */
		$this->db->select('*');
		$this->db->from('ocupacionesCatalogo');
		$consulta = $this->db->get();
						
                foreach ($consulta->result_array() as $row) {
                    if($row['tipoActorId'] == 1){
                        $datos['individual'][$row['ocupacionId']] = $row;
                    }else{
                        $datos['colectivo'][$row['ocupacionId']] = $row;
                    }
                }
		echo "<pre>";
		print_r($datos);
		/* Regresa la cadena al controlador*/
		return $datos;
		
	}/* Fin de mTraerDatosCatalogoTipoPerpetrador*/
	
	public function mTraerDatosCatalogoGradoInvolucramiento(){
		/* Trae todos los datos de gradoInvolucramientoN1Catalogo */
		$this->db->select('*');
		$this->db->from('gradoInvolucramientoN1Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['gradoInvolucramientoN1Catalogo'][$row['gradoInvolucramientoN1Id']] = $row;
		}
		
		/* Trae todos los datos de gradoInvolucramientoN2Catalogo */
		$this->db->select('*');
		$this->db->from('gradoInvolucramientoN2Catalogo');
		$consulta = $this->db->get();
						
		/* Pasa la consulta a un cadena */
		foreach ($consulta->result_array() as $row) {
			$datos['gradoInvolucramientoN2Catalogo'][$row['gradoInvolucramientoN2Id']] = $row;
		}
		
		/* Regresa la cadena al controlador*/
		return $datos;
	}
}
