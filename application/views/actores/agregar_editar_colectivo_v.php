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

<input type="hidden" id="tipoActorAE"  name="3"/>
<form action="<?=$action; ?>" method="post" enctype="multipart/form-data" id="menuForm" name="menuForm">
	
<div class="three columns">
            <?php if(isset($datosActor)){ ?>    

            <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
            <input type="hidden" value="<?=$actorId; ?>" name="direccionActor_actores_actorId" />
            <input type="hidden" value="<?=$actorId; ?>" name="infoGralActores_actores_actorId" />
            <div id="espacioFoto">
                <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
            </div>
            <?php }?>


            <label>Foto </label>
                <input name="archivo" type="file" size="10" accept="image/*" />  
                <input type="hidden" <?= (isset($datosActor['actores']['foto'])) ? 'value="'.$datosActor['actores']['foto'].'"' : "" ;?>  name="actores_foto" />
               <?php if(isset($datosActor['actores']['foto'])):?>
                	<input type="button" class="small button" value="Eliminar Foto" onclick="eliminarFoto()" onkeyup="eliminarFoto()">
    			<?php endif;?>
</div>


<div class="nine columns">
        <?php if(isset($actorId)){ ?>
        <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
    <?php } ?>
    <input type="hidden" value="3" name="actores_tipoActorId" />
