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
													<th scope="col">Participacion.</th>												
													<th scope="col">X</th>
												</tr>											
										      	<?php foreach ($listaP as $persona):?>
										      		<?php if(($persona->CARGO == $cantidad->CARGO) && ($persona->ESTADOPER = 'A')):?>
										      			<tr>
															<td><?php echo $persona->N_NOMBRES;?> </td>
															<td><?php echo $persona->N_APELLIDOS;?></td>
															<td><?php echo $persona->TIPO_DOCUMENTO;?></td>
															<td><?php echo $persona->Q_DOCUMENTO;?></td>

															<?php if( isset($persona->PARTICIPACION)){?>
																<td><?php echo $persona->PARTICIPACION.' %';?></td>
															<?php }else{?>
																<td>S.P.</td>
															<?php } ?>
															<td><a href="#eliminarP<?php echo $persona->K_EMPLEADO?>" data-rel="popup" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext">Despedir</a></td>
														</tr>
														<!--PopUp eliminacion personal-->	
														<div data-role="popup" id="eliminarP<?php echo $persona->K_EMPLEADO?>"  class="ui-content" data-overlay-theme="a" data-position-to="window">
															<p>Seguro que desea despedir este empleado: <?php echo $persona->N_NOMBRES;?></p>
															<a href="?url=Cpersonal/eliminarP/<?php echo $persona->K_EMPLEADO;?>" data-mini="true" data-role="button" data-icon="delete">Aceptar</a>
															<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><!--Botnon de cerrado-->														
														</div>
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
				<a href="#crearPersonal" data-role="button" data-rel="popup" class="ui-btn-right" data-icon="plus" data-iconpos="notext" data-position-to="window" data-transition="slideup">Inicio</a>
				<div id="crearPersonal" data-role="popup" class="ui-content" data-overlay-theme="a">
					<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><!--Botnon de cerrado-->														
					<form action="index.php?url=cpersonal/crearNuevoP" method="POST">
						<label for="nombresE">Nombre(s)</label>
						<input type="text" name="nombresE">
						<label for="apellidosE">Apellidos</label>
						<input type="text" name="apellidosE">
						<label for="tipoDocE">Tipo documento</label>
						<select name="tipoDocE" id="tipoDocE" data-mini="true">
				            <option value="CC">Cedula Ciudadania</option>
				            <option value="DI">Documento Internacional</option>
				        </select>
				        <label for="numDocE">Numero Doc.</label>
						<input type="number" name="numDocE">
				        <label for="cargoE">Cargo en el sistema: </label>
						<select name="cargoE" id="cargoE" data-mini="true">
				            <option value="DP">Director Proyecto</option>
				            <option value="DA">Director Area</option>
				            <option value="PP">Personal Proyecto</option>
				        </select>
				        <input type="submit" value="Crear">
					</form>					  					
				</div>	
				<h3>ToDo</h3>
			</footer><!-- /footer -->

		</div><!-- /page -->
	</body>
</html>



<!-- <div  class="ui-grid-solo" data-role="collapsible" data-content-theme="d" data-theme="a" data-mini="true" > 
								      	<h3><?php// echo $cantidad->CARGO;?></h3> -->
<!--  </div> -->
								   <!--  <span class="ui-li-count"><?php// echo $cantidad->NUMERO;?></span> -->								    
