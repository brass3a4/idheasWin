<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#lugares_paisesCatalogo_paisId').ddslick();
        });
    </script>
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

 
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/1' method="post" accept-charset="utf-8"  id="menuForm" name="menuForm" >
		   <input type="hidden" id="tipoActorAE"  name="4"/>
	       <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
	       <input type="hidden" <?=(isset($lugar['lugarId']) ? 'value="'.$lugar['lugarId'].'"'.' '.'name="lugares_lugarId"' : ''); ?>  id="lugares_lugarId" />
		   <input type="hidden" id='editar' name="editar" value="<?php if(isset($lugar['paisesCatalogo_paisId'])) echo '1';else'0';?>" />
	       <div class="twelve columns">
	       		<div class="six columns">		
		        	<label for="pais">País</label>
		       		<select id="lugares_paisesCatalogo_paisId" name="lugares_paisesCatalogo_paisId"  onkeypress="changeTest(1)">
				          	<option></option>
				          <?php if(isset($lugar['paisesCatalogo_paisId'])){?>
		                        <?php foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                    <option  value="<?=$item['paisId']?>" <?=($lugar['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
		                    <?php endforeach; } else { ?>
		                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
		                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
		                    <?php endforeach; } ?>
				     </select>
				 </div>    
				 <div class="six columns">
				 	<label for="estado">Estado</label>
				 	 <?php if(isset($lugar['estadosCatalogo_estadoId'])):?>
					     <select id="lugares_estadosCatalogo_estadoId" name="lugares_estadosCatalogo_estadoId" onkeypress="changeTest(2)">						
				                <?php foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($lugar['paisesCatalogo_paisId'] == $item['paises_paisId']):?>
				                    		<option  value="<?=$item['estadoId']?>" <?=($lugar['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
			                    	<?php endforeach;?> 
			             </select>
		             <?php else:?>
			             <select id="lugares_estadosCatalogo_estadoId" name="lugares_estadosCatalogo_estadoId"  disabled="disabled" onkeypress="changeTest(2)">						
				               
			             </select>
		             
		             <?php endif;?>
	             </div> 
	             <div class="six columns">
	             	<label for="municipio">Municipio</label>
	             	<?php if(isset($lugar['municipiosCatalogo_municipioId'])):?>
			             <select id="lugares_municipiosCatalogo_municipioId" name="lugares_municipiosCatalogo_municipioId">						
			                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                        <?php if($lugar['estadosCatalogo_estadoId'] == $item['estados_estadoId']):?>
				                    		<option  value="<?=$item['municipioId']?>" <?=($lugar['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > 
				                    			 <?=$item['nombre']?>
				                    		</option>
				                    	<?php endif;?>
			                    	<?php endforeach;?> 
			             </select>
		            <?php else:?>
		            	<select id="lugares_municipiosCatalogo_municipioId" name="lugares_municipiosCatalogo_municipioId" disabled="disabled">						
		                   
		            	 </select>
		            <?php endif;?> 	 
		         </div>    
			</div>
			<div>

			<?php echo br(4);?>		
			<input class="small button" style="margin-left: 30px;padding: 7px 12px 7px 12px" type="submit" value="Guardar"/>
			<input type="button" class="small button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
		</div>
</div>
</body>
</html>