<div	id="Actores" >
<fieldset >
    <legend>Información general</legend>

    <div class="twelve columns"> 
        <div class="six columns">
        <label for="nombre">Nombre</label>
                <input autofocus type="text" id="actores_nombre" name="actores_nombre"  <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['nombre'].'"' : ''); ?> required />
        </div>
        <div class="six columns">    
            <label for="siglas">Siglas</label>
                <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : 'value=""'); ?> />

        </div>
    </div> 

    <div class="twelve columns"> 
        <div class="six columns">
            <label for="tipoActor">Tipo de actor colectivo</label>
            <span id="infoGralActores_tipoActorColectivoIdSelect">
	             <select onkeyup="notasCatalogos('1',value,'infoGralActores_tipoActorColectivoId','2')" onclick="notasCatalogos('1',value,'infoGralActores_tipoActorColectivoId','2')"  name="infoGralActores_tipoActorColectivoId" id="infoGralActores_tipoActorColectivoId">
		            <option></option>
		            <?php if(isset($datosActor['infoGralActores']['tipoActorColectivoId'])){
		            foreach($catalogos['tipoActorColectivo'] as $key => $item): ?> <!--muestra los estados civiles-->
		            	<option name="<?=$item['notas']?>" value="<?=$item['tipoActorColectivoId'];?>" id="<?=$item['tipoActorColectivoId']; ?>"<?=($datosActor['infoGralActores']['tipoActorColectivoId'] == $item['tipoActorColectivoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
		            <?php endforeach; } else { ?>
		            <?php foreach($catalogos['tipoActorColectivo'] as $key => $item):?> <!--muestra los estados civiles-->
		           		<option name="<?=$item['notas']?>" value="<?=$item['tipoActorColectivoId'];?>" id="<?=$item['tipoActorColectivoId']; ?>" ><?=$item['descripcion']; ?></option>
		            <?php endforeach; } ?>
	            </select><div id="notasinfoGralActores_tipoActorColectivoId"></div>
            </span>
            <!--<input id="BotonmasinfoGralActores_tipoActorColectivoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
            <span id="TextoEspecial_infoGralActores_tipoActorColectivoId" class="Escondido twelve columns"></span>-->
        </div>
        <div class="six columns">
            
            <label for="actividad">Actividad</label>
            <span id="infoGralActores_actividadSelect">
            <select onclick="notasCatalogos('2',value,'infoGralActores_actividad','2')" onkeyup="notasCatalogos('2',value,'infoGralActores_actividad','2')" name="infoGralActores_actividad" id="infoGralActores_actividad">
				<option > </option>
	            <?php if(isset($datosActor['infoGralActores']['actividad'])){
	            foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
	            <?php if($item['tipoActorId'] == 2){ ?>
	                <option name="<?=$item['notas']?>" id="<?=$item['ocupacionId']; ?>OC" value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActores']['actividad'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
	             <?php } ?>
	            <?php endforeach; } else { ?>
	            <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
	            <?php if($item['tipoActorId'] == 2){ ?>
	                <option name="<?=$item['notas']?>" id="<?=$item['ocupacionId']; ?>OC" value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
	             <?php } ?>
	            <?php endforeach; } ?>
            </select><div id="notasinfoGralActores_actividad"></div>
            </span>
            <!--<input id="BotonmasinfoGralActores_actividad" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />  
            <span id="TextoEspecial_infoGralActores_actividad" class="Escondido twelve columns"></span>-->

        </div>  <!--six columns--> 
    </div>



</fieldset>	<!--Termina Información general-->
<?php echo br(2);?>

<?php if (isset($datosActor['direccionActor'])) {?>
    <?php foreach ($datosActor['direccionActor'] as $direccion){?>
    <fieldset>
        <legend>Dirección</legend>
        <div class="twelve columns">  
			<div class="twelve columns"> 
	            <label for="ubicacion">Ubicación</label>
	            <input type="text"  name="direccionActor_direccion" value="<?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?>" size="30"    />
           	</div>
            <?=$filtroPais;?>	           
        <!--<input id="Botonmas2direccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />    
        <span id="TextoEspecial_2direccionActor_municipiosCatalogo_municipioId" class="Escondido twelve columns"></span>-->
	        <div class="six columns"> 
		        <label for="codigoPos">Código Postal</label>
		        <input type="number"  name="direccionActor_codigoPostal" pattern="[0-9]+" <?=(isset($direccion['codigoPostal']) ? 'value="'.$direccion['codigoPostal'].'"' : 'value=""'); ?>  size="30"  />
			</div>
        </div> 


    </fieldset><!--Termina dirección-->
    <?php }
    }else{?>
        <fieldset>
                <legend>Dirección</legend>
                <div class="twelve columns">  
					<div class="twelve columns"> 
			            <label for="ubicacion">Ubicación</label>
			            <input type="text"  name="direccionActor_direccion" value="<?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?>" size="30"    />
		           	</div>
		            <?=$filtroPais;?>	           
		        <!--<input id="Botonmas2direccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />    
		        <span id="TextoEspecial_2direccionActor_municipiosCatalogo_municipioId" class="Escondido twelve columns"></span>-->
			        <div class="six columns"> 
				        <label for="codigoPos">Código Postal</label>
				        <input type="number"  name="direccionActor_codigoPostal" pattern="[0-9]+" <?=(isset($direccion['codigoPostal']) ? 'value="'.$direccion['codigoPostal'].'"' : 'value=""'); ?>  size="30"  />
					</div>
		        </div> 
            </fieldset><!--Termina dirección-->
    <?php }?>

<?php echo br(2);?>

<fieldset>

    <legend>Información de contacto</legend>

    <div class="twelve columns">

        <div class="six columns">
            <label for="telefono">Teléfono</label>
            <input type="text" id="infoContacto_telefono" name="infoContacto_telefono" <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : 'value=""'); ?>  size="30"  />
        </div>

        <div class="six columns">
            <label for="fax">Fax</label>
            <input type="text" id="infoContacto_fax" name="infoContacto_fax"  <?=(isset($datosActor['infoContacto']['fax']) ? 'value="'.$datosActor['infoContacto']['fax'].'"' : 'value=""'); ?>  size="30" />
        </div>

    </div> <!-- six columns -->

    <div class="twelve columns">

        <div class="six columns"> 
            <label for="correo">Correo electrónico</label>
            <input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : 'value=""'); ?>  size="30"  />
        </div>
        <div class="six columns"> 
            <label for="paginaPersonal">Página web</label>
            <input type="text" id="infoGralActores_paginaWeb" name="infoGralActores_paginaWeb"  <?=(isset($datosActor['infoGralActores']['paginaWeb']) ? 'value="'.$datosActor['infoGralActores']['paginaWeb'].'"' : 'value=""'); ?>  size="30" />
        </div>
    
    </div> <!--six columns-->

