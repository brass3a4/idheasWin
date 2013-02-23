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

 <input type="hidden" id="tipoActorAE"  name="1"/>
<form action="<?=$action; ?>" method="post" enctype="multipart/form-data" id="menuForm" name="menuForm">

    <div class="three columns">
                <?php if(isset($datosActor['actores']['foto'])){ ?>    
                    <div id="espacioFoto">
                        <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
                        <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
                    </div>
                <?php }?>


                <label>Foto </label>
                <input name="archivo" type="file" size="10" accept="image/*"/>
                <input type="hidden" <?= (isset($datosActor['actores']['foto'])) ? 'value="'.$datosActor['actores']['foto'].'"' : 'value=""' ;?> name="actores_foto" id="actores_foto" />
                <?php if(isset($datosActor['actores']['foto'])):?>
                	<input style="margin-top: 15px;" type="button" class="small button" value="Eliminar Foto" onclick="eliminarFoto()">
    			<?php endif;?>
    </div>

    <div class="nine columns">
            <?php if(isset($actorId)){ ?>
                <input type="hidden" value="<?=$actorId; ?>" id="actores_actorId" name="actores_actorId" />
            <?php } ?>
            <input type="hidden" value="1" name="actores_tipoActorId" />

                <fieldset>
                    <legend>Información general</legend>
                    <!----Primer mitad de información general---->
                    <div class="six columns">
                        <label for="actores_nombre">Nombre</label>
                        <input autofocus type="text" id="actores_nombre" name="actores_nombre"  <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['nombre'].'"' : 'value=""'); ?> required />
                        <label for="actores_apellidosSiglas">Apellidos</label>
                        <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : 'value=""'); ?>  />
                        <label for="alias_alias">Alias</label>
                        <input type="text" id="alias_alias" name="alias_alias" value="<?=(isset($datosActor['alias']['alias']) ? $datosActor['alias']['alias'] : ''); ?>" />
                    </div>
                    <!----Termina primer mitad de información general---->
                    <!----Segunda mitad de información general---->
                    <div class="six columns">
                        <label for="infoGralActor_generoId" >Género</label>
                        <?php if(isset($datosActor['infoGralActor']['generoId'])) { ?>
                            <span class="six columns">
                            <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 1){ echo 'checked="checked"'; }?> checked="checked" value="1" />Hombre
                            </span>
                            <span class="six columns">
                            <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 2){ echo 'checked="checked"'; }?> value="2" />Mujer
                            </span>
                        <?php } else { ?>
                            <span class="six columns">
                                <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  value="1" checked="checked" />Hombre
                            </span>
                            <span class="six columns">
                                <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  value="2" />Mujer
                            </span>
                        <?php } ?>
                        <label for="edad">Edad</label>
                        <select id="infoGralActor_edad" name="infoGralActor_edad">
                            <option></option>
                            <?php if(isset($datosActor['infoGralActor']['edad'])){
                                for($i = 0; $i <= 100; $i++):?> <!--muestra todas las edades de 1 a 100-->
                                    <option value="<?=$i?>" <?=($datosActor['infoGralActor']['edad'] == $i) ? 'selected=selected' : '' ?>><?=$i?></option>
                                <?php endfor;
                            } else {
                                for($i = 0; $i <= 100; $i++):?> <!--muestra todas las edades de 1 a 100-->
                                    <option value="<?=$i?>"><?=$i?></option>
                                <?php endfor;
                            } ?>
                        </select>
                        <label for="estadoCivil">Estado Civil</label>
                        <select id="infoGralActor_estadoCivil_estadoCivilId" name="infoGralActor_estadoCivil_estadoCivilId"  >
                            <option></option>
                            <?php if(isset($datosActor['infoGralActor']['estadoCivil_estadoCivilId'])){
                                foreach($catalogos['estadosCivilesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                                    <option  value="<?=$item['estadoCivilId']?>" <?=($datosActor['infoGralActor']['estadoCivil_estadoCivilId'] == $item['estadoCivilId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                                <?php endforeach;
                            } else { ?>
                                <?php foreach($catalogos['estadosCivilesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                                    <option  value="<?=$item['estadoCivilId']?>" > <?=$item['descripcion']?></option>
                                <?php endforeach; } ?>
                        </select>
                        <label for="nacionalidad">Nacionalidad</label>
                        <select id="infoGralActor_nacionalidadIdSelect" name="infoGralActor_nacionalidadId">
                            <option></option>
                            <?php if(isset($datosActor['infoGralActor']['nacionalidadId'])){
                                foreach($catalogos['nacionalidadesCatalogo'] as $nacionalidad):?> <!--muestra todas las edades de 1 a 100-->
                                    <option value="<?=$nacionalidad['nacionalidadId']; ?>" <?=($datosActor['infoGralActor']['nacionalidadId'] == $nacionalidad['nacionalidadId']) ? 'selected="selected"' : '' ; ?>> <?=$nacionalidad['nombre']; ?></option>
                                <?php endforeach;
                            } else {
                                foreach($catalogos['nacionalidadesCatalogo'] as $nacionalidad):?>
                                    <option value="<?=$nacionalidad['nacionalidadId']; ?>"> <?=$nacionalidad['nombre'] ?></option>
                                <?php endforeach;
                            } ?>
                        </select>
                    </div>
                    <!----Segunda mitad de información general---->
                </fieldset>
                  <!--Termina información general-->
            <br/>
            <fieldset>
                <legend>Detalles</legend>
                <div class="six columns"><!----Primer mitad de detalles---->

                    <div class="twelve columns">

                        <label for="hijos">Hijos</label>
                        <select id="infoGralActor_hijos" name="infoGralActor_hijos">
                            <option></option>
                            <?php if(isset($datosActor['infoGralActor']['hijos'])){
                            for($edad = 0; $edad <= 100; $edad++):?> <!--muestra todas las edades de 1 a 100-->
                            <option value="<?=$edad?>" <?=($datosActor['infoGralActor']['hijos'] == $edad) ? 'selected="selected"' : '' ; ?>> <?=$edad; ?></option>
                            <?php endfor;
                            } else {
                            for($edad = 0; $edad <= 100; $edad++):?><!--muestra todas las edades de 1 a 100-->
                            <option value="<?=$edad?>"><?=$edad?></option>
                            <?php endfor;
                            } ?>
                        </select>

                        <label for="genero">¿Habla español?</label>
                        <?php if(isset($datosActor['inofGralActor']['espaniol'])){ ?>
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'Si') ? 'checked="checked"' : ''; ?> value="Si" />Si
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'No') ? 'checked="checked"' : ''; ?> value="No" />No
                        <?php } else { ?>
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" checked="checked" value="Si" />Si
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" value="No" />No
                        <?php } ?>
                        
                        <label for="grupoIndigena">Grupo Indígena</label>
                        <select onkeyup="notasCatalogos('1',value,'infoGralActor_gruposIndigenas_grupoIndigenaId','2')" onclick="notasCatalogos('1',value,'infoGralActor_gruposIndigenas_grupoIndigenaId','2')"  id="infoGralActor_gruposIndigenas_grupoIndigenaId" name="infoGralActor_gruposIndigenas_grupoIndigenaId">
		                    <option></option>
		                    <?php if(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])){
		                    foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                    <option name="<?=$item['notas']?>" id="<?=$item['grupoIndigenaId']?>" value="<?=$item['grupoIndigenaId']?>"  <?=($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'] == $item['grupoIndigenaId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
		                    <?php endforeach; } else { ?>
		                    <?php foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
		                    <option name="<?=$item['notas']?>" id="<?=$item['grupoIndigenaId']?>"  value="<?=$item['grupoIndigenaId']; ?>"><?=$item['descripcion']; ?></option>
		                    <?php endforeach; } ?>
		              </select>
                        <div id="notasinfoGralActor_gruposIndigenas_grupoIndigenaId"> </div>
                    </div>
                </div><!----Termina primer mitad de detalles---->

                <div class="six columns"><!----Segunda mitad de detalles---->


                <label for="nivelEscolaridad">Nivel de Escolaridad</label>
                <select id="infoGralActor_escolaridadId" name="infoGralActor_escolaridadId">                        
                    <option></option>
                    <?php if(isset($datosActor['infoGralActor']['escolaridadId'])){
                        foreach($catalogos['nivelEscolaridad'] as $key => $item):?> <!--muestra todas las edades de 1 a 100-->
                        <option  value="<?=$item['nivelEscolaridadId']; ?>" <?=($datosActor['infoGralActor']['escolaridadId'] == $item['nivelEscolaridadId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
                    <?php endforeach;
                    } else {
                        foreach($catalogos['nivelEscolaridad'] as $key => $item):?> <!--muestra todas las edades de 1 a 100-->
                        <option value="<?=$item['nivelEscolaridadId'] ?>"> <?=$item['descripcion']; ?></option>
                    <?php endforeach;}?>    
                </select>

                <label for="UltimaOcupacion">Última Ocupación</label>
                <select onkeyup="notasCatalogos('2',value,'infoGralActor_ocupacionesCatalogo_ultimaOcupacionId','2')" onclick="notasCatalogos('2',value,'infoGralActor_ocupacionesCatalogo_ultimaOcupacionId','2')" id="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId" name="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId" >						
			         <option></option>
			         <?php if(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])){
			         foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			         <?php if($item['tipoActorId'] == 1){ ?>
			             <option name="<?=$item['notas']?>" id="<?=$item['ocupacionId']; ?>OC"  value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
			         <?php } ?>
			         <?php endforeach; } 
			         else { ?>
			         <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
			         <?php if($item['tipoActorId'] == 1){ ?>
			             <option name="<?=$item['notas']?>" id="<?=$item['ocupacionId']; ?>OC"  value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
			         <?php } ?>
			         <?php endforeach; } ?>
			    </select><span id="notasinfoGralActor_ocupacionesCatalogo_ultimaOcupacionId"></span>
                
                </div>	<!----Termina segunda mitad de detalles---->

            </fieldset><!--Termina Detalles-->


            <fieldset><!----Datos de Nacimiento ---->
                <legend>Datos de Nacimiento</legend>
               
                	<div class="twelve columns">
					   
					        <legend>Lugar de origen</legend>
					
					        <!--Llamada a los filtros-->
							<?=$filtroPais;?>								
				    
	                	 <div class="six columns">
			                <label for="fechaNacimiento">Fecha de nacimiento</label>
			                <input type="text" id="fechaDeNacimientoIndividual" name="datosDeNacimiento_fechaNacimiento" <?=(isset($datosActor['datosDeNacimiento']['fechaNacimiento']) ? 'value="'.$datosActor['datosDeNacimiento']['fechaNacimiento'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />
	               		
	               		</div>
               		</div>
            </fieldset><!--Termina datos de nacimiento-->

            <fieldset><!--Información de contacto-->
                <legend>Información de contacto</legend>
                <div class="six columns"> <!--Primer mitad de información de contacto-->
                <label for="telefono">Teléfono</label>
                <input type="text" id="infoContacto_telefono" pattern="[0-9]+" name="infoContacto_telefono"  <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : 'value=""'); ?>  />
                <label for="infoContacto_telefonoMovil">Teléfono móvil</label>
                <input type="text" id="infoContacto_telefonoMovil" name="infoContacto_telefonoMovil" <?=(isset($datosActor['infoContacto']['telefonoMovil']) ? 'value="'.$datosActor['infoContacto']['telefonoMovil'].'"' : 'value=""'); ?> />
                </div><!--Termina primer mitad de la nformación de contacto--->
                <div class="six columns"><!--Segunda mitad de nformación de contacto---->
                <label for="infoContacto_correoE">Correo electrónico</label>
                <input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : 'value=""'); ?> />
                </div>  <!--Segunda mitad de nformación de contacto---->
            </fieldset><!--Termina información del contacto-->
            
            <div id="direccionActorIndividual">
				
   				 <input type="hidden" id="idActor" name="<?php if(isset($actorId))echo $actorId?>"/>
	            <?php if (isset($datosActor['direccionActor'])) {?>
	                <fieldset><!--Dirección-->
	                <legend>Dirección</legend>
	                    <div id="pestania" data-collapse>
	                       
	                        <div>
	                            <table style="margin-left: 10px">
	                                <thead>
	                                    <tr>
	                                        <th>Tipo de dirección</th>
	                                        <th>Ubicación</th>
	                                        <th>Código Postal</th>
	                                        <th>País</th>
	                                        <th>Estado</th>
	                                        <th>Municipio</th>
	                                        <th>Accion</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                       <?php if (isset($datosActor['direccionActor'])) {
	                                        foreach ($datosActor['direccionActor'] as $key => $direccion) {
	                                            if (isset($direccion['tipoDireccionId'])) {
	                                                ?>
	                                        <tr>
	                                                <td><?=(isset($direccion['tipoDireccionId'])) ? $catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'] : ''; ?></td>
	                                                <td><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></td>
	                                                <td><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></td>
	                                                <td><?=(isset($direccion['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
	                                                <td><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
	                                                <td><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>                        
	                                                <td>
                                                            <input type="button"  class="tiny button espacioInferior" style="padding: 7px 19px 7px 19px"  value="Editar" onclick="nuevaDireccion('<?=$actorId?>','<?=$direccion['direccionId']?>')"/>
	                                                       <input type="button" value="Elminar"  class="tiny button" style="padding: 7px 15px 7px 15px" onclick="eliminarDireccionActor('<?=$direccion['direccionId']?>','<?=$actorId?>','2')"/>
	                                                </td>
	                                        </tr>
	                                        <?php }
	                                    }
	                                    }?>
	                                </tbody>
	                            </table>
	                                <input style="margin-left:15px;" type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion('<?=$actorId?>','0')">
	                        </div>
	                    </div>
	                </fieldset>
	            <?php } else{?>
	
	             <fieldset>
	                <legend>Dirección</legend>
	
	                <div class="six columns">
	                    <label for="direccionActor_tipoDireccionId">Tipo de dirección</label>
	                    <select  id="direccionActor_tipoDireccionId" name="direccionActor_tipoDireccionId">         
	                        <option></option>
	                        <?php if(isset($datosActor['tipoDireccionId'])){
	                            foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
	                                <option value="<?=$item['tipoDireccionId']; ?>" <?=($datosActor['tipoDireccionId'] == $item['tipoDireccionId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
	                            <?php endforeach;
	                        } else {
	                            foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
	                                <option value="<?=$item['tipoDireccionId']; ?>"> <?=$item['descripcion']; ?></option>
	                            <?php endforeach;
	                        } ?>
	                    </select>
	
	                    <label for="direccionActor_direccion">Ubicación</label>
	                        <input type="text" id="direccionActor_direccion" name="direccionActor_direccion"  <?=(isset($datosActor['direccion']) ? 'value="'.$datosActor['direccion'].'"' : 'value=""'); ?> />
	                    
	                    <label for="direccionActor_codigoPostal">Código Postal</label>
	                        <input type="number" pattern="[0-9]+" id="direccionActor_codigoPostal" name="direccionActor_codigoPostal"  <?=(isset($datosActor['codigoPostal']) ? 'value="'.$datosActor['codigoPostal'].'"' : 'value=""'); ?> />
	                </div>
					<input type="hidden" id="filtrodir" name="3"/>
	                <div class="six columns">
	                       <?=$filtroDireccion;?>                                            
	                   
	                  
	                </fieldset><!--Termina datos dirección-->
	                <?php }?>
	       		 </div>
	       		  <div class="espacioInferior espacioSuperior">
					<div class="six columns">
		                <input class="medium button" type="submit" value="Guardar" />
		            </div>
		            <div  class="six columns" >
	               		 <a style="float: right;" href="<?=base_url(); ?>index.php/actores_c/mostrar_actor/<?= (isset($actorId)) ? $actorId : "0" ;?>/<?=$tipoActor;?>" class="medium button">Cancelar</a>
		           	</div>
	     		 </div>
		</div>
    </div>
</form>

<div class="twelve columns">
<div class="three columns"></div>
<div class="nine columns">  
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
            <h2 class="open" >Actores individuales o transmigrantes</h2> <!--Comienza relacion con otros actores-->
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
                                                <div class="twelve columns">
                                                    <input  style="padding: 5px 20px 6px 16px"  class="small button espacioInferior"  type="button" value="Editar" onclick="nueva_relacion_a_a('<?=$idActor ?>', 1 , '<?=$relacion['relacionActoresId']; ?>')" />
                                                    
                                                    <form  method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId'].$datosActor['actores']['actorId'].'/'.$datosActor['actores']['tipoActorId']; ?>" >
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
        <h2 class="open" >Actores colectivos </h2>
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
                                                <input  style="padding: 5px 20px 6px 16px"  class="small button espacioInferior" type="button"  value="Editar" onclick="nueva_relacion_a_Col('<?=$idActor ?>',1, '<?=$relacion['relacionActoresId']; ?>')"/>
                                                
                                                <form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId']; ?>/<?= $actorId?>/1" />
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
</div>
