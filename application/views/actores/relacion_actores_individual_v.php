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

 <!---Comienza la parte de detalles del lugar-->
<html>
<head>
    <?=$head; ?>
</head>
<body>
	<form action="<?php print_r($action)?>" method="post" accept-charset="utf-8">
	<input type="hidden" name="actores_actorId" value="<?=$actorId;?>" />	

	<input type="hidden"  id="tipoRelacionIndividualColectivoId" name="tipoRelacionIndividualColectivoId" value="<?= ($listaTodosActores[$actorId]['tipoActorId'] < 3) ? "1" : "2" ;?>"/>

	<input type="hidden"  id="relacionActoresId" name="relacionActoresId" <?= (isset($relaciones['relacionActoresId'])) ? 'value="'.$relaciones['relacionActoresId'].'"' : '' ;?> />
	
	<input type="hidden"  id="nameSeleccionado"  value="actorRelacionadoId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

	<input type="hidden"  id="ValoresBotonCancelar"   value="<?= (isset($relaciones['actorRelacionadoId'])&&($relaciones['actorRelacionadoId']!=0)) ? $relaciones['actorRelacionadoId']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->
	
	<input type="hidden"  id="actorRelacionadoId" name="actorRelacionadoId" value="<?= (isset($relaciones['actorRelacionadoId'])) ? $relaciones['actorRelacionadoId'] : '' ;?>"/>

	<div class="twelve columns">
		<br/>
		<label  style="margin-left: 15px;"  for="TipoRel"><b><h5>Tipo de relación</b></h5></label>
			<?php 
			if($catalogos['listaTodosActores'][$actorId]['tipoActorId']<3){ ?>
				<select id="tipoRelacionId" name="tipoRelacionId" required="required">
					<option></option> 
					<?php 
						if (isset($relaciones['tipoRelacionId'])) {?>
							<?php foreach($catalogos['relacionActoresCatalogo'] as $index => $item):?> 
								<?php if ($item['tipoDeRelacionId']==1){?>
									<option <?= ($item['tipoRelacionId']==$relaciones['tipoRelacionId']) ? 'selected="selected"' : "" ;?> onclick="notasCatalogos2('<?=$item['notas'];?>','notasTipoDeRelacion','1')" onkeyup="notasCatalogos2('<?=$item['notas'];?>','notasTipoDeRelacion','1')" value="<?= $item['tipoRelacionId']; ?>"><?php print_r($item['nombre']); ?> </option>
								<?php }?>	
							<?php endforeach;?><!--Termina lista de los actores-->
							<?php } 
						else{?>
							<?php foreach($catalogos['relacionActoresCatalogo'] as $index => $item):?> 
								<?php if ($item['tipoDeRelacionId']==1){?>
									<option onclick="notasCatalogos2('<?=$item['notas'];?>','notasTipoDeRelacion','1')" onkeyup="notasCatalogos2('<?=$item['notas'];?>','notasTipoDeRelacion','1')" value="<?php print_r($item['tipoRelacionId']); ?>"><?php print_r($item['nombre']); ?> </option>
								<?php }?>	
							<?php endforeach;}?><!--Termina lista de los actores-->
				</select>
			<?php }

			else{ ?>	

			<input type="hidden"  id="tipoRelacionId" name="tipoRelacionId" <?= (isset($relaciones['tipoRelacionId'])) ? 'value="'.$relaciones['tipoRelacionId'].'"' : 'value=""' ;?> />

			<div  style="margin-left: 15px;"  class="caja">
					<ol>
						<li style="padding-left:15px;" class="ExpanderFlecha flecha" id="listaEmpleo" onclick="desplegar('relacionEmpleo','listaEmpleo')" > Relaciones de empleo</li>
							<li>
								<ul id="relacionEmpleo" class="Escondido">
								<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
									<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de afiliación')) {?>
										<li class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
									<?php }?>
								<?php endforeach;?>
								</ul>
							</li>
						<li style="padding-left:15px;" class="ExpanderFlecha flecha" id="listaAfiliacion" onclick="desplegar('relacionAfiliacion','listaAfiliacion')"  > Relaciones de afiliación</li>
							<li>
								<ul id="relacionAfiliacion" class="Escondido" >
								<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
									<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de empleo')) {?>
										<li  class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
									<?php }?>
								<?php endforeach;?>
								</ul>
							</li>
					</ol>
			</div>
			<?php }?>
			
		<br />
		<label style="margin-left: 15px;"  for="TipoRel"><b><h5>Notas tipo de relación</h5></b></label>
		<br />
		<div style="margin-left: 15px;"  id="notasTipoDeRelacion" class="twelve columns"></div>
		<div style="margin-left: 15px;"  id="tipoRelNotas" class="twelve columns"></div>
	</div>

	<div class="twelve columns">
		<label for="PerRelacionada"><b><h5>Actor relacionado</b></h5></label><br />
			<div id="vistaActorRelacionado"  >
			<?php if (isset($relaciones['actorRelacionadoId'])) {?> 
			<?php if ($relaciones['actorRelacionadoId']!=0) {?> 
				<img class="three columns foto"  src="<?php print_r(base_url().$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto']) ?>" >
				<h4><b><?php print_r($catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']) ?></h4></b>
			<?php }}?>
			</div>
			<input type="button" class="small button" onclick="seleccionarActorIndividual()" value="Agregar actor">
			<input type="button" class="small button"  onclick="eliminarRelacionVista('vistaActorRelacionado','actorRelacionadoId')" value="Eliminar actor">
		<br/>
	<br/>
	<br/>
	<br/>
	</div>
	<div class="twelve columns">

		<div class="six columns" >
		<label for="edad"><b>Fecha inicial</b></label>
			<select name="tipoFechaInicialId" onclick="fechaInicialCasosRP(value)" onkeyup="fechaInicialCasosRP(value)" >
						<option></option>
						<option  value="1" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==1)) ? 'selected="selected"' : " " ;?>>fecha exacta</option>
						<option  value="2" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==2)) ? 'selected="selected"' : " " ;?>>fecha aproximada</option>
						<option  value="3" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==3)) ? 'selected="selected"' : " " ;?>>Se desconce el día</option>
						<option  value="4" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==4)) ? 'selected="selected"' : " " ;?>>Se desconce el día y el mes</option>
			</select>
			</div>
			<div class="six columns">
				<br/>
						<p class='<?=(isset($relaciones['fechaInicial']) ? ' ' : 'Escondido'); ?>' id="fechaExactaVRP">
							<input type="text" id="fechaExactaRP"<?=(isset($relaciones) ? 'name="fechaInicial" value="'.$relaciones['fechaInicial'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaAproxVRP">
							<input type="text" id="fechaAproxRP"  placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaSinDiaVRP">
							<input type="text" id="fechaSinDiaRP" placeholder="AAAA-MM-00" />

						</p >

						<p class="Escondido" id="fechaSinDiaSinMesVRP">
							<input type="text" id="fechaSinDiaSinMesRP" placeholder="AAAA-00-00" />

						</p>
			</div>
	</div>



	<div class="twelve columns" >
	<label for="Termonio"><b>Fecha término</b></label>
				<div class="six columns">
					<select name="tipoFechaTerminoId" onclick="fechaTerminalCasosRP(value)" onkeyup="fechaTerminalCasosRP(value)" >
								<option></option>
								<option  value="1" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==1)) ? 'selected="selected"' : " " ;?> >fecha exacta</option>
								<option  value="2" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==2)) ? 'selected="selected"' : " " ;?> >fecha aproximada</option>
								<option  value="3" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==3)) ? 'selected="selected"' : " " ;?> >Se desconce el día</option>
								<option  value="4" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==4)) ? 'selected="selected"' : " " ;?> >Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<p class='<?=(isset($relaciones['fechaTermino']) ? ' ' : 'Escondido'); ?>' id="fechaExactaV2RP">
						<input type="text" id="fechaExacta2RP" <?=(isset($relaciones) ? 'name="fechaTermino" value="'.$relaciones['fechaTermino'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV2RP">
						<input type="text" id="fechaAprox2RP" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV2RP">
						<input type="text" id="fechaSinDia2RP" placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV2RP">
						<input type="text" id="fechaSinDiaSinMes2RP" placeholder="AAAA-00-00" />

					</p>
				</div><br /><br /><br/>
	</div> <!---termina opciones de fechaTermino-->

	<div class="twelve columns">
	<fieldset  style="padding:10px;">
		<legend><b>Comentarios</b></legend>

			<textarea placeholder="Agregar un comentario" rows="10"   cols="100" id="TextoRelActoresIndividual" value="" style="min-width: 400px; min-height: 200px" wrap="hard"  name="comentarios"> <?=(isset($relaciones['comentarios']) ? $relaciones['comentarios'] : ''); ?></textarea>
	</fieldset>
	</div>
	<input style="margin:5px 0px 5px 20px;" class="medium button" type="submit" value="Guardar" />
	<input style="padding: 9px 22px 9px 22px !important;margin:5px 0px 5px 0px;" class="medium button" type="button" value="Cancelar"  onclick="cerrarVentana()"/>

	</form>		
</body>
</html>