<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PruebasJulio_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	
	function index() 
	{	
			$datos= array('actoViolatorioId'=>1,'actoViolatorioNivel'=>3); 
							   
			echo 'Antes de entrar a la funcion....';
			  						
			$Data['datos']=$this->reportes_m->mReporteLargo(1);
			
			echo 'Entro a la funcion.....';
			
			$this->load->view('pruebasJulio', $Data);
	}

}

?>
