<!DOCTYPE >
<html>
	<head>
		<?=$head?>
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

 		<br />
		<dl class="tabs">
			<?php if (isset($dato)) { ?>
			  <dd class="<?=($pestana == 'individual') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/casos_c/seleccionarIndividualConDatos/<?= $dato ?>" >Individual</a></dd>
			  <dd class="<?=($pestana == 'trans') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/casos_c/seleccionarTransmigranteConDatos/<?= $dato ?>" >Transmigrante</a></dd>
			<?php }else{ ?>
			  <dd class="<?=($pestana == 'individual') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/actores_c/seleccionarIndividual">Individual</a></dd>
			  <dd class="<?=($pestana == 'trans') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/actores_c/cargarTransmigrante">Transmigrante</a></dd>
			<?php } ?>
		</dl>
		<div id="individual">
			<ul class="tabs-content">
			  <li class="active" id="indivdualTab">
	
			  	<div class="twelve columns">
			  		<div class="ten columns">
			  			<input id="actores_nombre" type="text"  name="actores_nombre"  placeholder="Buscar por nombre o apellido" />
			  		</div>
			  		<div style="float: left; padding: 0px 15px 0px 0px;">
			  			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="filtroRadio(5)">
	    			</div>
					<div id="pestania" data-collapse >
						<h2 class="open">Filtros</h2><!--título de la sub-pestaña--> 
						<form name="frmR"> 
							<div>
								<input type="radio" name="filtroR" onclick="filtroRadio(1)" value="1" id=""/>Víctima
								<input type="radio" name="filtroR" onclick="filtroRadio(2)" value="2" id=""/>Perpetrador
								<input type="radio" name="filtroR" onclick="filtroRadio(3)" value="3" id=""/>Receptor
								<input type="radio" name="filtroR" onclick="filtroRadio(4)" value="4" id=""/>Interventor
								<input type="radio" name="filtroR" onclick="filtroRadio(8)" value="8" id=""/>Sin filtro
								<input type="hidden" name="1" id="tipoActor" />
								<input type="hidden" name="1" id="tipoVentana" />
							</div>	
						</form>		  	
					</div>	
	
				</div>
	
	
				<br />
				<div class="twelve columns seleccionarActorScorll" id="ventana1Filtro">
				    	<?php if(isset($actoresIndividuales)):?>
					    	<?php foreach ($actoresIndividuales as $individual) {?>
		
							    <div class="twelve columns lista" id="<?= $individual['actorId']?>"onclick="<?php if (isset($dato)) {
							    	switch ($dato) {
							    		case '1':
							    		echo "SeleccionarYTreaeRelaciones('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    		case '2':
							    		echo "SeleccionarYTreaeRelacionesrceptor('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    		case '3':
							    		echo "SeleccionarIntervenidos('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    		case '4':
							    		echo "agregaIntervenidos('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    		case '5':
							    		echo "agregarActorFuenteInfoPersonal('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    		case '6':
							    		echo "agregarActorFuenteDocumental('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    		case '7':
							    		echo "agregarActorFuenteInfoPersonalReportado('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
							    			break;
							    	}
					    	
								    } else {
								    	echo "Seleccionar('".$individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto']."')";
								    }
								    ?>"  > 
							    		<img class="three columns imagenFoto" src="<?=base_url().$individual['foto'] ?> " />
							    		<b class="nine columns"> <?php print_r($individual['nombre']." ".$individual['apellidosSiglas']) ?></b>
								</div >
		
					    	<?php } ?>
					    <?php endif;?>							
				</div >
	
				
			  </li>
			  
			</ul>

			<?php if (isset($dato)) {
				if ($dato ==4) { 
					$formulario=1; ?>
					<input type="hidden" name="intervenidos_intervenciones_intervencionId" id="intervenidos_intervenciones_intervencionId" value="" >
					<input type="hidden" name="intervenidos_actorIntervenidoId" id="intervenidos_actorIntervenidoId" value="" >
					<input type="hidden" id="casoId" value="" >

					<input type="button"  class="button" value="Aceptar" onclick="agregarIntervenidoAjax()"/>
					<input type="button"  class="button" value="Cancelar" onclick="cerrarVentana()"/>
				<?php }

				if (($dato==7) || ($dato==5)) {
					$formulario=1;?>
					
					<input type="button"  class="button" value="Aceptar" onclick="cerrarVentana()"/>
					<input type="button"  class="button" value="Cancelar" onclick="cerrarVentana()"/>
				<?php }
			} ?>

		</div>
	<div id="VentanaIntervenciones">

		<?php if (!isset($formulario)) { ?>
			<input type="button"  class="button" value="Aceptar" onclick="cerrarVentana()"/>
			<input type="button"  class="button" value="Cancelar" onclick="cerrarVentanaCancelar()"/>
		<?php }?>
	</div>
	</body>
</html>