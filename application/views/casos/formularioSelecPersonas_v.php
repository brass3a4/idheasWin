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

 <!-------------------Comienza la parte de seleccion de personas------------------------------------->
<div id="formularioDetallerLugar">
	<div id="pestania" data-collapse>
		<h2 class="twelve columns">Selección de personas</h2><!--título de la sub-pestaña--->  
		<div class="twelve columns">
			<dl class="tabs">
			  <dd class="active" onclick="pestania1()"><a href="#simple1">Actor individual</a></dd>
			  <dd><a href="#simple2" onclick="pestania2()">Actor transmigrante</a></dd>
			</dl>

			<ul class="tabs-content">
			  <li class="active" id="selccPerInd">
			<div  id="listaActorIndiv" class="casosScorll">
					<?php if($listaActores['individual']){ ?>
                           <?php foreach($listaActores['individual']  as $index => $item):?> <!--muestra cada elemento de la lista-->
					
							<div class="twelve columns" onclick="mostarDatosListaElem()"><!---Funcion seleccion de personas---->
								<div class="five columns"><!--imprimo imagenes-->
									<?php echo img($item['actorId']);?>
									<?php echo br(2);?>	
								</div>
								
								<div class="seven columns"><!--Imprimo nombres-->
										<?=$item['nombre']?>
										<?php echo br(2);?>	
								</div>
							</div>
							
					<?php endforeach;?><!--Termina lista de los actores-->
                                           <?php } ?>
			</div>
			
				  
			  </li>
			  <!--Termina lista de actores individuales--->
			  
			  <!--Comienza lista de actores transmigrantes--->
			  <li id="selccPerTrans">
				<div id="listaActorTrans" class="casosScorll">		
                            <?php if(isset($listaActores['transmigrante'])){ ?>
					<?php foreach($listaActores['transmigrante'] as $index => $item):?> <!--muestra cada elemento de la lista-->
					
							<div class="twelve columns" onclick="mostarDatosListaElem()"><!---Funcion seleccion de personas---->
								<div class="five columns"><!--imprimo imagenes-->
									<?php echo img($item['actorId']);?>
									<?php echo br(2);?>	
								</div>
								
								<div class="seven columns"><!--Imprimo nombres-->
										<?=$item['nombre']?>
										<?php echo br(2);?>	
								</div>
							</div>
							
					<?php endforeach;?><!--Termina lista de los actores-->
                                        <?php } ?>
				</div>
					
  
			  </li>
			</ul>
		
		<input type="button" class="medium button"  value="Agrear" onclick="" />	
		</div>
	</div>
</div>
<!-------------------Termina la parte de seleccion de personas------------------------------------->

