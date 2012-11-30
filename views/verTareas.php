<?php include("plantillas/header.php");?>
		<div data-rol="page">
			<div data-role="header" data-position="fixed" data-id="header">
				<a href="index.php?url=inicio" data-role="button" class="ui-btn-left" data-icon="home" data-iconpos="notext">Inicio</a>
				<h1>ToDo</h1>								
			</div><!-- /header -->

			<div data-role="content">
				<div class="wrapper">
					<h2 id="logo">
						<img src="views/images/Logo.png" alt="ToDO" width="245" height="125">
					</h2>
					<ul data-role="listview" data-theme="a" data-inset="true" data-mini ="true "data-count-theme="b">							
						<li data-role="list-divider">Tareas</li>														
						<?php if(isset($proyecTar) && !is_string($proyecTar)):?>
							<?php foreach($proyecTar as $proyecto):?>
								<li><h3><?php echo $proyecto->NPROYECTO; ?></h3>
									<span class="ui-li-count"><?php echo $proyecto->CANTIDAD;?></span>
									<ul data-role="listview" data-inset="true" data-split-theme="b" >								
										<li data-role="list-divider">
											<h3>Tareas</h3>
											<p>Area 	/	Responsable	/		Prioridad	/		Estado</p>
										</li>
										<?php if(isset($listaT) && !is_string($listaT)):?>
											<?php foreach ($listaT as $tarea):?>
												<?php if($tarea->NPROYECTO == $proyecto->NPROYECTO):?>														
													<li>
														
														<a href="#realizar<?php echo $tarea->K_TAREA;?>" data-position-to="window" data-rel="popup" data-transition="slideup">

															<h3><?php echo $tarea->DESCRIPCION;?> - Realizar Tarea</h3>
															<p>
																<?php 
																	echo $tarea->ANOMBRE."		/		";
																	echo $tarea->N_NOMBRES." ".$tarea->N_APELLIDOS."		/		";
																	echo $tarea->Q_PRIORIDAD."		/		";
																	if($tarea->ESTADOTAR==0){
																		echo "En proceso";	
																	}
																	else{
																		echo "Terminado";		
																	}																	
																?>
															</p>
															</a>

															<!-- <div data-role="controlgroup" data-type="horizontal" > -->
															<a href="#eliminar<?php echo $tarea->K_TAREA;?>" data-rel="popup" data-position-to="window" data-transition="slideup" data-icon="delete" data-iconpos="notext">Eliminar</a>
																
															<!-- </div> -->																										
													</li>

													<!--popup´s-->	
													<!--Recuadro de formulario-->	
													<div data-role="popup" id="realizar<?php echo $tarea->K_TAREA;?>"  class="ui-content" data-overlay-theme="a">
														<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><!--Botnon de cerrado-->														
														<?php if($tarea->ESTADOTAR == 0){?>
															<p>Ingrese el codigo de personal, para validar la transaccion</p>
															<form action="?url=ctarea/realizarTarea" method="post">				
																<label for="k_personal">Codigo</label>
																<input type="number" name="k_personal" id="k_personal" data-mini="true" placeholder="Código personal" required />
																<label for="k_tarea">Tarea</label>
																<input readonly="readonly" type="text" name="k_tarea" id="k_tarea" data-mini="true" placeholder="Código tarea" value = "<?php echo $tarea->K_TAREA?>"/>																	
																<br>
																<button type="submit" data-role="button" data-mini="true" data-theme="a" data-icon="check" class="submit">Realizar</button>
															</form>
														<?php } else { ?>
															<h3>Esta tarea ya fue realizada</h3>
														<?php } ?>
													</div>
													<!--Recuadro de eliminacion-->	
													<div data-role="popup" id="eliminar<?php echo $tarea->K_TAREA;?>"  class="ui-content" data-overlay-theme="a">
														<p>Seguro que desea eliminar la tarea: <?php echo $tarea->DESCRIPCION;?></p>
														<a href="?url=ctarea/eliminarT/<?php echo $tarea->K_TAREA;?>" data-mini="true" data-role="button" data-icon="delete">Aceptar</a>
														<a href="#" data-rel="back" data-role="button" data-theme="a" data-icon="delete" data-iconpos="notext" class="ui-btn-right">Close</a><!--Botnon de cerrado-->														
													</div>

																											
												<?php endif;?>
											<?php endforeach;?>
										<?php endif;?>
									</ul>									  		
								</li>		
							<?php endforeach;?>								
						<?php endif;?> 
					</ul>
					<?php if(is_string($proyecTar)): ?>			
						<div data-role="collapsible" data-mini="true" data-theme="e" data-content-theme="e">
								<h4>Error en la base de datos</h4>
								<p><?php echo $proyecTar; ?></p>
						</div>
					<?php endif ?>
					<?php if(is_string($listaT)): ?>			
						<div data-role="collapsible" data-mini="true" data-theme="e" data-content-theme="e">
								<h4>Error en la base de datos</h4>
								<p><?php echo $listaT; ?></p>
						</div>
					<?php endif ?>

				</div><!-- /wrapper -->
			</div><!-- /content -->

			<div data-role="footer" data-position="fixed">
				<a href="index.php?url=ctarea/cargarVistaNuevaT" data-role="button" class="ui-btn-right" data-icon="plus" data-iconpos="notext"  rel="external">Crear</a>								
				<h3>ToDo</h3>				
			</div><!-- /footer -->
		</div>
	</body>
</html>






