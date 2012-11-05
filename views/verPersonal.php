<?php include ('plantillas/header.php'); ?>
		<div data-rol="page" >

			<div data-role="header" data-position="fixed" data-id="header">
				<a href="index.php?url=inicio" data-role="button" class="ui-btn-left" data-icon="home" data-iconpos="notext">Inicio</a>
				<h1>ToDo</h1>								
			</div><!-- /header -->

			<div class="wrapper">		
				<div data-role="content">	
					<h2 id="logo">
						<img src="views/images/Logo.png" alt="ToDO" width="245" height="125">
					</h2>					
					<ul data-role="listview" data-theme="a" data-inset="true" data-count-theme="b">
						<li data-role="list-divider">Personal</li>						
						<?php if(isset($cantidadP)):?>						
							<?php foreach($cantidadP as $cantidad):?>
								<li><h3><?php echo "Cargo ".$cantidad->CARGO; ?></h3>
									<span class="ui-li-count"><?php echo $cantidad->NUMERO;?></span>
									<ul data-inset="true" data-theme="c"> 
										<li>								
											<table summary="Tabla Personal">
												<tr class="ui-body-a">
													<th scope="col">Nombres</th>
													<th scope="col">Apellidos</th>
													<th scope="col">Tipo Doc.</th>
													<th scope="col">Número Doc.</th>												
												</tr>											
										      	<?php foreach ($listaP as $persona):?>
										      		<?php if($persona->CARGO == $cantidad->CARGO):?>
										      			<tr>
															<td><?php echo $persona->N_NOMBRES;?> </td>
															<td><?php echo $persona->N_APELLIDOS;?></td>
															<td><?php echo $persona->TIPO_DOCUMENTO;?></td>
															<td><?php echo $persona->Q_DOCUMENTO;?></td>
														</tr>
										      		<?php endif;?>
										  		<?php endforeach;?>
									  		</table>
									  	</li>								   
									</ul>
								</li>
							<?php endforeach;?>
						
						<?php endif;?>					
					</ul>	
				</div><!-- /content -->
			</div><!-- /wrapper -->			

			<footer data-role="footer" data-position="fixed">
				<h3>ToDo</h3>
			</footer><!-- /footer -->

		</div><!-- /page -->
	</body>
</html>


<!-- <div  class="ui-grid-solo" data-role="collapsible" data-content-theme="d" data-theme="a" data-mini="true" > 
								      	<h3><?php// echo $cantidad->CARGO;?></h3> -->
<!--  </div> -->
								   <!--  <span class="ui-li-count"><?php// echo $cantidad->NUMERO;?></span> -->								    
