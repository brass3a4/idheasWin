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

 	
		<form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/5' accept-charset="utf-8">
		 
		<input type="hidden" id="editar"  name="editar" value="<?= (isset($fuenteInfoPersonal)) ? "1" : "0" ;?>"/>
		<input type="hidden" id="nameSeleccionado"  value="fuenteInfoPersonal_actorId"/>
		<input type="hidden"  id="ValoresBotonCancelar" value=" "><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->
		<input type="hidden" id="nameSeleccionado"  value="fuenteInfoPersonal_actorId"/>
		<input type="hidden" id="fuenteInfoPersonal_actorId"  name="fuenteInfoPersonal_actorId" value="<?= (isset($fuenteInfoPersonal['actorId'])) ? $fuenteInfoPersonal['actorId'] : " " ;?>"/>
		
		<input type="hidden" id="nameDeLaRelacion"  value="fuenteInfoPersonal_relacionId"/>
		<input type="hidden" id="fuenteInfoPersonal_relacionId"  name="fuenteInfoPersonal_relacionId" value="<?= (isset($fuenteInfoPersonal['relacionId'])) ? $fuenteInfoPersonal['relacionId'] : " " ;?>"/>
		
		<input type="hidden" id="nameSeleccionadoReceptor"  value="fuenteInfoPersonal_actorReportado"/>
		<input type="hidden" id="fuenteInfoPersonal_actorReportado"  name="fuenteInfoPersonal_actorReportado" value="<?= (isset($fuenteInfoPersonal['actorReportado'])) ? $fuenteInfoPersonal['actorReportado'] : " " ;?>"/>

		<input type="hidden" id="nameDeLaRelacionReceptor"  value="fuenteInfoPersonal_tipoRelacionActorReportadoId"/>
		<input type="hidden" id="fuenteInfoPersonal_tipoRelacionActorReportadoId"  name="fuenteInfoPersonal_tipoRelacionActorReportadoId" value="<?= (isset($fuenteInfoPersonal['tipoRelacionActorReportadoId'])) ? $fuenteInfoPersonal['tipoRelacionActorReportadoId'] : " " ;?>"/>

		<input type="hidden" id='casos_casoId' name='casos_casoId'	value="<?= $casoId ?>"/>
		<input type="hidden" id='casoId' name='casoId'	value="<?= $casoId ?>"/>
		<input type="hidden" id='fuenteInfoPersonal_casos_casoId' name='fuenteInfoPersonal_casos_casoId' value="<?= $casoId ?>"/>

		<input type="hidden" id="fuenteInfoPersonal_fuenteInfoPersonalId"  name="fuenteInfoPersonal_fuenteInfoPersonalId" value="<?= (isset($fuenteInfoPersonal['fuenteInfoPersonalId'])) ? $fuenteInfoPersonal['fuenteInfoPersonalId'] : " " ;?>"/>


		<?php if (isset($fuenteInfoPersonal['casosActorReportado'])) {
			foreach ($fuenteInfoPersonal['casosActorReportado'] as $casosActorReportado) {
			if ($casoId== $casosActorReportado['casos_casoId'] ) {
			
				echo '<input type="hidden"  id="casoActorIdReportado" name="casoActorIdReportado" value="'.$casosActorReportado['casoActorId'].'">';
				$casoActorReportadoId=$casosActorReportado['casoActorId'];
			}else
				$casoActorReportadoId=0;
		}
		}
		?>
		<?php if (isset($fuenteInfoPersonal['casosActor'])) {
			foreach ($fuenteInfoPersonal['casosActor'] as $casoActor) {
			if ($casoId== $casoActor['casos_casoId'] ) {
			
				echo '<input type="hidden"  id="casoActorId" name="casoActorId" value="'.$casoActor['casoActorId'].'">';
				$casoActorId=$casoActor['casoActorId'];
			}else

				$casoActorId=0;
				echo '<input type="hidden"  id="casoActorIdReportado" name="casoActorIdReportado" value="0">';
		}
		}
		?>
			<fieldset>
				<legend class="espacioInferior">Fuente de información individual o colectiva</legend>
					<input type="radio" onclick="pintaIndividualesInfoPersonal()" name="selecionaActor" <?= (isset($fuenteInfoPersonal['actorId']) &&($fuenteInfoPersonal['actorId']>0) && ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['tipoActorId']< 3)) ? "checked='checked'" : " " ;?>/>Persona
					<input type="radio"	onclick="pintaColectivosInfoPersonal()" name="selecionaActor"<?= (isset($fuenteInfoPersonal['actorId'])  &&($fuenteInfoPersonal['actorId']>0) && ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['tipoActorId']== 3)) ? "checked='checked'" : " " ;?> />Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />


					<div class="twelve columns espacioSuperior" id="infoPersonalActor">
						<?php if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0)) { ?>
						<div class="three columns"><img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['foto']?>" /></div><b><h4><?= (isset($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['nombre'])) ? $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['nombre'] : " " ; ?>  <?= (isset($fuenteInfoPersonal['actorId'])) ? $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['apellidosSiglas'] :  '' ;?></h4></b> 
						<?php } ?>
					</div>

					<div class="twelve columns espacioSuperior" id="infoPersonalActorBotones">
							<div class="nine columns">
								<?php if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0)&& ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['tipoActorId']< 3)) {?>
									<input class="tiny button" type="button" onclick="seleccionarActorseleccionarActorIndColDatos('5')" value="Seleccionar actor">
								<?php } else { 
									if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0) && ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['tipoActorId']== 3)) {?>
											<input class="tiny button" type="button" onclick="seleccionarActorseleccionarColDatos('1')" value="Seleccionar actor">
									<?php } }?>
							</div>
							<div id="eliminarVistaActor" class="three columns">
								<?php if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0)&& ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['tipoActorId']< 3)) {?>
									<input class="tiny button" type="button" onclick="eliminarRelacionVista('infoPersonalActor','fuenteInfoPersonal_actorId','infoColectio','fuenteInfoPersonal_relacionId')" value="Eliminar Actor">
								<?php }?>
							</div>
					</div>
					<div class="twelve columns espacioSuperior" id="infoColectio" <?=(isset($fuenteInfoPersonal['relacionId']) && ($fuenteInfoPersonal['relacionId'] > 0)) ? "" : 'class="Escondido"' ;?> >
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div>
									<div id="infoColectioContenido" >
									<?php if (isset($fuenteInfoPersonal['relacionId']) &&($fuenteInfoPersonal['relacionId'] > 0)) { ?>
										<div class="three columns">
											<img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['foto']?>" />
										</div>
										<b><h4><?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['nombre'] : " " ; ?>  <?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['apellidosSiglas'] :  '' ;?></h4></b>
									<h5>Tipo de relacion</h5>
										<?=(isset($fuenteInfoPersonal['relacionId'])&&($fuenteInfoPersonal['relacionId'] > 0)) ? $catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['tipoRelacionId']]['Nivel2']	 : " " ; ?></h5> <br> 
										<?php } ?>
									</div>
									<div id="infoColectioContenidoBotones" >
										<?php if (isset($fuenteInfoPersonal['actorId']) &&($fuenteInfoPersonal['actorId'] > 0)) { ?>
											<input class="tiny button" type="button" onclick="ventanaColectivoRelacionados('<?= $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['actorId'] ?>','3')" value="Seleccionar relación">
											<input class="tiny button" type="button" onclick="eliminarRelacionVista('infoColectioContenido','fuenteInfoPersonal_relacionId')" value="Eliminar relación">
										<?php } ?>
									</div>
								</div>
						</div>
					</div>
			</fieldset>
			<fieldset>
			<div class="twelve columns espacioSuperior">
				<div class="twelve columns" >
					<div class="six columns">
						<label for="tipoFuente">Tipo de la fuente</label>
						<select id="fuenteInfoPersonal_tipoFuenteCatalogo_tipoFuenteId" name="fuenteInfoPersonal_tipoFuenteCatalogo_tipoFuenteId">
							 <option></option>							
							 <?php if(isset($fuenteInfoPersonal['tipoFuenteCatalogo_tipoFuenteId'])){
		                                foreach($catalogos['tipoFuenteCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                                    <option onkeyup="notasCatalogos2('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" onclick="notasCatalogos2('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" value="<?=$item['tipoFuenteId']?>" <?=($fuenteInfoPersonal['tipoFuenteCatalogo_tipoFuenteId'] == $item['tipoFuenteId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
		                                <?php endforeach;
		                            } else { ?>
		                                <?php foreach($catalogos['tipoFuenteCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
		                                    <option onkeyup="notasCatalogos2('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" onclick="notasCatalogos2('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')"  value="<?=$item['tipoFuenteId']?>" ><?=$item['descripcion']?></option>
		                                <?php endforeach; } 
		                      ?>
						</select>
								<div id="notastipoFuenteDocumentalCatalogo"></div>
					</div>
				</div>
				<pre>
				</pre>
				<div class="twelve columns espacioSuperior espacioInferior">
					<div class="six columns">
						<label for="edad">Fecha</label>
							<select name="fuenteInfoPersonal_tipoFechaId"onclick="fechaInicialCasosInfoP(value)" onkeyup="fechaInicialCasosActos(value)">
										<option <?=((isset($fuenteInfoPersonal['tipoFechaId'])) && ($fuenteInfoPersonal['tipoFechaId']==1) ) ? 'selected="selected"' : "" ;?> value="1" >fecha exacta</option>
										<option <?=((isset($fuenteInfoPersonal['tipoFechaId'])) && ($fuenteInfoPersonal['tipoFechaId']==2) ) ? 'selected="selected"' : "" ;?> value="2">fecha aproximada</option>
										<option <?=((isset($fuenteInfoPersonal['tipoFechaId'])) && ($fuenteInfoPersonal['tipoFechaId']==3) ) ? 'selected="selected"' : "" ;?> value="3">Se desconce el día</option>
										<option <?=((isset($fuenteInfoPersonal['tipoFechaId'])) && ($fuenteInfoPersonal['tipoFechaId']==4) ) ? 'selected="selected"' : "" ;?> value="4">Se desconce el día y el mes</option>
							</select>
					</div>
		
					<div class="six columns">
						<br />
						<p  id="fechaExactaVAct" <?=(isset($fuenteInfoPersonal['fecha'])) ? '' : 'class="Escondido"' ;?> >
							<input type="text" id="fechaExactaAct" <?=(isset($fuenteInfoPersonal['fecha'])) ? 'name="fuenteInfoPersonal_fecha" value="'.$fuenteInfoPersonal['fecha'].'"' : " " ;?>  placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaAproxVAct">
							<input type="text" id="fechaAproxAct"   placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaSinDiaVAct">
							<input type="text" id="fechaSinDiaAct"   placeholder="AAAA-MM-00" />

						</p >

						<p class="Escondido" id="fechaSinDiaSinMesVAct">
							<input type="text" id="fechaSinDiaSinMesAct"  placeholder="AAAA-00-00" />

						</p>
					</div>
				</div> <!---termina opciones de fechaInicial-->
				
				<div class="twelve columns">	
					
					<div class="six columns">
						<label for="nivelConfiabilidad">Nivel de confiabilidad</label>
						<select id="nivelConfiabilidadCatalogo_nivelConfiabilidadCatalogo_nivelConfiabilidadId" onkeyup="notasCatalogos('1',value+'NCon','nivelConfiabilidadCatalogo','2')" name="fuenteInfoPersonal_nivelConfiabilidadCatalogo_nivelConfiabilidadId">
							<option></option>						
							<?php if(isset($fuenteInfoPersonal['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
		                                foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                                    <option id="<?=$item['nivelConfiabilidadId'];?>NCon" name="<?=$item['notas']; ?>" onclick="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" onkeyup="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" <?=($fuenteInfoPersonal['nivelConfiabilidadCatalogo_nivelConfiabilidadId'] == $item['nivelConfiabilidadId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
		                                <?php endforeach;
		                            } else { ?>
		                                <?php foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
		                                    <option id="<?=$item['nivelConfiabilidadId'];?>NCon" name='<?=$item['notas']; ?>' onclick="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" onkeyup="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" > <?=$item['descripcion']?></option>
		                                <?php endforeach; } 
		                      ?>
						</select>
						<div id="notasnivelConfiabilidadCatalogo"></div>
					</div>
				</div>
				
				<div class="twelve columns">
					<label for="comentFuente">Observaciones</label>
					<textarea id="fuenteInfoPersonal_observaciones"  name="fuenteInfoPersonal_observaciones" ><?=(isset($fuenteInfoPersonal['observaciones']) ? $fuenteInfoPersonal['observaciones'] : ''); ?></textarea>
				</div>
				<div class="twelve columns">
					<label for="comentFuente">Comentarios</label>
					<textarea id="fuenteInfoPersonal_comentarios" name="fuenteInfoPersonal_comentarios"><?=(isset($fuenteInfoPersonal['comentarios']) ? $fuenteInfoPersonal['comentarios'] : ''); ?></textarea>
				</div>


			<fieldset>
				<legend class="espacioInferior">Actor reportado</legend>
					<input type="radio" onclick="pintaIndividualesInfoPersonalReportado()" name="selecionaActorReportado" <?= (isset($fuenteInfoPersonal['actorReportado']) && ($fuenteInfoPersonal['actorReportado']>0 )&& ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['tipoActorId']< 3)) ? "checked='checked'" : " " ;?> />Persona
					<input type="radio"	onclick="pintaColectivosInfoPersonalReportado()" name="selecionaActorReportado" <?= (isset($fuenteInfoPersonal['actorReportado'])&& ($fuenteInfoPersonal['actorReportado']>0 ) && ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['tipoActorId']== 3)) ? "checked='checked'" : " " ;?>/>Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />

					<div class="twelve columns espacioSuperior" id="infoPersonalActorReportado">
						<?php if (isset($fuenteInfoPersonal['actorReportado']) && ($fuenteInfoPersonal['actorReportado']>0)) {?>
						<div class="three columns"><img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['foto']?>" /></div><b><h4><?= (isset($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['nombre'])) ? $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['nombre'] : " " ; ?>  <?= (isset($fuenteInfoPersonal['actorReportado'])) ? $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['apellidosSiglas'] :  '' ;?></h4></b>
						<?php } else { ?>
						<input class="tiny button" type="button" onclick="seleccionarActorseleccionarColDatos('1')" value="Seleccionar actor">
						<?php } ?>
					</div>
					<div class="twelve columns espacioSuperior" id="infoPersonalActorReportadoBotones">
						<?php if (isset($fuenteInfoPersonal['actorReportado']) && ($fuenteInfoPersonal['actorReportado']>0) && ($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorReportado']]['tipoActorId']< 3)) {?>
							<input class="tiny button" type="button" onclick="seleccionarActorseleccionarActorIndColDatos('7')" value="Seleccionar actor">
							<input class="tiny button" type="button" onclick="eliminarRelacionVista('infoPersonalActorReportado','fuenteInfoPersonal_actorReportado','infoColectioContenidoReportado','fuenteInfoPersonal_tipoRelacionActorReportadoId')" value="Eliminar Actor">
						<?php }?>
					</div>
												
					<div class="twelve columns espacioSuperior" id="infoColectioReportado" <?=(isset($fuenteInfoPersonal['tipoRelacionActorReportadoId']) && ($fuenteInfoPersonal['tipoRelacionActorReportadoId'] > 0)) ? " " : 'class="Escondido"' ;?> >
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div>
									<div id="infoColectioContenidoReportado" >
										<?php if (isset($fuenteInfoPersonal['tipoRelacionActorReportadoId']) &&($fuenteInfoPersonal['tipoRelacionActorReportadoId'] > 0)) { ?>
											<div class="three columns">
												<img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['foto']?>" />
											</div>
											<b><h4><?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['nombre'] : " " ; ?>  <?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['apellidosSiglas'] :  '' ;?></h4></b>
										<?php } ?>
									<h5>Tipo de relacion</h5>
										<?=(isset($fuenteInfoPersonal['tipoRelacionActorReportadoId'])&&($fuenteInfoPersonal['tipoRelacionActorReportadoId'] > 0)) ? $catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['tipoRelacionActorReportadoId']]['tipoRelacionId']]['Nivel2']	 : " " ; ?></h5> <br> 

									</div>

									<div id="infoColectioContenidoReportadoBotones" >
										<?php if (isset($fuenteInfoPersonal['tipoRelacionActorReportadoId'])&& ($fuenteInfoPersonal['tipoRelacionActorReportadoId']>0)) { ?>
											<input type="button" value="Eliminar" onclick="eliminarRelacionVista('infoColectioContenidoReportado','fuenteInfoPersonal_actorId')" class="tiny button">	
											<input type="button" class="tiny button" value="Selecciona relación" onclick="ventanaColectivoRelacionados('<?= $fuenteInfoPersonal['actorReportado'] ?>', '5')">
										<?php } ?>
									</div>
								</div>
						</div>
					</div>
			</div>
			</fieldset>
			<input style="padding: 10px 40px 10px 40px;margin-left: 15px;" class="medium button" type="submit" value="Guardar"/>
			<input style="padding: 10px 0px 10px 0px" class="medium button" value="Cancelar" onclick="cerrarVentana()" />
		</form>
	</body>
</html>
