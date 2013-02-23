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

 <div class="two columns">
	<?php if(isset($datosActor['actores'])){?>
    <img src="<?=base_url().$datosActor['actores']['foto']; ?>" class="foto"/>
    <br />
    <?php }?>
</div>

<div class="ten columns">
	<fieldset>
	    <legend>Información general</legend>
	    <div class="four columns">
	        <h6>Nombre<h6>
	        <label id="nombre"><?=(isset($datosActor['actores']['nombre'])) ? $datosActor['actores']['nombre'] : ''; ?></label>
	        <h6>Apellidos</h6>
	        <label id="apellidosSiglas"><?=(isset($datosActor['actores']['apellidosSiglas'])) ? $datosActor['actores']['apellidosSiglas'] : ''; ?></label>
	        <h6>Alias</h6>
	        <label id="alias"><?=(isset($datosActor['alias']['alias'])) ? $datosActor['alias']['alias'] : ''; ?></label>
	    </div>
	    <div class="four columns">
	        <h6>Género</h6>
	        <label id="generoId"><?php if(isset($datosActor['infoGralActor']['generoId'])){
	            if (($datosActor['infoGralActor']['generoId']== 1) ) {
	                print_r('Hombre');
	            } else {
	                print_r('Mujer');
	            }
	        }  ?></label>
	        <h6>Estado Civil: </h6>
	        <label id="estadoCivil_estadoCivilId"><?=(isset($datosActor['infoGralActor']['estadoCivil_estadoCivilId'])) ? $catalogos['estadosCivilesCatalogo'][$datosActor['infoGralActor']['estadoCivil_estadoCivilId']]['descripcion'] : ''; ?></label>
	        <h6>Nacionalidad: </h6>
	        <label id="nacionalidadId"><?=(isset($datosActor['infoGralActor']['nacionalidadId']) && $datosActor['infoGralActor']['nacionalidadId'] != 0) ? $catalogos['nacionalidadesCatalogo'][$datosActor['infoGralActor']['nacionalidadId']]['nombre'] : ''; ?></label>
	    </div>
	    <div class="four columns">
	        <h6>Edad</h6>
	        <label id="edad"><?=(isset($datosActor['infoGralActor']['edad'])) ? $datosActor['infoGralActor']['edad'].' años' : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina información general-->    

    <?php echo br(2);?>

	<fieldset>
	        <legend>Detalles</legend>
	    <div class="six columns">
	        <h6>Hijos</h6>
	        <label id="hijos" ><?=(isset($datosActor['infoGralActor']['hijos'])) ? $datosActor['infoGralActor']['hijos'] : ''; ?></label>
	        <h6>¿Habla español?</h6>
	        <label id="espaniol"><?=(isset($datosActor['infoGralActor']['espaniol'])) ? $datosActor['infoGralActor']['espaniol'] : ''; ?></span>
	        <h6>Grupo Indígena</h6>
	        <label id="gruposIndigenas_grupoIndigenaId"><?=(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])) ? $catalogos['gruposIndigenasCatalogo'][$datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId']]['descripcion'] : ''; ?></label>
	    </div>
	    <div class="six columns">
	        <h6>Nivel de Escolaridad</h6>
	        <label id="escolaridadId"><?=(isset($datosActor['infoGralActor']['escolaridadId'])) ? $catalogos['nivelEscolaridad'][$datosActor['infoGralActor']['escolaridadId']]['descripcion'] : ''; ?></label> 
	        <h6>Última Ocupación:   </h6>
	        <label id="ocupacionesCatalogo_ultimaOcupacionId"><?=(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])) ? $catalogos['ocupacionesCatalogo'][$datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId']]['descripcion'] : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina Detalles-->

    <?php echo br(2);?>

	<fieldset>
	    <legend>Datos de Nacimiento</legend>
	    <div class="six columns">
	        <h6>Pais</h6>
	        <label id="paisesCatalogo_paisId"><?=(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$datosActor['datosDeNacimiento']['paisesCatalogo_paisId']]['nombre'] : ''; ?></label>
	        <h6>Estado</h6>
	        <label id="estadosCatalogo_estadoId"><?=(isset($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$datosActor['datosDeNacimiento']['estadosCatalogo_estadoId']]['nombre'] : ''; ?></label>
	        <h6>Municipio</h6>
	        <label id="municipiosCatalogo_municipioId"><?=(isset($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></label>
	    </div>
	    <div class="six columns">
	        <h6>Fecha de nacimiento</h6>
	        <label id="fechaNacimiento"><?=(isset($datosActor['datosDeNacimiento']['fechaNacimiento'])) ? $datosActor['datosDeNacimiento']['fechaNacimiento'] : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina datos de nacimiento-->

    <?php echo br(2);?>

	<fieldset>
	    <legend>Información de contacto</legend>
	    <div class="six columns">
	        <h6>Teléfono</h6>
	        <label id="telefono"><?=(isset($datosActor['infoContacto']['telefono'])) ? $datosActor['infoContacto']['telefono'] : ''; ?></label>
	        <h6>Teléfono móvil</h6>
	        <label id="telefonoMovil"><?=(isset($datosActor['infoContacto']['telefonoMovil'])) ? $datosActor['infoContacto']['telefonoMovil'] : ''; ?></label>
	    </div>
	    <div class="six columns">
	        <h6>Correo electrónico</h6>
	        <label id="correoE"><?=(isset($datosActor['infoContacto']['correoE'])) ? $datosActor['infoContacto']['correoE'] : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina información del contacto-->
    
    <?php echo br(2);?>

		<fieldset>
	    <div id="pestania" data-collapse>
	        <h2 class="open">Dirección(es) </h2>
	        <div>
	            <table>
	                <thead>
	                    <tr>
	                        <th>Tipo de dirección</th>
	                        <th>Ubicación</th>
	                        <th>Código Postal</th>
	                        <th>País</th>
	                        <th>Estado</th>
	                        <th>Municipio</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php if (isset($datosActor['direccionActor'])) { ?>
	            			<?php foreach ($datosActor['direccionActor'] as $key => $direccion) {
                                    if (isset($direccion['tipoDireccionId'])) {?>
	                			<tr>
			                        <td><?=(isset($direccion['tipoDireccionId'])) ? $catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'] : ''; ?></td>
			                        <td><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></td>
			                        <td><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></td>
			                        <td><?=(isset($direccion['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
			                        <td><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
			                        <td><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>
	                    		</tr>
		            				<?php }
		            		}?>
						<?php }?>
	                </tbody>
	            </table>
	        </div>
	    </div>
		</fieldset><!--Termina datos dirección-->

    <?php echo br(2);?>

	<fieldset>
	    <legend>Relacion entre actores </legend>
	
	    <?php if (isset($datosActor['actores']['actorId'])) {
	        $idActor=$datosActor['actores']['actorId'];
	        $clase="";
	    }else{
	        $idActor=0;
	        $clase="Escondido";
	    } ?>
	<div id="pestania" data-collapse>
	        <h2 class="open">Actores individuales o transmigrantes</h2> <!--Comienza relacion con otros actores-->
	        <div>
	            <div id="subPestanias" data-collapse >
	                <h2 class="open" >Relacion con otros actores </h2>
	                <div>
		                <table>
		                    <thead>
		                        <tr>
		                            <th>Actor</th>
		                            <th>Tipo de relación</th>
		                            <th>Actor relacionado</th>
		                            <th>Fecha de incio</th>
		                            <th>Fecha de témino</th>
		                            <th>Acción(es)</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                        <?php if(isset($datosActor['relacionActores'])){
		                            foreach($datosActor['relacionActores'] as $relacion){
		                            if ($relacion['tipoRelacionIndividualColectivoId']==1) {
		                                ?><tr>
		                                    <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
		                                    <td><?=$catalogos['relacionActoresCatalogo'][$relacion['tipoRelacionId']]['nombre']; ?></td>
		                                    <?php if ($relacion['actorRelacionadoId']>0) {
		                                       $nombreRelacionado=$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['nombre'].' '.$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['apellidosSiglas']; 
		                                    }
		                                    else{
		                                       $nombreRelacionado="No hay actor relacionado";
		                                    }?>
		                                    <td><?=$nombreRelacionado?></td>
		                                    <td><?=$relacion['fechaInicial']; ?></td>
		                                    <td><?=$relacion['fechaTermino']; ?></td>
		                                    <td>
		                                    	<div class="twleve columns">
			                                    	<input style="padding: 5px 20px 6px 16px"  class="small button espacioInferior"  type="button"  value="Editar" onclick="nueva_relacion_a_a('<?=$idActor ?>', 1 , '<?=$relacion['relacionActoresId']; ?>')" />
			                                    	
								                    <form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId']."/".$datosActor['actores']['actorId'].'/'.$datosActor['actores']['tipoActorId']; ?>" >
								                        <input type="submit" value="Elminar" class="small button" />
								                    </form>
							                	</div>
		                                    </td>
		                                </tr>
		                            <?php }
		                            }
		                        } ?>
		                    </tbody>
		                </table>
			            <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_a(<?=$idActor ?>,0,0)" />
	                </div>
	            </div>
	            
	            <!--Comienza citado como persona relacionada individual-->
			    <div id="subPestanias" data-collapse>
			        <h2>Citado como actor</h2>
			        <div>
			            <table>
			            <thead>
			                <tr>
			                    <th>Actor</th>
			                    <th>Tipo de relación</th>
			                    <th>Actor relacionado</th>
			                    <th>Fecha de incio</th>
			                    <th>Fecha de témino</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php if(isset($citaActor['citas'])){
			                    foreach($citaActor['citas'] as $citas){ 
			                    	if ($citas['datosCitas']['tipoRelacionIndividualColectivoId']==1) {?>
				                        <tr>
				                            <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
				                            <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['nombre']; ?></td>
				                            <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
				                            <td><?=$citas['datosCitas']['fechaInicial']; ?></td>
				                            <td><?=$citas['datosCitas']['fechaTermino']; ?></td>
				                        </tr><?php
			                    	}
			                    }
			                } ?>
			                </tbody>
			            </table>
			        </div>
			    </div>
			    <!--Termina citado como persona relacionada individual-->
	        </div>
	</div>

    
    <!--Comienza actores colectivos---->
    <div id="pestania" data-collapse>
        <h2 class="open">Actores colectivos </h2>
        <div>
 
        	<div>

		            <table>
		                <thead>
		                    <tr>
		                        <th>Actor</th>
		                        <th>Tipo de relación</th>
		                        <th>Actor colectivo relacionado </th>
		                        <th>Fecha de incio</th>
		                        <th>Fecha de témino</th>
		                        <th>Acción(es)</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php if(isset($datosActor['relacionActores'])){
		                        foreach($datosActor['relacionActores'] as $relacion){
		                        if ($relacion['tipoRelacionIndividualColectivoId']==2) {
		                            ?><tr>
		                                <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
		                                <td><?=$catalogos['relacionActoresCatalogo'][$relacion['tipoRelacionId']]['Nivel2']; ?></td>
		                                <?php if ($relacion['actorRelacionadoId']>0) {
		                                   $nombreRelacionado=$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['nombre'].' '.$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['apellidosSiglas']; 
		                                }
		                                else{
		                                   $nombreRelacionado="No hay actor relacionado";
		                                }?>
		                                <td><?=$nombreRelacionado?></td>
		                                <td><?=$relacion['fechaInicial']; ?></td>
		                                <td><?=$relacion['fechaTermino']; ?></td>
		                                <td>
		                                	<div class="twelve columns">
			                                	<input  style="padding: 5px 20px 6px 16px"  class="small button espacioInferior"  type="button"  value="Editar" onclick="nueva_relacion_a_Col('<?=$idActor ?>',1, '<?=$relacion['relacionActoresId']; ?>')" />
			                                	
							                    <form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId']."/".$datosActor['actores']['actorId'].'/'.$datosActor['actores']['tipoActorId']; ?>" >
							                        <input type="submit" value="Elminar" class="small button" />
							                    </form>
						                	</div>
		                                </td>
		                            </tr><?php
		                        }
		                        }
		                    } ?>
		                </tbody>
		            </table>
		            <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_Col(<?=$idActor; ?>,0,0)" />
		        </div>

        </div>
    </div>
        <!--Termina actores colectivos-->
	</fieldset>
</div>