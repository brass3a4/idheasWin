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

 <form method="post" action="<?=$action; ?>">
<div id="formularioInfoGral">
		<div id="pestania" data-collapse>
		<h2 class="open twelve columns">Información general</h2><!--título de la sub-pestaña--->  
		<div>
			<input type="hidden" name="casos_casoId" value="<?= (isset($datosCaso['casos']['casoId'])) ? $datosCaso['casos']['casoId'] : "" ;?>"/>
			<!--Comienzan datos-->
			<div class="twelve columns">
			<div class="six columns">
				
				<p>
					<label for="nombre">Nombre: </label>
					<input type="text"  name="casos_nombre"  value="<?= (isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] : "" ;?>" required />
				</p>
				<p>
					<label for="personas">Personas afectadas:</label>
					<input type="number" pattern="[0-9]+" name="casos_personasAfectadas" value="<?= (isset($datosCaso['casos']['personasAfectadas'])) ? $datosCaso['casos']['personasAfectadas'] : "" ;?>" />
				</p>
						
			</div>
			<div class="twelve columns">
				<div class="six columns">
				<label name="casos_tipoFechaInicialId" for="edad">Fecha inicial</label>
					<select onclick="fechaInicialCasos(value)" onkeyup="fechaInicialCasos(value)" name="casos_tipoFechaInicialId">
								<option></option>
								<option  value="1" <?= (isset($datosCaso['casos']['tipoFechaInicialId']) && ($datosCaso['casos']['tipoFechaInicialId']==1)) ? 'selected=selected"' : "" ;?> >fecha exacta</option>
								<option  value="2" <?= (isset($datosCaso['casos']['tipoFechaInicialId']) && ($datosCaso['casos']['tipoFechaInicialId']==2)) ? 'selected=selected"' : "" ;?> >fecha aproximada</option>
								<option  value="3" <?= (isset($datosCaso['casos']['tipoFechaInicialId']) && ($datosCaso['casos']['tipoFechaInicialId']==3)) ? 'selected=selected"' : "" ;?> >Se desconce el día</option>
								<option  value="4" <?= (isset($datosCaso['casos']['tipoFechaInicialId']) && ($datosCaso['casos']['tipoFechaInicialId']==4)) ? 'selected=selected"' : "" ;?> >Se desconce el día y el mes</option>
					</select>
				</div>
				<div class="six columns">
					<br /> 
					<p <?= (isset($datosCaso['casos']['fechaInicial'])) ? '' : 'class="Escondido"' ;?> id="fechaExactaV">
						<input type="text" id="fechaExacta"  <?= (isset($datosCaso['casos']['nombre'])) ? 'name="casos_fechaInicial" value="'.$datosCaso['casos']['fechaInicial'].'"' : "" ;?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV">
						<input type="text" id="fechaAprox" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV">
						<input type="text" id="fechaSinDia" placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV">
						<input type="text" id="fechaSinDiaSinMes" placeholder="AAAA-00-00" />

					</p>
				</div>
		</div> <!---termina opciones de fechaInicial-->
			<div class="twelve columns">
					<label for="edad">Fecha término</label>
				<div class="six columns">
					<select name="casos_tipoFechaTerminoId" onclick="fechaTerminalCasos(value)" onkeyup="fechaTerminalCasos(value)" name="casos_fechaTermino" >
								<option></option>
								<option  value="1" <?= (isset($datosCaso['casos']['tipoFechaTerminoId']) && ($datosCaso['casos']['tipoFechaTerminoId']==1)) ? 'selected=selected"' : "" ;?> >fecha exacta</option>
								<option  value="2" <?= (isset($datosCaso['casos']['tipoFechaTerminoId']) && ($datosCaso['casos']['tipoFechaTerminoId']==2)) ? 'selected=selected"' : "" ;?> >fecha aproximada</option>
								<option  value="3" <?= (isset($datosCaso['casos']['tipoFechaTerminoId']) && ($datosCaso['casos']['tipoFechaTerminoId']==3)) ? 'selected=selected"' : "" ;?> >Se desconce el día</option>
								<option  value="4" <?= (isset($datosCaso['casos']['tipoFechaTerminoId']) && ($datosCaso['casos']['tipoFechaTerminoId']==4)) ? 'selected=selected"' : "" ;?> >Se desconce el día y el mes</option>
					</select>
				</div>
				<div class="six columns">
					<p <?= (isset($datosCaso['casos']['fechaTermino'])) ? '' : 'class="Escondido"' ;?> id="fechaExactaV2">
						<input type="text" id="fechaExacta2" <?= (isset($datosCaso['casos']['nombre'])) ? 'name="casos_fechaTermino" value="'.$datosCaso['casos']['fechaTermino'].'"' : "" ;?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV2">
						<input type="text" id="fechaAprox2"  placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV2">
						<input type="text" id="fechaSinDia2"  placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV2">
						<input type="text" id="fechaSinDiaSinMes2" placeholder="AAAA-00-00" />

					</p>
				</div>
			</div> <!---termina opciones de fechaTermino-->
			</div>
			
				<?php echo br(2);?>	
		  	<div id="subPestanias" data-collapse>
				<h2 class="twelve columns">Descripción</h2>
					<div class="twelve columns">
						<textarea placeholder="Descripción"  rows="15" cols="100" id="infoCaso_descripcion"  wrap="hard"  name="infoCaso_descripcion"><?=(isset($datosCaso['infoCaso']['descripcion'])) ? $datosCaso['infoCaso']['descripcion'] : ''; ?></textarea>
				   </div>	  
			</div><!--fin acordeon descripción-->
		  	
		  	<div id="subPestanias" data-collapse>
		  		<h2 class="twelve columns">Resumen</h2>
		  		
					<div class="twelve columns">
						<textarea placeholder="Resumen"  rows="20" cols="100" id="infoCaso_resumen"  wrap="hard"  name="infoCaso_resumen"><?=(isset($datosCaso['infoCaso']['resumen'])) ? $datosCaso['infoCaso']['resumen'] : ''; ?></textarea>
				   </div>	  

		  	</div><!--fin acordeon observaciones-->

		  	<div id="subPestanias" data-collapse onchange="editarOpciones()" >
		  		<h2 class="twelve columns">Obsevaciones</h2>
				<div class="twelve columns">
						<textarea placeholder="Observaciones"  rows="20" cols="100" id="infoCaso_observaciones" wrap="hard"  name="infoCaso_observaciones"><?=(isset($datosCaso['infoCaso']['observaciones'])) ? $datosCaso['infoCaso']['observaciones'] : ''; ?></textarea>
				</div>	
		  	</div><!--fin acordeon observaciones-->

		</div>
		</div><!--fin acordeon información general-->
	</div>

	
    <div class="row espacioInferior espacioSuperior">
        <div class="nine columns">
            <input class="medium button" type="submit" value="Guardar" />
        </div>
        <div  class="three columns" >
            <input class="medium button" type="reset" value="Cancelar" onclick="pagInicial()" />
        </div>
    </div>

</form>
<!-------------------Termina primer pestaña------------------------------------->
