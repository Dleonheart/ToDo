<?php include ('plantillas/header.php'); ?>
<div data-role="page" data-url="/GIT/ToDo/index.php?url=inicio">
	<header data-role="header" data-position="fixed" data-id="header">
		<h1>ToDo</h1>
		<a href="index.php?url=login/cerrarSesion" data-role="button" class="ui-btn-left" data-icon="delete" data-iconpos="notext">Cerrar Sesión</a>
	</header><!-- /header -->
	<div class="wrapper">
		
		<div data-role="content">	
			<h2 id="logo">
				<img src="views/images/Logo.png" alt="ToDO" width="245" height="125">
			</h2>	
			<ul data-role="listview" data-theme="a" data-inset="true">
				<li data-role="list-divider">Opciones</li>
				<li><a href="index.php?url=cproyecto/verProyectos" rel="external">Ver Proyecto</a></li>
				<li><a href="index.php?url=carea/verAreas" rel="external">Ver Areas</a></li>
				<li><a href="index.php?url=cpersonal/verPersonal" rel="external">Manejar personal</a></li>
				<li><a href="index.php?url=ctarea/verTareas" rel="external">Ver Tareas</a></li>
			</ul>

			<!-- mensajes de la bd y otros -->
			<?php if(isset($mensaje)): ?>			
				<div data-role="collapsible" data-mini="true" data-theme="e" data-content-theme="e">
					<h4>Mensaje Resultado</h4>
					<p><?php echo $mensaje; ?></p>
				</div>
			<?php endif ?>
			<?php if(isset($error)): ?>			
				<div data-role="collapsible" data-mini="true" data-theme="e" data-content-theme="e">
					<h4>Error en la base de datos</h4>
					<p><?php echo $error; ?></p>
				</div>
			<?php endif ?>
		</div><!-- /content -->
		
	</div>
	<footer data-role="footer" data-position="fixed">
		<h3>ToDo</h3>
	</footer><!-- /footer -->

</div><!-- /page -->

</body>
</html>