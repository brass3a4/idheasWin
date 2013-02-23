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
class Login_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			$this->load->library('session');
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
     }
	
    function index(){
           
		if(!empty($_POST['usuario']) && !empty($_POST['contrasenia'])){
			
			$datos=array('usr'=>$_POST['usuario'],'pass'=>$_POST['contrasenia']);
			
			$mensaje = $this->general_m->mVerificarLoginUsuario($datos);
			
			//echo $mensaje;
			
			if($mensaje == '2'){
				
				echo "contraseña no válida";
			
			}elseif($mensaje == '1'){
				
				$newdata = array(
		                   'usr'  => $_POST['usuario'],
		                   'pass'     => $_POST['contrasenia'],
		                   'logged_in' => TRUE
		         );
		
				$this->session->set_userdata($newdata);	
				
				$_SESSION =	$this->session->all_userdata();
		
				if(!empty($_SESSION['usr'])){
					
		        	redirect('actores_c/mostrar_actor');  
					    	
		        }
				
			}elseif($mensaje == '3'){
				
				echo "No existe el usuario";
			}else{
				
				echo "Error en validación";
				
			}
			
		}   
	   
    }
	
	public function cambiarContrasenia(){
		
		$datos = array ( 'datosViejos'=> array ( 'usr' => $_POST['usuario'], 'pass' => $_POST['contrasenia']),
						 'datosNuevos' => array('pass' => $_POST['newContrasenia']));
						 
		$mensaje = $this->general_m->mCambiarPassUsuario($datos);
		
		return $mensaje;
		
	}
	
	
	
	public function reiniciarSesion(){
		
		$this->session->sess_destroy();
		
		$datos['head'] = $this->load->view('general/head_v', '', true);
        	
        $this->load->view('login',$datos); 
		
	}
}

?>