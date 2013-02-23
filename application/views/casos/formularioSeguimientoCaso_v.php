
<!-------------------Comienza la parte de seguimiento del caso------------------------------------>
<html>
	<head>
		<?=$head?>
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

 <form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/2' enctype="multipart/form-data" accept-charset="utf-8">
<input type="hidden" value="<?= (isset($ficha)) ? "1" : "0" ;?>" name="editar" id="editar"> 
<input type="hidden" value="<?= (isset($ficha)) ? $ficha['fichaId'] : '' ;?>" name="fichas_fichaId" id="fichas_fichaId"> 
<input type="hidden" value="<?=$casoId; ?>" name="fichas_casos_casoId" id="fichas_casos_casoId" />

	<div id="formularioDetallerLugar">
		<div id="pestania" data-collapse >
			<h2 class="open">Detalle de la información de seguimiento del caso</h2><!--título de la sub-pestaña-->  
				<div>
					<div class="twelve columns">
						<div class="six columns">
								<label for="clave">Clave</label>
								<input type="text" name="fichas_clave" value='<?=(isset($ficha['clave'])) ? $ficha['clave'] : " " ;?>' />
						</div>
						<div class="six columns">
								<label for="claveTitulo">Título</label>
								<input type="text" id="fichas_titulo" name="fichas_titulo" value="<?=(isset($ficha['titulo'])) ? $ficha['titulo'] : " " ;?>" size="60"  />
						</div>
					</div>


			<div class="twelve columns">
				<div class="six columns">
					<label for="edad">Fecha de recepción</label>
					<select name="fichas_tipoFechaId" onclick="fichadeRecepcion(value)" onkeyup="fichadeRecepcion(value)">
								<option  value="1" <?=(isset($ficha['tipoFechaId']) && ($ficha['tipoFechaId']==1)) ? 'selected="selected"' : " " ;?> >fecha exacta</option>
								<option  value="2" <?=(isset($ficha['tipoFechaId']) && ($ficha['tipoFechaId']==2)) ? 'selected="selected"' : " " ;?> >fecha aproximada</option>
								<option  value="3" <?=(isset($ficha['tipoFechaId']) && ($ficha['tipoFechaId']==3)) ? 'selected="selected"' : " " ;?> >Se desconce el día</option>
								<option  value="4" <?=(isset($ficha['tipoFechaId']) && ($ficha['tipoFechaId']==4)) ? 'selected="selected"' : " " ;?> >Se desconce el día y el mes</option>
					</select>
					</div>
					
					<div class="six columns">
					<?php echo br(1);?>	
						<p <?=(isset($ficha['fecha'])) ? "" : 'class="Escondido"' ;?> id="fichaExactaVR">
							<input <?=(isset($ficha['fecha'])) ? 'name="fichas_fecha" value="'.$ficha['fecha'].'"' : " " ;?> type="text" id="fichaExactaR"  placeholder="AAAA-MM-DD" value=""/>

						</p>

						<p class="Escondido" id="fichaAproxVR">
							<input type="text" id="fichaAproxR"  value="" placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fichaSinDiaVR">
							<input type="text" id="fichaSinDiaR" value="" placeholder="AAAA-MM-00" />

						</p >

						<p class="Escondido" id="fichaSinDiaSinMesVR">
							<input type="text" id="fichaSinDiaSinMesR" value="" placeholder="AAAA-00-00" />

						</p>
					</div>
				</div> <!---termina opciones de fechaInicial-->


			
			<div class="twelve columns">
					<?php echo br(2);?>	
						<label for="comentFichas">Comentarios</label>
						<textarea id="fichas_Comentarios" placeholder="Comentarios"  rows="15" cols="100"  name="fichas_Comentarios" wrap="hard"  value=""><?=(isset($ficha['comentarios'])) ? $ficha['comentarios'] : " " ; ?></textarea>
			</div>	



			<div id="pestania">
				<p style="margin-left: 15px;" >Agregar nuevo registro</p><!--título de la sub-pestaña-->  
				<div>
					<dl>            
					   <dd><div id="adjuntos">
							   <input type="file" name="archivos[]"/><br />
						</div></dd>
					   <dt><a href="#" onClick="addCampo()">Subir otro archivo</a></dt>      
				   </dl>
				</div>
			</div>

		<div id="pestania" data-collapse >
			<h2 class="open">Registros actuales</h2><!--título de la sub-pestaña-->  
				<div>

					<div class="twelve columns espacioIzq">
			        	<ul >
			        		<?php if(isset($ficha['registros'])):?>
			            		<?php foreach($ficha['registros'] as $registro):?>
			            			<li><input type="button" class="tiny button"  value="x" style="margin-left: -35px; margin-bottom: 5px;" onclick="eliminarRegistro(<?=$registro['registroId']?>,<?=$casoId; ?>)" />
			            				<a style="margin-left: 5px;" href="<?=base_url().$registro['ruta']?>"><?=$registro['nombreRegistro']?></a>
			            			</li>
			            		<?php endforeach;?>
			        		<?php endif;?>
			        	</ul>
		        	</div>
        		</div>
        </div>


		</div>
	
		</div>
			<input style="margin-left: 25px;" class="medium button" type="submit" value="Guardar"  />
			<input type="submit" class="medium button" value="Cancelar" onclick="cerrarVentana()" />
	 </div>
</form>
	<!-------------------Termina la parte de seguimiento del caso-------------------------------------->
</body>	
</html>
