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

 
	<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/6' method="post" accept-charset="utf-8">
	<input type="hidden" id="editar"  name="editar" value="<?= (isset($fuenteDocumental)) ? "1" : "0" ;?>"/>

	<input type="hidden" id='casos_casoId' name='casos_casoId'	value="<?= $casoId ?>"/>

	<input type="hidden" id='casoId' name='casoId'	value="<?= $casoId ?>"/>

	<input type="hidden" id='tipoFuenteDocumental_casos_casoId' name='tipoFuenteDocumental_casos_casoId' value="<?= $casoId ?>"/>
	
	<input type="hidden" id='nameSeleccionado' value="tipoFuenteDocumental_actorReportado"/>
	<input type="hidden" id='tipoFuenteDocumental_actorReportado' name='tipoFuenteDocumental_actorReportado' value="<?= (isset($fuenteDocumental['actorReportado'])) ? $fuenteDocumental['actorReportado'] : " " ; ?>"/>
	
	<input type="hidden" id='tipoFuenteDocumental_tipoFuenteDocumentalId' name='tipoFuenteDocumental_tipoFuenteDocumentalId' value="<?= (isset($fuenteDocumental['tipoFuenteDocumentalId'])) ? $fuenteDocumental['tipoFuenteDocumentalId'] : " " ; ?>"/>

	<input type="hidden" id='tipoFuenteDocumental_tipoFuenteDocumentalCatalogoNivel' name='tipoFuenteDocumental_tipoFuenteDocumentalCatalogoNivel' value="<?= (isset($fuenteDocumental['tipoFuenteDocumentalCatalogoNivel'])) ? $fuenteDocumental['tipoFuenteDocumentalCatalogoNivel'] : " " ; ?>"/>

	<input type="hidden" id='tipoFuenteDocumental_tipoFuenteDocumentalCatalogoId' name='tipoFuenteDocumental_tipoFuenteDocumentalCatalogoId' value="<?= (isset($fuenteDocumental['tipoFuenteDocumentalCatalogoId'])) ? $fuenteDocumental['tipoFuenteDocumentalCatalogoId'] : " " ; ?>"/>
	
	<input type="hidden" id='nameDeLaRelacion' value="tipoFuenteDocumental_relacionId"/>
	<input type="hidden" id='tipoFuenteDocumental_relacionId' name='tipoFuenteDocumental_relacionId' value="<?= (isset($fuenteDocumental['relacionId'])) ? $fuenteDocumental['relacionId'] : " " ; ?>"/>

		<?php if (isset($fuenteDocumental['actorReportado'])&&($fuenteDocumental['actorReportado']>0)) {
			foreach ($fuenteDocumental['casosActor'] as $casoActor) {
			if ($casoId== $casoActor['casos_casoId'] ) {
			
				echo '<input type="hidden"  id="casoActorIdInterventor" name="casoActorIdActorReportado" value="'.$casoActor['casoActorId'].'">';
			}else

				echo '<input type="hidden"  id="casoActorIdInterventor" name="casoActorIdActorReportado" value="0">';
		}
		}
		?>

		<!-----------------Comienza la parte de Fuente documental- ---------------------->
		<div id="formularioFuenteDocumental" class="twelve columns">
			<div id="pestania" data-collapse>
			<h2 class="open">Fuente documental</h2><!--título de la sub-pestaña-->  
			<div>
			
				<fieldset>
					  <legend>Fuente documental</legend>
						<div class="twelve columns espacioSuperior">
							<div class="twelve columns">		
								<label for="nombreFuente ">Nombre de la fuente</label>
								<textarea id="infoAdicional_nombreFuente" name="tipoFuenteDocumental_nombre"><?=(isset($fuenteDocumental['nombre']) ? $fuenteDocumental['nombre'] : ''); ?></textarea>
							</div>
							
							<div class="twelve columns">
								<label for="tipoRespuesta">Información adicional</label>
								<textarea id="infoAdicional_infoAdicionalFuenteDocumental" name="tipoFuenteDocumental_infoAdicional" ><?=(isset($fuenteDocumental['infoAdicional']) ? $fuenteDocumental['infoAdicional'] : ''); ?></textarea>
							</div>
							<div class="twelve columns espacioSuperior espacioInferior">
								<label for="tipoFuente"><b>Tipo de la fuente</b></label>
								<div id='textoTipoFuente'>
									<?= (isset($fuenteDocumental['tipoFuenteDocumentalCatalogoId']) && isset($fuenteDocumental['tipoFuenteDocumentalCatalogoNivel']) && ($fuenteDocumental['tipoFuenteDocumentalCatalogoId']>0)) ? $catalogos['tipoFuenteDocumentalN'.$fuenteDocumental['tipoFuenteDocumentalCatalogoNivel'].'Catalogo'][$fuenteDocumental['tipoFuenteDocumentalCatalogoId']]['descripcion'] : " " ; ?>
								</div>
								<label for="tipoFuente"><b>Notas</b></label>
								<div id="notasTipoFuente">
									<?= (isset($fuenteDocumental['tipoFuenteDocumentalCatalogoId']) && isset($fuenteDocumental['tipoFuenteDocumentalCatalogoNivel'])&& ($fuenteDocumental['tipoFuenteDocumentalCatalogoId']>0)) ? $catalogos['tipoFuenteDocumentalN'.$fuenteDocumental['tipoFuenteDocumentalCatalogoNivel'].'Catalogo'][$fuenteDocumental['tipoFuenteDocumentalCatalogoId']]['notas'] : " " ; ?>
								</div>

				         					<div  id="listaActorIndiv" class="cajaDerchosActos">
				                            	<ol>
				                                <?php foreach($catalogos['tipoFuenteDocumentalN1Catalogo'] as $nivel1):?> <!--muestra los estados civiles-->
				                                    <li >
				                                    	<div class="ExpanderFlecha flecha hand" value="subnivel" onclick="Nivel1TipoFuete('<?=$nivel1['tipoFuenteDocumentalN1CatalogoId']?>','<?=$nivel1['descripcion'];?>','<?=$nivel1['notas'];?>',this)" >
				                                    	<?=$nivel1['descripcion']?>
				                                    	</div>
				                                    		<ol id="subnivel<?=$nivel1['tipoFuenteDocumentalN1CatalogoId']?>" class="Escondido">
				                                    			<?php foreach ($catalogos['tipoFuenteDocumentalN2Catalogo'] as $nivel2) { 
				                                    				if ($nivel1['tipoFuenteDocumentalN1CatalogoId'] == $nivel2['tipoFuenteDocumentalN1Catalogo_tipoFuenteDocumentalN1CatalogoId']) { ?>
				                                    					<li class="listaNivel2" onclick="Nivel2TipoFuete('<?=$nivel2['tipoFuenteDocumentalN2CatalogoId']?>','<?=$nivel2['descripcion'];?>','<?=$nivel2['notas'];?>',this)"   >
				                                    						<?=$nivel2['descripcion']?>
				                                    					</li>
				                                    			<?php }
				                                    		}?>
				                                    		</ol>
				                                    </li>
				                                <?php endforeach; ?>
				                                </ol>
											</div>
							</div>
							

							<div class="six columns">
										<label for="nivelConfiabilidad">Nivel de confiabilidad</label>
										<select  onkeyup="notasCatalogos('1',value+'NCon','nivelConfiabilidadCatalogo','2')"  id="nivelConfiabilidadCatalogo_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="tipoFuenteDocumental_nivelConfiabilidadCatalogo_nivelConfiabilidadId">
											<option></option>						
											<?php if(isset($fuenteDocumental['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
						                                foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
						                                    <option id="<?=$item['nivelConfiabilidadId'];?>NCon" name="<?=$item['notas']; ?>" onkeyup="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" onclick="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" <?=($fuenteDocumental['nivelConfiabilidadCatalogo_nivelConfiabilidadId'] == $item['nivelConfiabilidadId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
						                                <?php endforeach;
						                            } else { ?>
						                                <?php foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
						                                    <option id="<?=$item['nivelConfiabilidadId'];?>NCon" name="<?=$item['notas']; ?>" onkeyup="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" onclick="notasCatalogos2('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" > <?=$item['descripcion']?></option>
						                                <?php endforeach; } 
						                      ?>
										</select>
										<div id="notasnivelConfiabilidadCatalogo"></div>
							</div>
							
							
							<div class="six columns espacioSuperior">									
								<label for="FechaPubli">Fecha de publicación</label>
				                <input type="text"  id="fechaPubli" name="tipoFuenteDocumental_fecha" <?=(isset($fuenteDocumental['fecha']) ? 'value="'.$fuenteDocumental['fecha'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />
							</div>
							<div class="six columns espacioSuperior">
								<label for="FechaAcce">Fecha de acceso</label>
								<input type="text" id="fechaAcceso" name="tipoFuenteDocumental_fechaAcceso" <?=(isset($fuenteDocumental['fechaAcceso']) ? 'value="'.$fuenteDocumental['fechaAcceso'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />	
							</div>	
									
							<div  class="twelve columns">	
								<label for="fuenteLiga">Liga</label>
								<textarea id="infoAdicional_url"  name="tipoFuenteDocumental_url" ><?=(isset($fuenteDocumental['url']) ? $fuenteDocumental['url'] : ''); ?></textarea>
							</div>		
								
							
							<div class="twelve columns">
								<label for="comentFuente">Comentarios</label>
								<textarea id="tipoFuenteDocumental_comentarios" name="tipoFuenteDocumental_comentarios"><?=(isset($fuenteDocumental['comentarios']) ? $fuenteDocumental['comentarios'] : ''); ?></textarea>
							</div>
							
							
							<div class="twelve columns">
								<label for="comentFuente">Observaciones</label>
								<textarea id="tipoFuenteDocumental_observaciones"  name="tipoFuenteDocumental_observaciones" ><?=(isset($fuenteDocumental['observaciones']) ? $fuenteDocumental['observaciones'] : ''); ?></textarea>
							</div>
							
							
						<div class="twelve columns">
			<fieldset>
				<legend class="espacioInferior">Actor reportado</legend>
					<input type="radio" onclick="pintaIndividualesInfoDocumental()" name="selecionaActor" <?= (isset($fuenteDocumental['actorReportado'])&& ($fuenteDocumental['actorReportado']>0) && ($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['tipoActorId']< 3)) ? "checked='checked'" : " " ;?>/>Persona
					<input type="radio"	onclick="pintaColectivosInfoDocumental()" name="selecionaActor"<?= (isset($fuenteDocumental['actorReportado'])&& ($fuenteDocumental['actorReportado']>0) && ($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['tipoActorId']== 3)) ? "checked='checked'" : " " ;?> />Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />


					<div class="twelve columns espacioSuperior" id="actorReportado">
						<?php if (isset($fuenteDocumental['actorReportado']) && ($fuenteDocumental['actorReportado']>0)) {?>
						<div class="three columns">
							<img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['foto']?>" />
						</div>
						<b>
							<h4><?= (isset($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['nombre'])) ? $catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['nombre'] : " " ; ?>  <?= (isset($fuenteDocumental['actorReportado'])) ? $catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['apellidosSiglas'] :  '' ;?></h4>
						</b>
						<?php }?>
					</div>

					<div class="twelve columns espacioSuperior" id="actorReportadoBotones">
							<div class="nine columns">
								<?php if (isset($fuenteDocumental['actorReportado']) &&($fuenteDocumental['actorReportado']>0)&& ($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['tipoActorId']< 3)) {?>
									<input class="tiny button" type="button" onclick="seleccionarActorseleccionarActorIndColDatos('6')" value="Seleccionar actor">
								<?php } else { ?>
								<input class="tiny button" type="button" onclick="seleccionarActorseleccionarColDatos('4')" value="Seleccionar actor">
								<?php } ?>
							</div>
							<div id="eliminarVistaActor" class="three columns">
								<?php if (isset($fuenteDocumental['actorReportado']) && ($fuenteDocumental['actorReportado']>0)) {?>
									<input class="tiny button" type="button" onclick="eliminarRelacionVista('actorReportado','tipoFuenteDocumental_actorReportado','infoColectio','fuenteDocumental_relacionId')" value="Eliminar Actor">
								<?php }?>
							</div>
					</div>
												
					<div class="twelve columns espacioSuperior" id="infoColectio" <?= (isset($fuenteDocumental)) ? "" : 'class="Escondido"' ;?>>
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div>
									<div id="infoColectioContenido" >
									<?php if (isset($fuenteDocumental['relacionId']) &&($fuenteDocumental['relacionId'] > 0)) { ?>
										<div class="three columns">
											<img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['foto']?>" />
										</div>
										<b><h4><?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['nombre'] : " " ; ?>  <?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['apellidosSiglas'] :  '' ;?></h4></b>
										<?php } ?>
									</div>
									<div id="infoColectioContenidoBotones" >
										<?php if (isset($fuenteDocumental['actorReportado']) &&($fuenteDocumental['actorReportado'] > 0)) { ?>
											<input class="tiny button" type="button" onclick="ventanaColectivoRelacionados('<?= $catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['actorId'] ?>','3')" value="Seleccionar relación">
											<input class="tiny button" type="button" onclick="eliminarRelacionVista('infoColectioContenido','fuenteDocumental_relacionId')" value="Eliminar relación">
										<?php } ?>
									</div>
								</div>
						</div>
					</div>
			</fieldset>


						</div>
						
							
					
						
						</div>
						

						</div>										
										
				</fieldset>
			</div>

			</div>
			
		<input style="padding: 9px 40px 9px 40px !important;margin-left: 15px;" class="medium button" type="submit" value="Guardar" />
		<input style="padding: 9px 0px 9px 0px !important" class="medium button" value="Cancelar" onclick="cerrarVentana()" />		
		</div>
		<!-----------------termina la parte de Fuente documental------------------------>

	</form>
	</body>
</html>

