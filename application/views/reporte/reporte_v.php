<div id="mensaje"></div>

<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/reporteExcel_c/generaExcel' accept-charset="utf-8">
	<fieldset style="padding:10px;">
	<div class="twelve columns">
		<label for="nombre">Nombre del caso</label>
		<input type="text" id="nombreCaso" name="nombreCaso"  required />
		<input type="hidden" id="tipoFiltro" name="tipoFiltro" value="1"/>
	</div>	
	<input class="medium button" type="submit" value="Guardar" id="botonNombre" disabled="disabled" style="margin-left:15px; background: #E32500 !important;"/>
	<input onclick="limpiarReporte()" class="medium button" type="button" value="Limpiar" id="botonNombre" style="margin-left:15px; background: #E32500 !important; padding:8px 15px 8px 15px !important;"/>

	<br /></fieldset><br />

</form>

<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/reporteExcel_c/generaExcel' accept-charset="utf-8">
		<fieldset style="padding:10px;">
	<input type="hidden" id="tipoFiltro" name="tipoFiltro" value="2"/>
	<div class="twelve columns">
	<div class="six columns">
		<label for="fechaInicia">Desde la fecha</label>
		<input style="margin-left:-15px;" type="text" id="fechaInicial" name="fechaInicial" placeholder="AAAA-MM-DD" required />
	</div>		
	<div class="six columns">
		<label for="fechaTermina">Hasta la fecha</label>
		<input type="text" id="fechaTermino" name="fechaTermino" placeholder="AAAA-MM-DD" required />
	</div>
	</div>
		<input class="medium button" type="submit" value="Guardar"  id="botonFecha"  disabled="disabled" style="margin-left:15px; background: #E32500 !important;"/>
		<input onclick="limpiarReporte()" class="medium button" type="button" value="Limpiar" id="botonNombre" style="margin-left:15px; background: #E32500 !important; padding:8px 15px 8px 15px !important;"/>

	<br /></fieldset><br />

</form>

<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/reporteExcel_c/generaExcel' accept-charset="utf-8">
<fieldset style="padding:10px;">
	<input type="hidden" id="tipoFiltro" name="tipoFiltro" value="3"/>
	<legend>   </legend>
	<label for="derecho">Derecho afectado</label>
	<div id="textoDerechoAfectado"></div>

	<label for="derecho">Notas</label>
	<div id="notasDerechoAfectado"></div>
	<br /><br />
	<input type="hidden" value="" name="derechoAfectadoId" id="derechoAfectado" />
    <input type="hidden" value="" name="derechoAfectadoNivel" id="derechoAfectadoNivel" />
	 <div  id="listaActorIndiv" class="cajaDerchosActos">
	                        <ul>
								<?php foreach($derechosAfectados['derechosAfectadosN1Catalogos'] as $derechoAfectado):?> 
									<li  class="listas" >
										<div class="ExpanderFlecha flecha hand" value="subnivel" onclick="nombrederechoAfectado('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectado['descripcion'];?>','<?=$derechoAfectado['notas'];?>',this)" >
											<?php echo $derechoAfectado['descripcion'];?>
										</div>
										<ul class="Escondido" id="<?=$derechoAfectado['derechoAfectadoN1Id'];?>DAN1" >
										
										<?php foreach($derechosAfectados['derechosAfectadosN2Catalogos'] as $derechoAfectadoN2):?>
											<?php if($derechoAfectadoN2['derechosAfectadosN1Catalogo_derechoAfectadoN1Id'] == $derechoAfectado['derechoAfectadoN1Id']):?>
												<?php foreach($catalogos['derechosAfectadosN3Catalogo'] as $c1){
														if($c1['derechosAfectadosN2Catalogo_derechoAfectadoN2Id']==$derechoAfectadoN2['derechoAfectadoN2Id']){
															$sub = 'subnivel';
															$expander = 'ExpanderFlecha flecha hand';
														}
													}?>
												
												<li  class="listas">
													<div class="<?php if(isset($expander)) echo $expander;?>" value="<?php if(isset($sub)) echo $sub;?>" onclick="nombrederechoAfectadosub1('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN2['descripcion'];?>','<?=$derechoAfectadoN2['notas'];?>')">
														<?php echo $derechoAfectadoN2['descripcion'];?>
													</div>
													<?php $expander='';
														$sub = ''; ?>
				
													<ul class="Escondido"  id="<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>DAN2" >
										
														<?php foreach($derechosAfectados['derechosAfectadosN3Catalogos'] as $derechoAfectadoN3):?>
															<?php if($derechoAfectadoN3['derechosAfectadosN2Catalogo_derechoAfectadoN2Id'] == $derechoAfectadoN2['derechoAfectadoN2Id']):?>
																
																<?foreach($catalogos['derechosAfectadosN4Catalogo'] as $c2){
																		if($c2['derechosAfectadosN3Catalogo_derechoAfectadoN3Id']==$derechoAfectadoN3['derechoAfectadoN3Id']){
																			$sub = 'subnivel';
																			$expander = 'ExpanderFlecha flecha hand';
																		}
																	}?>
																
																<li  class="listas">
																	<div class="<?php if(isset($expander)) echo $expander;?>" value="<?php if(isset($sub)) echo $sub;?>" onclick="nombrederechoAfectadosub2('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN3['descripcion'];?>','<?=$derechoAfectadoN3['notas'];?>')">
																		<?php echo $derechoAfectadoN3['descripcion'];?>
																	</div>
																	<?php $expander='';
																		$sub = ''; ?>
																		<ul class="Escondido" id="<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>DAN3" >
															
																			<?php foreach($derechosAfectados['derechosAfectadosN4Catalogos'] as $derechoAfectadoN4):?>
																				<?php if($derechoAfectadoN4['derechosAfectadosN3Catalogo_derechoAfectadoN3Id'] == $derechoAfectadoN3['derechoAfectadoN3Id']):?>
																					<li  class="listas" >
																						<div  onclick="nombrederechoAfectadosub3('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN4['derechoAfectadoN4Id'];?>','<?=$derechoAfectadoN4['descripcion'];?>','<?=$derechoAfectadoN4['notas'];?>')">
																							<?php echo $derechoAfectadoN4['descripcion'];?>
																						</div>
																					</li>
																				<?php endif;?>
																			<?php endforeach;?>
																		</ul>
																	
																</li>
															<?php endif;?>
														<?php endforeach;?>
														</ul>

												</li>
											<?php endif;?>
										<?php endforeach;?>
										</ul>
									</li>
								<?php endforeach;?>
							</ul>
	  					</div>	
	
							<input type="hidden" value="" name="actoViolatorioId" id="actoViolatorioId" />
		                    <input type="hidden" value="" name="actoViolatorioNivel" id="actoViolatorioNivel" />
		                   	<label for="Acto">Acto</label>
	                        <div id="textoDerechoAfectadoN2"></div>
	                        <label for="Acto">Notas Acto</label>
	                        <div id="notasActoId"></div>
	            
				        	 <br /><br />
							<div  id="listaActos" class="cajaDerchosActos">	
				                       
							</div>
							<br /><br />
		<br />
	<input class="medium button" type="submit" value="Guardar"  id="botonDA" disabled="disabled" style="background: #E32500 !important;"/>
	<input onclick="limpiarReporte()" class="medium button" type="button" value="Limpiar" id="botonNombre" style="margin-left:15px; background: #E32500 !important; padding:8px 15px 8px 15px !important;"/>

<br /></fieldset><br />
</form>