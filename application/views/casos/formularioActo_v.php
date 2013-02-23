<!-------------------Comienza la parte de Derechos afectado------------------------------------>
<html>

	<head>
	<?=$head?>
	</head>
	
<body><!-- 
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

 
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/3' method="post" accept-charset="utf-8" id="menuForm" name="menuForm">
<!-------------------------Comienza la parte de Acto---------------------------->
<div id="formularioCasoActo">
	
	<div id="pestania" data-collapse>
		<h2 class="open" >Acto</h2><!--título de la sub-pestaña---->  
		<div>	
			<fieldset>
				  <legend>Información general</legend>
				<input type="hidden" name="editar" id="editar" value="<?= (isset($derechoAfectado['derechoAfectadoCasoId'])) ? '1' : '0' ; ?>"/>
                <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
                <input type="hidden" value="<?php if(isset($acto)) echo $acto['actoId']?>" name="actos_actoId" id="actos_actoId" />
                <input type="hidden" value="<?php if(isset($derechoAfectado)) echo $derechoAfectado['derechoAfectadoCasoId']?>" name="derechoAfectado_derechoAfectadoCasoId" id="derechoAfectado_derechoAfectadoCasoId" />
                <input type="hidden" value="5" name="5" id="tipoActorAE" />
				<?php if (isset($derechoAfectado['derechoAfectadoCasoId'])) { 
						$botonVictimas=1;
				 } ?>
                	<?php if(isset($derechoAfectado['derechoAfectadoNivel'])):?>
                		<?php foreach($derechosAfectados['derechosAfectadosN'.$derechoAfectado['derechoAfectadoNivel'].'Catalogos'] as $derecho){
                			if($derecho['derechoAfectadoN'.$derechoAfectado['derechoAfectadoNivel'].'Id']==$derechoAfectado['derechoAfectadoId']){
                				 echo '<label for="derecho">Derecho afectado</label>
			                        <div id="textoDerechoAfectado">'.$derecho['descripcion'].'</div>
			                        <label for="derecho">Notas</label>
			                        <div id="notasDerechoAfectado">'.$derecho['notas'].'</div>
			                        <input type="hidden" value="'.$derechoAfectado['derechoAfectadoId'].'" name="derechoAfectado_derechoAfectadoId" id="derechoAfectado" />
                					<input type="hidden" value="'.$derechoAfectado['derechoAfectadoNivel'].'" name="derechoAfectado_derechoAfectadoNivel" id="derechoAfectadoNivel" />
                			    ';
							}
							
                		} ?>
                   <?php else:?>
                   	<input type="hidden" value="" name="derechoAfectado_derechoAfectadoId" id="derechoAfectado" />
               		 <input type="hidden" value="" name="derechoAfectado_derechoAfectadoNivel" id="derechoAfectadoNivel" />
               		  <label for="derecho">Derecho afectado</label>
			         <div id="textoDerechoAfectado"></div>
			         <label for="derecho">Notas</label>
			         <div id="notasDerechoAfectado"></div>
                   <?php endif;?>
                        <br /><br />
				         <div  id="listaActorIndiv" class="cajaDerchosActos">
	                        <ul>
								<?php foreach($derechosAfectados['derechosAfectadosN1Catalogos'] as $derechoAfectado):?> 
									<li  class="listas" >
										<div class="ExpanderFlecha flecha hand" value="subnivel" onclick="nombrederechoAfectado('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectado['descripcion'];?>','<?=$derechoAfectado['notas'];?>',this)" onkeyup="nombrederechoAfectado('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectado['descripcion'];?>','<?=$derechoAfectado['notas'];?>',this)">
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
													<div class="<?php if(isset($expander)) echo $expander;?>" value="<?php if(isset($sub)) echo $sub;?>" onclick="nombrederechoAfectadosub1('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN2['descripcion'];?>','<?=$derechoAfectadoN2['notas'];?>')" onkeyup="nombrederechoAfectadosub1('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN2['descripcion'];?>','<?=$derechoAfectadoN2['notas'];?>')">
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
																	<div class="<?php if(isset($expander)) echo $expander;?>" value="<?php if(isset($sub)) echo $sub;?>" onclick="nombrederechoAfectadosub2('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN3['descripcion'];?>','<?=$derechoAfectadoN3['notas'];?>')" onkeyup="nombrederechoAfectadosub2('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN3['descripcion'];?>','<?=$derechoAfectadoN3['notas'];?>')">
																		<?php echo $derechoAfectadoN3['descripcion'];?>
																	</div>
																	<?php $expander='';
																		$sub = ''; ?>
																		<ul class="Escondido" id="<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>DAN3" >
															
																			<?php foreach($derechosAfectados['derechosAfectadosN4Catalogos'] as $derechoAfectadoN4):?>
																				<?php if($derechoAfectadoN4['derechosAfectadosN3Catalogo_derechoAfectadoN3Id'] == $derechoAfectadoN3['derechoAfectadoN3Id']):?>
																					<li  class="listas" >
																						<div  onclick="nombrederechoAfectadosub3('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN4['derechoAfectadoN4Id'];?>','<?=$derechoAfectadoN4['descripcion'];?>','<?=$derechoAfectadoN4['notas'];?>')" onkeyup="nombrederechoAfectadosub3('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN4['derechoAfectadoN4Id'];?>','<?=$derechoAfectadoN4['descripcion'];?>','<?=$derechoAfectadoN4['notas'];?>')">
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
                        <br /><br />
                        <?php if(isset($acto['actoViolatorioNivel'])):?>
                			<?php foreach($actos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catalogo){
                				if($acto['actoViolatorioNivel']==1){
                					if($catalogo['actoId']==$acto['actoViolatorioId']){
		                				 echo '<label for="Acto">Acto</label>
					                        <div id="textoDerechoAfectadoN2">'.$catalogo['descripcion'].'</div>
					                        <label for="Acto">Notas Acto</label>
					                        <div id="notasActoId">'.$catalogo['notas'].'</div>
					                        <input type="hidden" value="'.$acto['actoViolatorioId'].'" name="actos_actoViolatorioId" id="actos_actoViolatorioId" />
		                					<input type="hidden" value="'.$acto['actoViolatorioNivel'].'" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
		                			    ';
									}
                				}else{
                					if($catalogo['actoN'.$acto['actoViolatorioNivel'].'Id']==$acto['actoViolatorioId']){
		                				 echo '<label for="Acto">Acto</label>
					                        <div id="textoDerechoAfectadoN2">'.$catalogo['descripcion'].'</div>
					                        <label for="Acto">Notas Acto</label>
					                        <div id="notasActoId">'.$catalogo['notas'].'</div>
					                        <input type="hidden" value="'.$acto['actoViolatorioId'].'" name="actos_actoViolatorioId" id="actos_actoViolatorioId" />
		                					<input type="hidden" value="'.$acto['actoViolatorioNivel'].'" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
		                			    ';
									}
                				}
	                			
								
	                		} ?>
	                   <?php else:?>
		               		 <input type="hidden" value="" name="actos_actoViolatorioId" id="actoViolatorioId" />
		                    <input type="hidden" value="" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
		                   	<label for="Acto">Acto</label>
	                        <div id="textoDerechoAfectadoN2"></div>
	                        <label for="Acto">Notas Acto</label>
	                        <div id="notasActoId"></div>
	                   <?php endif;?>
                        
                        
				        	 <br /><br />
							<div  id="listaActos" class="cajaDerchosActos">	
				                       
							</div>
							<br /><br />
			
		            <div class="twelve columns">
							<div class="six columns">
								<label for="edad">Fecha de inicio</label>
									<select name="derechoAfectado_tipoFechaInicialId"onclick="fechaInicialCasosActos(value)" onkeyup="fechaInicialCasosActos(value)">
												<option></option>
												<option  value="1" <?=(isset($derechoAfectado2['tipoFechaInicialId']) &&($derechoAfectado2['tipoFechaInicialId']==1)) ? 'selected="selected"' : " " ; ?>  >fecha exacta</option>
												<option  value="2" <?=(isset($derechoAfectado2['tipoFechaInicialId']) &&($derechoAfectado2['tipoFechaInicialId']==2)) ? 'selected="selected"' : " " ; ?> >fecha aproximada</option>
												<option  value="3" <?=(isset($derechoAfectado2['tipoFechaInicialId']) &&($derechoAfectado2['tipoFechaInicialId']==3)) ? 'selected="selected"' : " " ; ?> >Se desconce el día</option>
												<option  value="4" <?=(isset($derechoAfectado2['tipoFechaInicialId']) &&($derechoAfectado2['tipoFechaInicialId']==4)) ? 'selected="selected"' : " " ; ?> >Se desconce el día y el mes</option>
									</select>
								</div>
								
							<div class="six columns">
								<br />
								<p class="<?=(isset($derechoAfectado2['fechaInicial']))  ? " " : 'Escondido';?>" id="fechaExactaVAct">
									<input type="text" id="fechaExactaAct"  value="<?php if(isset($derechoAfectado2['fechaInicial'])) echo $derechoAfectado2['fechaInicial'];?>" placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaAproxVAct">
									<input type="text" id="fechaAproxAct" placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaSinDiaVAct">
									<input type="text" id="fechaSinDiaAct"  placeholder="AAAA-MM-00" />

								</p >

								<p class="Escondido" id="fechaSinDiaSinMesVAct">
									<input type="text" id="fechaSinDiaSinMesAct" placeholder="AAAA-00-00" />

								</p>
							</div>
						</div> <!---termina opciones de fechaInicial-->

					<div class="twelve columns">
							<label for="edad">Fecha de término</label>
						<div class="six columns">
							<select name="derechoAfectado_tipoFechaTerminoId" onclick="fechaTerminalCasosActos(value)">
										<option></option>
										<option  value="1" <?=(isset($derechoAfectado2['tipoFechaTerminoId']) &&($derechoAfectado2['tipoFechaTerminoId']==1)) ? 'selected="selected"' : " " ; ?>  >fecha exacta</option>
										<option  value="2" <?=(isset($derechoAfectado2['tipoFechaTerminoId']) &&($derechoAfectado2['tipoFechaTerminoId']==2)) ? 'selected="selected"' : " " ; ?> >fecha aproximada</option>
										<option  value="3" <?=(isset($derechoAfectado2['tipoFechaTerminoId']) &&($derechoAfectado2['tipoFechaTerminoId']==3)) ? 'selected="selected"' : " " ; ?> >Se desconce el día</option>
										<option  value="4" <?=(isset($derechoAfectado2['tipoFechaTerminoId']) &&($derechoAfectado2['tipoFechaTerminoId']==4)) ? 'selected="selected"' : " " ; ?> >Se desconce el día y el mes</option>
							</select>
						</div>
						<div class="six columns">
							<p class="<?php if(isset($derechoAfectado2['fechaTermino'])) echo ''; else echo 'Escondido';?>" id="fechaExactaVAct2">
								<input type="text" id="fechaExactaAct2"  value="<?php if(isset($derechoAfectado2['fechaTermino'])) echo $derechoAfectado2['fechaTermino'];?>"  placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaAproxVAct2">
								<input type="text" id="fechaAproxAct2"   placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaSinDiaVAct2">
								<input type="text" id="fechaSinDiaAct2"  placeholder="AAAA-MM-00" />

							</p >

							<p class="Escondido" id="fechaSinDiaSinMesVAct2">
								<input type="text" id="fechaSinDiaSinMesAct2"  placeholder="AAAA-00-00" />

							</p>
						</div>
					</div> <!---termina opciones de fechaTermino-->
				<?php echo br(1);?>	
			</fieldset>
			<?php echo br(2);?>	
			
			
			<fieldset>
				  <legend>Personas afectadas y lugar</legend>
					<div class="six columns">

							<label for="personas">Personas afectadas:</label>
							<input type="number"  name="derechoAfectado_noVictimas" placeholder="0" value="<?php if(isset($victimas)) echo $victimas;?>"/>


					</div>
				  
					<div class="six columns">
						<?=$filtroPais;?>
					</div>
				  
			</fieldset>
			<br/>
			<?php if (isset($botonVictimas)) { ?>
				<input class="medium button" type="button" value="Agregar víctima" onclick="ventanaVictimas('<?=$acto['actoId'];?>','<?=$casoId; ?>',0,0)"/>
			<?php } ?>
			<br/>
			<br/>
			<input class="medium button" type="submit" value="Guardar" style="padding: 10px 15px 11px 15px; "/>
			<input class="medium button" type="button" value="Cancelar" onclick="cerrarVentana()" />
			<?php if (isset($botonVictimas)) { ?>
			<input class="medium button" type="button" value="Cerrar" onclick="cerrarVentanaActualizar()"/>
			<?php } ?>
		</div>
	</div><!--fin acordeon información general-->
</div>
<!-----------------------Termina la parte de Acto------------------------------>
</form>
</body>
</html>

