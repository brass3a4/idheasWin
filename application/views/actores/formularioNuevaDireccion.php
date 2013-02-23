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

 <!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

	</head>
	<script>
		
		window.onunload = function(){
		   window.opener.clearDiv();
		}
	</script>
<body>
	<input type="hidden" id="tipoActorAE"  name="3"/>
	<form action='<?= (isset($datosActor)) ? (base_url().'index.php/actores_c/actualizaDireccion'.'/'.$datosActor['direccionId'].'/'.$actorId) : (base_url().'index.php/actores_c/agregarDireccion'.'/'.$actorId) ;?>' id="menuForm" name="menuForm" method="post" accept-charset="utf-8">
            <fieldset>
            	
                <legend>Dirección</legend>
                <div class="six columns">
                <label for="direccionActor_tipoDireccionId">Tipo de dirección</label>
                <select  id="direccionActor_tipoDireccionId" name="direccionActor_tipoDireccionId">			
                <option></option>
                <?php if(isset($datosActor['tipoDireccionId'])){
                foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$item['tipoDireccionId']; ?>" <?=($datosActor['tipoDireccionId'] == $item['tipoDireccionId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
                <?php endforeach;
                } else {
                foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$item['tipoDireccionId']; ?>"> <?=$item['descripcion']; ?></option>
                <?php endforeach;
                } ?>
                </select>

                <label for="direccionActor_direccion">Ubicación</label>
                <input type="text" id="direccionActor_direccion" name="direccionActor_direccion"  <?=(isset($datosActor['direccion']) ? 'value="'.$datosActor['direccion'].'"' : ''); ?> />
                <label for="direccionActor_codigoPostal">Código Postal</label>
                <input type="number" id="direccionActor_codigoPostal" pattern="[0-9]+" name="direccionActor_codigoPostal"  <?=(isset($datosActor['codigoPostal']) ? 'value="'.$datosActor['codigoPostal'].'"' : ''); ?> />
                </div>
                
                <div class="six columns">
                    <?= $filtroDireccion?>                                               
                </div>
            </fieldset><!--Termina datos dirección-->
           	<input style="float: right;margin:20px 25px 0px 0px;padding: 9px 20px 9px 20px !important;" onclick="cerrarVentana()" type="button" class="medium button"  value="cancelar">
            <input style="float: right;margin:20px 25px 0px 0px	" type="submit" class="medium button"  value="guardar">
    </form>
</body>
</html>

