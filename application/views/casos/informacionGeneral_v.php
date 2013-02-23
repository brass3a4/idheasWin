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

 <div id="pestania" data-collapse>
	<h2 class="open">Información general </h2><!--título de la sub-pestaña---->  
	<div>

		<div id="casos_nombre">
	  		<p>Nombre:
          	<span id="casos_nombre"><?=(isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] : ''; ?></span>
          	</p>
	  	</div>
	  	<div id="casos_personasAfectadas">
	  		<p>Personas Afectadas:
          	<span id="casos_pesonasAfectadas"><?=(isset($datosCaso['casos']['personasAfectadas'])) ? $datosCaso['casos']['personasAfectadas'] : ''; ?></span>
          	</p>
	  	</div>
	  	<div id="casos_fechaInicial">
	  		<p>Fecha inicial:
          	<span id="casos_fechaInicial"><?=(isset($datosCaso['casos']['fechaInicial'])) ? $datosCaso['casos']['fechaInicial'] : ''; ?></span>
          	</p>
	  	</div>
	  	<div id="casos_fechaTermino">
	  		<p>Fecha término:
          	<span id="casos_fechaInicial"><?=(isset($datosCaso['casos']['fechaTermino'])) ? $datosCaso['casos']['fechaTermino'] : ''; ?></span>
          	</p>
                <form action="<?=base_url(); ?>index.php/ReportePdf_c/generaReporteLargo/<?=$casoId; ?>" method="post" >
                    <input type="submit" class="tiny button <?=$clase?>" value="Exportar PDF" />
                </form>
                <form action="<?=base_url(); ?>index.php/reporteOdt_c/generaReporteLargoOdt/<?=$casoId; ?>" method="post" >
                    <input type="submit" class="tiny button <?=$clase?>" value="Exportar DOC" />
                </form>
	  	</div>
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Lugares</h2>
	  		<div>
	  			<div>
	  				<!------------------------------ Comienza tabla lugare-------------------------------------->
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>País</th>
			                <th>Estado</th>
			                <th>Municipio</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php if(isset($datosCaso['lugares'])){ ?>
			              <?php foreach ($datosCaso['lugares'] as $index => $lugar) {
			              	?><tr><?php
			              	$indice = ($lugar['paisesCatalogo_paisId']) ?>
			              	<td><?php if(isset($catalogos['paisesCatalogo'][$indice]['nombre'])) print_r($catalogos['paisesCatalogo'][$indice]['nombre']); ?></td>
			              	<?php $indice = ($lugar['estadosCatalogo_estadoId']) ?>
			              	<td><?php if(isset($catalogos['estadosCatalogo'][$indice]['nombre']))print_r($catalogos['estadosCatalogo'][$indice]['nombre']); ?></td>
			              	<?php $indice = ($lugar['municipiosCatalogo_municipioId']) ?>
			              	<td><?php if(isset($catalogos['municipiosCatalogo'][$indice]['nombre']))print_r($catalogos['municipiosCatalogo'][$indice]['nombre']); ?></td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaDetalleLugar('<?=$casoId; ?>', '<?=$index?>')" />
			                	<input type="button" class="tiny button"  value="Eliminar" onclick="eliminarLugar(<?=$lugar['lugarId']; ?>,<?=$casoId; ?>)" /></td>
			              </tr><?php } ?><?php } ?>
			            </tbody>
			          </table>
				<input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaDetalleLugar('<?=$casoId; ?>',0)" />  
	  				<!------------------------------ Termina tabla lugares-------------------------------------->
	  			</div>
	  		</div>
	  	</div><!--fin acordeon lugares-->
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Descripción</h2>
	  		<div>
	  			<div id="infoCaso_descripcion" class="panel">
  					<p>
          			<span id="infoCaso_descripcion"><?=(isset($datosCaso['infoCaso']['descripcion'])) ? $datosCaso['infoCaso']['descripcion'] : ''; ?></span>
          			</p>
				</div>	  			  
	  		</div>
	  	</div><!--fin acordeon descripción-->
	  	

	  	<div id="subPestanias" data-collapse>
	  		<h2>Resumen</h2>
	  		<div>
	  			<div id="infoCaso_resumen" class="panel">
  					<p>
          			<span id="infoCaso_resumen"><?=(isset($datosCaso['infoCaso']['resumen'])) ? $datosCaso['infoCaso']['resumen'] : ''; ?></span>
  					</p>
				</div>	  			  
	  		</div>
	  	</div><!--fin acordeon resumen-->
	  	

	  	<div id="subPestanias" data-collapse>
	  		<h2>Obsevaciones</h2>
	  		<div>
	  			<div id="infoCaso_descripcion" class="panel">
  					<p>
          			<span id="infoCaso_descripcion"><?=(isset($datosCaso['infoCaso']['observaciones'])) ? $datosCaso['infoCaso']['observaciones'] : ''; ?></span>
  					</p>
				</div>	  			  
	  		</div>
	  	</div><!--fin acordeon observaciones-->
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Seguimiento del caso</h2>
	  		<div>
	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Id</th>
			                <th>Título</th>
			                <th>Fecha de recibo</th>
			                <th>Registros</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php if(isset($datosCaso['fichas'])){ ?>
			              <?php foreach ($datosCaso['fichas'] as $key => $seguimiento) {
			              	?><tr>
			                <td> <span id="infoCaso_fichaId"><?=(isset($seguimiento['clave'])) ? $seguimiento['clave'] : ''; ?></span> </td>
			                <td> <span id="infoCaso_titulo"><?=(isset($seguimiento['titulo'])) ? $seguimiento['titulo'] : ''; ?></span> </td>
			                <td> <span id="infoCaso_titulo"><?=(isset($seguimiento['fecha'])) ? $seguimiento['fecha'] : ''; ?></span></td>
			                <td>
			                	<ul>
			                		<?php if(isset($seguimiento['registros'])):?>
				                		<?php foreach($seguimiento['registros'] as $registro):?>
				                			<li><input type="button" class="tiny button"  value="x" style="margin-left: -35px; margin-bottom: 5px;" onclick="eliminarRegistro(<?=$registro['registroId']?>,<?=$casoId; ?>)" />
				                				<a style="margin-left: 5px;" href="<?=base_url().$registro['ruta']?>"><?=$registro['nombreRegistro']?></a>
				                			</li>
				                		<?php endforeach;?>
			                		<?php endif;?>
			                	</ul>
			                </td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaFicha('<?=$casoId; ?>', '<?=$key; ?>')" />
			                	<input type="button" class="tiny button"  value="Eliminar" onclick="eliminarFicha( <?=$seguimiento['fichaId']?>,<?=$casoId; ?>)" /></td>
			              </tr><?php }} ?>
			            </tbody>
			          </table>
	  			</div>
	  		<input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaFicha('<?=$casoId; ?>',0)" />	  
	  				<!------------------------------ Termina tabla seguimiento del caso-------------------------------------->
	  		</div>
	  	</div><!--fin acordeon Seguimiento del caso-->
	</div>
	  
</div><!--fin acordeon información general-->
