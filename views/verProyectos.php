<?php include ('plantillas/header.php'); ?>
	<div data-role="page">
	<header data-role="header" data-position="fixed" data-id="header">
		<h1>ToDo</h1>
		<a href="index.php?url=inicio" data-role="button" class="ui-btn-left" data-icon="home" data-iconpos="notext">Inicio</a>
	</header><!-- /header -->
	<div class="wrapper">		
		<div data-role="content">	
			<h2 id="logo">
				<img src="views/images/Logo.png" alt="ToDO" width="245" height="125">
			</h2>	
			<ul data-role="listview" data-theme="a" data-inset="true">
				<li data-role="list-divider">Proyectos</li>
			</ul>
			<?php if (isset($proyectos)): ?>
				<table summary="Tabla para ver proyectos">
					<tr class="ui-body-a">
						<th scope="col">Nombre</th>
						<th scope="col">Inicio</th>
						<th scope="col">Fin</th>
						<th scope="col">Estado</th>
						<th scope="col">Dar Baja</th>
					</tr>
				<?php foreach($proyectos as $proyecto): ?>
				
					<tr>
						<td><?php echo $proyecto->N_NOMBRE; ?> </td>
						<td><?php echo $proyecto->F_INICIO; ?></td>
						<td><?php echo $proyecto->F_FIN; ?></td>
						<td><?php echo $proyecto->ESTADOPRO; ?></td>
						<td class="button">
							<a href="#eliminar_<?php echo $proyecto->K_PROYECTO;?>" data-role="button" data-icon="delete" data-iconpos="notext" data-theme="b" data-rel="popup" data-position-to="window"></a>
						</td>
					</tr>
					
					<!-- popups de eliminar -->
					<div id="eliminar_<?php echo $proyecto->K_PROYECTO; ?>" data-role="popup" class="ui-content" data-overlay-theme="a" data-theme="a">
						<p>Seguro que desea dar de baja el proyecto <?php echo $proyecto->N_NOMBRE; ?></p>
					    <a href="?url=cproyecto/eliminar/<?php echo $tarea->K_PROYECTO;?>" data-mini="true" data-role="button" data-icon="delete">Aceptar</a>
					    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
			<ul data-role="listview" data-theme="a" data-inset="true">
				<li data-role="list-divider">Opciones</li>
				<li><a href="#nuevoProyecto" data-rel="popup" data-position-to="window">Crear Proyectos</a></li>
			</ul>

			<div id="nuevoProyecto" data-role="popup" class="ui-content" data-overlay-theme="a" data-theme="a">
				<h4>Ingrese los datos del nuevo Proyecto</h4>
				<form action="">
					<label for="nombre">Nombre Proyecto</label>
					<input type="text" id="nombre" name="nombre">
					<label for="codigo">Código Proyecto</label>
					<input type="text" id="codigo" name="codigo">
					<label for="codEncargado">Código del encargado</label>
					<input type="text" id="codEncargado" name="codEncargado">
					<label for="fechaLimite">Fecha final</label>
					<input type="date" id="fechaLimite" name="fechaLimite">
					<input type="submit" value="Crear">
				</form>
				<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
			</div>
		</div><!-- /content -->		
	</div>
	<footer data-role="footer" data-position="fixed">
		<h3>ToDo</h3>
	</footer><!-- /footer -->

</div><!-- /page -->

</body>
</html>