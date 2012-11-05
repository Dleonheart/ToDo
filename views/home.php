<?php include ('plantillas/header.php'); ?>
<div data-role="page">
<header data-role="header" data-position="fixed" data-id="header">
		<h1>ToDo</h1>
	</header><!-- /header -->
	<div class="wrapper">
		
		<div data-role="content">
			<h2 id="logo">
				<img src="views/images/Logo.png" alt="ToDO" width="245" height="125">
			</h2>	
			<form action="?url=login/verificar" method="post">
				
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" data-mini="true" placeholder="Usuario" required />
				<label for="pass">Contraseña</label>
				<input type="password" name="pass" id="pass" data-mini="true" placeholder="Contraseña" required/>
				<br>
				<button type="submit" data-role="button" data-theme="a" data-icon="check" class="submit">Enviar</button>

			</form>	
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