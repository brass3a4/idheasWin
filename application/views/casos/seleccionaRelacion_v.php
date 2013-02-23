<html>
<head>
	<title><?= $head ?></title>
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

 
	<h3>Actore colectivos relacionados</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre(s)</th>
                <th>Sigla(s)</th>
                <th>Tipo de relación</th>
                <th>Accion(es)</th>
            </tr>
        </thead>
        <tbody>
			<?php if ($actoresRelacionados != '0' ) { ?>
    			<?php foreach ($actoresRelacionados as $relacionados) { 
    					if ((isset($relacionados['tipoActorId'])) && ($relacionados['tipoActorId'] == 3)) { ?>
		        			<tr>
		                        <td><?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?></td>
		                        <td><?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?></td>
		                        <td><?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?></td>
                                <?php  switch ($dato) {
                                    case '2': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '2' )"></td>
                                        <?php break;
                                    case '3': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '3' )"></td>
                                        <?php break;
                                    case '4': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '4' )"></td>
                                        <?php break;
                                    case '5': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '5' )"></td>
                                        <?php break;
                                    case '6': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '6' )"></td>
                                        <?php break;

                                    default: ?>
		                              <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>','1')"></td>
                                        <?php break;
                                    }
                                ?>
		            		</tr>
        			<?php }
        			} ?>
			<?php } ?>
        </tbody>
    </table>
    

    <div class="twelve columns">
	    <div class="six columns">
	    	<input type="button" class="tiny button" value="Cerrar" onclick="cerrarVentana()">
	    </div>
	    <div class="six columns">
    		<input type="button" class="tiny button "  value="Nuevo" onclick="nueva_relacion_a_Col(<?=$idActor; ?>,0,0)" />
	    </div>
    </div>
	

</body>
</html>