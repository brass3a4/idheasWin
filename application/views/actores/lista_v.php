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

 <div id="vista">
	<div class="twelve columns"><!--Lista de Actores-->  
	<form  method="post" accept-charset="utf-8" id="formEditarActor">
        <div class="twelve columns">
        	<input id="<?=$is_active; ?>_nombre" type="text"  name="<?=$is_active; ?>_nombre"  value="<?php if(isset($cadena)) echo $cadena;?>"
        	placeholder="<?=($is_active == 'actores') ? 'Por nombre o apellido' : 'Por nombre del caso' ; ?>" class="seven columns" />
        </div>        
    </form> 
    	<br>
   <?php if($is_active == 'casos'): ?>  
   	    <div style="float: right; padding: 0px 15px 0px 0px;">
			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/clear.png" id="clearButton" onclick="returnCasos()">
		</div>
    	<div style="float: right; padding: 0px 15px 0px 0px;">
         	<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="searchCaso()">
        </div>
   <?php endif;?>	 
   
   <?php if($is_active == 'actores'): ?>     	
		<div style="float: right; padding: 0px 15px 0px 0px;">
			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/clear.png" id="clearButton" onclick="returnActores()">
		</div>
    	<div style="float: right; padding: 0px 15px 0px 0px;">
         	<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="filtroRadio(5)">
        </div>
        
  
    <div id="pestania" data-collapse>					
				<h2>Filtros</h2><!--título de la pestaña-->  
				<div>
					
					<form name="frmR">
							<div>
								<?php if(isset($tipoFiltro) && $tipoFiltro == 1): ?>
									<input type="radio" name="filtroR" value="1" onclick="filtroRadio(1)" checked="checked">Víctima</input>
							    <?php else:?>
							    	<input type="radio" name="filtroR" value="1" onclick="filtroRadio(1)">Víctima</input>
							    <?php endif;?>
							    
							    <?php if(isset($tipoFiltro) && $tipoFiltro == 2): ?>
									<input type="radio" name="filtroR" value="2" onclick="filtroRadio(2)" checked="checked">Perpetrador</input>
							    <?php else:?>
							    	<input type="radio" name="filtroR" value="2" onclick="filtroRadio(2)">Perpetrador</input>
							    <?php endif;?>
							</div>
							<div>
								<?php if(isset($tipoFiltro) && $tipoFiltro == 3): ?>
									<input type="radio" name="filtroR" value="3" onclick="filtroRadio(3)" checked="checked">Interventor</input>
							    <?php else:?>
							    	<input type="radio" name="filtroR" value="3" onclick="filtroRadio(3)">Interventor</input>
							    <?php endif;?>
							    <?php if(isset($tipoFiltro) && $tipoFiltro == 4): ?>
									<input type="radio" name="filtroR" value="4" onclick="filtroRadio(4)" checked="checked">Receptor</input>
							    <?php else:?>
							    	<input type="radio" name="filtroR" value="4" onclick="filtroRadio(4)">Receptor</input>
							    <?php endif;?>
							</div>
							<div>
								<?php if(isset($tipoFiltro) && $tipoFiltro == 0): ?>
									<input type="radio" name="filtroR" value="0" onclick="filtroRadio(0)" checked="checked">Sin filtro</input>
							    <?php else:?>
							    	<input type="radio" name="filtroR" value="0" onclick="filtroRadio(0)">Sin filtro</input>
							    <?php endif;?>
								<input type="hidden" name="<?=$is_actor_type; ?>" id="tipoActor" ></input>
								<input type="hidden" name="0" id="tipoVentana" />
							</div>
						</form>
				</div>	
    </div>
   <?php endif;?>
    
    <div class="twelve columns">
    	<?php if($is_active == 'actores') echo ' <h1><div class="six columns">Foto</div></h1>'?>
       
        <h1><div class="six columns">Nombre</div></h1>
    </div>
    <!------------Lista ind-------------------->
    <?php $total=0;?>
    <div  id="listaActorIndiv" class="PruebaScorll">
        <?php if(isset($listado) && $listado != null){
        	
             if($is_active == 'actores'){
                foreach($listado as $actor): ?>
	                <?php $total=$total+1?>
	                <?php if(isset($actorId) && $actorId== $actor['actorId']): ?>
	                	 <div class="twelve columns" id="caja<?=$actor['actorId']; ?>" onclick="cargarActor(<?=$actor['actorId']; ?>,<?=$is_actor_type; ?>)" style="cursor: pointer;background:#ccc;">
		                    <img class="five columns" style="width:100px !important; height:70px !important;" src="<?=base_url().$actor['foto']; ?>" />
		                    <p style="color:#0080FF;"><?=$actor['nombre'].' '.$actor['apellidosSiglas']; ?></p>
			             </div>
			             <hr />	  
	                <?php else:?>
	                	 <div class="twelve columns" id="caja<?=$actor['actorId']; ?>" onclick="cargarActor(<?=$actor['actorId']; ?>,<?=$is_actor_type; ?>)" style="cursor: pointer;">		        
		                    <img class="five columns" style="width:100px !important; height:70px !important;" src="<?=base_url().$actor['foto']; ?>" />
		                    <p style="color:#0080FF;"><?=$actor['nombre'].' '.$actor['apellidosSiglas']; ?></p>
			             </div>
			             <hr />	                	
	                <?php endif?>
	               
            	<?php endforeach;
            } else{
            	if ($listado!="Aún no tienes casos en la base de datos") {
	                foreach($listado as $index => $caso): ?>
	                <?php if(isset($caso['casoId'])): ?>
		                <?php $total=$total+1;?>
		                 <?php if(isset($casoId) && $casoId == $caso['casoId']): ?>
				                <div class="twelve columns" id="caja<?=$caso['casoId']; ?>" onclick="cargarCaso(<?=$caso['casoId']; ?>)" style="cursor: pointer;background:#ccc;">
				                   <?=$caso['nombre']; ?>
				                </div>
				                <hr />
		                 <?php else:?>
		                 		 <div class="twelve columns" id="caja<?=$caso['casoId']; ?>" onclick="cargarCaso(<?=$caso['casoId']; ?>)" style="cursor: pointer;">
				                   <?=$caso['nombre']; ?>
				                </div>
				                <hr />
		                 <?php endif?>
		               <?php endif?>   
	            	<?php endforeach;
            	}else{
            		echo($listado);
            	}
            }
        } ?>
    </div><!--Termina lista de los actores-->
    
    <div id="numeroRegistros">
    	
    	<?php if ($total==1) {
    		print_r($total); ?>
			registro encontrado
		<?php } else {
			print_r($total); ?>
				registros encontrados
		<?php } ?> 
    </div>
    
	</div>
</div>
