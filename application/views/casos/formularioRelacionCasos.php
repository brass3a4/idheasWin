<!DOCTYPE >
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

 		<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/7' accept-charset="utf-8">
			<div style="padding: 20px;">
				<input type="hidden" name="editar" value="<?=(isset($datosCaso['relacionCasos'][$id]))? '1' : '0'?>"/>
				<input type="hidden" name="relacionCasos_casos_casoId" value="<?=$datosCaso['casos']['casoId']?>"/>
				<input type="hidden" name="relacionCasos_relacionId" value="<?=(isset($datosCaso['relacionCasos'][$id]['relacionId']))? $datosCaso['relacionCasos'][$id]['relacionId'] : '0'?>"/>
				<b>Nombre del caso actual</b><br />
					<label> <?=$datosCaso['casos']['nombre'];?></label>
				<br />
				<b>Tipo de relación</b><br />
				<select name="relacionCasos_tipoRelacionId" class="nine columns" required>
					<option></option>
					<?php foreach($catalogos['relacionCasosCatalogo'] as $relacion){
						if(isset($datosCaso['relacionCasos'][$id]) && $datosCaso['relacionCasos'][$id]['tipoRelacionId'] == $relacion['relacionCasosId']){
							echo '<option selected="selected" value="'.$relacion['relacionCasosId'].'">'.$relacion['descripcion'].'</option>';
						}else{
							echo '<option value="'.$relacion['relacionCasosId'].'">'.$relacion['descripcion'].'</option>';
						}
					}?>
				</select>
				<?=br(3);?>
				<table class="nine columns" >
					<tr>
						<th><b>Nombre del caso</b></th>
						<th><b>Fecha inicial</b></th>
						<th><b>Fecha de término</b></th>
					</tr>
					<tr  id="datosCasoRelacionado" >
						<?php if(isset($datosCaso['relacionCasos'][$id])):?>
							<td><?=$datosCaso['relacionCasos'][$id]['nombreCasoIdB']?></td>
							<td><?=$datosCaso['relacionCasos'][$id]['fechaIncial']?></td>
							<td><?=$datosCaso['relacionCasos'][$id]['fechaTermino']?></td>
							<input type="hidden" name="relacionCasos_casoIdB" value="<?=$datosCaso['relacionCasos'][$id]['casoIdB']?>"/>
						<?php endif;?>	
					</tr>
					
				</table>		
				
				<input type="hidden" value="<?=(isset($datosCaso['relacionCasos'][$id]['nombreCasoIdB'])? '1' : '0')?>" id="casoSeleccionado_seleccionado" name="casoSeleccionado_seleccionado"/>
				<?=br(2);?>
				<input type="button" class="small button" value="Seleccionar Caso" onclick="mostrarCasos()" style="margin-left: 20px;"/>
				<?=br(3);?>
				<label for="comentFichas">Comentarios</label>
				<textarea id="relacionCasos_Comentarios" style="width: 550px; height: 200px" name="relacionCasos_Comentarios" wrap="hard"  ><?=(isset($datosCaso['relacionCasos'][$id]['comentarios']))? $datosCaso['relacionCasos'][$id]['comentarios'] : ''?></textarea>
						
				<label for="comentFichas">Observaciones</label>
				<textarea id="relacionCasos_Observaciones" style="width: 550px; height: 200px" name="relacionCasos_Observaciones" wrap="hard"  ><?=(isset($datosCaso['relacionCasos'][$id]['comentarios']))? $datosCaso['relacionCasos'][$id]['observaciones'] : ''?></textarea>
				
				<input style="padding: 7px 11px 8px 11px;" class="small button" type="submit" value="Guardar"/>
				<input class="small button" type="button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
		</form>
	</body>
</html>