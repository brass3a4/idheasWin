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

 <div id="pestania" data-collapse>
	<h2 class="open">Núcleo caso</h2><!--título de la sub-pestaña---->  
	<div>
	  	<div id="subPestanias" data-collapse>
	  		<h2 class="open">Derechos afectados y actos</h2>
	  		<div>
	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Derecho humano</th>
			                <th>Acto</th>
			                <th>Fecha inicio</th>
			                <th>Fecha término</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
  			              <?php if(isset($datosCaso['derechoAfectado'])){ ?>
			              <?php foreach ($datosCaso['derechoAfectado'] as $index => $derecho) {?>
			              <tr>
			              	<?php foreach ($catalogos['derechosAfectadosN'.$derecho['derechoAfectadoNivel'].'Catalogo'] as $catalogo) {
								  		if($catalogo['derechoAfectadoN'.$derecho['derechoAfectadoNivel'].'Id']==$derecho['derechoAfectadoId']){
										  	echo '<td>'.$catalogo['descripcion'].'</td>';
										  }
							  } ?>
							  
							 
						<?php if(isset($datosCaso['actos'])){?>	  	
			              <?php foreach ($datosCaso['actos'] as $index2 => $acto) {
			              	if ($acto['derechoAfectado_derechoAfectadoCasoId']== $derecho['derechoAfectadoCasoId']) { ?>
			              		<?php foreach ($catalogos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catalogo) {
			              			if($acto['actoViolatorioNivel']==1){
			              				if($catalogo['actoId']==$acto['actoViolatorioId']){
										  	echo '<td>'.$catalogo['descripcion'].'</td>';
										  }
			              			}else{
			              				if($catalogo['actoN'.$acto['actoViolatorioNivel'].'Id']==$acto['actoViolatorioId']){
										  	echo '<td>'.$catalogo['descripcion'].'</td>';
										  }
			              			}
								  		
							  	} ?>
			              	<?php } }?>

			              	<td><?=(isset($derecho['fechaInicial'])) ? $derecho['fechaInicial'] : " " ; ?></td>
			              	<td><?=(isset($derecho['fechaTermino'])) ? $derecho['fechaTermino'] : " " ; ?></td>
			                <td><input type="button" style="padding: 7px 19px 7px 19px"  class="small button"  value="Editar" onclick="ventanaDerAfectados('<?=$casoId; ?>', '<?=$index?>')" />
			                <input type="button" style="margin-top: 5px;" class="small button"  value="Eliminar" onclick="eliminarDerechoAfectado('<?= $derecho['derechoAfectadoCasoId']?>', '<?=$casoId; ?>')" /></td>
			              </tr><?php } }?><?php } ?>
			            </tbody>
			          </table>
			    <input type="button" class="small button <?=$clase?>"  value="Nuevo " onclick="ventanaDerAfectados('<?=$casoId; ?>',0)" />
	  			</div>
	  			  
	  		</div>

	  	</div><!--fin acordeon Derechos afectados y actos-->
	  	<div id="subPestanias" data-collapse>
	  		<h2 class="open">Intervenciones</h2>
	  		<div>

	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Receptor</th>
			                <th>Interventor</th>
			                <th>Tipo de intervención</th>
			                <th>Fecha</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php if(isset($datosCaso['intervenciones'])){ ?>
			              <?php foreach ($datosCaso['intervenciones'] as $index => $inter) {?>
			              	 <tr>

			              <?php	if (isset($inter['casosActorReceptor'])) {
				              		foreach ($inter['casosActorReceptor'] as $inter2) {
					              		if ($inter2['casos_casoId'] == $casoId) {
					              			$casoActorIdReceptor=$inter2['casoActorId'];
					              		}
					              		else{
					              			$casoActorIdReceptor=0;	
					              		}
					              	}
			              		}

			              		if (isset($inter['casosActorInterventor'])) {
			              			foreach ($inter['casosActorInterventor'] as $inter2) {
					              		if ($inter2['casos_casoId'] == $casoId) {
					              			$casoActorIdInterventor=$inter2['casoActorId'];
					              		}
					              		else{
					              			$casoActorIdInterventor=0;	
					              		}
			              		}
			              	} ?>
			                <td><span id="descho_fichaId"><?=(isset($inter['receptorId']) && ($inter['receptorId']>0)) ? $catalogos['listaTodosActores'][$inter['receptorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['receptorId']]['apellidosSiglas'] : ''; ?><?=(isset($inter['tipoRelacionReceptor']) && ($inter['tipoRelacionReceptor']>0) &&(isset($catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]))) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['interventorId']) && ($inter['interventorId']>0)) ?  $catalogos['listaTodosActores'][$inter['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['interventorId']]['apellidosSiglas'] : ''; ?><?=(isset($inter['tipoRelacionInterventor']) && ($inter['tipoRelacionInterventor']>0) &&(isset($catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]))) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['tipoIntervencionId']) && isset($inter['intervencionNId'])) ?  $catalogos['tipoIntervencionN'.$inter['intervencionNId'].'Catalogo'][$inter['tipoIntervencionId']]['descripcion'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['fecha'])) ? $inter['fecha'] : ''; ?></span>	</td>
			                <td><input type="button" class="small button" style="padding: 7px 19px 7px 19px" value="Editar" onclick="ventanaInterevenciones('<?=$casoId; ?>', '<?=$inter['intervencionId']?>')" />
			                <input type="button" style="margin-top: 5px;" class="small button"  value="Eliminar" onclick="eliminarIntervencion('<?=$inter['intervencionId']?>','<?=$casoId?>','<?=(isset($casoActorIdReceptor))? $casoActorIdReceptor : '0' ?>','<?=(isset($casoActorIdInterventor) ? $casoActorIdInterventor : '0')?>')" /></td>
			              </tr> <?php } }?>
			            </tbody>
			          </table>
				<input type="button" class="small button <?=$clase?>"  value="Nuevo" onclick="ventanaInterevenciones('<?=$casoId; ?>',0)" />	  
	  			</div>
	  			  
	  		</div>
	  	</div><!--fin acordeon Intervenciones-->
	</div>
	  
</div><!--fin acordeon Núcleo caso-->