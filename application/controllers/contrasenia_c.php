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
class Contrasenia_c extends CI_Controller {
	
	function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        $this->load->library('session');
        
		$this->is_logged_in();
		
        $this->load->model(array('actores_m', 'general_m', 'catalogos_m'));
        
    }
	
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
	}
	
	function mostrar_cambioPass(){
		
		$datos['is_active'] = 'contrasenia';
		
		$datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['head'] = $this->load->view('general/head_v', $datos, true);

        $datos['content'] = $this->load->view('general/cambiarContrasenia_v', $datos, true);
       
        $datos['body'] = $this->load->view('general/body_v', $datos, true);


        $this->load->view('general/principal_v', $datos);
	}
	
	function cambiarPass(){
		$oldPass = $_POST['oldPass'];
		$newPass1 = $_POST['newPass1'];
		$newPass2 = $_POST['newPass2'];
		
		$session =	$this->session->all_userdata();
		
		$usr = $session['usr'];
	
		if((strcasecmp($newPass1, $newPass2)==0) && isset($usr)){
			$datos = array ( 'datosViejos'=> array ( 'usr' => $usr, 'pass' => $oldPass), 
		 				'datosNuevos' => array('pass' => $newPass2));
			$mensaje = $this->general_m->mCambiarPassUsuario($datos);
		
		}
		echo $mensaje;
		
	}
}
?>	
	