</fieldset><!--Termina información de contacto-->


    <div class="twelve columns espacioInferior espacioSuperior">
        <div class="six columns">
            <input class="medium button" type="submit" value="Guardar" />
        </div>      
</form>
        <div  class="six columns" >
                <a style="float: right;" href="<?=base_url(); ?>index.php/actores_c/mostrar_actor/<?= (isset($actorId)) ? $actorId : "0" ;?>/3" class="medium button">Cancelar</a>
        </div>
    </div>

</div>
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
        <h2 class="open" >Actores individuales o transmigrantes</h2> 
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
                                    if ($citas['datosCitas']['tipoRelacionIndividualColectivoId']==2) {?>
                                        <tr>
                                            <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
                                            <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['Nivel2']; ?></td>
                                            <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                            <td><?=$citas['datosCitas']['fechaInicial']; ?></td>
                                            <td><?=$citas['datosCitas']['fechaTermino']; ?></td>
                                        </tr><?php
                                    }
                                }
                            } ?>
                            </tbody>
                        </table>
<!--         <div id="subPestanias" data-collapse>   
            <h2>Relacion con otros actores </h2>
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
                                        <div class="six columns">
                                        <input type="button" class="tiny button"  value="Editar" onclick="nueva_relacion_a_a('<?=$idActor ?>' , '1' , '<?=$relacion['relacionActoresId']; ?>')" />
                                        </div>
                                        <div class="six columns">                                                           
                                        <form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId']; ?>/<?= $actorId?>/3" >
                                            <input type="submit" value="Elminar" class="tiny button" />
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php }
                        }
                    } ?>
                </tbody>
            </table>

            <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_a('<?=$idActor ?>','0','1')" />
        </div>
        </div>

        <div id="subPestanias"  data-collapse>
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
                                    if ($citas['datosCitas']['tipoRelacionIndividualColectivoId']==2) {?>
                                        <tr>
                                            <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
                                            <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['Nivel2']; ?></td>
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
        
  -->       
        </div>
</div>
    
    <!--Comienza actores colectivos---->
    <div id="pestania" data-collapse>
        <h2  class="open" >Actores colectivos </h2>
        <div>

            <div id="subPestanias" data-collapse >
                <h2 class="open" >Relacion con otros actores </h2>
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
                                if ($relacion['tipoRelacionIndividualColectivoId']==3) {
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
                                                <input style="padding: 5px 18px 6px 18px" type="button" class="small button espacioInferior"  value="Editar" onclick="nueva_relacion_a_Col('<?=$idActor ?>','1', '<?=$relacion['relacionActoresId']; ?>')" />
                                                
                                                <form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId']; ?>/<?= $actorId?>/3" >
                                                    <input  type="submit" value="Elminar" class="small button" />
                                                </form>
                                            </div>
                                        </td>
                                    </tr><?php
                                }
                                }
                            } ?>
                        </tbody>
                    </table>
                    <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_Col('<?=$idActor; ?>','0','0')" />
                </div>
            </div>

            <!--Comienza citado como persona relacionada colectivo-->
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
                                if ($citas['datosCitas']['tipoRelacionIndividualColectivoId']==3) {?>
                                    <tr>
                                        <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
                                        <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['Nivel2']; ?></td>
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
            <!--Termina citado como persona relacionada colectivo-->

        </div>
    </div>
        <!--Termina actores colectivos-->
</fieldset>

</div>
