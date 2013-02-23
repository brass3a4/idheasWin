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

 <form method="post" action="<?=base_url(); ?>index.php/contrasenia_c/cambiarPass" accept-charset="utf-8">
	<fieldset style="padding: 15px;" class="four columns">
	<div class="twelve columns">
		<label for="nombre">Contraseña Actual</label>
		<input type="password" id="oldPass" name="oldPass"  required />
		<label for="nombre">Nueva Contraseña</label>
		<input type="password" id="newPass1" name="newPass1"  required />
		<label for="nombre">Repetir Nueva Contraseña</label>
		<input type="password" id="newPass2" name="newPass2"  required />
		<br />
		<input style="margin-right: 10px; padding: 10px 20px 12px 20px;" class="medium button" type="button" value="Guardar" onclick="cambiarPass()"/>

		<input class="medium button" type="button" value="Cancelar" onclick="cancelarCambioContrasenia()"/>
	</div>	
	
	<br /></fieldset><br />

</form>