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
	<h2 class="open">Casos</h2><!--título de la pestaña-->  
	<div>

	<?php if (isset($casosRelacionados) && ($casosRelacionados!=0)) {?>
	<?php foreach ($casosRelacionados as $datosCaso) {?>
		<div class="twelve columns" data-collapse>	
  
			<h2 class="twelve columns"><?=(isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] :  " " ; ?></h2><!--título de la pestaña-->  
				<div>
					<?php
					$victimas=array();
					$intervento=array();
					$perpetrador=array();
					$infoDoc=array();
					$infoPersonal=array();
					$receptor=array();
					?>
						<div id="casos_nombre">
					  		<p>Nombre:
				          	<span id="casos_nombre"><?=(isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] : ''; ?></span>
				          	</p>
					  	</div>
					  	<div id="casos_personasAfectadas">
					  		<p>Personas Afectadas:
				          	<span id="casos_pesonasAfectadas"><?=(isset($datosCaso['casos']['personasAfectadas'])) ? $datosCaso['casos']['personasAfectadas'] : ''; ?></span>
				          	</p>
					  	</div>
					  	<div id="casos_fechaInicial">
					  		<p>Fecha inicial:
				          	<span id="casos_fechaInicial"><?=(isset($datosCaso['casos']['fechaInicial'])) ? $datosCaso['casos']['fechaInicial'] : ''; ?></span>
				          	</p>
					  	</div>
					  	<div id="casos_fechaTermino">
					  		<p>Fecha término:
				          	<span id="casos_fechaInicial"><?=(isset($datosCaso['casos']['fechaInicial'])) ? $datosCaso['casos']['fechaInicial'] : ''; ?></span>
				          	</p>
			  			</div>
		
						<div id="subPestanias" data-collapse>					
							<h2>Lugares</h2><!--título de la pestaña-->  
								<div>
									<table>
										<thead>
										  <tr>
											<th>País</th>
											<th>Estado</th>
											<th>Municipio</th>
										</thead>
										<tbody>
							              <?php if(isset($datosCaso['lugares'])){ ?>
							              <?php foreach ($datosCaso['lugares'] as $lugar) {
							              	?><tr><?php	$indice = ($lugar['paisesCatalogo_paisId']) ?>
							              	<td><?=(isset($indice) && ($indice>0)) ? $catalogos['paisesCatalogo'][$indice]['nombre'] : " "  ; ?></td>
							              	<?php $indice = ($lugar['estadosCatalogo_estadoId']) ?>
							              	<td><?=(isset($indice) && ($indice>0)) ? $catalogos['estadosCatalogo'][$indice]['nombre'] : " " ; ?></td>
							              	<?php $indice = ($lugar['municipiosCatalogo_municipioId']) ?>
							              	<td><?=(isset($indice) && ($indice>0)) ? $catalogos['municipiosCatalogo'][$indice]['nombre'] : " " ; ?></td>
							              </tr><?php } ?><?php } ?>
							            </tbody>
									  </table>
								</div><!--fin acordeon lugares-->
						</div>
								

						<div id="subPestanias" data-collapse>	
							<h2 class="open" >Núcleo caso</h2><!--título de la pestaña-->  
								<div>
									<div id="subPestanias" data-collapse>
										<h2 class="open" >Derechos afectados y actos</h2>
										<div>
											<div>
												<table>
													<thead>
													  <tr>
														<th>Derecho humano</th>
														<th>Acto</th>
														<th>Fecha inicio</th>
														<th>Fecha término</th>
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
							              </tr><?php } }?><?php } ?>
							            </tbody>
												  </table>
											</div>
										</div>
									</div>
										<!--fin acordeon Derechos afectados y actos-->
									<div id="subPestanias" data-collapse>
										<h2 class="open" >Intervenciones</h2>
										<div>
												<table>
													<thead>
													  <tr>
														<th>Receptor</th>
														<th>Interventor</th>
														<th>Tipo de intervención</th>
														<th>Fecha</th>
													  </tr>
													</thead>
													<tbody>
													  <?php if(isset($datosCaso['intervenciones'])){ ?>
										              <?php foreach ($datosCaso['intervenciones'] as $inter) {?>
										              	 <tr>
										                <td><span id="descho_fichaId"><?=(isset($inter['receptorId'])&& ($inter['receptorId']>0)) ? $catalogos['listaTodosActores'][$inter['receptorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['receptorId']]['apellidosSiglas'] : ''; ?></span></td>
										                <td><span id="descho_fichaId"><?=(isset($inter['interventorId'])) ?  $catalogos['listaTodosActores'][$inter['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['interventorId']]['apellidosSiglas'] : ''; ?></span></td>
							                			<td><span id="descho_fichaId"><?=(isset($inter['tipoIntervencionId']) && isset($inter['intervencionNId']) &&($inter['intervencionNId']>0)) ?  $catalogos['tipoIntervencionN'.$inter['intervencionNId'].'Catalogo'][$inter['tipoIntervencionId']]['descripcion'] : ''; ?></span></td>
										                <td><span id="descho_fichaId"><?=(isset($inter['fecha'])) ? $inter['fecha'] : ''; ?></span>	</td>
										              </tr> <?php } }?>
													</tbody>
												  </table>
										</div>
									</div>
										<!--fin acordeon Intervenciones-->
									<div id="subPestanias" data-collapse>
										<h2>Actores asociados al caso</h2><!--título de la pestaña-->
										<div>
											<div class="twelve" id="subPestanias" data-collapse>	
												  <h2>Víctimas</h2><!--título de la pestaña-->									
													<div >		
														<div class="PruebaScorll">		
															<?php if (isset($datosCaso['actos'])) { ;?>
															<?php foreach($datosCaso['actos'] as $acto):?> <!--muestra cada elemento de la lista-->
															<?php if (isset($acto['victimas'])) {?>
															<?php foreach($acto['victimas'] as $actor):
																if ($actor['actorId']>0) {

																		if (isset($victimas)) {

																			$victimas[$actor['actorId']]=$actor;
																		}
																		else{
																			$victimas[$actor['actorId']]=$actor;
																		}

																} endforeach;?><!--Termina lista de los actores-->
															<?php }?>
															<?php endforeach;?><!--Termina lista de los actores-->
															<?php }?>
															<?php 	if (isset($victimas)) {
															foreach ($victimas as $actor) {?>
																	  <div class="twelve columns">
																                    <img class="three columns" src="<?=base_url().$catalogos['listaTodosActores'][$actor['actorId']]['foto'] ?>" />
																                    <br/><br/>
																	                <div class="nine columns">
																	                        <?=$catalogos['listaTodosActores'][$actor['actorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['actorId']]['apellidosSiglas']; ?>
																	                </div>
																      </div>
															<?php } 
															

															}?>

														</div>
													</div>
											</div>

											<div class="twelve" id="subPestanias" data-collapse>	
												  <h2 >Perpetradores</h2><!--título de la pestaña---->			
													<div>											
														<div class="PruebaScorll">		
															<?php if (isset($datosCaso['actos'])) {?>
															<?php foreach($datosCaso['actos'] as $actos):?> <!--muestra cada elemento de la lista-->
																<?php if (isset($actos['victimas'])) {?>
																<?php foreach($actos['victimas'] as $victimas):?> <!--muestra cada elemento de la lista-->
																	<?php if (isset($victimas['perpetradores'])) {?>
																	<?php foreach($victimas['perpetradores'] as $actor):

																		if (isset($perpetrador)) {
																			$perpetrador[$actor['perpetradorId']]=$actor;
																		}
																		else{

																			$perpetrador[$actor['perpetradorId']]=$actor;
																		}
																		?> <!--muestra cada elemento de la lista-->
																			 
																	<?php endforeach;?><!--Termina lista de los actores-->
																	<?php }?>
																<?php endforeach;?><!--Termina lista de los actores-->
																<?php }?>
															<?php endforeach;?><!--Termina lista de los actores-->
															<?php }?>
															<?php 	if (isset($perpetrador)) {
															foreach ($perpetrador as $actor) {
																if ($actor['perpetradorId']>0) { ?>

														                <div class="twelve columns">
														                    <img class="three columns" src="<?=base_url().$catalogos['listaTodosActores'][$actor['perpetradorId']]['foto'] ?>" />
														                    <br/><br/>
															                <div class="nine columns">
															                        <?=$catalogos['listaTodosActores'][$actor['perpetradorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['perpetradorId']]['apellidosSiglas']; ?>
															                </div>
														                </div>
														    <?php } } }?>
														</div>
													</div>
											</div>

											<div class="twelve" id="subPestanias" data-collapse>	
												  <h2>Interventores</h2><!--título de la pestaña-->
													<div>											
														<div class="PruebaScorll">		
															<?php if (isset($datosCaso['intervenciones'])) {?>
															<?php foreach($datosCaso['intervenciones'] as $actor):
															if ($actor['interventorId']>0) {

																if (isset($intervento)) {
																			$intervento[$actor['interventorId']]=$actor;
																		}
																		else{

																			$intervento[$actor['interventorId']]=$actor;
																		}

																		?> <!--muestra cada elemento de la lista-->
															<?php } endforeach;?><!--Termina lista de los actores-->
															<?php }?>
														<?php 	if (isset($intervento)) {
															foreach ($intervento as $actor) {
																if ($actor['interventorId']>0) { ?>

												                <div class="twelve columns">
												                    <img class="three columns" src="<?=base_url().$catalogos['listaTodosActores'][$actor['interventorId']]['foto'] ?>" />
												                    <br/><br/>
													                <div class="nine columns">
													                        <?=(isset($actor['interventorId'])) ? $catalogos['listaTodosActores'][$actor['interventorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['interventorId']]['apellidosSiglas'] : " " ;?>
													                </div>
												                </div>

														    <?php } } }?>

														</div>
													</div>
											</div>
											<div class="twelve" id="subPestanias" data-collapse>	
												  <h2 >Receptores</h2><!--título de la pestaña-->
													<div>									
														<div class="PruebaScorll">
															<?php if (isset($datosCaso['intervenciones'])) {?>		
															<?php foreach($datosCaso['intervenciones'] as $actor):
															if ($actor['receptorId']>0) {
															if (isset($receptor)) {
																			$receptor[$actor['receptorId']]=$actor;
																		}
																		else{

																			$receptor[$actor['receptorId']]=$actor;
																		}
 																?>																	
															<?php } endforeach;?><!--Termina lista de los actores-->
															<?php }?>
														<?php 	if (isset($receptor)) {
															foreach ($receptor as $actor) {
																if ($actor['receptorId']>0) { ?>

												                <div class="twelve columns">
												                    <img class="three columns" src="<?=base_url().$catalogos['listaTodosActores'][$actor['receptorId']]['foto'] ?>" />
												                    <br/><br/>
													                <div class="nine columns">
													                        <?=(isset($actor['receptorId'])) ? $catalogos['listaTodosActores'][$actor['receptorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['receptorId']]['apellidosSiglas'] : " " ; ?>
													                </div>
												                </div>

														 <?php } } }?>

														</div>
													</div>

												  <h2>Fuentes de información personal</h2><!--título de la pestaña-->				
													<div>											
														<div class="PruebaScorll">		
															<?php if (isset($datosCaso['fuenteInfoPersonal'])) {?>
															<?php foreach($datosCaso['fuenteInfoPersonal'] as $actor):
															if ($actor['actorId']>0) {

																if (isset($infoPersonal)) {
																			$infoPersonal[$actor['actorId']]=$actor;
																		}
																		else{

																			$infoPersonal[$actor['actorId']]=$actor;
																		}
																 ?> <!--muestra cada elemento de la lista-->
															<?php } endforeach;?><!--Termina lista de los actores-->
															<?php }?>

														<?php 	if (isset($infoPersonal)) {
															foreach ($infoPersonal as $actor) {
																if ($actor['actorId']>0) { ?>
												                <div class="twelve columns">
												                    <img class="three columns" src="<?=base_url().$catalogos['listaTodosActores'][$actor['actorId']]['foto'] ?>" />
												                    <br/><br/>
													                <div class="nine columns">
													                        <?=$catalogos['listaTodosActores'][$actor['actorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['actorId']]['apellidosSiglas']; ?>
													                </div>
												                </div>

														 <?php } } }?>
														</div>
													</div>

												  <h2 >Fuente documental</h2><!--título de la pestaña-->
													<div>											
														<div class="PruebaScorll">		
															<?php if (isset($datosCaso['tipoFuenteDocumental'])) {?>
															<?php foreach($datosCaso['tipoFuenteDocumental'] as $actor):
															if ($actor['actorReportado']>0) { 
																if (isset($infoDoc)) {
																			$infoDoc[$actor['actorReportado']]=$actor;
																		}
																		else{

																			$infoDoc[$actor['actorReportado']]=$actor;
																		}?> <!--muestra cada elemento de la lista-->
															<?php } endforeach;?><!--Termina lista de los actores-->
															<?php }?>

														<?php 	if (isset($infoDoc)) {
															foreach ($infoDoc as $actor) {
																if ($actor['actorReportado']>0) { ?>
												                <div class="twelve columns">
												                	<img class="three columns" src="<?=base_url().$catalogos['listaTodosActores'][$actor['actorReportado']]['foto'] ?>" />
												                    <br/><br/>
													                <div class="nine columns">
													                        <?=$catalogos['listaTodosActores'][$actor['actorReportado']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['actorReportado']]['apellidosSiglas']; ?>
													                </div>
												                </div>
												                
														 <?php } } }?>

														</div>
													</div>
											</div>
										
										</div>

									</div>
								</div>
						</div>
						<div id="subPestanias" data-collapse>	
							<h2 class="open" >Relación entre casos</h2><!--título de la pestaña-->
							<div>
<!--parte de relacion casos-->
	  		<div>      
	  			<div class="twelve columns">
	  				<?php if(isset($datosCaso['relacionCasos']) && $datosCaso['relacionCasos'] != '0'):?>	
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Caso</th>
			                <th>Tipo de relación</th>
			                <th>Caso relacionado</th>
			                <th>Fecha de inicio</th>
			                <th>Fecha de término</th>
			              </tr>
			            </thead>
				            <tbody>	
				              	<?php foreach($datosCaso['relacionCasos'] as $casoRelacionado):?>
		              				<?php if (isset($casoRelacionado['nombreCasoIdB'])) {?>
				              		<tr>
			              				<td><?=(isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] : ''; ?></td>
					              		<td><?php if(isset($casoRelacionado['tipoRelacionId']) && isset($casoRelacionado['nombreCasoIdB'])) 
												foreach($catalogos['relacionCasosCatalogo'] as $relacion){
													if($relacion['relacionCasosId'] == $casoRelacionado['tipoRelacionId'] ){
														echo $relacion['descripcion'];
													}
												} 
					              		?></td>
					              		<td><?=(isset($casoRelacionado['nombreCasoIdB']))? $casoRelacionado['nombreCasoIdB']: ''?></td>
					              		<td><?=(isset($casoRelacionado['fechaIncial']))? $casoRelacionado['fechaIncial']: ''?></td>
					              		<td><?=(isset($casoRelacionado['fechaTermino']))? $casoRelacionado['fechaTermino']: ''?></td>
				              		</tr>
				              	<?php } endforeach;?>		
				             <?php endif;?>  
				            </tbody>
	          		</table>
					<br /><br />
	  			</div>

			  	<div class="twelve columns" id="subPestanias" data-collapse>
			  		<h2>Citado como caso</h2>
			  		<div>
			  			<div>
			  			   <?php if(isset($datosCaso['relacionCasos']) && $datosCaso['relacionCasos'] != '0'):?>		
			  				<table class="twelve columns">
					            <thead>
					              <tr>
			                		<th>Caso</th>
					                <th>Tipo de relación</th>
					                <th>Caso relacionado</th>
					                <th>Fecha de inicio</th>
					                <th>Fecha de término</th>
					              </tr>
					            </thead>
			            
					            <tbody>			            
					              		
					              	<?php foreach($datosCaso['relacionCasos'] as $casoRelacionado):?>
					              	<?php if (!isset($casoRelacionado['nombreCasoIdB'])) {?>
					              		<tr>
						              		<td><?=(isset($casoRelacionado['nombreCasoId']))? $casoRelacionado['nombreCasoId']: ''?></td>
						              		<td>
						              			<?php if(isset($casoRelacionado['tipoRelacionId'])){ 
													foreach($catalogos['relacionCasosCatalogo'] as $relacion){
														if($relacion['relacionCasosId'] == $casoRelacionado['tipoRelacionId'] ){
															echo $relacion['descripcion'];
														}
													} 
						              			?>
						              		</td>
						              		<td><?=(isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] : ''; ?></td>
						              		<td><?=(isset($casoRelacionado['fechaIncialCasoId']))? $casoRelacionado['fechaIncialCasoId']: ''?></td>
						              		<td><?=(isset($casoRelacionado['fechaTerminoCasoId']))? $casoRelacionado['fechaTerminoCasoId']: ''?></td>
						              		
					              		</tr>
					              	<?php } } endforeach;?>		
					             <?php endif;?>  
					            </tbody>

			          		</table>			  				
							<br /><br />
			  			</div>
			  		</div>
			  	</div><!--fin acordeon Relación entre casos-->
	  		</div>
<!--Termina parte de relacion casos-->
							</div>
						</div>

				</div>
		</div>
	<?php }?>
	<?php }?>
	</div>
</div>
	
