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

  <div class="six columns">		
	        <label for="pais">País</label>
	        	<input type="hidden" id="actorId"  name="<?php isset($actorId) ? $actorId:''?>"/>
	        	 <input type="hidden" id="tipoActorAE"  name="<?=$tipo?>"/>
	        	<?php if($tipo == 1):?>
		            <select id="datosDeNacimiento_paisesCatalogo_paisId" name="datosDeNacimiento_paisesCatalogo_paisId" onclick="changeTest(1)" onkeypress="changeTest(1)" onkeyup="changeTest(1)" >						
		                    <option></option>
		                    <?php if(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])){
		                        foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                    <option  value="<?=$item['paisId']?>" <?=($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
		                    <?php endforeach; } else { ?>
		                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
		                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
		                    <?php endforeach; } ?>
		             </select>
		         <?php endif;?>
		         <?php if($tipo == 2):?> 
		         	
		         	<select id="infoMigratoria_lugarOrigenPaisId" name="infoMigratoria_lugarOrigenPaisId"  onclick="changeTest(1)" onkeypress="changeTest(1)" onkeyup="changeTest(1)">						
		                    <option></option>
		                    <?php if(isset($datosActor['infoMigratoria']['lugarOrigenPaisId'])){?>
		                       <?php foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                    <option  value="<?=$item['paisId']?>" <?=($datosActor['infoMigratoria']['lugarOrigenPaisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
			                    <?php endforeach; } else { ?>
		                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
		                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
		                    <?php endforeach; } ?>
		             </select>
		         <?php endif;?> 	
		         
	             <?php if($tipo==3 ):?>
	             	<?php if(isset($direccionExtra)):?>
	             		<select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId" onclick="changeTest(1)" onkeypress="changeTest(1)" onkeyup="changeTest(1)">						
			                    <option></option>
			                    <?php if(isset($datosActor['direccionActor'])){
			                        	foreach($catalogos['paisesCatalogo'] as $key => $item): ?>
			                        	<!--muestra los estados civiles-->
			                    			<option  value="<?=$item['paisId']?>" <?php if($datosActor['direccionActor']['paisesCatalogo_paisId'] == $item['paisId']) echo 'selected="selected"'; else echo '' ; ?> > 
			                    				<?=$item['nombre']?>
			                    			</option>
			                    		<?php endforeach; 
			                      } else { ?>
			                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
			                        	<option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
			                    	<?php endforeach; 
								  } ?>
			             </select>
	             	<?php else:?>
	             		<select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId"  onclick="changeTest(1)" onkeypress="changeTest(1)" onkeyup="changeTest(1)">	
		             		<?php if(isset($datosActor['direccionActor'])):?>
		             			<?php foreach($datosActor['direccionActor'] as $direccion):?>
		             				<?php foreach($catalogos['paisesCatalogo'] as $key => $item): ?>
				                        	<!--muestra los estados civiles-->
				                    			<option  value="<?=$item['paisId']?>" <?php if($direccion['paisesCatalogo_paisId'] == $item['paisId']) echo 'selected="selected"'; else echo '' ; ?> > 
				                    				<?=$item['nombre']?>
				                    			</option>
				                    <?php endforeach; ?>
		             			<?php endforeach;?>	
		             		<?php else:?>
		             				 <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
				                        	<option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
				                    	<?php endforeach; ?>
		             		<?php endif;?> 
	             		 </select>
	            	<?php endif;?> 
	             <?php endif;?>
	             
	              <?php if($tipo == 4):?> 
		         	<select id="derechoAfectado_paisesCatalogo_paisId" name="derechoAfectado_paisesCatalogo_paisId" onclick="changeTest(1)" onkeypress="changeTest(1)" onkeyup="changeTest(1)">	
		         		<option></option>	
		         		<?php if(isset($derechoAfectado['paisesCatalogo_paisId'])):?>
		             				<?php foreach($catalogos['paisesCatalogo'] as $key => $item): ?>
				                        	<!--muestra los estados civiles-->
				                    			<option  value="<?=$item['paisId']?>" <?php if($derechoAfectado['paisesCatalogo_paisId'] == $item['paisId']) echo 'selected="selected"'; else echo '' ; ?> > 
				                    				<?=$item['nombre']?>
				                    			</option>
				                    <?php endforeach; ?>
		             		<?php else:?>
				                    <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
				                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
				                    <?php endforeach; ?>
		             		<?php endif;?> 
		             </select>
		         <?php endif;?> 	
	        <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
	        <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
	        </span>-->

        </div>

        <div class="six columns">
            <label for="estado">Estado</label>
            <?php if($tipo == 1):?>
	            	<?php if(isset($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'])):?>
		                <select id="datosDeNacimiento_estadosCatalogo_estadoId"    name="datosDeNacimiento_estadosCatalogo_estadoId"  onclick="changeTest(2)" onkeypress="changeTest(2)" onkeyup="changeTest(2)">						
			                 	
			                        <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'] == $item['paises_paisId']):?>
				                    		<option  value="<?=$item['estadoId']?>" <?=($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
			                    	<?php endforeach;?> 
								
		                </select>
	                <?php else:?>
	                	<select id="datosDeNacimiento_estadosCatalogo_estadoId"  disabled="disabled"  name="datosDeNacimiento_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">						
			                 	
		                </select>
	                <?php endif;?>
            <?php endif;?>
            <?php if($tipo == 2):?>
            	<?php if(isset($datosActor['infoMigratoria']['lugarOrigenEstadoId'])):?>
		                <select id="infoMigratoria_lugarOrigenEstadoId"    name="infoMigratoria_lugarOrigenEstadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">						
			                 	
			                        <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($datosActor['infoMigratoria']['lugarOrigenPaisId'] == $item['paises_paisId']):?>
				                    		<option  value="<?=$item['estadoId']?>" <?=($datosActor['infoMigratoria']['lugarOrigenEstadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
			                    	<?php endforeach;?> 
								
		                </select>
	                <?php else:?>
	                	<select id="infoMigratoria_lugarOrigenEstadoId"  disabled="disabled"  name="infoMigratoria_lugarOrigenEstadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">						
			                 	
		                </select>
	                <?php endif;?>
            <?php endif;?> 
		    <?php if($tipo==3):?>
		    	<?php if(isset($direccionExtra)):?>
		    		<?php if(isset($datosActor['direccionActor'])):?>
		                <select id="direccionActor_estadosCatalogo_estadoId"  name="direccionActor_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">
			                       <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                        <?php if($datosActor['direccionActor']['paisesCatalogo_paisId'] == $item['paises_paisId']):?>
			                    		<option  value="<?=$item['estadoId']?>" <?=($datosActor['direccionActor']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
			                    			 <?=$item['nombre']?>
			                    		</option>
			                    	<?php endif;?>
			                    <?php endforeach;?>
		                </select>
		            <?php else:?>  
		            	<select id="direccionActor_estadosCatalogo_estadoId" disabled="disabled" name="direccionActor_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">
			                     
		                </select>
		            <?php endif;?> 
		    	<?php else:?>	
		    		<?php if(isset($datosActor['direccionActor'])):?>
		    			<?php foreach ($datosActor['direccionActor'] as $direccion) :?>
							 <select id="direccionActor_estadosCatalogo_estadoId"  name="direccionActor_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">
			                       <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                        <?php if($direccion['paisesCatalogo_paisId'] == $item['paises_paisId']):?>
			                    		<option  value="<?=$item['estadoId']?>" <?=($direccion['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
			                    			 <?=$item['nombre']?>
			                    		</option>
			                    	<?php endif;?>
			                    <?php endforeach;?>
		                	</select>
							
						<?php endforeach;?>
		    		<?php else:?>  
		            	<select id="direccionActor_estadosCatalogo_estadoId" disabled="disabled" name="direccionActor_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">
			                     
		                </select>
		            <?php endif;?>  	
		    	<?php endif;?>
            <?php endif;?>
             <?php if($tipo ==4):?>
             	<?php if(isset($derechoAfectado['estadosCatalogo_estadoId'])):?>
		            		<select id="derechoAfectado_estadosCatalogo_estadoId"  name="derechoAfectado_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">						
			                       <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                        <?php if($derechoAfectado['paisesCatalogo_paisId'] == $item['paises_paisId']):?>
			                    		<option  value="<?=$item['estadoId']?>" <?=($derechoAfectado['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
			                    			 <?=$item['nombre']?>
			                    		</option>
			                    	<?php endif;?>
			                    <?php endforeach;?>
		                	</select>
		    		<?php else:?>  
		            	<select id="derechoAfectado_estadosCatalogo_estadoId"  disabled="disabled"  name="derechoAfectado_estadosCatalogo_estadoId" onclick="changeTest(2)"  onkeypress="changeTest(2)" onkeyup="changeTest(2)">						
			                 	
		                </select>
		            <?php endif;?> 
            <?php endif;?> 
            <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
            <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
            </span>-->
        </div>

        <div class="six columns">
            
                <label for="municipio">Municipio</label>
                <?php if($tipo == 1):?>
                	<?php if(isset($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'])):?>
		               <select id="datosDeNacimiento_municipiosCatalogo_municipioId"  name="datosDeNacimiento_municipiosCatalogo_municipioId">						
		                   
			                        <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                        <?php if($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'] == $item['estados_estadoId']):?>
			                    		<option  value="<?=$item['municipioId']?>" <?=($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
			                    			 <?=$item['nombre']?>
			                    		</option>
			                    	<?php endif;?>
			                    <?php endforeach;?>
		                </select>
		             <?php else:?> 
		             	 <select id="datosDeNacimiento_municipiosCatalogo_municipioId" disabled="disabled" name="datosDeNacimiento_municipiosCatalogo_municipioId">						
		                   
		                </select>
		             <?php endif;?>      
	             <?php endif;?>
	             <?php if($tipo==2):?>
	            	 <?php if(isset($datosActor['infoMigratoria']['lugarOrigenMunicipioId'])):?>
		               <select id="infoMigratoria_lugarOrigenMunicipioId"  name="infoMigratoria_lugarOrigenMunicipioId">						
		                   
			                        <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                        <?php if($datosActor['infoMigratoria']['lugarOrigenEstadoId'] == $item['estados_estadoId']):?>
			                    		<option  value="<?=$item['municipioId']?>" <?=($datosActor['infoMigratoria']['lugarOrigenMunicipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
			                    			 <?=$item['nombre']?>
			                    		</option>
			                    	<?php endif;?>
			                    <?php endforeach;?>
		                </select>
		             <?php else:?> 
		             	 <select id="infoMigratoria_lugarOrigenMunicipioId" disabled="disabled" name="infoMigratoria_lugarOrigenMunicipioId">						
		                   
		                </select>
		             <?php endif;?> 
	             <?php endif;?>
		         <?php if($tipo==3):?>
		         	<?php if(isset($direccionExtra)):?>
		         		 <?php if(isset($datosActor['direccionActor'])):?>
			             	<select id="direccionActor_municipiosCatalogo_municipioId" name="direccionActor_municipiosCatalogo_municipioId">
				                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($datosActor['direccionActor']['estadosCatalogo_estadoId'] == $item['estados_estadoId']):?>
				                    		<option  value="<?=$item['municipioId']?>" <?=($datosActor['direccionActor']['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
				                    <?php endforeach;?>
			                </select>
		                 <?php else:?> 
		                 	<select id="direccionActor_municipiosCatalogo_municipioId" disabled="disabled" name="direccionActor_municipiosCatalogo_municipioId">
		                 		
			                </select>
		                 <?php endif;?> 
		         	 <?php else:?>	
		         	 	
			    		<?php if(isset($datosActor['direccionActor'])):?>
			    			<?php foreach ($datosActor['direccionActor'] as $direccion) :?>
			    				
								 <select id="direccionActor_municipiosCatalogo_municipioId" name="direccionActor_municipiosCatalogo_municipioId">
				                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($direccion['estadosCatalogo_estadoId'] == $item['estados_estadoId']):?>
				                    		<option  value="<?=$item['municipioId']?>" <?=($direccion['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
				                    <?php endforeach;?>
			                	</select>
							<?php endforeach;?>
			    		<?php else:?>  
			            	<select id="direccionActor_municipiosCatalogo_municipioId" disabled="disabled" name="direccionActor_municipiosCatalogo_municipioId">
				                     
			                </select>
			            <?php endif;?>  	
			    	<?php endif;?>	
		         	 
                 <?php endif;?>
                  <?php if($tipo==4):?>
                  	<?php if(isset($derechoAfectado['municipiosCatalogo_municipioId'])):?>
			            	<select id="derechoAfectado_municipiosCatalogo_municipioId" name="derechoAfectado_municipiosCatalogo_municipioId">						
				                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($derechoAfectado['estadosCatalogo_estadoId'] == $item['estados_estadoId']):?>
				                    		<option  value="<?=$item['municipioId']?>" <?=($derechoAfectado['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
				                    <?php endforeach;?>
			                </select>
			    		<?php else:?>  
			            	<select id="derechoAfectado_municipiosCatalogo_municipioId" disabled="disabled" name="derechoAfectado_municipiosCatalogo_municipioId">						
		                   
		                	</select>
			            <?php endif;?>  
	             <?php endif;?>
            <!--<input id="BotonmasdatosDeNacimiento_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
            <span id="TextoEspecial_datosDeNacimiento_municipiosCatalogo_municipioId" class="Escondido twelve columns">
            </span>-->
        </div>