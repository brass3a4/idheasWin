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

 		<form action="<?= $action ?>" method="post" >
			<input type="hidden"  id="nameSeleccionado"  value="perpetradores_perpetradorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR PERPETRADOR)-->

			<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($perpetrador['perpetradorId'])&&($perpetrador['perpetradorId']!=0)) ? $perpetrador['perpetradorId']."*".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre']." ".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

			<input type="hidden" name="perpetradores_perpetradorId" onchange="habilitarboton()" id="perpetradores_perpetradorId" value="<?= (isset($perpetrador['perpetradorId'])) ? $perpetrador['perpetradorId'] : " " ;?>" >

			<input type="hidden" name="perpetradores_tipoPerpetradorId" value="<?= (isset($perpetrador['tipoPerpetradorId'])) ? $perpetrador['tipoPerpetradorId'] : " " ;?>" id="perpetradores_tipoPerpetradorId" >

			<input type="hidden" name="perpetradores_tipoPerpetradorNivel" value="<?= (isset($perpetrador['tipoPerpetradorNivel'])) ? $perpetrador['tipoPerpetradorNivel'] : " " ;?>" id="perpetradores_tipoPerpetradorNivel" >

			<input type="hidden" name="perpetradores_gradoInvolucramientoid" value="<?= (isset($perpetrador['gradoInvolucramientoid'])) ? $perpetrador['gradoInvolucramientoid'] : " " ;?>" id="perpetradores_gradoInvolucramientoid" >

			<input type="hidden" name="perpetradores_nivelInvolugramientoId" value="<?= (isset($perpetrador['nivelInvolugramientoId'])) ? $perpetrador['nivelInvolugramientoId'] : " " ;?>" id="perpetradores_nivelInvolugramientoId" >
			
			<input type="hidden" name="perpetradores_tipoLugarId" value="<?= (isset($perpetrador['tipoLugarId'])) ? $perpetrador['tipoLugarId'] : " " ;?>" id="perpetradores_tipoLugarId" >

			<input type="hidden" name="perpetradores_tipoLugarNivelId" value="<?= (isset($perpetrador['tipoLugarNivelId'])) ? $perpetrador['tipoLugarNivelId'] : " " ;?>" id="perpetradores_tipoLugarNivelId" >
			
			<input type="hidden" value="perpetradores_actorRelacionadoId" id="nameDeLaRelacion" >
	
			<input type="hidden" name="perpetradores_actorRelacionadoId" value="<?= (isset($perpetrador['actorRelacionadoId'])) ? $perpetrador['actorRelacionadoId'] : " " ;?>" id="perpetradores_actorRelacionadoId" >

			<input type="hidden" value="<?=$casoId?>" id="casoId" name='casoId' >


			<fieldset class="espacioSuperior espacioInferior">
				<legend>Información general</legend>
				<?php if (isset($perpetrador['perpetradorId']) && ($perpetrador['perpetradorId']!=0)) {
					foreach ($perpetrador['casosActor'] as $casosActor) {
						if ($casosActor['casos_casoId'] == $casoId) {

							echo '<input type="hidden"  id="casoActorId" name="casoActorId" value="'.$casosActor['casoActorId'].'">';

						}
					}

				}?>
				<label>Perpetrador</label>

					<div id="vistaActorRelacionado" onchange="habilitarboton()" >

		                <?php if(isset($perpetrador['perpetradorId'])){ ?>    
		                <div class="three columns" >
		                <img style="width:120px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'] : " " ; ?>" />
						</div>
						<div class="nine columns"><h5><?=(isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre']." "	 : " " ; ?><?= (isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'] : "" ;?>
						</h5></div> 
		                <?php }?>

					</div>

					<input type="button" class="small button" onclick="habilitarboton()" value="Seleccionar actor">
					<input type="button" class="small button" value="Eliminar actor" onclick="eliminarRelacionVista('vistaActorRelacionado','perpetradores_perpetradorId','vistaActorRelacionadoPerpetrador','perpetradores_actorRelacionadoId')">

			<div id="pestania" class="twelve columns" data-collapse>
				<h2 class="open" >Actor Colectivo</h2>
				<div class="twelve columns">
					<div id="vistaActorRelacionadoPerpetrador">
								<?php if (isset($perpetrador['actorRelacionadoId']) && ($perpetrador['actorRelacionadoId']>0) ) { ?>
								
								<div class="nine columns">

								Actualmente relacionado con:
									<h5><?=(isset($perpetrador['actorRelacionadoId']) && ($perpetrador['actorRelacionadoId']>0)) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$perpetrador['actorRelacionadoId']]['actorRelacionadoId']]['nombre'] : ''; ?>
								</h5> 
								Tipo de relación
								<h5><?=(isset($perpetrador['actorRelacionadoId']) && ($perpetrador['actorRelacionadoId']>0)) ? $catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$perpetrador['actorRelacionadoId']]['tipoRelacionId']]['Nivel2'] : ''; ?></h5>
								</div> 
				                <div class="three columns" >
				                <img style="width:120px !important; height:150px !important;" src="<?= (isset($perpetrador['actorRelacionadoId']) && ($perpetrador['actorRelacionadoId']>0)) ? base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$perpetrador['actorRelacionadoId']]['actorRelacionadoId']]['foto'] : " " ; ?>" />
								</div>
								<input type="button" class="tiny button" value="Seleccionar relación" onclick="ventanaColectivoRelacionados('<?= $perpetrador['perpetradorId']?>','')" />
								<?php }?> 
						</div>
					<div id="BotonesColectivo">
					<input type="button" value="Eliminar" onclick="eliminarRelacionVista('vistaActorRelacionadoPerpetrador','perpetradores_actorRelacionadoId')" class="tiny button">	
					</div>
				</div>
			</div>


			</fieldset>

			<label><b><h5>Tipo de perpetrador</h5></b></label>
			<div id="tipoPerpetrador" class="EspacioInferior">
				<?php if (isset($perpetrador['tipoPerpetradorNivel']) && isset($perpetrador['tipoPerpetradorId']) ) { ?>
					Actualmente: <?= $catalogos['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Catalogo'][$perpetrador['tipoPerpetradorId']]['descripcion']; ?>
				<?php }?>
			</div>
			<label><b><h5>Notas</h5></b></label>
			<div id="notasPerpetrador"></div>

			<div class="caja CatalogoTipoPerpetrador">
				<ol>
					<?php foreach($catalogos['tipoPerpetradorN1Catalogo'] as  $nivel1) { ?> 
							<li >
								<div id="base<?=$nivel1['tipoPerpetradorN1Id']?>" class="cambiarColorPerpetrador ExpanderFlecha flecha" value="subnivel" style="padding-left:15px;" onclick="tipoPerpetrador('<?=$nivel1['tipoPerpetradorN1Id']?>','<?=$nivel1['notas']?>','<?=$nivel1['descripcion']?>','nivel1','base<?=$nivel1['tipoPerpetradorN1Id']?>',this)"> <?=$nivel1['descripcion']?>
								</div>
								<ul style="padding-left:15px;" id='nivel1<?=$nivel1['tipoPerpetradorN1Id']?>' class="Escondido" >
									<li > 
										<?php foreach($catalogos['tipoPerpetradorN2Catalogo'] as  $nivel2){?> 
											<?php if ( $nivel2['tipoPerpetradorN1Catalogo_tipoPerpetradorN1Id'] == $nivel1['tipoPerpetradorN1Id'] ) { ?>
												<div style="padding-left:15px;" onclick="tipoPerpetrador('<?=$nivel2['tipoPerpetradorN2Id']?>','<?=$nivel2['notas']?>','<?=$nivel2['descripcion']?>','nivel2','basea<?=$nivel2['tipoPerpetradorN2Id']?>',this)" id="basea<?=$nivel2['tipoPerpetradorN2Id']?>" 
													class="cambiarColorPerpetrador <?php foreach($catalogos['tipoPerpetradorN3Catalogo'] as  $nivel3){
																if ( $nivel3['tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id'] == $nivel2['tipoPerpetradorN2Id'] ) { 
																		echo'ExpanderFlecha flecha"';
																		echo'value="subnivel'; 
																		break;} }?>" >
													<?=$nivel2['descripcion']?>
												</div>	
													<ul style="padding-left:15px;"  id='nivel2<?=$nivel2['tipoPerpetradorN2Id']?>' class="Escondido" >
														<li > 
															<?php foreach($catalogos['tipoPerpetradorN3Catalogo'] as  $nivel3){?> 
																<?php if ( $nivel3['tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id'] == $nivel2['tipoPerpetradorN2Id'] ) { ?>
																	<div style="padding-left:15px;"  onclick="tipoPerpetrador('<?=$nivel3['tipoPerpetradorN3Id']?>','<?=$nivel3['notas']?>','<?=$nivel3['descripcion']?>', 'nivel3','baseb<?=$nivel3['tipoPerpetradorN3Id']?>',this)" id="baseb<?=$nivel3['tipoPerpetradorN3Id']?>" 
																			class="cambiarColorPerpetrador <?php foreach($catalogos['tipoPerpetradorN4Catalogo'] as  $nivel4){
																							if ( $nivel4['tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id'] == $nivel3['tipoPerpetradorN3Id'] ) { 
																								echo'ExpanderFlecha flecha"';
																								echo'value="subnivel'; 
																								;break; } } ?>" >
																		<?=$nivel3['descripcion']?>
																	</div>	
																			<ul style="padding-left:15px;" id='nivel3<?=$nivel3['tipoPerpetradorN3Id']?>' class="Escondido">
																				<?php foreach($catalogos['tipoPerpetradorN4Catalogo'] as  $nivel4){?> 
																					<?php if ( $nivel4['tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id'] == $nivel3['tipoPerpetradorN3Id'] ) { ?>
																						<li class="cambiarColorPerpetrador" onclick="tipoPerpetrador('<?=$nivel4['tipoPerpetradorN4Id']?>','<?=$nivel4['notas']?>','<?=$nivel4['descripcion']?>','nivel4',this)"> <?=$nivel4['descripcion']?></li>	
																					<?php }
																				} ?>
																			</ul>
																<?php }
															} ?>
														</li>
													</ul>
											<?php }
										} ?>
									</li>
								</ul>
							</li>	
					<?php };?>	
				</ol>
			</div>
       
			<div class="twelve columns espacioSuperior espacioInferior">
				<label>Estatus del perpetrador</label>
					<select name="perpetradores_estatusPerpetradorCatalogo_estatusPerpetradorId">
						<option></option>
						<?php if (isset($perpetrador['estatusPerpetradorCatalogo_estatusPerpetradorId'])) {
							foreach ($catalogos['estatusPerpetradorCatalogo'] as $estatusPerpetrador ) { ?>
							<option <?=($estatusPerpetrador['estatusPerpetradorId']==$perpetrador['estatusPerpetradorCatalogo_estatusPerpetradorId']) ? 'selected=selected' : "" ;?> onkeyup="notasCatalogos('<?= $estatusPerpetrador['notas']?>','estatusPerpetradorCatalogo_estatusPerpetradorId','2')" onclick="notasCatalogos('<?= $estatusPerpetrador['notas']?>','estatusPerpetradorCatalogo_estatusPerpetradorId','2')" value="<?= $estatusPerpetrador['estatusPerpetradorId']?>" ><?= $estatusPerpetrador['descripcion']?></option>
						<?php }
						} else {
							foreach ($catalogos['estatusPerpetradorCatalogo'] as $estatusPerpetrador ) { ?>
							<option onkeyup="notasCatalogos('<?= $estatusPerpetrador['notas']?>','estatusPerpetradorCatalogo_estatusPerpetradorId','2')" onclick="notasCatalogos('<?= $estatusPerpetrador['notas']?>','estatusPerpetradorCatalogo_estatusPerpetradorId','2')" value="<?= $estatusPerpetrador['estatusPerpetradorId']?>" ><?= $estatusPerpetrador['descripcion']?></option>
						<?php } }?>

					</select>
					<div id="notasestatusPerpetradorCatalogo_estatusPerpetradorId"> </div>
			</div>

			<label><b><h5>Grado de involucramiento</h5></b></label>
			<div id="gradoDeInvolucramiento">
				<?php if (isset($perpetrador['gradoInvolucramientoid']) && isset($perpetrador['nivelInvolugramientoId']) ) { ?>
					<?php if (($perpetrador['gradoInvolucramientoid']>0) && ($perpetrador['nivelInvolugramientoId']>0) ) { ?>
							Actualmente: <?= $catalogos['gradoInvolucramientoN'.$perpetrador['nivelInvolugramientoId'].'Catalogo'][$perpetrador['gradoInvolucramientoid']]['descripcion']; ?>
					<?php }?>
				<?php }?>
			</div>
			<label><b><h5>Notas</h5></b></label>
			<div id="notasgradoDeInvolucramiento"></div>

			<div class="caja CatalogoTipoPerpetrador">
				<ul>
					<?php foreach ($catalogos['gradoInvolucramientoN1Catalogo'] as $gradoN1) {?>
					<li>
						<div style="padding-left:15px;" onclick="involucramientoPerpetradores('<?= $gradoN1['notas'] ?>','<?= $gradoN1['descripcion'] ?>','<?= $gradoN1['gradoInvolucramientoN1Id']?>','1',this)"
								class="colorTipoPerpetrador <?php foreach ($catalogos['gradoInvolucramientoN2Catalogo'] as $gradoN2) {
									if ($gradoN2['gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id']==$gradoN1['gradoInvolucramientoN1Id']) {
												echo'ExpanderFlecha flecha"';
												echo'value="subnivel'; break;
											} }?>" >
							<?= $gradoN1['descripcion']?>
						</div>
						<div style="padding-left:15px;" id="subNivelInvolucramiento<?= $gradoN1['gradoInvolucramientoN1Id']?>" class="Escondido" >
							<?php foreach ($catalogos['gradoInvolucramientoN2Catalogo'] as $gradoN2) {
								if ($gradoN2['gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id']==$gradoN1['gradoInvolucramientoN1Id']) {?>
									<div id="tipoPerpetrador<?= $gradoN2['gradoInvolucramientoN2Id'] ?>" onclick="involucramientoPerpetradores('<?= $gradoN2['notas'] ?>','<?= $gradoN2['descripcion'] ?>','<?= $gradoN2['gradoInvolucramientoN2Id']?>','2',this)" class="colorTipoPerpetrador">
										<?= $gradoN2['descripcion'] ?>
									</div>
								<?php }
							}?>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>


			<label><b><h5>Lugar de Acto</h5></b></label>
			<div id="tipoLugarActo">
				<?php if (isset($perpetrador['tipoLugarId']) && isset($perpetrador['tipoLugarNivelId']) && $perpetrador['tipoLugarNivelId']>0) { ?>
							Actualmente: <?= $catalogos['tipoLugarN'.$perpetrador['tipoLugarNivelId'].'Catalogo'][$perpetrador['tipoLugarId']]['descripcion']; ?>
				<?php }?>
			</div>
			<label><b><h5>Notas</h5></b></label>
			<div id="notastipoLugarActo"></div>
			<div class="caja CatalogoTipoPerpetrador">

				<ul>
					<?php foreach ($catalogos['tipoLugarN1Catalogo'] as $lugarN1) {?>
					<li> 
						<div id="lugarN1<?= $lugarN1['tipoLugarId']?>" style="padding-left:15px;" onclick="tipoLugarNotas('<?= $lugarN1['notas']?>','<?= $lugarN1['descripcion']?>','<?= $lugarN1['tipoLugarId']?>',this, '1')" 
							class="colorTipoLugar <?php foreach ($catalogos['tipoLugarN2Catalogo'] as $lugarN2) {
									if ($lugarN2['tipoLugarN1Catalogo_tipoLugarId']==$lugarN1['tipoLugarId']) {
										echo'ExpanderFlecha flecha"';
										echo'value="subnivel'; break;
									 } } ?>">
							<?= $lugarN1['descripcion']?>
						 </div> 
						<ul id="subnivel<?= $lugarN1['tipoLugarId']?>" class="Escondido">
							<?php foreach ($catalogos['tipoLugarN2Catalogo'] as $lugarN2) {
								if ($lugarN2['tipoLugarN1Catalogo_tipoLugarId']==$lugarN1['tipoLugarId']) { ?>
								<li> 
									<div id="lugarN2<?= $lugarN2['tipoLugarN2Id']?>" style="padding-left:15px;" onclick="tipoLugarNotas('<?= $lugarN2['notas']?>','<?= $lugarN2['descripcion']?>','<?= $lugarN2['tipoLugarN2Id']?>',this, '2')"
										class="colorTipoLugar <?php foreach ($catalogos['tipoLugarN3Catalogo'] as $lugarN3) {
												if ($lugarN3['tipoLugarN2Catalogo_tipoLugarN2Id']==$lugarN2['tipoLugarN2Id']) { 
													echo'ExpanderFlecha flecha"';
													echo'value="subnivel'; break;
												}}?> ">
									<?= $lugarN2['descripcion']?> 
									</div>
									<ul id="subnivel<?= $lugarN2['tipoLugarN2Id']?>" class="Escondido" >
										<?php foreach ($catalogos['tipoLugarN3Catalogo'] as $lugarN3) {
										if ($lugarN3['tipoLugarN2Catalogo_tipoLugarN2Id']==$lugarN2['tipoLugarN2Id']) { ?>
											<li>
												<div id="lugarN3<?= $lugarN3['tipoLugarN3Id']?>" style="padding-left:15px;" onclick="tipoLugarNotas('<?= $lugarN3['notas']?>','<?= $lugarN3['descripcion']?>','<?= $lugarN3['tipoLugarN3Id']?>',this, '3')"
													class="colorTipoLugar">
													<?= $lugarN3['descripcion']?>
												</div> 
											</li>
										<?php } } ?>
									</ul>
								</li>
							<?php } } ?>
						</ul>
					</li>
					<?php }?>
				</ul>
			</div>


			<input type="submit" value="Guardar" <?=(isset($perpetrador['perpetradorId']) && ($perpetrador['perpetradorId']>0)) ? " " : "disabled" ;?> class="tiny button" style="padding:5px 15px 5px 15px;margin-bottom: 5px">
			<input type="button" value="Cancelar" onclick="cerrarVentana()" class="tiny button" style="padding:5px 15px 5px 15px;margin-bottom: 5px">

		</form>
	</body>
</html>	
