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

  <div class="ten columns">	
 			<?php if(isset($tipoT)):?> 
 				<div class="twelve columns">
		        	<label for="pais">País</label>
			         	 <select id="datosDeNacimiento_paisesCatalogo_paisId" name="datosDeNacimiento_paisesCatalogo_paisId" onclick="changeTest3(1)" onkeypress="changeTest3(1)">						
			                    <option></option>
			                    <?php if(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])){
			                        foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                    <option  value="<?=$item['paisId']?>" <?=($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
			                    <?php endforeach; } else { ?>
			                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
			                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
			                    <?php endforeach; } ?>
			             </select>
		       	</div>
 				<div class="twelve columns">
            		<label for="estado">Estado</label>
			     		<select id="datosDeNacimiento_estadosCatalogo_estadoId"    name="datosDeNacimiento_estadosCatalogo_estadoId"  onclick="changeTest3(2)" onkeypress="changeTest3(2)">						
				                 	
				                        <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
					                        <?php if($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'] == $item['paises_paisId']):?>
					                    		<option  value="<?=$item['estadoId']?>" <?=($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
					                    			 <?=$item['nombre']?>
					                    		</option>
					                    	<?php endif;?>
				                    	<?php endforeach;?> 
									
			                </select>
		       	</div>
 				<div class="twelve columns">
            		<label for="municipio">Municipio</label>
		                <select id="datosDeNacimiento_municipiosCatalogo_municipioId"  name="datosDeNacimiento_municipiosCatalogo_municipioId">						
		                   
			                        <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                        <?php if($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'] == $item['estados_estadoId']):?>
			                    		<option  value="<?=$item['municipioId']?>" <?=($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
			                    			 <?=$item['nombre']?>
			                    		</option>
			                    	<?php endif;?>
			                    <?php endforeach;?>
		                </select>
		       	</div>
		        
		    <?php else:?> 
 	
 		
	        <label for="pais">País</label>
	        
			         	<select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId" onclick="changeTest2(1)" onkeypress="changeTest2(1)">						
			                    <option></option>
			                    <?php if(isset($datosActor['direccionActor'])){
							        foreach ($datosActor['direccionActor'] as $direccion) {
			                        	foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                    			<option  value="<?=$item['paisId']?>" <?=($direccion['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
			                    		<?php endforeach; 
			                    	  }
			                      } else { ?>
			                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
			                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
			                    <?php endforeach; } ?>
			             </select>
	        	
	        <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
	        <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
	        </span>-->

        </div>
        <div class="ten columns">
            <label for="estado">Estado</label>
            <select id="direccionActor_estadosCatalogo_estadoId"  disabled="disabled"  name="direccionActor_estadosCatalogo_estadoId" onclick="changeTest2(2)" onkeypress="changeTest2(2)">						
		               
	        </select>
        </div>
		<br>
        <div class="ten columns">
            <label for="municipio">Municipio</label>
	        <select id="direccionActor_municipiosCatalogo_municipioId"  disabled="disabled"  name="direccionActor_municipiosCatalogo_municipioId">
	        	
	        </select>
        </div>
        <?php endif;?> 