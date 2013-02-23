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
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			
			$this->load->library('session');

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
     }
	 
	public function index(){
			
		$session =	$this->session->all_userdata();
		
        if(!empty($session['usr'])){
        	
        	redirect('actores_c/mostrar_actor');  
			       	
        }
        else{
        	
        	$datos['head'] = $this->load->view('general/head_v', '', true);
        	
        	$this->load->view('login',$datos); 
			           
        }
            
	
   }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */