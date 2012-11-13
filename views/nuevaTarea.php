<?php  include('plantillas/header');?>
		<div data-role="page">
			<div data-role="header" data-position="fixed" data-id="header">
				<a href="index.php?url=inicio" data-role="button" class="ui-btn-left" data-icon="home" data-iconpos="notext">Inicio</a>
				<h1>ToDo</h1>								
			</div><!-- /header -->

			<div data-role="content">
				<div class="wrapper">
					<h2 id="logo">
						<img src="views/images/Logo.png" alt="ToDO" width="245" height="125">
					</h2>
					<?php if(isset($listaPro)):?>
						<ul data-role="listview" data-theme="a" data-inset="true" data-mini ="true "data-count-theme="b">							
							<li data-role="list-divider">Seleccione Proyecto</li>
							<?php foreach ($listaPro as $pro):?>
								<?php if( $pro->ESTADOPRO == 'A'):?>								
									<li><h3><?php echo $pro->NPROYECTO; ?></h3>
										<?php if(isset($listaA)):?>
											<ul data-role="listview" data-inset="true" data-split-theme="a" data-split-icon="plus">								
												<li data-role="list-divider"><h3>AREAS</h3></li>
												<?php foreach ($listaA as $area):?>
													<?php if($area->PNOMBRE == $pro->NPROYECTO):?>
														<li>
															<a href="">
																<h3><?php echo $area->ANOMBRE;?></h3>																														
															</a>
															
															<a href="#<?php echo $area->K_AREA;?>"  data-rel="popup" data-position-to="window" data-transition="turn"></a>
															<div data-role="popup" id="<?php echo $area->K_AREA;?>" class="ui-content" data-overlay-theme="a">
																<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><!--Botnon de cerrado-->														
																<p>Ingrese y seleccione los datos de la nueva tarea</p>
																<form action="?url=ctarea/crearNuevaT" method="post">	
																	<div class="ui-grid-a">
																		<div class="ui-block-a">
																			<label for="k_area">Area: <?php echo $area->ANOMBRE ?></label>
																			<input type="hidden" name="k_area" id="k_area" data-mini="true" size="2" maxlenght="2" value="<?php echo $area->K_AREA?>"/>
																		</div>
																		<div class="ui-block-b">
																			<label for="prioridad">Prioridad</label>
																			<select name="prioridad" id="prioridad" data-mini="true">
																	            <option value="1">1</option>
																	            <option value="2">2</option>
																	            <option value="3">3</option>
																	            <option value="4">4</option>
																	            <option value="5">5</option>
																	        </select>
																		</div>
																	</div>
																	<label for="k_proyecto">Proyecto: <?php echo $area->PNOMBRE ?></label>
																	<input type="hidden" name="k_proyecto" id="k_proyecto" data-mini="true" size="2" maxlenght="2" value ="<?php echo $area->K_PROYECTO?>"/>
																	<select name="responsable" data-mini="true" name="responsable" id="responsable">
																		<option>Responsable</option>
																       	<?php foreach($listaPer as $per): ?>
																       		<?php if($per->CARGO != 'I'):?>
																       			<option value="<?php echo $per->K_EMPLEADO;?>"><?php echo $per->N_NOMBRES." ".$per->N_APELLIDOS;?></option>
																       		<?php endif; ?>															       		
																	    <?php  endforeach;?>																    
																	</select>																	

																	<label for="descripcion">Descripcion</label>
																	<input type="text" name="descripcion" id="descripcion" data-mini="true" required/>
																																																		
																	<button type="submit" data-role="button" data-mini="true" data-theme="a" data-icon="check" class="submit">Realizar</button>
																</form>															
															</div>
														</li>
													<?php endif;?>
												<?php endforeach;?>
											</ul>
										<?php endif; ?>
									</li>
								<?php endif; ?>	
							<?php endforeach; ?>
						</ul>						
					<?php endif;?>
				</div>
			</div><!-- /content -->

			<div data-role="footer" data-position="fixed">
				<h3>ToDo</h3>
			</div><!-- /footer -->
		</div>		
	</body>
</html>
