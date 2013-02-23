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

 <!---Encabezado de la página---->
<div class="twelve columns">
        <div class="four columns" div="logo" style="!important; width:25%;" >
            <?php echo img('statics/media/img/system/logo.png');?>
            
        </div>
        <div>
        	<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/login_c/reiniciarSesion' accept-charset="utf-8"> 
        		<input type="submit" class="medium button" value="cerrar sesión" style="margin-top:20px; float:right;"/>
        	</form>
        </div>
</div>
<!---Termina el encabezado de la página-->
<!--Contenido de la página-->
<div class="two columns">				
    <dl class="nice vertical tabs">
        <dd class="<?=($is_active == 'actores') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/actores_c/mostrar_actor">Actores</a></dd>
        <dd class="<?=($is_active == 'casos') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/casos_c/mostrar_caso">Casos</a></dd>
        <dd class="<?=($is_active == 'reportes') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/reportes_c/generar_reporte">Reportes</a></dd>
        <dd class="<?=($is_active == 'contrasenia') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/contrasenia_c/mostrar_cambioPass">Cambiar Contraseña</a></dd>
    </dl>
</div>
<div class="ten columns">
    <?=(isset($content)) ? $content : '' ; ?>
</div>
<!--Termina el contenido de la página-->
