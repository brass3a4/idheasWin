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

 <div id="vista" class="seven columns">
	<?=$head;?>
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
			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/clear.png" id="clearButton" onclick="returnRelacionCasos()">
		</div>
    	<div style="float: right; padding: 0px 15px 0px 0px;">
         	<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="searchCaso()">
        </div>
   <?php endif;?>	 
  
    <?=br(2);?>
    <div class="twelve columns">
        <h1><div class="six columns">Nombre</div></h1>
        </div>
    <!------------Lista ind-------------------->
    <?php $total=0;?>
    <div  id="listaActorIndiv" class="PruebaScorll">
        <?php if(isset($listado) && $listado != null){
            	if ($listado!="Aún no tienes casos en la base de datos") {
	                foreach($listado as $index => $caso): ?>
	                <?php if(isset($caso['casoId'])): ?>
		                <?php $total=$total+1;?>
		                 <div class="twelve columns noSeleccionado" id="caja<?=$caso['casoId']; ?>" onclick="casoSeleccionado('<?=$caso['casoId']?>','<?=$caso['nombre']?>','<?=$caso['fechaInicial']?>','<?=$caso['fechaTermino']?>')" style="cursor: pointer;">
				             <?=$caso['nombre']; ?>
				        </div>
				        <hr />
		               <?php endif?>   
	            	<?php endforeach;
            	}else{
            		echo($listado);
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
    <div class="espacioSuperior">
        <input type="button" class="tiny button" value="Cerrar" onclick="cerrarVentana()">
    </div>
</div>
