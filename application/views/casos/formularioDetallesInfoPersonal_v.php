<html>
	<head>

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

 
	<form action="controllers/actores_c/agregarActor" method="post" accept-charset="utf-8">
		<!-----------------Comienza la parte de fuentes de información personal ------------------------>
		<div id="formularioFuenteInfoPer">
		<div id="pestania" data-collapse>
			<h2 class="twelve columns">Detalle de información personal</h2><!--título de la sub-pestaña---->  
			<div>
				<div class="twelve columns">
					<div class="six columns">
						<div  id="listaActoresreceptor" class="casosScorll">
								<?php if($listaActores['individual']){ ?>
								<?php foreach($listaActores['individual']  as $index => $item):?> <!--muestra cada elemento de la lista-->
								
										<div class="twelve columns" onclick="">  <!--funcion interventor-->
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
									
								<?php if(isset($listaActores['transmigrante'])){ ?>
									<?php foreach($listaActores['transmigrante'] as $index => $item):?> <!--muestra cada elemento de la lista-->
									
											<div class="twelve columns" onclick=""><!---función interventor---->
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

						<input type="button" class="medium button"  value="Persona" onclick="" />
					</div>

					<div class="six columns">
						<div id="listaActorColect" class="PruebaScorll">
										<?php if(isset($listaActores['colectivo'])){ ?>
								<?php foreach($listaActores['colectivo'] as $index => $item):?> <!--muestra cada elemento de la lista-->
								
										<div class="twelve columns" onclick="mostarDatosListaElem()">
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
									
						<input type="button" class="medium button"  value="Actor colectivo" onclick="" />	
					</div>		
				</div>
				
				<div class="twelve columns">
				<div class="six columns">
			<label for="fecha">Fecha</label>
					<select onclick="Detalleinfo(value)" onkeyup="Detalleinfo(value)" id="fuenteInfoPersonal_fecha" name="fuenteInfoPersonal_fecha">
								<option  value="1" checked="checked" >fecha exacta</option>
								<option  value="2">fecha aproximada</option>
								<option  value="3">Se desconce el día</option>
								<option  value="4">Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<?php echo br(1);?>	
					<p class="Escondido" id="fechaExactaVIP">
						<input type="text" id="fechaExactaIP"  value="<?php echo set_value('fecha'); ?>" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxVIP">
						<input type="text" id="fechaAproxIP"  value="<?php echo set_value('fecha'); ?>" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaVIP">
						<input type="text" id="fechaSinDiaIP"  value="<?php echo set_value('fecha'); ?>" placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesVIP">
						<input type="text" id="fechaSinDiaSinMesIP" value="<?php echo set_value('fecha'); ?>" placeholder="AAAA-00-00" />

					</p>
				</div>
			</div> <!---termina opciones de fechaInicial-->
				
			
				<div class="twelve columns">
					<div class="six columns">
							<p>
								<label for="idioma">Idioma</label>
								<select id="fuenteInfoPersonal_idiomaCatalogo_idiomaId" name="fuenteInfoPersonal_idiomaCatalogo_idiomaId">						
								<?php foreach($pais as $key => $item):?> 
										<option value="<?=$item?>"><?=$key?></option>
								<?php endforeach;?>
								</select>

							</p>
					</div>
					<div class="six columns">
							<p>
								<label for="nivConfiabilidad">Nivel de confiabilidad</label>
								<select id="fuenteInfoPersonal_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="fuenteInfoPersonal_nivelConfiabilidadCatalogo_nivelConfiabilidadId">
								<?php foreach($pais as $key => $item):?> 
										<option value="<?=$item?>"><?=$key?></option>
								<?php endforeach;?>
								</select>

							</p>
					</div>
					
				<fieldset>
					<legend>Actor reportado</legend>
						lista de actores 
				<div class="twelve columns">
					<div class="six columns">
					<div  id="listaActoresreceptor" class="casosScorll">
							<?php if($listaActores['individual']){ ?>
							<?php foreach($listaActores['individual']  as $index => $item):?> <!--muestra cada elemento de la lista-->
							
									<div class="twelve columns" onclick="">  <!--funcion interventor-->
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
								
							<?php if(isset($listaActores['transmigrante'])){ ?>
								<?php foreach($listaActores['transmigrante'] as $index => $item):?> <!--muestra cada elemento de la lista-->
								
										<div class="twelve columns" onclick=""><!---función interventor---->
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

						<input type="button" class="medium button"  value="Persona" onclick="" />
					</div>

					<div class="six columns">
						Colectivo
						<div id="listaActorColect" class="PruebaScorll">
										<?php if(isset($listaActores['colectivo'])){ ?>
								<?php foreach($listaActores['colectivo'] as $index => $item):?> <!--muestra cada elemento de la lista-->
								
										<div class="twelve columns" onclick="mostarDatosListaElem()">
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
						
						<input type="button" class="medium button"  value="Actor colectivo" onclick="" />	
					</div>		
				</div>
				</fieldset>	
					
				</div>
			</div>
				
				
		</div>
		</div>
		
			<input class="medium button" type="submit" value="Guardar"/>
			<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
		<!-------------------Termina la parte de fuentes de información personal------------------------------------->
		</form>
	
	</body>
</html>

