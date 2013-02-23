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
class Upload_file extends CI_Controller
{
	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	function index() 
	{
		$status = "";
	    if ($_POST["action"] == "uploadFoto") {
			// obtenemos los datos del archivo
			$tamano = $_FILES["archivo"]['size'];
			$tipo = $_FILES["archivo"]['type'];
			$archivo = $_FILES["archivo"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "image/png" || $tipo == "image/jpg"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    $destino = base_url(). "statics/fotosActor/".$prefijo."_".$archivo;
					
				    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)) {
				    	
				    	$datos['registro'] = array('ruta'=>$destino,'fichas_fichaId'=>$_POST['fichaId']);
						$mensaje = $this->general_m->llenar_tabla_m($datos);
						$status = "Archivo subido: <b>".$archivo."</b>";
						
				    } else {
				    	
						$status = "Error al subir el archivo";
						
				    }
				} else {
					
				    $status = "Error al subir archivo";
					
				}
				
			}
	    }
		
		if ($_POST["action"] == "uploadPdf") {
			// obtenemos los datos del archivo
			$tamano = $_FILES["archivo"]['size'];
			$tipo = $_FILES["archivo"]['type'];
			$archivo = $_FILES["archivo"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "application/pdf"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    $destino =  base_url(). "statics/registros/".$prefijo."_".$archivo;
				    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)) {
							
						$datos['registro'] = array('ruta'=>$destino,'fichas_fichaId'=>$_POST['fichaId']);
						$mensaje = $this->general_m->llenar_tabla_m($datos);	
						$status = "Archivo subido: <b>".$archivo."</b>";
						
				    } else {
				    	
						$status = "Error al subir el archivo";
				    }
				} else {
				    $status = "Error al subir archivo";
				}
				
			}
	    }
		
		return $status;
	}
	
}