<html>

	<head>
		
		<meta charset="utf-8">
		  <meta name="viewport" content="width=device-width" />

		<title>i(dh)eas</title>
		
		  <!-- Estilo de la página CSS-->
		<?php $link = array(
			'href' => 'statics/stylesheets/foundation.min.css',
			'rel' => 'stylesheet',
			);
			echo link_tag($link); 
		?>
				
		<?php $link = array(
			'href' => 'statics/stylesheets/app.css',
			'rel' => 'stylesheet',
			'type' => 'text/css',
			);
			echo link_tag($link); 
		?>
		
		
		<?php $link = array(
			'href' => 'statics/CSS/menu_v.css',
			'rel' => 'stylesheet',
			);
			echo link_tag($link); 
		?>  
		
	
		<!---------Acordion css -------->		
		<?php $link = array(
			'href' => 'statics/CSS/collapse.css',
			'rel' => 'stylesheet',
			);
			echo link_tag($link); 
		?>  
				
		<?php $link = array(
			'href' => 'statics/CSS/tinyeditor.css',
			'rel' => 'stylesheet',
			);
			echo link_tag($link); 
		?>  
                <script type="text/javascript">var base_url = "<?=base_url(); ?>"</script>
		<!--Scripts foundation-->
		<script src="<?php echo base_url(); ?>statics/javascripts/modernizr.foundation.js" ></script>
		<script src="<?php echo base_url(); ?>statics/javascripts/foundation.min.js" ></script>
		<script src="<?php echo base_url(); ?>statics/javascripts/app.js" ></script>
		
		<!--Scripts jquery-->		
		<script src="<?php echo base_url(); ?>statics/jquery-ui-1.8.23.custom/js/jquery-1.8.0.min.js" ></script>
		<script src="<?php echo base_url(); ?>statics/jquery-ui-1.8.23.custom/js/jquery-ui-1.8.23.custom.min.js" ></script>
		<script src="<?php echo base_url(); ?>statics/javascripts/menu_v.js" ></script>
		<script src="<?php echo base_url(); ?>statics/javascripts/ventanas.js" ></script>
		<!---script que hace posible el acordion---->
		<script src="<?php echo base_url(); ?>statics/javascripts/jquery.collapse.js" ></script>
		<script src="<?php echo base_url(); ?>statics/javascripts/datepickerEsp.js" ></script>
		<script src="<?php echo base_url(); ?>statics/javascripts/tiny.editor.packed.js" ></script>

	</head>
	

	<body>
<!-- 
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


 -->

 	
		<!---Encabezado de la página---->
			<div class="twelve columns">
			  <div class="panel" >
			  <div div="logo" >
				<?php echo img('statics/IMG/logo.png');?>
			  </div>
			  </div>
			</div>
		  <!---Termina el encabezado de la página-->
		  
		  <!--Contenido de la página-->
			<div class="two columns">				

			<dl class="nice vertical tabs">
				  <dd ><a href="<?=base_url(); ?>index.php/form_c">Actores</a></dd>
				  <dd class="active"><a href="<?=base_url(); ?>index.php/casos_c/mostrar_caso">Casos</a></dd>
				  <dd><a href="#vertical3">Reporte</a></dd>
				</dl>
				
			</div>
		
			<div class="ten columns">
				<ul class="tabs-content">
				
				  <li id="vertical1Tab"><!--Pestaña Actores Individuales---->
					
				  </li>

				  <li class="active"  id="vertical2Tab"><!--Pestaña Actores transmigrantes---->  
				  
								<div class="three columns">
									<?php echo $listaCasos;?> <!---Se llama a la lista de casos---->
								</div>
								
								
								<div class="nine columns">
									<div id="vistaDeCasos">
										
									</div>
									
								</div>
								
				  
				  </li><!--Termina Pestaña Actores transmigrantes---->
				  
				  <li id="vertical3Tab"><!--Pestaña Actores Colectivos---->  
				  
									<p>Contenido de colectivos</p>
									
				  </li><!--Termina Pestaña Actores Colectivos---->
				  
				</ul>
			  
			</div>
		<!--Termina el contenido de la página-->
	
	</body>
	
</html>
