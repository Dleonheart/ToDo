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
						<th scope="col">Nombre</th>
						<th scope="col">Encargado</th>
						<th scope="col">proyecto</th>
						
					</tr>
				<?php foreach($areas as $area): ?>
					<tr>
						<td><?php echo $area->NOMBRE; ?> </td>
						<td><?php echo $area->ENCARGADO; ?></td>
						<td><?php echo $area->PROYECTO; ?></td>
					</tr>

				
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
			<ul data-role="listview" data-theme="a" data-inset="true">
				<li data-role="list-divider">Opciones</li>
				<li><a href="">Borrar areas</a></li>
				<li><a href="">Crear areas</a></li>
			</ul>
		</div><!-- /content -->
		
	</div>
	<footer data-role="footer" data-position="fixed">
		<h3>ToDo</h3>
	</footer><!-- /footer -->

</div><!-- /page -->

</body>
</html>