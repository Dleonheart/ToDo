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
				<li data-role="list-divider">Areas</li>
			</ul>
			<?php if (isset($areas)): ?>
				<table summary="Tabla para ver areas">
					<tr class="ui-body-a">
						<th scope="col">Area</th>
						<th scope="col">Encargado</th>
						<th scope="col">proyecto</th>
						<th scope="col">Eliminar</th>
						
					</tr>
				<?php foreach($areas as $area): ?>
					<tr>
						<td><?php echo $area->NOMBRE; ?> </td>
						<td><?php echo $area->ENCARGADO; ?></td>
						<td><?php echo $area->PROYECTO; ?></td>
						<td class="button">
							<a href="#eliminar_<?php echo $area->CODIGO;?>" data-role="button" data-icon="delete" data-iconpos="notext" data-theme="b" data-rel="popup" data-position-to="window"></a>
						</td>
					</tr>

				<div id="eliminar_<?php echo $area->CODIGO; ?>" data-role="popup" class="ui-content" data-overlay-theme="a" data-theme="a">
						<p>¿desea dar de baja: 
						 <?php echo $area->NOMBRE; ?> ?</p>
					    <a href="?url=carea/eliminar/<?php echo $area->CODIGO;?>" data-mini="true" data-role="button" data-icon="delete">Aceptar</a>
					    <a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a>
					</div>
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
			<ul data-role="listview" data-theme="a" data-inset="true">
				<li data-role="list-divider">Opciones</li>
				<li><a href="#nuevaArea" data-rel="popup" data-position-to="body">Crear area</a></li>
			</ul>
			<div id="nuevaArea" data-role="popup" class="ui-content" data-overlay-theme="a" data-theme="a">
				<h4>Ingrese los datos de la Nueva Area</h4>
				<form action="index.php?url=carea/nueva" method="post" data-ajax='false'>
					<label for="codigo">Código Proyecto</label>
					<input type="text" id="codigo" name="codigo">
					<label for="codEncargado">Código del encargado</label>
					<input type="text" id="codEncargado" name="codEncargado">
					<label for="nombreArea">Nombre Área</label>
					<input type="text" id="nombreArea" name="nombreArea">
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