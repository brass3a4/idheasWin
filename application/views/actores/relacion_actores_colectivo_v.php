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

 <!-------------------Comienza la parte de detalles del lugar-------------------------------------->
<html>
	<head>
    	<?=$head; ?>
	</head>

	<body>
			<input type="hidden" id="tipoActorAE"  name="3"/>
	<form action="<?=$action?>" method="post" accept-charset="utf-8">
			<input type="hidden"  name="actores_actorId" value='<?=$actorId;?>' />	

			<input type="hidden"  id="tipoRelacionIndividualColectivoId" name="tipoRelacionIndividualColectivoId" value="<?= ($listaTodosActores[$actorId]['tipoActorId'] < 3) ? "2" : "3" ;?>"/>

			<input type="hidden"  id="nameSeleccionado"  value="actorRelacionadoId"> <!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

			<input type="hidden"  id="ValoresBotonCancelar"   value="<?= (isset($relaciones['actorRelacionadoId'])&&($relaciones['actorRelacionadoId']!=0)) ? $relaciones['actorRelacionadoId']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

			<input type="hidden"  id="tipoRelacionId" name="tipoRelacionId" value="<?= (isset($relaciones['tipoRelacionId']) ) ? $relaciones['tipoRelacionId'] : "" ;?>" required />

			<input type="hidden"  id="actorRelacionadoId" name="actorRelacionadoId" value="<?= (isset($relaciones['actorRelacionadoId']) ) ? $relaciones['actorRelacionadoId'] : "" ;?>"/>

			<input type="hidden"  id="relacionActoresId" name="relacionActoresId" <?= (isset($relaciones['relacionActoresId'])) ? 'value="'.$relaciones['relacionActoresId'].'"' : '' ;?> />

			<br />
	
			<label style="margin-left: 15px;"><h5><b>Actor</h5></b></label>

			<div style="margin-left: 15px;" class="twelve columns espacioInferior">
				<img class="foto" src="<?=base_url().$listaTodosActores[$actorId]['foto']?>" />
				<br /><br />
				<?=$listaTodosActores[$actorId]['nombre']." ".$listaTodosActores[$actorId]['apellidosSiglas']?>
			</div>

			<div class="twelve columns">
			<div id="tipoRelTexto" class="espacioSuperior" > <h5><b>Tipo de relación</h5></b> </div>			
			<div id="tipoRelNotas"> 
				<!--Estos datos solo apareceran para su actualización-->
				<?php if (isset($relaciones['tipoRelacionId'])) {?>
					<div id="relacionActual"> <br />
						<label style="margin-left: 15px;"><h5><b>Relación Actual</h5></b></label>
						<?php if ($listaTodosActores[$actorId]['tipoActorId']<3) {?>
							<span style="margin-left: 15px;"> <?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['Nivel2'])?></span>
							<label style="margin-left: 15px;">notas</label>
							<span style="margin-left: 15px;"><?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['notas'])?></span>
						<?php } else{?>
							<?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['nombre'])?>
							<label style="margin-left: 15px;">notas</label>
							<span style="margin-left: 15px;"><?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['notas'])?></span>
						<?php }?>
						<br />
						<br />
						<br />
					</div>
				<?php }?>
			</div>
			<div style="margin-left: 15px;" class="caja">
				<?php if ($listaTodosActores[$actorId]['tipoActorId']<3) {?>

					<?php if(isset($relacionActoresColectivo)){ ?>
						<ol>
							<li style="padding-left:15px;" class="ExpanderFlecha flecha" id="listaEmpleo" onclick="desplegar('relacionEmpleo','listaEmpleo')" > Relaciones de empleo </li>
								<li>
									<ul id="relacionEmpleo" class="Escondido">
									<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
										<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de empleo')) {?>
											<li class="cambiarColorRelacion"  id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
										<?php }?>
									<?php endforeach;?>
									</ul>
								</li>
							<li style="padding-left:15px;" class="ExpanderFlecha flecha" id="listaAfiliacion" onclick="desplegar('relacionAfiliacion','listaAfiliacion')" >Relaciones de afiliación</li>
								<li>
									<ul id="relacionAfiliacion" class="Escondido" >
									<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
										<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de afiliación')) {?>
											<li  class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
										<?php }?>
									<?php endforeach;?>
									</ul>
								</li>
						</ol>
					<?php } ?>

				<?php } else {?>
						<ul id="relacionAfiliacion" >
						<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
							<?php if ($item['tipoDeRelacionId']==3) {?>
								<li  class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['nombre']?>')"> <?=$item['nombre']?>	 </li>
							<?php }?>
						<?php endforeach;?>
						</ul>
				<?php }
				 ?>

			</div>
			
			</div>
			<br /><br />
	<label style="margin-left: 15px;"><h5><b>Actores colectivos</h5></b></label>
	
	<div id="vistaActorRelacionado">
	<?php if (isset($relaciones['actorRelacionadoId'])) {?> 
	<?php if ($relaciones['actorRelacionadoId']!=0) {?> 
		<img class="four columns foto"  src="<?php print_r(base_url().$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto']) ?>" / >
		<h4><b><?php print_r($catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']) ?></h4></b>
	<?php }}?>
	</div>
		<input style="margin-left: 15px;" type="button" class="small button" onclick="seleccionarActorColectivo()" value="Agregar actor">
		<input type="button" class="small button" value="Eliminar actor" <input type='button' onclick="eliminarRelacionVista('vistaActorRelacionado','actorRelacionadoId')" >
	<br/>

			<br/><br/>
			
			
			<div class="twelve columns">
			<br /><br />
				<div class="six columns">
				<label for="edad">Fecha inicial</label>
					<select name="tipoFechaInicialId" onclick="fechaInicialCasosRIC(value)" onkeyup="fechaInicialCasosRIC(value)" >
						<option></option>
								<option  value="1" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==1)) ? 'selected="selected"' : " " ;?>>fecha exacta</option>
								<option  value="2" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==2)) ? 'selected="selected"' : " " ;?>>fecha aproximada</option>
								<option  value="3" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==3)) ? 'selected="selected"' : " " ;?>>Se desconce el día</option>
								<option  value="4" <?=(isset($relaciones['tipoFechaInicialId']) && ($relaciones['tipoFechaInicialId']==4)) ? 'selected="selected"' : " " ;?>>Se desconce el día y el mes</option>
					</select>
				</div>  
				
				<div class="six columns">
					<p class='<?=(isset($relaciones['fechaInicial']) ? ' ' : 'Escondido'); ?>' id="fechaExactaVRIC">
						<input type="text" id="fechaExactaRP" <?=(isset($relaciones) ? 'name="fechaInicial" value="'.$relaciones['fechaInicial'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxVRIC">
						<input type="text" id="fechaAproxRIC" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaVRIC">
						<input type="text" id="fechaSinDiaRIC"  placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesVRIC">
						<input type="text" id="fechaSinDiaSinMesRIC"  placeholder="AAAA-00-00" />

					</p>
				</div>
		</div> <!---termina opciones de fechaInicial-->
				
				
			<div class="twelve columns">
					<label for="FechaTermino">Fecha término</label>
				<div class="six columns">
					<select name="tipoFechaTerminoId" onclick="fechaTerminalCasosRIC(value)" onkeyup="fechaTerminalCasosRIC(value)">
						<option></option>
						<option  value="1" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==1)) ? 'selected="selected"' : " " ;?> >fecha exacta</option>
						<option  value="2" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==2)) ? 'selected="selected"' : " " ;?> >fecha aproximada</option>
						<option  value="3" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==3)) ? 'selected="selected"' : " " ;?> >Se desconce el día</option>
						<option  value="4" <?=(isset($relaciones['tipoFechaTerminoId']) && ($relaciones['tipoFechaTerminoId']==4)) ? 'selected="selected"' : " " ;?> >Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<p class='<?=(isset($relaciones['fechaTermino']) ? ' ' : 'Escondido'); ?>' id="fechaExactaV2RIC">
						<input type="text" id="fechaExacta2RIC"  <?=(isset($relaciones) ? 'name="fechaTermino" value="'.$relaciones['fechaTermino'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV2RIC">
						<input type="text" id="fechaAprox2RIC" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV2RIC">
						<input type="text" id="fechaSinDia2RIC"  placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV2RIC">
						<input type="text" id="fechaSinDiaSinMes2RIC" placeholder="AAAA-00-00" />

					</p>
				</div>
			</div> <!---termina opciones de fechaTermino-->
			
		<div id="Comentarios"class="twelve columns">
			<br /><br />
			<fieldset style="padding:10px;">
				<legend>Comentarios</legend><br />
					<textarea rows="10" cols="100"  id="TextoRelActoresColectivo" style="min-width: 400px; min-height: 200px" wrap="hard"  name="comentarios"><?=(isset($relaciones) ? $relaciones['comentarios'] : ''); ?></textarea>
			</fieldset>	
			<input style="margin:5px 0px 5px 20px;" class="medium button" type="submit" value="Guardar" />
			<input style="padding: 9px 22px 9px 22px !important;margin:5px 0px 5px 0px;" class="medium button" type="button" value="Cancelar"  onclick="cerrarVentana()"/>
		</div>		
			
		</form>		
		
	</body>
</html>
